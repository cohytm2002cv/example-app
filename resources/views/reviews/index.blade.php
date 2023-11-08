<div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h2>Reviews</h2>
        @if ($reviews->count())
            <table class="table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>User ID</th>
                        <th>Rating</th>
                        <th>Comments</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->product_id }}</td>
                            <td>{{ $review->user_id }}</td>
                            <td>{{ $review->rating }}</td>
                            <td>{{ $review->comments }}</td>
                            <td>
                                <form action="{{ route('Review.destroy', $review->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No reviews found.</p>
        @endif
    </div>