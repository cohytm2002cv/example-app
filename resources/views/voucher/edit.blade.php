

    <h1>Edit Voucher</h1>

    <form action="{{ route('voucher.update', $voucher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $voucher->code }}" placeholder="Enter voucher code">
        </div>

        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="number" class="form-control" id="discount" name="discount" value="{{ $voucher->discount }}" placeholder="Enter discount percentage">
        </div>

        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ $voucher->expiry_date }}" placeholder="Enter expiry date">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $voucher->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    