function addCart(productId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/cart/add/'+productId,
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            if (response.success) {
                alert('Item added to cart successfully!');
            } else {
                alert('Failed to add item to cart.');
            }
        },
        error: function() {
            alert('An error occurred while adding item to cart.');
        }
    });
}
