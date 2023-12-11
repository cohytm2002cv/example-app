<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(){
        $order = Orders::with('OrderDetails')->find(19);
        return view('order.order',['order'=>$order]);
        // dd($order);
    }
    public function store(Request $request)
    {
        // Tạo mới "order"
        $order = new Orders;
        $order->name = $request->input('name');
        $order->User_id = 12;
        $order->Voucher_id = 1;
        $order->save();

        // Lặp qua sản phẩm từ session cart và tạo "orderdetail" cho mỗi sản phẩm
        $cartItems = session('cart'); // Lấy thông tin sản phẩm từ session
        foreach ($cartItems as $cartItem) {

            $cartQuantity=$cartItem['quantity'];

            $product=product::find($cartItem['product_id']);
            $product->qty -= $cartQuantity;
            dd($product->qty);
            $product->save();

            $orderDetail = new OrderDetails;
            $orderDetail->product_name = $cartItem['name'];
            $orderDetail->quantity = $cartItem['quantity'];
            $orderDetail->price=$cartItem['price'];

            // Thêm các trường thông tin khác tại đây
            $order->orderDetails()->save($orderDetail);
        }

        // Xóa thông tin sản phẩm từ session cart sau khi đã tạo hóa đơn
        session()->forget('cart');

        return redirect()->route('orders.create')->with('success', 'Hóa đơn đã được tạo thành công.');
    }

        public function create()
    {
        return view('order.create');
    }

    public function cancel($id){
        $product = Orders::find($id)
        ->where('id', $id)
        ->update(['status_order' => 0]);
        return back();
        return redirect('admin');
    }
    public function delivery($id){
        $product = Orders::find($id)
        ->where('id', $id)
        ->update(['status_delivery' => 0]);
        // return redirect('admin');
        return back();
    }
    public function delivering($id){
        $product = Orders::find($id)
        ->where('id', $id)
        ->update(['status_delivery' => 1]);
        return back();
        return redirect('admin');
    }
    public function delivered($id) {
        // Tìm đơn hàng dựa trên ID
        $order = Orders::find($id);

        // Kiểm tra nếu đơn hàng tồn tại
        if (!$order) {
            return redirect('admin')->with('error', 'Không tìm thấy đơn hàng');
        }

        // Cập nhật trạng thái giao hàng thành "Đã giao" (2)
        $order->status_delivery = 2;
        $order->save();

        // Kiểm tra nếu trạng thái giao hàng là "Đã giao" (2) và trạng thái thanh toán là "Đã thanh toán" (1)
        if ($order->status_delivery == 2 && $order->status_payment == 1) {
            // Cập nhật trạng thái đơn hàng thành "Đã giao" (2)
            $order->status_order = 2;
            $order->save();
        }
        return back();
        return redirect('admin')->with('success', 'Trạng thái đơn hàng đã được cập nhật');
    }
    public function pay($id){
        $product = Orders::find($id)
        ->where('id', $id)
        ->update(['status_payment' => 1]);
        return back();
    }
    public function confirm($id){
        $product = Orders::find($id)
        ->where('id', $id)
        ->update(['status_order' => 1]);
        return back();
        return redirect('admin');
    }
    public function search(Request $request)
    {
        $fromDate = $request->input('from-date');
        $toDate = $request->input('to-date');
        if($fromDate && $toDate) {
            $orders = Orders::whereBetween('created_at', [$fromDate, $toDate])->get();

        }
        else{
            $orders = Orders::all();

        }
        return view('account.account', compact('orders'));
    }

    public function status(Request $request)
    {
        $status = $request->input('status');

        if ($status === 'canceled') {
            $orders = Orders::where('status_order', 0)->where('User_id',session('user_id'))->get(); // Assuming status = 1 means cancelled
        } elseif ($status === 'completed') {
            $orders = Orders::where('status_order', 2)
                ->where('User_id',session('user_id'))
                ->get(); // Assuming status = 1 means cancelled
        }
        elseif ($status === 'delivery') {
            $orders = Orders::where('status_order', 1)
                ->where('User_id',session('user_id'))
                ->get(); // Assuming status = 1 means cancelled
        }

        else {
            // Handle other cases or set default behavior
            $orders = Orders::all();
        }
        return view('account.account', compact('orders'));
    }


}
