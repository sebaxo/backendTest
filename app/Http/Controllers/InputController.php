<?php


namespace App\Http\Controllers;

use App\Domain\InputDomainInterface;
use App\ServiceContracts\InputContract;
use Illuminate\Http\Request;

class InputController extends Controller implements InputContract
{
    /**@var InputDomainInterface**/
    private $domain;
    public function __construct(InputDomainInterface $input_domain)
    {
        $this->domain = $input_domain;
    }

    /**
     * @param Request $request
     * @return array
     * Metodo para añadir una lista de ordenes en formato json
     */
    public function addOrders(Request $request):array {
        $orders = json_decode($request->getContent(), true);
        return $this->domain->addOrders($orders);
    }

    /**
     * @param Request $request
     * @return array
     * Metodo para añadir una lista de productos al inventario en formato json
     */
    public function addInventory(Request $request):array
    {
        $inventory = json_decode($request->getContent(), true);
        return $this->domain->addInventory($inventory);
    }

    /**
     * @param Request $request
     * @return array
     * Metodo para añadir una lista de proveedores y sus productos en formato json
     */
    public function addProviders(Request $request):array
    {
        $providers = json_decode($request->getContent(), true);
        return $this->domain->addProviders($providers);
    }
}
