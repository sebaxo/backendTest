<?php


namespace ProviderRepository;


use App\Provider;
use App\ProviderProducts;

class ProviderRepositoryImp implements  ProviderRepositoryInterface
{
    protected $provider_model;
    protected $providers_product_model;

    /**
     * ProviderRepositoryImp constructor.
     * @param Provider $provider
     * @param ProviderProducts $providers_product
     * se inyectan los modelos de provider y providerProducts
     */
    public function __construct(Provider $provider, ProviderProducts $providers_product)
    {
        $this->provider_model = $provider;
        $this->providers_product_model = $providers_product;
    }

    /**
     * @param array $providers
     * @return array
     * se crean los providers y sus productos disponibles
     */
    public function createProviders(array $providers): array
    {
        $aux = array();
        foreach ($providers as $provider){
            $single_provider = array();
            $single_provider['idProvider'] = $provider['id'];
            $single_provider['name'] = $provider['name'];

            $aux[] = $this->provider_model->create($provider);

            foreach ($provider['products'] as $product){
                $single_product = array();
                $single_product['idProduct'] = $product['productId'];
                $single_product['idProvider'] = $single_provider['idProvider'];
                $this->providers_product_model->create($single_product);
            }
        }
        return $aux;
    }

    /**
     * @param int $provider_id
     * @return Provider
     * se obtiene un provider por su id
     */
    public function getProviderById(int $provider_id): Provider
    {
        return $this->provider_model->where('idProvider', $provider_id)->firstOrFail();
    }

    /**
     * @param int $product_id
     * @return mixed
     * se obtiene un provider a partir de uno de sus productos
     */
    public function getProviderByProductId(int $product_id)
    {
        $product = $this->providers_product_model->where('idProduct', $product_id)->first();
        return $this->provider_model->where('idProvider', $product['idProvider'])->first();
    }

    /**
     * @param int $product_id
     * @return string
     * se obtiene el nombre de un provider a partir de uno de sus productos, si no se encuentra el producto o el
     * provider se retorna NA
     */
    public function getProviderNameByProductId(int $product_id) : string
    {
        $product = $this->providers_product_model->where('idProduct', $product_id)->first();
        if($product === null)
            return "NA";
        $provider_name = $this->provider_model->where('idProvider', $product['idProvider'])->first();
        if($provider_name === null)
            return "NA";
        return $provider_name['name'];
    }

    /**
     * @return array
     * obtener todos los productos disponibles de todos los providers
     */
    public function getAllProvidersProducts(): array
    {
        return $this->providers_product_model->all()->toArray();
    }
}
