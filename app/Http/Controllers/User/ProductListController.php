<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Response;

class ProductListController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'brand', 'product_images');
        $filterProducts = $products->filter()->paginate(9)->withQueryString();

        $categories = Category::get();
        $brands = Brand::get();

        return Inertia::render(
            'User/ProductList',
            [
                'categories' => $categories,
                'brands' => $brands,
                'products' => ProductResource::collection($filterProducts)
            ]
        );
    }

    public function filter(Request $request)
    {
        $title = $request->get('title', []);
        $query = Product::where('title', 'LIKE', '%' . $title . '%')->get();

        return response()->json($query);
    }

    public function detail(Product $product)
    {
        $productRender = Product::with('category', 'product_images')->find($product->id);
        $similarProducts = Product::with('category', 'product_images')
            ->where('category_id',  $productRender->category_id)
            ->where('id', '!=', $productRender->id)
            ->take(4)
            ->get();

        return Inertia::render('User/ProductDetail', [
            'product' => $productRender,
            'similarProducts' => $similarProducts
        ]);
    }
}
