<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'brand', 'product_images')->get();
        $brands = Brand::get();
        $categories = Category::get();

        return Inertia::render(
            'Admin/Product/Index',
            [
                'products' => $products,
                'brands' => $brands,
                'categories' => $categories
            ]
        );
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        //check if product has images upload

        if ($request->hasFile('product_images')) {

            $productImage = $request->file('product_images');
            $uniqueName = time() . '-' . Str::random(10) . '.' . $productImage->getClientOriginalExtension();

            $productImage->move('product_images', $uniqueName);

            ProductImage::create([
                'product_id' => $product->id,
                'image' => 'product_images/' . $uniqueName,
            ]);

        }
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if ($request->hasFile('product_images')) {

            $productImage = $request->file('product_images');
            $uniqueName = time() . '-' . Str::random(10) . '.' . $productImage->getClientOriginalExtension();

            $productImage->move('product_images', $uniqueName);

            ProductImage::create([
                'product_id' => $product->id,
                'image' => 'product_images/' . $uniqueName,
            ]);

        }

        $product->update();
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');

    }
}
