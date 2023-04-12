
    <!--================= Product-details Section Start Here =================-->
    
    <div class="product-thumb-area">
        <div class="cursor"></div>
        @foreach ($thumbnails as $list => $thumbnail)
            <div class="thumb-wrapper {{ $thumbnail->id }} filterd-items {{ $list == 0 ? 'figure' : 'hide' }} ">
                <div class="product-thumb"
                    style="background-image: url({{ asset('uploads/products/thumbnail') }}/{{ $thumbnail->thumbnail }})">
                    <img src="{{ asset('uploads/products/thumbnail') }}/{{ $thumbnail->thumbnail }}"
                        alt="product-thumb">
                </div>
            </div>
        @endforeach
        <div class="product-thumb-filter-group">
            @foreach ($thumbnails as $sl => $thumbnail)
            <div class="thumb-filter filter-btn {{ $sl == 0 ? 'active' : '' }}" data-show=".{{ $thumbnail->id }}"><img
                    src="{{ asset('uploads/products/thumbnail') }}/{{ $thumbnail->thumbnail }}" alt="product-thumb-filter">
            </div>
            @endforeach
        </div>
    </div>
    <div class="contents">
        <div class="product-status">
            <span class="product-catagory">{{$product->rel_to_category->category_name}}</span>

            
            <div class="rating-stars-group">

                @php
                    $total_rating = 0;
                    if($total_review != 0) {
                        $total_rating = $total_star / $total_review;
                    }
                    for ($i = 1; $i <= $total_rating; $i++) {
                        echo '<div class="rating-star"><i class="fas fa-star"></i></div>';
                    }
                    for ($j = $total_rating + 1; $j <= 5; $j++) {
                        echo '<div class="rating-star"><i class="far fa-star"></i></div>';
                    }
                @endphp     
                <span>{{$total_star}} Reviews</span>
            </div>
        </div>
        <h2 class="product-title">{{$product->product_name}}</h2>
        @if ($product->discount != null)
        <span class="product-price"><span class="old-price">{{$product->product_price}} Tk</span> {{$product->after_discount}} Tk</span>
        @else
        <span class="product-price">{{$product->after_discount}} Tk</span>
        @endif
        <p>
            {{$product->short_desp}}
        </p>
        <form action="{{route('product.add')}}" method="POST">
            @csrf
        <div class="product-bottom-action">
            <div class="cart-edit">
                <div class="quantity-edit action-item">
                    <button class="button input-group-prepend decrement-btn"><i class="fal fa-minus minus"></i></button>
                    <input type="text" name="quantity" class="input" value="1" />
                    <button class="button plus input-group-append increment-btn">+<i class="fal fa-plus plus"></i></button>
                </div>
            </div>
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <button type="submit" name="abcd" value="1" class="addto-cart-btn action-item"><i class="rt-basket-shopping"></i>
                Add To
                Cart</button>
            <button name="abcd" value="2" type="submit" class="wishlist-btn action-item"><i class="rt-heart"></i></button>
        </div>
        </form>
        <div class="product-uniques">
            <span class="catagorys product-unipue"><span>Categories: </span> {{$product->rel_to_category->category_name}} , {{$product->rel_to_subcategory->subcategory_name}}
            </span>
        </div>
        {{-- <div class="share-social">
            <span>Share:</span>
            <a class="platform" href="http://facebook.com/" target="_blank"><i
                    class="fab fa-facebook-f"></i></a>
            <a class="platform" href="http://twitter.com/" target="_blank"><i
                    class="fab fa-twitter"></i></a>
            <a class="platform" href="http://behance.com/" target="_blank"><i
                    class="fab fa-behance"></i></a>
            <a class="platform" href="http://youtube.com/" target="_blank"><i
                    class="fab fa-youtube"></i></a>
            <a class="platform" href="http://linkedin.com/" target="_blank"><i
                    class="fab fa-linkedin"></i></a>
        </div> --}}
    </div>
    <!--================= Product-details Section End Here =================-->
    <script>
        $(document).ready(function () {
           $('.increment-btn').click(function (e) {
               e.preventDefault();
               var incre_value = $(this).parents('.quantity').find('.qty-input').val();
               var value = parseInt(incre_value, 10);
               value = isNaN(value) ? 0 : value;
               if(value<10){
                   value++;
                   $(this).parents('.quantity').find('.qty-input').val(value);
               }

           });

           $('.decrement-btn').click(function (e) {
               e.preventDefault();
               var decre_value = $(this).parents('.quantity').find('.qty-input').val();
               var value = parseInt(decre_value, 10);
               value = isNaN(value) ? 0 : value;
               if(value>1){
                   value--;
                   $(this).parents('.quantity').find('.qty-input').val(value);
               }
           });

           $(function () {
                $(".button").on("click", function () {
                var $button = $(this);
                var $parent = $button.parent();
                var oldValue = $parent.find('.input').val();

                if ($button.text() == "+") {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                    } else {
                    newVal = 1;
                    }
                }
                $parent.find('a.add-to-cart').attr('data-quantity', newVal);
                $parent.find('.input').val(newVal);
            });
  });

       });
   </script>