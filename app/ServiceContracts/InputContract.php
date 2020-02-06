<?php


namespace App\ServiceContracts;


use Illuminate\Http\Request;

interface InputContract
{
    public function addOrders(Request $request) : array;
    public function addInventory(Request $request) : array;
    public function addProviders(Request $request): array ;
}
