<div class="col-xs-12">
    <!-- mt producttabs style2 start here -->
    <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.6s">
        <!-- producttabs start here -->
        <div class="producttabs">
            <p class="producttabs_title">
                Компания Өнімдері
            </p>
        </div>
        <!-- producttabs end here -->
        <!-- tabs slider start here -->
        <div class="tabs-sliderlg">
            @foreach ($products as $product)
                @php
                    $rating_avg = \App\Models\Review::ratingCalculator($product->product_id, \App\Models\Review::PRODUCT_REVIEW)
                @endphp
                <!-- product_card start here -->
                <div class="product_card">
                    <!-- mt product start here -->
                    <div class="product-3">
                        <!-- img start here -->
                        <div class="img">
                            <img alt="image description" src="{{$product->product_image}}">
                        </div>
                        <!-- txt start here -->
                        <div class="txt">
                            <strong class="title">{{$product->product_name_ru}}</strong>
                            <p>{{$product->product_desc_ru}}</p>
                            <a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}"
                                data-img = "{{$product->product_image}}"
                                data-name = "{{$product->product_name_ru}}"
                                data-desc = "{{$product->product_desc_ru}}"
                                data-price = "{{$product->product_price}}"
                                data-rating = "{{\App\Models\Review::ratingCalculator($product->product_id, \App\Models\Review::PRODUCT_REVIEW)}}"
                            >Толығырақ</a>
                        </div>
                    </div><!-- mt product 3 end here -->
                </div><!-- product_card end here -->
            @endforeach
        </div><!-- tabs slider end here -->
    </div><!-- mt producttabs end here -->
</div>