     <!-- Modal Cash on Transfer-->
     <div class="modal fade" id="cod" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h6 class="modal-title">{{ __('Transaction Cash On Delivery') }}</h6>
                     <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 </div>
                 <form action="{{ route('frontend.checkout.submit') }}" method="POST">
                     @csrf
                     <input type="hidden" name="payment_method" value="Cash On Delivery" id="">
                     <div class="card-body">
                         {{-- <p>{{ PriceHelper::gatewayText('cod') }}</p> --}}
                     </div>
                     <div class="modal-footer">
                         <button class="btn btn-outline-secondary btn-sm" type="button" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                         <button class="btn btn-primary btn-sm" type="submit">{{ __('Cash On Delivery') }}</button>
                 </form>
             </div>
         </div>
     </div>
     </div>
     

     {{-- Paystack --}}
     <div class="modal fade" id="paystack" tabindex="-1" aria-hidden="true">

         <form class="interactive-credit-card row" action="{{ route('frontend.checkout.submit') }}" method="POST"
             id="paystack_form">
             @csrf
             <input type="hidden" name="ref_id" id="ref_id" value="">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h6 class="modal-title">{{ __('Transactions via Paystack') }}</h6>
                         <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                 aria-hidden="true">&times;</span></button>
                     </div>
                     <div class="modal-body">
                         <div class="card-body">
                             <p>paystack</p>
                         </div>
                     </div>
                     <input type="hidden" name="payment_method" value="Paystack">
                     <div class="modal-footer">
                         <button class="btn btn-outline-secondary btn-sm" type="button"
                             data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                         <button class="btn btn-primary btn-sm final-btn" id="final-btn"
                             type="submit">{{ __('Checkout With Paystack') }}</button>
                     </div>
                 </div>
             </div>
         </form>


         @php
             $data = App\Models\PaymentSetting::whereUniqueKeyword('paystack')->first();
             $paydata = $data->convertJsonData();
         @endphp
         @section('script')
             <script src="https://js.paystack.co/v1/inline.js"></script>
             <script>
                 $(document).on('submit', '#paystack_form', function(e) {
                     e.preventDefault();
                     var total = 200
                     total = Math.round(total);

                     var handler = PaystackPop.setup({
                         key: '{{ $paydata['key'] }}',
                         email: '{{ $user->email }}',
                         amount: '{{ round(100 * 200) }}' * 100,
                         currency: 'NGN',
                         ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                         callback: function(response) {
                             $('#ref_id').val(response.reference);
                             $('#paystack_form').removeAttr('id');
                             $('.final-btn').click();
                         },
                         onClose: function() {
                             window.location.reload();
                         }
                     });
                     handler.openIframe();
                     return false;
                 });
             </script>
         @endsection
     </div>




     <!-- Modal bank -->
     <div class="modal fade" id="bank" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h6 class="modal-title">{{ __('Transactions via Bank Transfer') }}</h6>
                     <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                             aria-hidden="true">&times;</span></button>
                 </div>
                 <form action="{{ route('frontend.checkout.submit') }}" method="POST">
                     <div class="modal-body">
                         <div class="col-lg-12 form-group">
                             <label for="transaction">{{ __('Transaction Number') }}</label>
                             <input class="form-control" name="txn_id" id="transaction"
                                 placeholder="{{ __('Enter Your Transaction Number') }}" required />
                         </div>
                         <p>{!! PriceHelper::gatewayText('bank') !!}</p>
                     </div>
                     <div class="modal-footer">

                         @csrf
                         <input type="hidden" name="payment_method" value="Bank">
                         <button class="btn btn-outline-secondary btn-sm" type="button"
                             data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                         <button class="btn btn-primary btn-sm"
                             type="submit">{{ __('Checkout With Bank Transfer') }}</button>
                 </form>
             </div>
         </div>
     </div>
     </div>
