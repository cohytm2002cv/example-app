<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Voucher;
use App\Models\BranchProduct;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{

    public function addToCart(Request $request, $productId)
{


    $product = product::find($productId);
    $name=$product->Pname;
    $branchid=$request->input('branch_id');


    $cart = $request->session()->get('cart', []);

    $branch=$request->input('branch_id');

    if (array_key_exists($productId, $cart)) {
        // Tăng số lượng sản phẩm nếu sản phẩm đã có trong giỏ hàng
        $cart[$productId]['quantity']++;
    } else {
        // Thêm sản phẩm vào giỏ hàng
        $cart[$productId] = [
            'product' => $product,
            'name'=>$product->Pname,
            'price'=>$product->price,
            'product_id'=>$product->id,
            'quantity' => 1,
            'branch'=>$branchid

        ];
    }
    $request->session()->put('cart', $cart); // Lưu giỏ hàng vào session

    return redirect()->route('cart'); // Chuyển hướng đến trang giỏ hàng
}


public function showCart(Request $request)
{
    $branch_id=$request->input("branch_id");
    session_start(); // Bắt đầu phiên session
    $total = $this->calculateTotal();
    $vnd = $this->calculateTotal2();
    $voucher = Voucher::all();
    $cart = $request->session()->get('cart', []);
    $discount=$this->checkVoucher($request);
    return view('cart.cart', ['cart' => $cart,
        'total'=>$total ,
        'vnd'=>$vnd,
        'discount'=>$discount,
        'voucher'=>$voucher
    ]);
}

public function checkVoucher(Request $request)
    {
        // Lấy mã voucher từ request
        $code = $request->input("code");
         $discount = 0;
        // Truy vấn database để kiểm tra voucher
        $voucher = voucher::where("code", $code)->first();

        if ($voucher) {
            $discount = $voucher->discount;
            $voucher->sl--;
            $voucher->save();
            return $discount;
        }
            else {
            return null;
        }
    }



public function getCartCount()
{
    $cart = session('cart', []);
    $count = count($cart);
    return response()->json($count);
}
public function removeItemFromCart($productId)
{
    // Lấy giỏ hàng từ session
    $cart = session('cart', []);

    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
    if (array_key_exists($productId, $cart)) {
        // Xóa sản phẩm khỏi giỏ hàng
        unset($cart[$productId]);

        // Cập nhật giỏ hàng trong session
        session(['cart' => $cart]);

        // Thông báo rằng sản phẩm đã bị xóa thành công
        return redirect()->route('cart')->with('message', 'Sản phẩm đã bị xóa khỏi giỏ hàng.');
    }

    // Nếu sản phẩm không tồn tại trong giỏ hàng, bạn có thể xử lý thông báo hoặc chuyển hướng người dùng tới trang khác.
}
public function increaseQuantity($productId)
{
    $cart = session('cart', []);

    $branch = BranchProduct::where('product_id', $productId)->where('branch_id',$cart[$productId]['branch'])->first();
    $product = product::find($productId);

    if (array_key_exists($productId, $cart)) {
        if($branch->qty> $cart[$productId]['quantity']){
        $cart[$productId]['quantity']++; // Tăng số lượng
        session(['cart' => $cart]);
        return redirect()->route('cart')->with('message', 'Số lượng đã được tăng.');
        }
        else{
            return redirect()->route('cart')->with('error', 'Số lượng không đủ.');
        }
    } else {
        return redirect()->route('cart')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
    }
}
public function decreaseQuantity($productId)
{
    $cart = session('cart', []);

    if (array_key_exists($productId, $cart)) {
        if ($cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--; // Giảm số lượng
            session(['cart' => $cart]);
            return redirect()->route('cart')->with('message', 'Số lượng đã được giảm.');
        } else {
            return redirect()->route('cart')->with('error', 'Không thể giảm số lượng dưới 1.');
        }
    } else {
        return redirect()->route('cart')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
    }
}
public function updateQuantity($productId, $newQuantity)
{
    $cart = session('cart', []);

    if (array_key_exists($productId, $cart)) {
        if ($newQuantity > 0) {
            $cart[$productId]['quantity'] = $newQuantity; // Cập nhật số lượng
            session(['cart' => $cart]);
            $this->updateTotal(); // Gọi phương thức để cập nhật tổng hóa đơn
            return redirect()->route('cart')->with('message', 'Số lượng đã được cập nhật.');
        } else {
            return redirect()->route('cart')->with('error', 'Số lượng phải lớn hơn 0.');
        }
    } else {
        return redirect()->route('cart')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
    }
    $this-> calculateTotal();


}

private function calculateTotal()
{
    $cart = session('cart', []);
    $total = 0;
    $usd=0.000043;
    foreach ($cart as $item) {
        $total += $item['quantity'] * $item['product']->price;
    }
    $total = ($total * $usd);

    return $total;
}private function calculateTotal2()
{
    $cart = session('cart', []);
    $vnd = 0;
    foreach ($cart as $item) {
        $vnd += $item['quantity'] * $item['product']->price;
    }

    return $vnd;
}


public function checkout(Request $request)
    {

    $order = new Orders();
    $order->User_id = session('user_id');
    $order->name = $request->input('user_fullname');
    $order->Phone = $request->input('user_phone');
    $order->address = $request->input('user_address');

    $status = $request->input('dathang');
    if($status==0)
    $order->status_payment=0;
    else
        $order->status_payment=1;
    $order->status_order = 1;
    $order->amount= $request->input('total');
    $order->status_delivery=0;
    $order->save();

    $cart = session('cart');
    foreach ($cart as $item) {

    $orderDetail = new OrderDetails();
    $orderDetail->Order_id = $order->id; // ID của đơn hàng đã tạo
    $orderDetail->Product_id = $item['product_id'];
    $orderDetail->quantity = $item['quantity'];
    $orderDetail->price = $item['price'];
    $orderDetail->Product_name = $item['name'];
    $product = Product::find($item['product_id']);
    $branchproduct = BranchProduct::where('product_id', $item['product_id'])
                                    ->first();
    $product->sold_quantity += $item['quantity'];
    $branchproduct->qty -= $item['quantity'];
    $branchproduct->save();
    $product->save();
    $orderDetail->save();
    }
        $request->session()->forget('cart');

        return redirect()->route('trangchu');

    }
}
