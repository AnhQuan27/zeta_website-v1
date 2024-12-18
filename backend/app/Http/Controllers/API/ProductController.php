<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Services\ProductService;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();

        return ProductResource::collection($products)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return response()->json(
                ['message' => 'Product not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->productService->createProduct($request->validated());

        return response()->json(
            new ProductResource($product),
            Response::HTTP_CREATED
        );
    }

    public function update(ProductRequest $request, $id)
    {
        $updated = $this->productService->updateProduct($id, $request->validated());

        if (!$updated) {
            return response()->json(
                ['message' => 'Product not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->json(
            ['message' => 'Product updated successfully'],
            Response::HTTP_OK
        );
    }

    public function destroy($id)
    {
        $deleted = $this->productService->deleteProduct($id);

        if (!$deleted) {
            return response()->json(
                ['message' => 'Product not found or failed to delete'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->noContent();
    }

    public function restore($id)
    {
        $restored = $this->productService->restoreProduct($id);

        if (!$restored) {
            return response()->json(
                ['message' => 'Product not found in trash'],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function forceDelete($id)
    {
        $deleted = $this->productService->forceDeleteProduct($id);

        if (!$deleted) {
            return response()->json(
                ['message' => 'Product not found or failed to delete permanently'],
                Response::HTTP_NOT_FOUND
            );
        }
        return response()->noContent();
    }
}
