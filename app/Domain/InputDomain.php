<?php


namespace App\Domain;


use InventoryRepository\InventoryRepositoryInterface;
use OrderRepository\OrderRepositoryInterface;
use ProviderRepository\ProviderRepositoryInterface;

class InputDomain implements InputDomainInterface
{

    /**@var OrderRepositoryInterface**/
    private $order_repository;
    /**@var InventoryRepositoryInterface**/
    private $inventory_repository;
    /**@var ProviderRepositoryInterface**/
    private $provider_repository;

    /**
     * InputDomain constructor.
     * @param OrderRepositoryInterface $order_repository
     * @param InventoryRepositoryInterface $inventory_repository
     * @param ProviderRepositoryInterface $provider_repository
     * se inyectan los repositorios de base de datos
     */
    public function __construct(OrderRepositoryInterface $order_repository, InventoryRepositoryInterface $inventory_repository,
        ProviderRepositoryInterface $provider_repository)
    {
        $this->order_repository = $order_repository;
        $this->inventory_repository = $inventory_repository;
        $this->provider_repository = $provider_repository;
    }

    /**
     * @param array $orders
     * @return array
     * se pasa el array al repositorio
     */
    public function addOrders(array $orders): array
    {
            return $this->order_repository->createOrders($orders['orders']);
    }

    /**
     * @param array $inventory
     * @return array
     * se pasa el array al repositorio
     */
    public function addInventory(array $inventory): array
    {
            return $this->inventory_repository->createInventory($inventory['inventory']);
    }

    /**
     * @param array $providers
     * @return array
     * se pasa el array al repositorio
     */
    public function addProviders(array $providers): array
    {
            return $this->provider_repository->createProviders($providers['providers']);
    }
}
