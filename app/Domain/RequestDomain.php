<?php


namespace App\Domain;


use InventoryRepository\InventoryRepositoryInterface;
use OrderRepository\OrderRepositoryInterface;
use ProviderRepository\ProviderRepositoryInterface;

class RequestDomain implements RequestDomainInterface
{
    /**@var OrderRepositoryInterface**/
    private $order_repository;
    /**@var InventoryRepositoryInterface**/
    private $inventory_repository;
    /**@var ProviderRepositoryInterface**/
    private $provider_repository;

    /**
     * RequestDomain constructor.
     * @param OrderRepositoryInterface $order_repository
     * @param InventoryRepositoryInterface $inventory_repository
     * @param ProviderRepositoryInterface $provider_repository
     * inyeccion de los 3 repositorios de base de datos
     */
    public function __construct(OrderRepositoryInterface $order_repository, InventoryRepositoryInterface $inventory_repository,
                                ProviderRepositoryInterface $provider_repository)
    {
        $this->order_repository = $order_repository;
        $this->inventory_repository = $inventory_repository;
        $this->provider_repository = $provider_repository;
    }

    /**
     * @return array
     * logica, obtener los productos que pueden ser alistados desde el inventario
     */
    public function getReleaseInventory(): array
    {
        $orders_products = $this->order_repository->getAllProductsOrdersGroupById();
        $aux = array();
        foreach ($orders_products as $product_id => $product_quantity) {
            $inventory_quantity = $this->inventory_repository->getQuantityById($product_id);
            if ($inventory_quantity != 0) {
                if ($inventory_quantity < $product_quantity)
                    $product_quantity = $inventory_quantity;
                $aux[$product_id] = (int)$product_quantity;
            }
        }
        return $aux;
    }

    /**
     * @return array
     * logica, inventario inicial del segundo dia
     */
    public function secondDayInventory(): array
    {
        $orders_products = $this->order_repository->getAllProductsOrdersGroupById();
        $inventory = $this->inventory_repository->getInventoryProducts();
        $second_day_date = "2019-03-02";
        foreach($orders_products as $idProduct => $quantity){
            if(array_key_exists($idProduct, $inventory) && $inventory[$idProduct]['quantity']!=0){
                $inventory[$idProduct]['quantity'] -= $quantity;
                $inventory[$idProduct]['date'] = $second_day_date;
                if($inventory[$idProduct]['quantity'] < 0)
                    $inventory[$idProduct]['quantity'] = 0;
            }
        }
        return array_values($inventory);
    }

    /**
     * @return array
     * logica, obtener productos alistados por proveedores y sus ordenes correspondientes
     */
    public function getReleaseProviders(): array
    {
        $orders = $this->order_repository->getAllDayOrders();

        $user_address_priority = array();
        $user_address_orders = array();
        foreach ($orders as $order){
            //se agrupan las tuplas user address por la menor prioridad
            if(array_key_exists( $order['user'].$order['address'], $user_address_priority)){
                if($user_address_priority[$order['user'].$order['address']]<$order['priority'])
                    $user_address_priority[$order['user'].$order['address']] = $order['priority'];
            }else
                $user_address_priority[$order['user'].$order['address']] = $order['priority'];

            //se crea diccionario con la llave tupla user address y value arreglo de id ordernes
            if(array_key_exists( $order['user'].$order['address'], $user_address_orders)) {
                $user_address_orders[$order['user'].$order['address']][] = $order['idOrder'];
            }else
                $user_address_orders[$order['user'].$order['address']] = array($order['idOrder']);
        }

        //se ordena el arreglo de prioridades desendentemente
        arsort($user_address_priority);

        //se recorre el diccionario de arreglos de ordenes de manera desendente por mayor prioridad
        //de tuplas user address, se usa un arreglo stock llenado dinamicamente con el inventario que se
        //va consultando mientras se recorren las ordenes, se va restando inventario hasta que se llega a 0
        //y se debe requerir a los proveedores, de momento solo se guarda que producto en que orden requirio
        //ser entregado por un proveedor
        $stock = array();
        $provider_orders = array();
        foreach ($user_address_priority as $user_addres => $priority){
            foreach ($user_address_orders[$user_addres] as $order){
                $actual_order = $this->order_repository->getProductsByOrder($order);
                foreach ($actual_order as $request_product){
                    if(!array_key_exists($request_product['idProduct'], $stock))
                        $stock[$request_product['idProduct']] = $this->inventory_repository->getQuantityById($request_product['idProduct']);

                    if($stock[$request_product['idProduct']] >= $request_product['idProduct'])
                        $stock[$request_product['idProduct']] -= $request_product['idProduct'];
                    else{
                        $stock[$request_product['idProduct']] = 0;

                        if(!array_key_exists($request_product['idProduct'], $provider_orders))
                            $provider_orders[$request_product['idProduct']] = array($order);
                        else
                            $provider_orders[$request_product['idProduct']][] = $order;

                        //$provider = $this->provider_repository->getProviderByProductId($request_product['idProduct']);
                    }
                }
            }
        }
        //se recorre el arreglo de productos por ordenes de los proveedores y se busca el nombre del proveedor
        //en la base de datos para retornarlo
        $print_array = array();
        $provider_product = array();
        foreach ($provider_orders as $id_product => $id_order){
            if(!array_key_exists($id_product, $provider_product))
                $provider_product[$id_product] = $this->provider_repository->getProviderNameByProductId($id_product);
            $print_array[] = array("provider_name"=>$provider_product[$id_product], "id_product"=>$id_product, "ids_orders"=>$id_order);
        }

        return $print_array;
    }

