<?php


namespace OrderRepository;


use App\Order;

interface OrderRepositoryInterface
{
    public function createOrders(array $order):array ;
    public function getOrderById(int $id_order):Order;
    public function getProductsByOrder(int $id_order);
    public function getAllDayOrders():array;
}
