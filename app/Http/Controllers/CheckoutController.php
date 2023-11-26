<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Lấy giỏ hàng từ Session
        $cart = session()->get('cart', []);

        // Tính tổng tiền
        $total = 0;

        foreach ($cart as $item) {
            $price = floatval(str_replace(['.', ','], ['', '.'], $item['price']));
            $quantity = intval(str_replace(['.', ','], ['', '.'], $item['quantity']));

            if (is_numeric($price) && is_numeric($quantity)) {
                $total += $price * $quantity;
            }
        }

        // Truyền dữ liệu giỏ hàng và tổng tiền vào view
        return view('checkout', ['cart' => $cart, 'total' => $total]);
    }
}
