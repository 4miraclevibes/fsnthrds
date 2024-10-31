<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\VariantStock;
class VariantStockController extends Controller
{
    public function index(ProductVariant $productVariant)
    {
        return response()->json($productVariant->stocks);
    }

    public function edit(VariantStock $variantStock)
    {
        return response()->json($variantStock);
    }

    public function store(Request $request, ProductVariant $productVariant)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'item_price' => 'required|integer',
        ]);
        $data = $request->all();
        $data['product_variant_id'] = $productVariant->id;
        $variantStock = $productVariant->variantStock()->create($data);
        for($i = 0; $i < $variantStock->quantity; $i++) {
            $variantStock->stockDetails()->create([
                'variant_stock_id' => $variantStock->id,
                'capital_price' => $request->item_price,
                'selling_price' => null,
                'status' => 'ready',
            ]);
        }
        return response()->json($productVariant);
    }

    public function update(Request $request, VariantStock $variantStock)
    {
        $request->validate([
            'quantity' => 'required|integer',
        ]);
        $variantStock->update(['quantity' => $request->quantity]);
        return response()->json($variantStock);
    }

    public function destroy(VariantStock $variantStock)
    {
        $variantStock->delete();
        return response()->json($variantStock);
    }
}
