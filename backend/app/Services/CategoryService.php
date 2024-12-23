<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService 
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory($id, array $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function restoreCategory($id)
    {
        return $this->categoryRepository->restore($id);
    }

    public function forceDeleteCategory($id)
    {
        return $this->categoryRepository->forceDelete($id);
    }
}