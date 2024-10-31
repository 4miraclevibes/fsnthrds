<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('product-images', 'public');

        ProductImage::create([
            'product_id' => $request->product_id,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Gambar produk berhasil ditambahkan.');
    }
}
