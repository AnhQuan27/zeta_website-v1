<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService 
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function getProductById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function updateProduct($id, array $data)
    {
        return $this->productRepository->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }

    public function restoreProduct($id)
    {
        return $this->productRepository->restore($id);
    }

    public function forceDeleteProduct($id)
    {
        return $this->productRepository->forceDelete($id);
    }
}