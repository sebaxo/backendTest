<?php

namespace Tests\Feature;

use App\Inventory;
use App\Order;
use App\OrderProduct;
use App\Provider;
use App\ProviderProducts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

/**
 * Class InputModuleTest
 * @package Tests\Feature
 */

 class InputModuleTest extends TestCase
{

    use RefreshDatabase;

     /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**@test**/
     public function testAddOrders()
     {
        $this->withoutExceptionHandling();
        $response = $this->json('post','/api/addOrders',
            json_decode(file_get_contents(storage_path() . "/jsons/orders-merqueo.json"), true));

        $this->assertCount(15, Order::all());
        $this->assertCount(55, OrderProduct::all());
     }

     /**@test**/
     public function testAddInventory()
     {
         $this->withoutExceptionHandling();
         $response = $this->json('post','/api/addInventory',
             json_decode(file_get_contents(storage_path() . "/jsons/inventory-merqueo.json"), true));

         $this->assertCount(36, Inventory::all());
     }

     /**@test**/
     public function testAddProviders()
     {
         $this->withoutExceptionHandling();
         $response = $this->json('post','/api/addProviders',
             json_decode(file_get_contents(storage_path() . "/jsons/providers-merqueo.json"), true));

         $this->assertCount(3, Provider::all());
         $this->assertCount(39, ProviderProducts::all());
     }

}
