
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
<h1>HOÁ ĐƠN</h1>
<p><strong>Tên Khách Hàng:</strong> {{ $customer_name }}</p>
<p><strong>Ngày mua hàng:</strong> {{ $date }}</p>

<h2>Danh sách sản phẩm</h2>
<table>
    <thead>
    <tr>
        <th>Tên sản phẩm</th>
        <th>số lượng</th>
        <th>giá</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($list as $product)
        <tr>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['quantity'] }}</td>
            <td>{{ $product['quantity'] * $product['price'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<p><strong>Tổng Hoá Đơn:</strong> {{ $amount }}</p>
</body>
</html>
