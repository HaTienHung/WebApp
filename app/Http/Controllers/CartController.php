<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productData = [
            'id' => $request->input('product_id'),
            'image' => $request->input('first_image'),
            'name' => $request->input('product_name'),
            'price' => $request->input('product_price'),
            'color' => $request->input('product_color'),
            'size' => $request->input('product_size'),
            'quantity' => $request->input('product_quantity'),
        ];


        // Lưu dữ liệu vào session
        $cart = session()->get('cart', []);
        $existingProduct = $this->findProductInCart($cart, $productData);

        if ($existingProduct !== null) {
            // Sản phẩm đã tồn tại trong giỏ hàng
            return redirect()->back()->with('error', 'Sản phẩm đã có trong giỏ hàng.');
        }
        $cart[] = $productData;
        session(['cart' => $cart]);

        $productData['slug'] =  str_replace(' ', '-', $productData['name']);


        return redirect()->route('product.show', ['processedName' => $productData['slug']])->with('success', 'Thêm vào giỏ hàng thành công');
    }
    public function removeFromCart($productId, $productSize = null, $productColor = null)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Xử lý giá trị mặc định
        $productColor = $productColor ?? 'defaultColor';
        $productSize = $productSize ?? 'defaultSize';

        foreach ($cart as $key => $item) {
            // Kiểm tra xem sản phẩm có trùng ID và có kích thước hoặc màu sắc đã chỉ định không
            if (
                $item['id'] == $productId &&
                (
                    ($productSize === null || $item['size'] == $productSize) ||
                    ($productColor === null || $item['color'] == $productColor)
                )
            ) {
                // Nếu trùng, xoá sản phẩm khỏi giỏ hàng
                unset($cart[$key]);
                break; // Break để thoát vòng lặp khi sản phẩm đã được xoá
            }
        }

        // Sắp xếp lại các key của mảng để đảm bảo chúng là các số nguyên tuần tự
        $cart = array_values($cart);


        // Lưu lại giỏ hàng mới vào session
        session(['cart' => $cart]);

        // Chuyển hướng về trang giỏ hàng hoặc trang khác tùy ý
        return Redirect::route('cart.show')->with('success', 'Sản phẩm đã được xoá khỏi giỏ hàng');
    }
    public function updateQuantity(Request $request, $productId)
    {
        $newQuantity = $request->input('product_quantity');

        // Lấy giỏ hàng từ Session
        $cart = session()->get('cart', []);

        // Tìm sản phẩm trong giỏ hàng và cập nhật số lượng
        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] = $newQuantity;
            }
        }

        // Lưu lại giỏ hàng vào Session
        session(['cart' => $cart]);

        // Cập nhật giỏ hàng thành công
        return redirect()->route('cart.index')->with('success', 'Cập nhật giỏ hàng thành công.');
    }
    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', ['cart' => $cart]);
    }

    private function findProductInCart($cart, $productData)
    {
        foreach ($cart as $existingProduct) {
            // Kiểm tra các thuộc tính của sản phẩm để xác định sự trùng lặp
            if (
                $existingProduct['id'] == $productData['id']
                && $existingProduct['color'] == $productData['color']
                && $existingProduct['size'] == $productData['size']
            ) {
                return $existingProduct;
            }
        }
        return null;
    }
}
