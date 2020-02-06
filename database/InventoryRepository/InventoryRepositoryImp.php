<?php


namespace InventoryRepository;


use App\Inventory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InventoryRepositoryImp implements InventoryRepositoryInterface
{
    protected $model;

    /**
     * InventoryRepositoryImp constructor.
     * @param Inventory $inventory
     * se inyecta el modelo del inventario
     */
    public function __construct(Inventory $inventory)
    {
        $this->model = $inventory;
    }

    /**
     * @param array $inventory
     * @return array
     * se mapean los registros del inventario y se insertan en la base de datos
     */
    public function createInventory(array $inventory): array
    {
        $aux = array();
        foreach ($inventory as $item){
            $single_product = array();
            $single_product["idProduct"] = $item["id"];
            $single_product["date"] = $item["date"];
            $single_product["quantity"] = $item["quantity"];

            $aux[] = $this->model->create($single_product);
        }

        return $aux;
    }

    /**
     * @param int $id_product
     * @return int
     * obtener la cantidad de un producto en el inventario, si no se encuentra el producto se retorna 0
     */
    public function getQuantityById(int $id_product): int
    {
        $aux = $this->model->where('idProduct', $id_product)->first();
        if($aux != null)
            return $aux->quantity;
        else return 0;
    }

    /**
     * @param array $ids_products
     * @return array
     * obtener productos del inventario con una lista de id's de productos
     */
    public function getInventoryByOrder(array $ids_products): array
    {
        return $this->model->findOrFail($ids_products);
    }


    /**
     * @return array
     * obtener los productos del inventario como un diccionario con llave idProduct
     */
    public function getInventoryProducts(): array
    {
        return $this->model->all()->keyBy('idProduct')->toArray();
    }

}
