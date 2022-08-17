$(document).ready(function(){

        $('.addToCart').click(function(e){
            e.preventDefault();
           var product_id = $(this).closest('.product_data').find('.prod_id').val();
           var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
           $.ajax({
			type: "POST",
			url: "/add_to_cart",
			data:{
				'product_id' : product_id,
				'product_qty' : product_qty,
			},
			success: function(data) {
				alert(data.status);
				}
			});
        });

        $('.increment-btn').click(function(e){
            e.preventDefault();
            //var inc_value = $('.qty-input').val();
            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                // $('.qty-input').val(value);
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function(e){
            e.preventDefault();
            // var dec_value = $('.qty-input').val();
            var dec_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                // $('.qty-input').val(value);
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.delete_cart_item').click(function(e){
            e.preventDefault();

            
             $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
             var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            $.ajax({
                type: "POST",
                url: "/delete_cart_item",
                data: {
                    'prod_id': prod_id,
                },
                success: function(data){
                    window.location.reload();
                    swal("", data.status, "success");
                }
            });
        });

        $('.changeQuantity').click(function(e){
            e.preventDefault();

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();

            $.ajax({
                type: "POST",
                url: "/update_cart",
                data: {
                    'prod_id': prod_id,
                    'prod_qty': qty,
                },
                success: function(data){
                    window.location.reload();
                }

            });
        });

    });