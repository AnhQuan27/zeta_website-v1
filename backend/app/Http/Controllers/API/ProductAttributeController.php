<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Services\ProductAttributeService;
use App\Http\Resources\ProductAttributeResource;
use App\Http\Requests\ProductAttributeRequest;

class ProductAttributeController extends Controller
{
    protected $productAttributeService;

    public function __construct(ProductAttributeService $productAttributeService)
    {
        $this->productAttributeService = $productAttributeService;
    }

    public function index()
    {
        $productAttributes = $this->productAttributeService->getAllProductAttributes();

        return ProductAttributeResource::collection($productAttributes)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $productAttribute = $this->productAttributeService->getProductAttributeById($id);
        
        if (!$productAttribute) {
            return response()->json(
                ['message' => 'ProductAttribute not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return (new ProductAttributeResource($productAttribute))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(ProductAttributeRequest $request)
    {
        $productAttribute = $this->productAttributeService->createProductAttribute($request->validated());
    
        return response()->json(
            new ProductAttributeResource($productAttribute),
            Response::HTTP_CREATED
        );
    }

    public function update(ProductAttributeRequest $request, $id)
    {
        $updated = $this->productAttributeService->updateProductAttribute($id, $request->validated());

        if (!$updated) {
            return response()->json(
                ['message' => 'Product Attribute not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->json(
            ['message' => 'Product Attribute updated successfully'],
            Response::HTTP_OK
        );
    }

    public function destroy($id)
    {
        $deleted = $this->productAttributeService->deleteProductAttribute($id);

        if (!$deleted) {
            return response()->json(
                ['message' => 'Product Attribute not found or failed to delete'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->noContent();
    }

    public function restore($id)
    {
        $restored = $this->productAttributeService->restoreProductAttribute($id);

        if (!$restored) {
            return response()->json(
                ['message' => 'Product Attribute not found in trash'],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function forceDelete($id)
    {
        $deleted = $this->productAttributeService->forceDeleteProductAttribute($id);

        if (!$deleted) {
            return response()->json(
                ['message' => 'Product Attribute not found or failed to delete permanently'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->noContent();
    }
}
