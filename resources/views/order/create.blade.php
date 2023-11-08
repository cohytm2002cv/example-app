<form method="POST" action="{{ route('orders.store') }}">
    @csrf

    <label for="customer_name">Tên Khách hàng:</label>
    <input type="text" name="name">

    <label for="order_date">Ngày đặt hàng:</label>
    <input type="date" name="order_date">

    <!-- Thêm các trường thông tin khác tại đây -->

    <button type="submit">Tạo Order</button>
</form>
