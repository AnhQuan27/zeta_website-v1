<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Services\ProductSkuAttributeService;
use App\Http\Resources\ProductSkuAttributeResource;
use App\Http\Requests\ProductSkuAttributeRequest;

class ProductSkuAttributeController extends Controller
{
    protected $productSkuAttributeService;

    public function __construct(ProductSkuAttributeService $productSkuAttributeService)
    {
        $this->productSkuAttributeService = $productSkuAttributeService;
    }

    public function index()
    {
        $productSkuAttributes = $this->productSkuAttributeService->getAllProductSkuAttributes();

        return ProductSkuAttributeResource::collection($productSkuAttributes)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $productSkuAttribute = $this->productSkuAttributeService->getProductSkuAttributeById($id);
        
        if (!$productSkuAttribute) {
            return response()->json(
                ['message' => 'ProductSkuAttribute not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return (new ProductSkuAttributeResource($productSkuAttribute))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(ProductSkuAttributeRequest $request)
    {
        $productSkuAttribute = $this->productSkuAttributeService->createProductSkuAttribute($request->validated());
    
        return response()->json(
            new ProductSkuAttributeResource($productSkuAttribute),
            Response::HTTP_CREATED
        );
    }

    public function update(ProductSkuAttributeRequest $request, $id)
    {
        $updated = $this->productSkuAttributeService->updateProductSkuAttribute($id, $request->validated());

        if (!$updated) {
            return response()->json(
                ['message' => 'Product SkuAttribute not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->json(
            ['message' => 'Product SkuAttribute updated successfully'],
            Response::HTTP_OK
        );
    }

    public function destroy($id)
    {
        $deleted = $this->productSkuAttributeService->deleteProductSkuAttribute($id);

        if (!$deleted) {
            return response()->json(
                ['message' => 'Product SkuAttribute not found or failed to delete'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->noContent();
    }

    public function restore($id)
    {
        $restored = $this->productSkuAttributeService->restoreProductSkuAttribute($id);

        if (!$restored) {
            return response()->json(
                ['message' => 'Product SkuAttribute not found in trash'],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function forceDelete($id)
    {
        $deleted = $this->productSkuAttributeService->forceDeleteProductSkuAttribute($id);

        if (!$deleted) {
            return response()->json(
                ['message' => 'Product SkuAttribute not found or failed to delete permanently'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->noContent();
    }
}
