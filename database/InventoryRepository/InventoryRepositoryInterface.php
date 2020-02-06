<?php


namespace InventoryRepository;


use App\Inventory;

interface InventoryRepositoryInterface
{
    public function createInventory(array $inventory):array;
    public function getQuantityById(int $id_product):int;
    public function getInventoryByOrder(array $ids_products):array;
    public function getInventoryProducts():array;
}
