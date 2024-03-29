<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Product::all(), 200);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $payload = $request->validated();

        $product = Product::create($payload);

        return response()->json($product, 201);
    }

    public function show(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        return response()->json($product, 200);
    }

    public function update(ProductRequest $request, string $id): JsonResponse
    {
        $payload = $request->validated();

        $product = Product::findOrFail($id);

        $product->update($payload);

        return response()->json($product, 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
