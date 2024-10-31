<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('pages.dashboard.products.index', compact('products', 'categories'));
    }

    public function edit(Product $product)
    {
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'required|url',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);
        $product = Product::create($data);
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'required|url',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        $product->update($data);
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json($product);
    }
}
