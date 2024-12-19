<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Services\ProductSkuService;
use App\Http\Resources\ProductSkuResource;
use App\Http\Requests\ProductSkuRequest;

class ProductSkuController extends Controller
{
    protected $productSkuService;

    public function __construct(ProductSkuService $productSkuService)
    {
        $this->productSkuService = $productSkuService;
    }

    public function index()
    {
        $productSkus = $this->productSkuService->getAllProductSkus();

        return ProductSkuResource::collection($productSkus)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function show($id)
    {
        $productSku = $this->productSkuService->getProductSkuById($id);
        
        if (!$productSku) {
            return response()->json(
                ['message' => 'ProductSku not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return (new ProductSkuResource($productSku))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(ProductSkuRequest $request)
    {
        $productSku = $this->productSkuService->createProductSku($request->validated());
    
        return response()->json(
            new ProductSkuResource($productSku),
            Response::HTTP_CREATED
        );
    }

    public function update(ProductSkuRequest $request, $id)
    {
        $updated = $this->productSkuService->updateProductSku($id, $request->validated());

        if (!$updated) {
            return response()->json(
                ['message' => 'Product Sku not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->json(
            ['message' => 'Product Sku updated successfully'],
            Response::HTTP_OK
        );
    }

    public function destroy($id)
    {
        $deleted = $this->productSkuService->deleteProductSku($id);

        if (!$deleted) {
            return response()->json(
                ['message' => 'Product Sku not found or failed to delete'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->noContent();
    }

    public function restore($id)
    {
        $restored = $this->productSkuService->restoreProductSku($id);

        if (!$restored) {
            return response()->json(
                ['message' => 'Product Sku not found in trash'],
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function forceDelete($id)
    {
        $deleted = $this->productSkuService->forceDeleteProductSku($id);

        if (!$deleted) {
            return response()->json(
                ['message' => 'Product Sku not found or failed to delete permanently'],
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->noContent();
    }
}
