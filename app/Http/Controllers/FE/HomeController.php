<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;

class HomeController extends Controller
{
    public function index()
    {
        $prods = Product::all();
        return view('fe.index', compact('prods'));
    }

    public function productDetails($slug) 
    {
        // hàm first() được dùng để lấy về record đầu tiến
        $prod = Product::where('slug', '=', $slug)->first();
        return view('fe.product_details', compact('prod'));
    }

    public function addCart(Request $request)
    {
        try {
            $pid = $request->pid;
            $quantity = $request->quantity;

            $cart = [];
            if ($request->session()->has('cart')) {
                $cart = $request->session()->get('cart');
            }

            // tìm product theo id
            $prod = Product::find($pid);
            // tạo đối tượng CartItem
            $cartItem = new CartItem($prod, $quantity);
            // fixed using associative array
            $cart[$pid] = $cartItem;    // add to array, 
            $request->session()->put('cart', $cart);
            return 1;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function clearCart(Request $request)
    {
        if ($request->session()->has('cart')) {
            $request->session()->forget('cart');
        }
    }

    public function viewCart(Request $request)
    {
        return view('fe.view_cart');
        // if ($request->session()->has('cart')) {
        //     return $request->session()->get('cart');
        // }
    }

    public function updateCart(Request $request)
    {
        $pids = $request->pids;
        $qties = $request->qties;
        $cart = $request->session()->get('cart');
        for ($i = 0; $i < count($pids); $i++) {
            $cart[$pids[$i]]->quantity = $qties[$i];
        }
        $request->session()->put('cart', $cart);    // lưu thay đổi
    }

    public function checkout()
    {
        return view('fe.checkout');
    }

    public function removeCartItem(Request $request) 
    {
        $pid = $request->pid;
        $cart = $request->session()->get('cart');
        unset($cart[$pid]);
        $request->session()->put('cart', $cart);
    }

    public function saveCart(Request $request)
    {
        $uid = $request->uid;
        
        // tạo order
        $ord = new Order();
        $ord->user_id = $uid;
        $ord->order_date = date('Y-m-y', time());
        $ord->save();

        // xử lý order details
        $cart = $request->session()->get('cart');
        $details = [];
        foreach($cart as $item) {
            $detail = new OrderDetail();
            $detail->product_id = $item->product->id;
            $detail->quantity = $item->quantity;
            $detail->price = $item->product->price;
            $details[] = $detail;
        }

        $ord->orderDetails()->saveMany($details);

        $request->session()->forget('cart');
        return redirect()->route('home');
    }
}
