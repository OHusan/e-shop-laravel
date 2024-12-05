<?php

namespace App\Http\Controllers\User;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Mail\CartMail;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class CartController extends Controller
{
    public function view(Request $request, Product $product)
    {
        $user = request()->user();
        if ($user) {
            $cartItems = CartItem::where('user_id', $user->id)->get();
            $userAddress = UserAddress::where('user_id', $user->id)->where('isMain', 1)->first();
            $order = Order::with('user_address')->where('user_address_id', $userAddress->id)->get();

            if ($cartItems->count() > 0) {
                return Inertia::render('User/CartList', [
                    'cartItems' => $cartItems,
                    'userAddress' => $userAddress,
                    'order' => $order
                ]);
            } else {
                $cartItems = Cart::getCookieCartItems();
                if (count($cartItems) >= 0) {
                    $cartItems = new CartResource(Cart::getProductsAndCartItems());
                    return Inertia::render('User/CartList', ['cartItems' => $cartItems, 'order' => $order]);
                } else {
                    return redirect()->back();
                }
            }
        }

    }
    public function store(Request $request, Product $product)
    {
        $quantity = $request->post('quantity', 1);
        $user = $request->user();

        if ($user) {
            $cartItem = CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->first();
            if ($cartItem) {
                $cartItem->increment('quantity');
            } else {
                CartItem::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'quantity' => 1,
                ]);
            }
        } else {
            $cartItems = Cart::getCookieCartItems();
            $isProductExists = false;
            foreach ($cartItems as $item) {
                if ($item['product_id'] === $product->id) {
                    $item['quantity'] += $quantity;
                    $isProductExists = true;
                    break;
                }
            }

            if (!$isProductExists) {
                $cartItems[] = [
                    'user_id' => null,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ];
            }
            Cart::setCookieCartItems($cartItems);
        }

        return redirect()->back()->with('success', 'cart added successfully');
    }
    public function update(Request $request, Product $product)
    {
        $quantity = $request->integer('quantity');
        $user = $request->user();
        if ($user) {
            CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->update(['quantity' => $quantity]);
        } else {
            $cartItems = Cart::getCookieCartItems();
            foreach ($cartItems as &$item) {
                if ($item['product_id'] === $product->id) {
                    $item['quantity'] += $quantity;
                    break;
                }
            }
            Cart::setCookieCartItems($cartItems);
        }

        return redirect()->back();
    }
    public function delete(Request $request, Product $product)
    {
        $user = $request->user();
        if ($user) {
            CartItem::query()->where(['user_id' => $user->id, 'product_id' => $product->id])->first()?->delete();
            if (CartItem::count() <= 0) {
                return redirect()->route('home')->with('info', 'your cart is empty');
            } else {
                return redirect()->back()->with('success', 'item removed successfully');
            }
        } else {
            $cartItems = Cart::getCookieCartItems();
            foreach ($cartItems as $i => &$item) {
                if ($item['product_id'] === $product->id) {
                    array_splice($cartItems, $i, 1);
                    break;
                }
            }
            Cart::setCookieCartItems($cartItems);
            if (count($cartItems) <= 0) {
                return redirect()->route('home')->with('info', 'your cart is empty');
            } else {
                return redirect()->back()->with('success', 'item removed successfully');
            }
        }
    }

    public function cartMail(Request $request)
    {
        $name = $request->name;
        $total = $request->total;
        $cart = json_decode($request->input('cart'));
        $address = UserAddress::with('user')->where('user_id', Auth::user()->id)->first();

        $products = [];

        foreach ($cart as $i => &$item) {
            $arr = Product::where('id', $item->product_id)->get();

            if ($arr->isNotEmpty()) {
                $products[] = $arr->first();
            }
        }

        if (count($cart) >= 1) {
            $order = Order::create([
                'total_price' => $total,
                'status' => 'pending',
                'session_id' => '1',
                'user_address_id' => $address->id,
                'created_by' => $name
            ]);

            foreach($products as $product){
                $productId = $product->id;

                $filteredItem = array_filter($cart, function($item) use ($productId) {
                    return $item->product_id == $productId;
                });
                $quantity = !empty($filteredItem) ? reset($filteredItem)->quantity : null;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => 'USD'
                ]);
            }

            CartItem::where('user_id', Auth::user()->id)->truncate();
        }

        Mail::to('test@test.com')->send(new CartMail($name, $cart, $products, $total, $address));
    }
}
