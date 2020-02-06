<?php


namespace ProviderRepository;


use App\Provider;

interface ProviderRepositoryInterface
{
    public function createProviders(array $providers): array;
    public function getProviderById(int $provider_id): Provider;
    public function getProviderByProductId(int $product_id);
    public function getProviderNameByProductId(int $product_id) : string;
    public function getAllProvidersProducts():array;
}
