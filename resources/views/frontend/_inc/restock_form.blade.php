<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('.remind_me_when_restock').on('click', function() {
      var id = $(this).attr("data-id");
        $.confirm({
            title: 'We will remind you on item restock!',
            theme: 'bootstrap',
            closeIcon: true,
            animation: 'scale',
            type: 'blue',
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Enter your email here</label>' +
                '<input type="email" placeholder="Your email" class="name form-control" required />' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var email = this.$content.find('.name').val();
                        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                        let regex = new RegExp('[a-z0-9]+@[a-z]+\.[a-z]{2,3}');
                        const emailRegex =  new RegExp(/^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+$/, "gm");
                        if (!email || !email.match(emailRegex)) {
                            $.alert('provide a valid email');
                            return false;
                        }
                        // $.alert('Your email is ' + name);
                        $.ajax({
                        type:'POST',
                        url:"{{ route('frontend.remind_on_restock.submit') }}",
                        data:{ email:email,id:id},
                        success:function(data){
                        // initialize the toast
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3500
                        })
                        Toast.fire({
                        icon: 'success',
                        title: data.message,
                        })
                        },
                        error:function(data){
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, error) {
                                Toast.fire({
                        icon: 'error',
                        title: error.email,
                        })
                            });
                        }
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


