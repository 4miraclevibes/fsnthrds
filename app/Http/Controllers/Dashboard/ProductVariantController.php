<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
class ProductVariantController extends Controller
{
    public function index(Product $product)
    {
        return response()->json($product->variants);
    }

    public function edit(ProductVariant $productVariant)
    {
        return response()->json($productVariant);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $data['product_id'] = $product->id;
        $product->variants()->create($data);
        return response()->json($product);
    }

    public function update(Request $request, ProductVariant $productVariant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $productVariant->update($data);
        return response()->json($productVariant);
    }

    public function destroy(ProductVariant $productVariant)
    {
        $productVariant->delete();
        return response()->json($productVariant);
    }
}
