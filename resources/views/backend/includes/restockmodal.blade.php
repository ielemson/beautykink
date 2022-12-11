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
                        $.alert('Your new stock is ' + stock);
                        // $.ajax({
                        // type:'POST',
                        // url:"{{ route('frontend.remind_on_restock.submit') }}",
                        // data:{ email:email,id:id},
                        // success:function(data){
                        // // initialize the toast
                        // const Toast = Swal.mixin({
                        // toast: true,
                        // position: 'top-end',
                        // showConfirmButton: false,
                        // timer: 3000
                        // })
                        // Toast.fire({
                        // icon: 'success',
                        // title: data.message,
                        // })
                      
                        
                        // }
                        // });
                    }
                },
                cancel: function() {
                    //close
                },
            },
            
        });
    });
</script>
