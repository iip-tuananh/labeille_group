<div class="item_product_main">
    <form class="variants product-action" data-id="product-actions-{{$product->id}}">
        <a class="image_thumb" href="{{route('front.show-product-detail', $product->slug)}}"
            title="{{$product->name}}">
            <img width="480" height="480" class="lazyload image1"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                data-src="{{$product->image ? $product->image->path : 'http://placehold.co/480x480'}}"
                alt="{{$product->name}}">
        </a>
        {{-- <div class="freeship_tag">
            <img width="460" height="130" class="lazyload image1"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                data-src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/icon_tag_2.png?1749877282061"
                alt="Coupon">
        </div> --}}
        <div class="group_action">
            <button class="btn-buy btn-cart btn-left btn btn-views left-to add_to_cart" title="Thêm vào giỏ" ng-click="addToCart({{$product->id}})">
                <span>Thêm vào giỏ</span>
            </button>
        </div>

        {{-- <div class="hotdeal">
            <img width="40" height="40" alt="Hot deal" class="lazyload image1"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                data-src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/icon_tag_5.png?1749877282061" />

            <img width="40" height="40" alt="Online" class="lazyload image1"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                data-src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/icon_tag_6.png?1749877282061" />

        </div> --}}
    </form>
    <div class="product-info">

        <div class="product_vendor">
            <a href="{{route('front.show-product-category', $product->category->slug)}}" title="{{$product->category->name}}">{{$product->category->name}}</a>
        </div>

        <h3 class="product-name"><a href="{{route('front.show-product-detail', $product->slug)}}"
                title="{{$product->name}}">{{$product->name}}</a></h3>
        <div class="price-box">
            @if ($product->base_price > 0 && $product->price > 0)
                <span class="price">{{formatCurrency($product->price)}}đ</span>
                <span class="compare-price">{{formatCurrency($product->base_price)}}đ</span>
                <span class="smart">{{formatCurrency(round(($product->base_price - $product->price) / $product->base_price * 100))}}%</span>
            @elseif ($product->base_price == 0 && $product->price > 0)
                <span class="price">{{formatCurrency($product->price)}}đ</span>
            @elseif ($product->base_price > 0 && $product->price == 0)
                <span class="price">{{formatCurrency($product->base_price)}}đ</span>
            @else
                <span class="price">Liên hệ</span>
            @endif

        </div>
    </div>
</div>
