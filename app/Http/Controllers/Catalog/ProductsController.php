<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all();
        return view('admin.products.index', $data);
    }

    public function create()
    {
        $data['category_list'] = Category::all();
        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $category = $request->get('category_id');
        $description = $request->get('description');
        $price = $request->get('price');
        //dd($request->file('picture'));
        $path = $request->file('picture')->store(
            'products_pic/',
            'local'
        );

        Product::create([
            'name' => $name,
            'category_id' => $category,
            'price' => $price,
            'description' => $description,
            'picture' => $path,
        ]);

        return redirect(route('products.index'));
    }

}
