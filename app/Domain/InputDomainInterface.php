<?php


namespace App\Domain;


interface InputDomainInterface
{
    public function addOrders(array $orders):array ;
    public function addInventory(array $inventory):array ;
    public function addProviders(array $providers):array ;
}
