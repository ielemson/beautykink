     <!-- Modal Cash on Transfer-->
     <div class="modal fade" id="cod" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Transaction Cash On Delivery') }}</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('frontend.guest.checkout.submit') }}" method="POST">
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
    



    <!-- Modal bank -->
    <div class="modal fade" id="bank" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Transactions via Bank Transfer') }}</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('frontend.guest.checkout.submit') }}" method="POST">
                    <div class="modal-body">
                        {{-- <div class="col-lg-12 form-group">
                            <label for="transaction">{{ __('Transaction Number') }}</label>
                            <input class="form-control" name="txn_id" id="transaction"
                                placeholder="{{ __('Enter Your Transaction Number') }}" required />
                        </div> --}}
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
