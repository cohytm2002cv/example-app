<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Voucher</title>
</head>
<body>
    <h1>Create Voucher</h1>

    <form action="{{ route('voucher.store') }}" method="POST">
        @csrf

        <input type="text" name="code" placeholder="Code">
        <input type="number" name="discount" placeholder="Discount">
        <input type="date" name="start_date" placeholder="Start Date">
        <input type="date" name="end_date" placeholder="End Date">

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</body>
</html>