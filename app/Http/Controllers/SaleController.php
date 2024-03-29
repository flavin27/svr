<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\SaleRequest;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;

class SaleController extends Controller
{
    public function index(): JsonResponse
    {
        $sales = Sale::all();

        return response()->json($sales, 200);
    }

    public function store(SaleRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $products = $validatedData['products'];
        unset($validatedData['products']);

        $sale = Sale::create($validatedData);

        $productData = [];
        foreach ($products as $product) {
            $productData[$product['product_id']] = ['quantity' => $product['quantity']];
        }

        $sale->products()->attach($productData);

        return response()->json($sale->load('products'), 201);
    }


    public function show(string $id): JsonResponse
    {
        $sale = Sale::with("products")->find($id);

        if ($sale === null) {
            return response()->json(["message" => "Sale not found"], 404);
        }

        return response()->json($sale, 200);
    }

    public function update(SaleRequest $request, string $id): JsonResponse
    {
        $sale = Sale::find($id);

        if ($sale === null) {
            return response()->json(["message" => "Sale not found"], 404);
        }

        $request = $request->validated();

        $products = $request['products'];
        unset($request['products']);

        $sale->update($request);
        $sale->products()->sync($products);

        return response()->json($sale->with("product.name"), 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $sale = Sale::find($id);

        if ($sale === null) {
            return response()->json(["message" => "Sale not found"], 404);
        }

        $sale->delete();

        return response()->json(["message" => "Sale deleted"], 200);
    }
}
