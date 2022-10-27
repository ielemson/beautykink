{{-- <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="modal fade ratingForm" action="{{ route('frontend.review.submit') }}" method="POST" id="leaveReview" tabindex="-1">
                @csrf
            @php
            $user = Auth::user();
            @endphp
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="review-name">{{ __('Your Name') }}</label>
                    <input class="form-control" type="text" id="review-name" value="{{ $user->first_name }}" required>
                </div>
            </div>
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="review-email">{{ __('Your Email') }}</label>
                    <input class="form-control" type="email" id="review-email" value="{{ $user->email }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="review-subject">{{ __('Subject') }}</label>
                    <input class="form-control" type="text" name="subject" id="review-subject" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="review-rating">{{ __('Rating') }}</label>
                    <select name="rating" class="form-control" id="review-rating">
                        <option value="5">5 {{ __('Stars') }}</option>
                        <option value="4">4 {{ __('Stars') }}</option>
                        <option value="3">3 {{ __('Stars') }}</option>
                        <option value="2">2 {{ __('Stars') }}</option>
                        <option value="1">1 {{ __('Star') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="review-message">{{ __('Review') }}</label>
            <textarea class="form-control" name="review" id="review-message" rows="8" required></textarea>
        </div>
           </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
        </div>
      </div>
    </div>
  </div>
  --}}


  <!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Leave a Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  action="javascript:;" method="POST" id="leaveReview" tabindex="-1">
                @csrf
        <div class="modal-body">
            
            @php
            $user = Auth::user();
        @endphp
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="review-name">{{ __('Your Name') }}</label>
                    <input class="form-control" type="text" id="review-name" name="name" value="{{ $user->first_name }}" required>
                </div>
            </div>
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="review-email">{{ __('Your Email') }}</label>
                    <input class="form-control" type="email" id="review-email" name="email" value="{{ $user->email }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="review-subject">{{ __('Subject') }}</label>
                    <input class="form-control" type="text" name="subject" id="review-subject" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="review-rating">{{ __('Rating') }}</label>
                    <select name="rating" class="form-control" id="review-rating">
                        <option value="5">5 {{ __('Stars') }}</option>
                        <option value="4">4 {{ __('Stars') }}</option>
                        <option value="3">3 {{ __('Stars') }}</option>
                        <option value="2">2 {{ __('Stars') }}</option>
                        <option value="1">1 {{ __('Star') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="review-message">{{ __('Review') }}</label>
            <textarea class="form-control" name="review" id="review-message" rows="8" required></textarea>
        </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" id="submit">{{ __('Submit Review') }}</button>
        </div>
        </form>
      </div>
    </div>
  </div>