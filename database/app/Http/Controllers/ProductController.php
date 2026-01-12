<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1️⃣ Show all products
   public function index()
{
    $search = request('search');

    $products = Product::with('category')
        ->when($search, function ($q) use ($search) {
            $q->where('name', 'like', "%$search%");
        })
        ->paginate(5);

    return view('products.index', compact('products'));
}



    // 2️⃣ Show create form
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    // 3️⃣ Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully');
    }

    // 4️⃣ Show edit form
    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    // 5️⃣ Update product
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully');
    }

    // 6️⃣ Delete product
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully');
    }
public function restore($id)
{
    $product = Product::onlyTrashed()->find($id);

    if (!$product) {
        abort(404);
    }

    $product->restore();

    return redirect()->route('products.index');
}
}
