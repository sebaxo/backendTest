<?php


namespace OrderRepository;


use App\Order;
use App\OrderProduct;

class OrderRepositoryImp implements OrderRepositoryInterface
{
    protected $order_model;
    protected $order_product_model;

    /**
     * OrderRepositoryImp constructor.
     * @param Order $order
     * @param OrderProduct $order_product
     * se inyectan los modelos de orden y ordenProduct
     */
    public function __construct(Order $order, OrderProduct $order_product)
    {
        $this->order_model = $order;
        $this->order_product_model = $order_product;
    }

    /**
     * @param array $orders
     * @return array
     * se crean las ordenes y sus respectivos productos
     */
    public function createOrders(array $orders): array
    {
        $aux = array();
        foreach ($orders as $order) {
            $single_order = array();
            $single_order["idOrder"] = $order["id"];
            $single_order["priority"] = $order["priority"];
            $single_order["user"] = $order["user"];
            $single_order["address"] = $order["address"];

            $aux[] = $this->order_model->create($single_order);

            foreach ($order["products"] as $product) {
                $single_product = array();
                $single_product["idProduct"] = $product["id"];
                $single_product["name"] = $product["name"];
                $single_product["quantity"] = $product["quantity"];
                $single_product["idOrder"] = $single_order["idOrder"];
                $this->order_product_model->create($single_product);
            }
        }
        return $aux;
    }

    /**
     * @param int $id_order
     * @return Order
     * se trae una order por su id
     */
    public function getOrderById(int $id_order): Order
    {
        return $this->order_model->findOr($id_order);
    }

    /**
     * @param int $id_order
     * @return mixed
     * se traen los productos de una orden por el id de la orden
     */
    public function getProductsByOrder(int $id_order)
    {
        return $this->order_product_model->where('idOrder', $id_order)->get()->toArray();
    }

    /**
     * @return array
     * se traen todos los productos agrupados por el id del producto y se suman sus cantidades
     */
    public function getAllProductsOrdersGroupById(): array
    {
        return $this->order_product_model->groupBy('idProduct')
            ->selectRaw('sum(quantity) as sum, idProduct')
            ->pluck('sum','idProduct')->toArray();//return array
    }

    /**
     * @return array
     * se traen todas las ordenes
     */
    public function getAllDayOrders(): array
    {
        return $this->order_model->all()->toArray();
    }
}
