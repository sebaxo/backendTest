<?php


namespace App\ServiceContracts;


use Illuminate\Http\Request;

interface RequestContract
{
    public function getReleaseTodayInventory():array;
    public function secondDayInventory():array;
    public function getReleaseProviders():array;
    public function getLessSoldProducts():array;
    public function getOrderStatusById(Request $request):array;
    public function getBestSoldProducts():array;
}
