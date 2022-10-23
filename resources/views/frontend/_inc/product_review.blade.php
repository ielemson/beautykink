<div class="row">
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
                        <div class="comment clearfix">
                            <div class="comment-author">
                                <span class="grade">Grade</span>
                                <div class="star-content">
                                    <i class="ion-md-star"></i>
                                    <i class="ion-md-star"></i>
                                    <i class="ion-md-star"></i>
                                    <i class="ion-md-star"></i>
                                    <i class="ion-md-star icon-color-gray"></i>
                                </div>
                                <div class="comment-author-info">
                                    <span class="title">posthemes</span>
                                    <span class="date">05/19/2021</span>
                                </div>
                                <div class="comment-details">
                                    <span class="title">Demo</span>
                                    <p class="desc">0 out of 1 people found this review useful.</p>
                                </div>
                            </div>
                        </div>
                        <a href="#/" class="btn-review">Write your review !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>