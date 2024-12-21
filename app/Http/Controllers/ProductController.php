<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Jobs\ProductCreateJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::latest()->simplePaginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Summary of show
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }


    /**
     * Summary of create
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        Gate::authorize('create', Product::class);
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    // store
    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'stock' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('productImages', 'public');
            $fields['image'] = $path;
            $fields['user_id'] = Auth::id();
        }
        $fields['user_id'] = Auth::id();

        $product = Product::create($fields);
        $user = Auth::user();

        ProductCreateJob::dispatch($user,$product);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Summary of edit
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        Gate::authorize('update', $product);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }


    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $fields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'stock' => 'required',
        ]);


        if ($request->hasFile('image')) {
            if (file_exists(public_path('/storage/' . $product->image))) {
                unlink(public_path('/storage/' . $product->image));
            }
            $path = $request->file('image')->store('productImages', 'public');
            $fields['image'] = $path;
            $fields['user_id'] = Auth::id();
        } else {
            $fields['image'] = $product->image;
            $fields['user_id'] = Auth::id();
        }

        $product->update($fields);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }


    /**
     * Summary of destroy
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete', $product);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
