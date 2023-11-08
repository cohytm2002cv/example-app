<?php

namespace App\Http\Controllers;
use App\Models\OrderDetails;
use App\Models\Orders;


use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function store(Request $request)
{
    $orderDetail = new OrderDetails;
    $orderDetail->product_name = $request->input('product_name');
    $orderDetail->quantity = $request->input('quantity');
    // Thêm các trường thông tin khác tại đây

    // Liên kết với order
    $order = Orders::find($request->input('order_id'));
    $order->orderDetails()->save($orderDetail);

    return redirect()->route('orderdetails.create')->with('success', 'Đã tạo mới orderdetail thành công.');
}

}
