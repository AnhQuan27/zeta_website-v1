<?php

namespace App\Services;

use App\Repositories\ProductSkuAttributeRepository;

class ProductSkuAttributeService 
{
    protected $productSkuAttributeRepository;

    public function __construct(ProductSkuAttributeRepository $productSkuAttributeRepository)
    {
        $this->productSkuAttributeRepository = $productSkuAttributeRepository;
    }

    public function getAllProductSkuAttributes()
    {
        return $this->productSkuAttributeRepository->getAll();
    }

    public function getProductSkuAttributeById($id)
    {
        return $this->productSkuAttributeRepository->getById($id);
    }

    public function createProductSkuAttribute(array $data)
    {
        return $this->productSkuAttributeRepository->create($data);
    }

    public function updateProductSkuAttribute($id, array $data)
    {
        return $this->productSkuAttributeRepository->update($id, $data);
    }

    public function deleteProductSkuAttribute($id)
    {
        return $this->productSkuAttributeRepository->delete($id);
    }

    public function restoreProductSkuAttribute($id)
    {
        return $this->productSkuAttributeRepository->restore($id);
    }

    public function forceDeleteProductSkuAttribute($id)
    {
        return $this->productSkuAttributeRepository->forceDelete($id);
    }
}