<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;

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
    public function confirmOrder(Request $request)
    {

        $email = $request->input('guest_email');
        $name = $request->input('guest_name');
        $address = $request->input('guest_address');
        $phone = $request->input('guest_phone');
        $total = $request->input('orderedTotal');
        $cart = session()->get('cart', []);

        // Chuyển đổi giỏ hàng thành chuỗi JSON
        $orderedProducts = json_encode($cart);

        // Tạo đơn hàng mới
        $order = Order::create([
            'email' => $email,
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'total' => $total,
            'orderedProducts' => $orderedProducts,
        ]);

        // Các bước xử lý khác sau khi tạo đơn hàng thành công

        return redirect()->route('checkout.index')->with('success', 'Đặt hàng thành công!');
    }
}
