<?php

namespace App\Services;

use App\Repositories\ProductSkuRepository;

class ProductSkuService 
{
    protected $productSkuRepository;

    public function __construct(ProductSkuRepository $productSkuRepository)
    {
        $this->productSkuRepository = $productSkuRepository;
    }

    public function getAllProductSkus()
    {
        return $this->productSkuRepository->getAll();
    }

    public function getProductSkuById($id)
    {
        return $this->productSkuRepository->getById($id);
    }

    public function createProductSku(array $data)
    {
        return $this->productSkuRepository->create($data);
    }

    public function updateProductSku($id, array $data)
    {
        return $this->productSkuRepository->update($id, $data);
    }

    public function deleteProductSku($id)
    {
        return $this->productSkuRepository->delete($id);
    }

    public function restoreProductSku($id)
    {
        return $this->productSkuRepository->restore($id);
    }

    public function forceDeleteProductSku($id)
    {
        return $this->productSkuRepository->forceDelete($id);
    }
}