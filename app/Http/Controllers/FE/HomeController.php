<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $prods = Product::all();
        return view('fe.index', compact('prods'));
    }

    public function productDetails($slug) 
    {
        // hàm first() được dùng để lấy về record đầu tiến
        $prod = Product::where('slug', '=', $slug)->first();
        return view('fe.product_details', compact('prod'));
    }
}
