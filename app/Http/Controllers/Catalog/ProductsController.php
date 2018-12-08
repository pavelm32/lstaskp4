<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $data['products'] = Product::with('category')->get();
        return view('admin.products.index', $data);
    }

    public function create()
    {
        $data['category_list'] = Category::all();
        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $name = $request->get('name');
        $category = $request->get('category_id');
        $description = $request->get('description');
        $price = $request->get('price');
        //dd($request->file('picture'));
        $path = $request->file('picture')->store(
            'products_pic',
            'public'
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

    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product, 'category_list' => Category::all()]);
    }

    public function update(Product $product, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $name = $request->get('name');
        $category = $request->get('category_id');
        $description = $request->get('description');
        $price = $request->get('price');

        $fields = [
            'name' => $name,
            'category_id' => $category,
            'price' => $price,
            'description' => $description,
        ];

        if ($request->hasFile('picture')) {
            //\Storage::disk('public')->delete($product->picture);
            $fields['picture'] = $request->file('picture')->store(
                'products_pic',
                'public'
            );
        }

        $product->update($fields);

        return redirect(route('products.index'));
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
