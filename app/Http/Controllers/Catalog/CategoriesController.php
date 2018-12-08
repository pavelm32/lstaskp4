<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        return view('admin.categories.index', $data);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        $name = $request->get('name');
        $description = $request->get('description');

        Category::create([
            'name' => $name,
            'description' => $description,
        ]);

        return redirect(route('categories.index'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['product' => $category]);
    }

    public function update(Category $category, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        $name = $request->get('name');
        $description = $request->get('description');

        $category->update([
            'name' => $name,
            'description' => $description,
        ]);

        return redirect(route('categories.index'));
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect(route('categories.index'));
    }
}
