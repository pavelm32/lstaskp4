<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        return view('catalog.index', [
            'categories' => Category::all(),
            'products' => Product::all(),
        ]);
    }

    public function category(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();
        return view('catalog.category', ['category' => $category, 'products' => $products]);
    }

    public function product(Product $product, Request $request)
    {
        return view('catalog.product', [
            'product' => $product,
            'order' => $request->get('order'),
            'status' => $request->get('status')
        ]);
    }

    public function checkout(Product $product, Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $order = Order::create([
            'product_id' => $product->id,
            'email' => $email,
            'user_name' => $name,
        ]);

        if (!$order->count()) {
            return redirect(route('catalog.product', [$product->id]) . '?order=&status=fail');
        }

        \Mail::send('emails.order', ['product' => $product, 'order' => $order], function ($message) use ($order) {
            $message->from('test@test.ru');

            $message->to('test@test.ru')->subject('Новый заказ! №' . $order->id);
        });

        return redirect(route('catalog.product', [$product->id]) . '?order=' . $order->id . '&status=success');
    }
}
