<div class="item-suggest">
    <div class="search-title">
        <div class="icon_search">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M14.1404 13.4673L19.852 19.1789C20.3008 19.6276 19.6276 20.3008 19.1789 19.852L13.4673 14.1404C12.0381 15.4114 10.1552 16.1835 8.09176 16.1835C3.6225 16.1835 0 12.5613 0 8.09176C0 3.6225 3.62219 0 8.09176 0C12.561 0 16.1835 3.62219 16.1835 8.09176C16.1835 10.1551 15.4115 12.038 14.1404 13.4673ZM0.951972 8.09176C0.951972 12.0356 4.14824 15.2316 8.09176 15.2316C12.0356 15.2316 15.2316 12.0353 15.2316 8.09176C15.2316 4.14797 12.0353 0.951972 8.09176 0.951972C4.14797 0.951972 0.951972 4.14824 0.951972 8.09176Z" fill="#fff"></path> </svg>
        </div>
        <span>Vui Lòng Nhập Từ Khóa Vào Ô Tìm Kiếm</span>
    </div>
    {{-- <span class="title_no_mis">SẢN PHẨM ĐỀ XUẤT</span> --}}
    <div class="search-list">
        @foreach ($products as $product)
            <div class="product-smart">
                <a class="image_thumb" href="{{ route('front.show-product-detail', $product->slug) }}"
                    title="{{$product->name}}">
                    <img width="480" height="480" class="image1"
                        src="{{$product->image->path}}"
                        alt="{{$product->name}}" loading="lazy">
                </a>
                <div class="product-info">
                    <a class="product-name" href="{{ route('front.show-product-detail', $product->slug) }}"
                        title="{{$product->name}}">{{$product->name}}</a>
                    <span class="price">{{ formatCurrency($product->price) }}₫</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="list-search"></div>
