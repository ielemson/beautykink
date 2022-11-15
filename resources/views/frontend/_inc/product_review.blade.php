<div class="row mb-20">
    <div class="col-12">
        <div class="product-review-tabs-content">
            <ul class="nav product-tab-nav" id="ReviewTab" role="tablist">
                <li role="presentation">
                    <a class="active" id="description-tab" data-bs-toggle="pill" href="#description"
                        role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>

                <li role="presentation">
                    <a id="reviews-tab" data-bs-toggle="pill" href="#reviews" role="tab"
                        aria-controls="reviews" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content product-tab-content" id="ReviewTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel"
                    aria-labelledby="description-tab">
                    <div class="product-description">
                        {!! $item->details !!}
                    </div>
                </div>

                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="product-comments-content">
                       
                        <div class="col-md-8">
                            @forelse ($reviews as $review)
                                <div class="single-review">
                                    <div class="comment">
                                        {{-- <div class="comment-author-ava"><img class="lazy" src="{{ asset($review->user->photo) }}" alt="Comment author" style="width: 50px; height:50px"> --}}
                                        </div>
                                        <div class="comment-body">
                                            <div class="comment-header d-flex flex-wrap justify-content-between">
                                                <div>
                                                    <h4 class="comment-title mb-1">{{ $review->subject }}</h4>
                                                    <span>{{ $review->user->first_name }}</span>
                                                    <span class="ml-3">{{ $review->created_at->format('M d, Y') }}</span>
                                                </div>
                                                <div class="mb-2">
                                                    <div class="rating-stars">
                                                        @php
                                                            for ($i = 0; $i < $review->rating; $i++) {
                                                                echo "<i class = 'far fa-star filled'></i>";
                                                            }
                                                        @endphp
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="comment-text  mt-2">{{ $review->review }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="">
                                    {{ __('No Reviews Found.') }}
                                </div>
                            @endforelse
                            <div class="row mt-15">
                                <div class="col-lg-12 text-center">
                                    {{ $reviews->links() }}
                                </div>
                            </div>
            
                        </div>
                        @if (Auth::user())
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn-review">{{ __('Leave a Review') }}</a> 
                                @else
                                {{-- <div class="pb-2"><a class="btn btn-primary btn-block" href="{{ route('user.login') }}">{{ __('Login') }}</a></div> --}}
                                <a href="{{ route('user.login') }}" class="btn-review">Login!</a> 
                            @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('frontend._inc.product_review') --}}