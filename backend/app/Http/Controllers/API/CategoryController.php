<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Services\CategoryService;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();

        return CategoryResource::collection($categories)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $category = $this->categoryService->getCategoryById($id);

        if (!$category) {
            return response()->json(
                ['message' => 'Category not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return (new CategoryResource($category))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->createCategory($request->validated());

        return response()->json(
            new CategoryResource($category),
            Response::HTTP_CREATED
        );
    }

    public function update(CategoryRequest $request, $id)
    {
        $updated = $this->categoryService->updateCategory($id, $request->validated());

        if (!$updated) {
            return response()->json(
                ['message' => 'Category not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->json(
            ['message' => 'Category updated successfully'],
            Response::HTTP_OK
        );
    }

    public function destroy($id)
    {
        $deleted = $this->categoryService->deleteCategory($id);

        if (!$deleted) {
            return response()->json(
                ['message' => 'Category not found or failed to delete'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->noContent();
    }

    public function restore($id)
    {
        $restored = $this->categoryService->restoreCategory($id);

        if (!$restored) {
            return response()->json(
                ['message' => 'Category not found in trash'],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function forceDelete($id)
    {
        $deleted = $this->categoryService->forceDeleteCategory($id);

        if (!$deleted) {
            return response()->json(
                ['message' => 'Category not found or failed to delete permanently'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->noContent();
    }
}