    /**
     * @return array
     * logica, productos menos vendidos
     */
    public function getLessSoldProducts(): array
    {
        $aux_array = $this->getNonSortSoldProducts();

        asort($aux_array);
        return $aux_array;
    }

    /**
     * @param int $idOrder
     * @return array
     * logica, obtener los productos alistados por inventario y transportadores segun la orden
     */
    public function getOrderStatusById(int $idOrder): array
    {
        /*$order_quantity = $this->order_repository->getProductsByOrder($idOrder);
        $order_stock = array("inventoryReadyProducts"=>array(),"providersProducts"=>array());
        foreach ($order_quantity as $item){
            $inventory_quantity = $this->inventory_repository->getQuantityById($item['idProduct']);
            if($inventory_quantity>=$item['quantity']){
                $order_stock['inventoryReadyProducts'][$item['idProduct']];
            }
        }*/

        $order_stock = array("inventoryReadyProducts"=>array(),"providersProducts"=>array(),"nonInventoryOrProviderProducts"=>array());
        $order_quantity = $this->order_repository->getProductsByOrder($idOrder);
        $providers_orders_products = $this->getReleaseProviders();

        foreach ($providers_orders_products as $item){
            if(in_array($idOrder, $item['ids_orders']))
                $order_stock['providersProducts'][] = $item['id_product'];
        }

        foreach ($order_quantity as $item){
            if(!in_array($item['idProduct'], $order_stock['providersProducts']))
                if($this->inventory_repository->getQuantityById($item['idProduct']) != 0)
                    $order_stock['inventoryReadyProducts'][] = $item['idProduct'];
                else
                    $order_stock['nonInventoryOrProviderProducts'][] = $item['idProduct'];
        }

        return $order_stock;
    }

    /**
     * @return array
     * logica, productos mas vendidos
     */
    public function getBestSoldProducts(): array
    {
        $aux_array = $this->getNonSortSoldProducts();

        arsort($aux_array);
        return $aux_array;
    }

    /**
     * @return array
     * metodo que retorna los productos vendidos en el dia para ordenarlos luego
     */
    private function getNonSortSoldProducts():array {
        $all_available_products = array();
        $inventory_products = $this->inventory_repository->getInventoryProducts();
        foreach ($inventory_products as $product){
            $all_available_products[$product['idProduct']] = 0;
        }

        $providers_products = $this->provider_repository->getAllProvidersProducts();
        foreach ($providers_products as $product){
            $all_available_products[$product['idProduct']] = 0;
        }

        $request_orders_products = $this->order_repository->getAllProductsOrdersGroupById();
        foreach ($request_orders_products as $id_product => $quantity){
            if(array_key_exists($id_product, $all_available_products))
                $all_available_products[$id_product] += (int)$quantity;
            else
                $all_available_products[$id_product] = (int)$quantity;
        }

        return $all_available_products;
    }
}
