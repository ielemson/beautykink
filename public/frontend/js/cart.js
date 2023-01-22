(function ($) {

    "use strict";
    miniCart()
// Mini Cart Details
    function miniCart() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "/my-cart",
            success: function (response) {
                console.log(response)
                var miniCart = ""
                $.each(response.carts, function (key, cart) {
                    miniCart += `
                <li class="product-list-item">
                <a href="/product/${cart.options.slug}">
                <img src="/${cart.options.image}" alt="${cart.name}">
                <span class="product-title">${cart.name}</span>
                <span class="product-quantity">${cart.qty}x</span>
                </a>
                <span class="product-price">${'&#8358;' + cart.price}</span>
                <a class="product-close remove_from_cart" href="#" id="${cart.rowId}" data-id="${cart.rowId}"><i class="la la-close"></i></a>
                </li>
                `;
                });

                $('.sub_total').html('&#8358;' + response.cart_total.toLocaleString("en-US"));
                $('.cart_total').html('&#8358;' + response.cart_total.toLocaleString("en-US"));
                $('.cart-count').html(response.cart_qty);
                // $('.wishlist_count').html(response.wishlist);
                $('.compare_count').html(response.compare);
                $('.popup-product-list').html(miniCart);

                if(response.sub_total == 0){
                    $('.checkout').css('display','none')
                }else{
                    $('.checkout').css('display','block')

                }
            }
        })
    }

    
    
// Add to cart starts here
$('body').on('click', '.add_to_cart', function () {
    var id = $(this).attr("data-id");
    var qty = 1;
    // alert("The data-id of clicked item is: " + dataId);
    $.get('/cart/add' + '/' + id + '/' + qty, function (data) {
        // console.log(data)
        miniCart()
        // start message
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            // icon: 'success',
            showConfirmButton: false,
            timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                icon: 'success',
                title: data.success,
            })
        } else {
            Toast.fire({
                icon: 'error',
                title: data.error,
            })
        }
        // end message
    })
});
// Add to cart ends here

// No attribute alert
    $('body').on('click', '.add_to_cart_without_attribute', function () {
        var slug = $(this).attr("data-slug");
        // console.log(slug)
            // start message
            // const Toast = Swal.mixin({
            //     toast: true,
            //     position: 'top-end',
            //     // icon: 'success',
            //     showConfirmButton: false,
            //     timer: 3000
            // })
            
            // Toast.fire({
            //     icon: 'error',
            //     title: 'select product attribute first',
            // })
            setTimeout(() => {
                location.href="/product/"+slug
            }, 3000);
            // end message
      
    });
// No attribute alert


//Add to wish list starts here ::::::::::::::::::::::::  
    $('body').on('click', '.add-wishlist', function () {
        var id = $(this).attr("data-id");
        // var qty = 1;
        // alert(id)
        // alert("The data-id of clicked item is: " + dataId);
        $.get('/user/wishlist/store' + '/' + id, function (data) {
            // console.log(data)
            // miniCart()
            // start message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                // icon: 'success',
                showConfirmButton: false,
                timer: 3000
            })
            if (data.status == 0) {
                
                Toast.fire({
                            icon: 'error',
                            title: 'Kindly Login First!',
                        })
                    
                        setTimeout(() => {
                            location.href = `${data.link}`
                        }, 3500);
            }else{
                   Toast.fire({
                    icon: 'success',
                    title: data.message,
                })
                $('.wishlist_count').html(data.count)
            }
            // if ($.isEmptyObject(data.error)) {
            //  
            // } else {
            //     Toast.fire({
            //         icon: 'error',
            //         title: data.error,
            //     })
            // }
            // end message
        })
    });  
//Add to wish list ends here   :::::::::::::::::::::::: 


