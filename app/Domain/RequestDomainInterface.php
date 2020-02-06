<?php


namespace App\Domain;


interface RequestDomainInterface
{
    public function getReleaseInventory():array;
    public function secondDayInventory():array;
    public function getReleaseProviders():array;
    public function getLessSoldProducts():array;
    public function getOrderStatusById(int $idOrder):array;
    public function getBestSoldProducts():array;
}
