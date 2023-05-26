<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prods = Product::all();
        return view('admin.product.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cates = Category::all();
        return view('admin.product.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prod = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                $error = 1;
                return view('admin.product.create', compact(error));
            }
            $imageFilename = $file->getClientOriginalName();
            $file->move('images', $imageFilename);
        } else {
            $imageFilename = null;
        }

        // thêm 1 phần tử mới vào mảng $prod
        $prod['image'] = $imageFilename;
        $prod['slug'] = \Str::slug($request->name);
        //dd($prod);
        Product::create($prod);
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $cates = Category::all();
        return view('admin.product.edit', compact(
            'cates', 
            'product'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $prod = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                $error = 1;
                return view('admin.product.create', compact(error));
            }
            $imageFilename = $file->getClientOriginalName();
            $file->move('images', $imageFilename);
        } else {
            $imageFilename = $product->image;
        }

        // thêm 1 phần tử mới vào mảng $prod
        $prod['image'] = $imageFilename;
        $prod['slug'] = \Str::slug($request->name);
        //dd($prod);
        $product->update($prod);
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
