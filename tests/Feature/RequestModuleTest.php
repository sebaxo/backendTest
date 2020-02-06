<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RequestModuleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fillDatabase();
    }

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
    public function testGetReleaseTodayInventoryMethodRespond(){
        $response = $this->get('/api/inventoryRelease');
        $this->assertSame($response->getContent(), '{"1":1,"2":3,"3":7,"4":7,"5":10,"6":15,"7":6,"8":3,"9":1,"10":8,"11":5,"12":4,"13":2,"14":1,"15":1,"16":9,"17":3,"18":3,"19":8,"20":3,"21":3,"22":6,"23":2,"24":9,"25":5,"26":2,"27":1,"28":3,"29":1,"30":1,"31":9,"32":1,"33":1,"34":3,"35":3,"36":1}');
    }

    /**@test**/
    public function testGetLessSoldProductsMethodRespond(){
        $response = $this->get('/api/getLessSoldProducts');
        $this->assertSame($response->getContent(), '{"47":0,"46":0,"45":0,"1":1,"27":1,"41":1,"36":1,"33":1,"32":1,"29":1,"43":1,"26":2,"23":2,"30":2,"13":2,"28":3,"35":3,"34":3,"17":3,"18":3,"8":3,"20":3,"21":3,"39":4,"9":4,"12":4,"14":4,"11":5,"25":5,"15":5,"7":6,"4":7,"37":7,"22":7,"19":8,"10":8,"3":10,"24":15,"2":21,"31":25,"6":60,"5":102,"16":1503}');
    }

    /**@test**/
    public function testSecondDayInventoryMethodRespond(){
        $response = $this->get('/api/secondDayInventory');
        $this->assertSame($response->getContent(), '[{"idProduct":1,"date":"2019-03-02","quantity":2},{"idProduct":2,"date":"2019-03-02","quantity":0},{"idProduct":3,"date":"2019-03-02","quantity":0},{"idProduct":4,"date":"2019-03-02","quantity":1},{"idProduct":5,"date":"2019-03-02","quantity":0},{"idProduct":6,"date":"2019-03-02","quantity":0},{"idProduct":7,"date":"2019-03-02","quantity":20},{"idProduct":8,"date":"2019-03-02","quantity":8},{"idProduct":9,"date":"2019-03-02","quantity":0},{"idProduct":10,"date":"2019-03-02","quantity":0},{"idProduct":11,"date":"2019-03-02","quantity":2},{"idProduct":12,"date":"2019-03-02","quantity":4},{"idProduct":13,"date":"2019-03-02","quantity":0},{"idProduct":14,"date":"2019-03-02","quantity":0},{"idProduct":15,"date":"2019-03-02","quantity":0},{"idProduct":16,"date":"2019-03-02","quantity":0},{"idProduct":17,"date":"2019-03-02","quantity":14},{"idProduct":18,"date":"2019-03-02","quantity":5},{"idProduct":19,"date":"2019-03-02","quantity":1},{"idProduct":20,"date":"2019-03-02","quantity":6},{"idProduct":21,"date":"2019-03-02","quantity":0},{"idProduct":22,"date":"2019-03-02","quantity":0},{"idProduct":23,"date":"2019-03-02","quantity":7},{"idProduct":24,"date":"2019-03-02","quantity":0},{"idProduct":25,"date":"2019-03-02","quantity":5},{"idProduct":26,"date":"2019-03-02","quantity":38},{"idProduct":27,"date":"2019-03-02","quantity":1},{"idProduct":28,"date":"2019-03-02","quantity":0},{"idProduct":29,"date":"2019-03-02","quantity":1},{"idProduct":30,"date":"2019-03-02","quantity":0},{"idProduct":31,"date":"2019-03-02","quantity":0},{"idProduct":32,"date":"2019-03-02","quantity":9},{"idProduct":33,"date":"2019-03-02","quantity":1},{"idProduct":34,"date":"2019-03-02","quantity":0},{"idProduct":35,"date":"2019-03-02","quantity":0},{"idProduct":36,"date":"2019-03-02","quantity":5}]');
    }

    /**@test**/
    public function testGetReleaseProvidersMethodRespond(){
        $response = $this->get('/api/getReleaseProviders');
        $this->assertSame($response->getContent(), '[{"provider_name":"NA","id_product":41,"ids_orders":[11]},{"provider_name":"Angelica","id_product":19,"ids_orders":[11,6]},{"provider_name":"Raul","id_product":29,"ids_orders":[11]},{"provider_name":"Raul","id_product":30,"ids_orders":[11,13]},{"provider_name":"NA","id_product":37,"ids_orders":[1]},{"provider_name":"Raul","id_product":28,"ids_orders":[15,13]},{"provider_name":"Raul","id_product":16,"ids_orders":[14,5]},{"provider_name":"Raul","id_product":34,"ids_orders":[14]},{"provider_name":"Raul","id_product":35,"ids_orders":[14]},{"provider_name":"Angelica","id_product":12,"ids_orders":[14,4]},{"provider_name":"Raul","id_product":36,"ids_orders":[14]},{"provider_name":"Ruby","id_product":25,"ids_orders":[8,12]},{"provider_name":"Angelica","id_product":22,"ids_orders":[8,7,9]},{"provider_name":"Ruby","id_product":27,"ids_orders":[8]},{"provider_name":"Angelica","id_product":9,"ids_orders":[3]},{"provider_name":"Angelica","id_product":10,"ids_orders":[3]},{"provider_name":"Angelica","id_product":11,"ids_orders":[3]},{"provider_name":"NA","id_product":43,"ids_orders":[13]},{"provider_name":"Raul","id_product":32,"ids_orders":[13]},{"provider_name":"Raul","id_product":33,"ids_orders":[13]},{"provider_name":"Raul","id_product":17,"ids_orders":[6]},{"provider_name":"Angelica","id_product":18,"ids_orders":[6]},{"provider_name":"Angelica","id_product":15,"ids_orders":[6,4]},{"provider_name":"Angelica","id_product":20,"ids_orders":[6]},{"provider_name":"Angelica","id_product":21,"ids_orders":[7]},{"provider_name":"Angelica","id_product":23,"ids_orders":[7]},{"provider_name":"NA","id_product":39,"ids_orders":[7]},{"provider_name":"Ruby","id_product":24,"ids_orders":[7]},{"provider_name":"Raul","id_product":31,"ids_orders":[12]},{"provider_name":"Ruby","id_product":5,"ids_orders":[2]},{"provider_name":"Angelica","id_product":13,"ids_orders":[4]},{"provider_name":"Angelica","id_product":14,"ids_orders":[4]}]');
    }

    /**@test**/
    public function testGetBestSoldProductsMethodRespond(){
        $response = $this->get('/api/getBestSoldProducts');
        $this->assertSame($response->getContent(), '{"16":1503,"5":102,"6":60,"31":25,"2":21,"24":15,"3":10,"10":8,"19":8,"22":7,"4":7,"37":7,"7":6,"15":5,"25":5,"11":5,"9":4,"12":4,"14":4,"39":4,"28":3,"18":3,"21":3,"20":3,"35":3,"17":3,"8":3,"34":3,"23":2,"26":2,"30":2,"13":2,"41":1,"36":1,"1":1,"33":1,"32":1,"29":1,"27":1,"43":1,"45":0,"46":0,"47":0}');
    }

    /**@test**/
    public function testGetOrderStatusByIdMethodRespond(){
        $response = $this->post('/api/getOrderStatusById', ['idOrder' => 1]);
        $this->assertSame($response->getContent(), '{"inventoryReadyProducts":["1","2","3","4"],"providersProducts":[37],"nonInventoryOrProviderProducts":[]}');
    }

    /**
     * metodo privado para llenado de la base de datos sqlite para pruebas
     */
    private function fillDatabase(){
        $this->json('post','/api/addOrders',
            json_decode(file_get_contents(storage_path() . "/jsons/orders-merqueo.json"), true));
        $this->json('post','/api/addInventory',
            json_decode(file_get_contents(storage_path() . "/jsons/inventory-merqueo.json"), true));
        $this->json('post','/api/addProviders',
            json_decode(file_get_contents(storage_path() . "/jsons/providers-merqueo.json"), true));
    }
}
