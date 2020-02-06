<?php

namespace App\Http\Controllers;

use App\Domain\RequestDomainInterface;
use App\ServiceContracts\RequestContract;
use Illuminate\Http\Request;

class RequestController extends Controller implements RequestContract
{

    /**@var RequestDomainInterface**/
    private $domain;
    public function __construct(RequestDomainInterface $input_domain)
    {
        $this->domain = $input_domain;
    }

    /**
     * @return array
     * Metodo para obtener los productos que pueden ser alistados desde el inventario el dia de hoy
     */
    public function getReleaseTodayInventory(): array
    {
        return $this->domain->getReleaseInventory();
    }

    /**
     * @return array
     * Metodo para obtener el inventario inicial del segundo dia
     */
    public function secondDayInventory(): array
    {
        return $this->domain->secondDayInventory();
    }

    /**
     * @return array
     * Metodo para obtener los productos que deben ser alistados por transportadores y a quien le corresponde que pedido
     */
    public function getReleaseProviders(): array
    {
        return $this->domain->getReleaseProviders();
    }

    /**
     * @return array
     * Metodo para obtener los productos menos vendidos del primer dia
     */
    public function getLessSoldProducts(): array
    {
        return $this->domain->getLessSoldProducts();
    }

    /**
     * @param Request $request - int idOrder
     * @return array
     * Metodo para obtener que productos son alistados desde inventario y transportadores segun la orden
     */
    public function getOrderStatusById(Request $request): array
    {
        return $this->domain->getOrderStatusById($request->get('idOrder'));
    }

    /**
     * @return array
     * Metodo para obtener los productos menos vendidos del primer dia
     */
    public function getBestSoldProducts(): array
    {
        return $this->domain->getBestSoldProducts();
    }
}
