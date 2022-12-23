<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('.remind_me_when_restock').on('click', function() {
      var id = $(this).attr("data-id");
        $.confirm({
            title: 'Restock this product',
            theme: 'bootstrap',
            closeIcon: true,
            animation: 'scale',
            type: 'blue',
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<input type="number" min="1" placeholder="Restock Product" class="stock form-control" required />' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var stock = this.$content.find('.stock').val();
                        if (!stock) {
                            $.alert('provide a valid number');
                            return false;
                        }
                        // $.alert('Your new stock is ' + stock);
                        $.ajax({
                        type:'POST',
                        url:"{{ route('backend.item.restock') }}",
                        data:{ stock:stock,id:id},
                        beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                      $('.spinner').html(`         
                      <span class="float-left">Sending Email <i class="fas fa-spinner fa-spin "></i></span>
                        `)
                         },
                        success:function(data){
                            // console.log(data)
                        // initialize the toast
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                        })
                        
                        if (data.success) {
                            Toast.fire({
                        icon: 'success',
                        title: data.success,
                        })

                        setTimeout(() => {
                            location.reload()
                        }, 3000);
                        }else{
                            Toast.fire({
                        icon: 'error',
                        title: data.error,
                        })
                        }
                      
                        
                        },
                        complete: function () { 
                    // Set our complete callback, adding the .hidden class and hiding the spinner.
                    $('.spinner').html(``)
                    // $("#shipping_method_list").slideDown("slow")

                    // console.log('completed')
                },
                        });
                    }
                },
                cancel: function() {
                    //close
                },
            },
            
        });
    });
</script>
