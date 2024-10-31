<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class LandingController extends Controller
{
    public function watermark(Category $category)
    {
        return view('pages.landing.watermark', compact('category'));
    }
}