//Add to compare list starts here ::::::::::::::::::::::::  
    $('body').on('click', '.add-compare', function () {
        var id = $(this).attr("data-id");
        var qty = 1;
        // alert(id)
        // alert("The data-id of clicked item is: " + dataId);
        $.get('/add/compare' + '/' + id + '/' + qty, function (data) {
            miniCart()
            // start message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                // icon: 'success',
                showConfirmButton: false,
                timer: 3000
            })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    icon: 'success',
                    title: data.success,
                })
            } else {
                Toast.fire({
                    icon: 'error',
                    title: data.error,
                })
            }
            // end message
        })
    });  
//Add to compare list ends here   :::::::::::::::::::::::: 

// Remove from compare ::::::::::::::::::::::::::
$('body').on('click', '.remove_from_compare', function () {
    var rowId = $(this).attr("data-id");
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/compare/remove/' + rowId,
        success: function (data) {
            // console.log(data)
            // miniCart();
            //start message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                // icon: 'success',
                showConfirmButton: false,
                timer: 3000
            })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    icon: 'success',
                    title: data.success,
                })
                location.reload()
            } else {
                Toast.fire({
                    icon: 'error',
                    title: data.error,
                })
            }
            //end message
        }
    });
    
});
// Remove from compare ::::::::::::::::::::::::::
// Remove Cart starts here :::::::::::::::::::::::::::::
    $('body').on('click', '.remove_from_cart', function () {
        var rowId = $(this).attr("data-id");
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/my-cart/remove/' + rowId,
            success: function (data) {
                miniCart();
                //start message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    // icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                    })
                    // Reload Page
                 location.reload()
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                    })
                }
                //end message
            }
        });
        
    });

    // Remove Cart ends here   :::::::::::::::::::::::::::::

    
    // Cart page remove clear cart starts here ::::::::::::::::::::::::
    $('body').on('click', '.remove-cart', function() {
        var rowId = $(this).attr("data-cart-id");
        
        $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/my-cart/remove/' + rowId,
                success: function(data) {
                    miniCart();
                    //start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        // icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success,
                        })
                        location.reload()
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    //end message
                }
            });

        });
    // Cart page remove clear cart ends here::::::::::::::::::::::::

    $('body').on('click', '.top-close', function () {
        $('.header-top-advert').slideToggle()

    });
    // Add to cart ends here
    // mini cart remove start


    // Shopping Cart Page ::::::::::::::::::::::::::::::::::::::::::::::::

        $('.qty-btn-click').on('click', function (e) {
            e.preventDefault();
            var $buttonQty = $(this);
            var qtyvalue = $buttonQty.parent().find('input').val();

            var rowId = $(this).attr("data-id");

            // alert("The data-id of clicked item is: " + dataId);
            $.get('/cart/update' + '/' + rowId + '/' + qtyvalue, function (data) {
                miniCart()
                // start message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    // icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                    })
                    location.reload()
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                    })
                }
                // end message
            })
        });

        // Update cart from direct input change
        $(".qty_update").change(function () {
            var valQty = $(this).val();
            var id = $(this).attr("data-rowid");
            // console.log('ID'+id,'Qty'+valQty)
            $.get("/cart/update" + "/" + id + "/" + valQty, function (data) {
                // console.log(data)
                miniCart()
               
                // start message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    // icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                    })
                location.reload()
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                    })
                }
                // end message

                // if(data.qty == 0){
                //     location.reload()
                // }
            })
        })
        // Update cart from direct input change

    // Shopping Cart Page ::::::::::::::::::::::::::::::::::::::::::::::::


//     $('#add_to_cart_form').on('submit',function(e){
//         e.preventDefault();
//         // console.log()
    
//         //    var pid = $(this).attr("data-item-id");
//             var attribute_id = $("input[name='attribute_id']:checked").val();
//             var pid = $("input[name='pid']").val();
//             var qty = 1;

