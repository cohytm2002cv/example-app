<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vouchers</title>
</head>
<body>
    <h1>Vouchers</h1>

    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Discount</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vouchers as $voucher)
            @csrf
                <tr>
                    <td>{{ $voucher->code }}</td>
                    <td>{{ $voucher->discount }}</td>
                    <td>{{ $voucher->start_date }}</td>
                    <td>{{ $voucher->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('voucher.create') }}" class="btn btn-primary">Create Voucher</a>
</body>
</html>