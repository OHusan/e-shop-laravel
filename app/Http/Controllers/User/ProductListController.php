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

    public function getRouteInfo() {
        dd('test');
        return response()->json(\App\Helper\Cart::getCurrentRouteInfo());
    }
}