//             if(attribute_id){
//                 var url = '/cart/add' + '/' + pid + '/' + qty + '/' + attribute_id
//             }else{
//                 var url = '/cart/add' + '/' + pid + '/' + qty
//             }
// console.log(attribute_id)
//             $.get(url, function (data) {
//                 miniCart()
//                 // start message
//                 const Toast = Swal.mixin({
//                     toast: true,
//                     position: 'top-end',
//                     // icon: 'success',
//                     showConfirmButton: false,
//                     timer: 3000
//                 })
//                 if ($.isEmptyObject(data.error)) {
//                     Toast.fire({
//                         icon: 'success',
//                         title: data.success,
//                     })
//                 } else {
//                     Toast.fire({
//                         icon: 'error',
//                         title: data.error,
//                     })
//                 }
//                 // end message
//             })
//         });
    
             // Add to Cart Form ------------------------------------ Starts
       

    $('#addToCart').on('submit',function(e){
        e.preventDefault();
        
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#addToCartButton').html('Please Wait...');
    $("#addToCartButton").attr("disabled", true);
    $.ajax({
        url: "/form/cart/add",
        // url: "{{ route('frontend.form.addcart') }}",
        type: "POST",
        data: $('#addToCart').serialize(),
        success: function(data) {
            console.log(data)
            miniCart()
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            })
            if ($.isEmptyObject(data.error)) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.success,
                                    })
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: data.error,
                                    })
                                }
            $('#addToCartButton').html('Add To Cart');
            $("#addToCartButton").attr("disabled", false);
            
        }
    });
        });
            // Add to Cart Form ------------------------------------ Ends

    // Product Details Page Add to Cart ::::::::::::::::::::::::::_>

    $('.qty-btn').on('click', function (e) {
        e.preventDefault();
        var $buttonQty = $(this);
        var qtyvalue = $buttonQty.parent().find('input').val();
        // var cartId = $buttonQty.parent().find('input').attr("data-rowid");
        var itemId = $(this).parent().find('input').attr("data-item-id");
        var cartId = $('#cartId').val();
        if(cartId = ""){
        $.get('/cart/add' + '/' + itemId + '/' + qtyvalue, function (data) {
        miniCart()
        // start message
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            // icon: 'success',
            showConfirmButton: false,
            timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                icon: 'success',
                title: data.success,
            })
        } else {
            Toast.fire({
                icon: 'error',
                title: data.error,
            })
        }
        // end message
    })
        }else{
            // console.log(cartId)
            
            // $.get('/cart/update' + '/' + cartId + '/' + qtyvalue, function (data) {
            //     miniCart()
            //     // start message
            //     const Toast = Swal.mixin({
            //         toast: true,
            //         position: 'top-end',
            //         icon: 'success',
            //         showConfirmButton: false,
            //         timer: 3000
            //     })
            //     if ($.isEmptyObject(data.error)) {
            //         Toast.fire({
            //             icon: 'success',
            //             title: data.success,
            //         })
            //     } else {
            //         Toast.fire({
            //             icon: 'error',
            //             title: data.error,
            //         })
            //     }
            //     // end message
            // })
        }
        
    });

// Add to cart starts here


    // ::::::::::::::::::::::::::::::::::::::::::::::::::
    
    // Product Details Page Add to Cart ::::::::::::::::::::::::::

    // subscribe to newsletter ::::::
    // subscribe to newsletter ::::::

    

    // $( document ).ready(function() {

    //     var ship_id = $( "#bill_zone option:selected" ).val();
    //     // console.log(ship_id)
    //     if(!ship_id){
    //         ship_id = '';
    //     }
    //     $.ajax({
    //         type: 'GET',
    //         dataType: 'json',
    //         url: '/checkout/add_shipping' + '/' + ship_id,
    //         success: function (data) {
    //             // console.log(data)
    //             $('.shipping_value').html('&#8358;' + data.shippPrice)
    //             $('.orderTotal').html('&#8358;' + data.cartTotal)
    //             $('#flutterPayTotal').val(data.cartTotal)
                        
    //         }
    //     });
        
    // //     $.get('/checkout/add_shipping' + '/' + ship_id, function (data) {
    // //         // console.log(data)
    // //     $('.shipping_value').html('&#8358;' + data.shippPrice)
    // //     $('.orderTotal').html('&#8358;' + data.cartTotal)
            
    // // })
    // });
    // SELECT SHIPPING SERVICES:::::::::::::::::

})(window.jQuery);