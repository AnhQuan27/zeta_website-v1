<?php

namespace App\Services;

use App\Repositories\ProductAttributeRepository;

class ProductAttributeService 
{
    protected $productAttributeRepository;

    public function __construct(ProductAttributeRepository $productAttributeRepository)
    {
        $this->productAttributeRepository = $productAttributeRepository;
    }

    public function getAllProductAttributes()
    {
        return $this->productAttributeRepository->getAll();
    }

    public function getProductAttributeById($id)
    {
        return $this->productAttributeRepository->getById($id);
    }

    public function createProductAttribute(array $data)
    {
        return $this->productAttributeRepository->create($data);
    }

    public function updateProductAttribute($id, array $data)
    {
        return $this->productAttributeRepository->update($id, $data);
    }

    public function deleteProductAttribute($id)
    {
        return $this->productAttributeRepository->delete($id);
    }

    public function restoreProductAttribute($id)
    {
        return $this->productAttributeRepository->restore($id);
    }

    public function forceDeleteProductAttribute($id)
    {
        return $this->productAttributeRepository->forceDelete($id);
    }
}