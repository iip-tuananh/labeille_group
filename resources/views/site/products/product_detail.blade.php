@extends('site.layouts.master')
@section('title')
    {{ $product->name }}
@endsection
@section('description')
    {{ strip_tags($product->intro) }}
@endsection
@section('image')
    {{ $product->image ? $product->image->path : ($product->galleries[0]->image ? $product->galleries[0]->image->path : 'http://placehold.co/1200x480') }}
@endsection

@section('css')
    <link href="{{ asset('site/css/breadcrumb_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/style_page.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/product_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <style>
        .text-limit-3-line {
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .hidden {
            display: none;
        }

        .product-attributes {
            margin-bottom: 0 !important;
        }

        .product-attributes label {
            font-weight: 600;
            margin-bottom: 0 !important;
        }

        .product-attribute-values {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .product-attribute-values .badge,
        .product-attribute-values .badge+.badge {
            width: auto;
            border: 1px solid #0974ba;
            padding: 2px 10px;
            border-radius: 5px;
            font-size: 14px;
            color: #0974ba;
            height: 30px;
            cursor: pointer;
            pointer-events: auto;
        }

        .product-attribute-values .badge:hover {
            background-color: #0974ba;
            color: #fff;
        }

        .product-attribute-values .badge.active {
            background-color: #0974ba;
            color: #fff;
        }

        .countdown {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 20px;
        }

        .countdown .countdown-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .countdown-item {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 6px 10px;
            border-radius: 2px;
            background: linear-gradient(to bottom, #ff5e00, #f4955e);
        }

        .countdown-item-number {
            font-size: 24px;
            font-weight: 600;
            color: #fff;
        }

        .countdown-item-label {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        .countdown-item-separator {
            font-size: 14px;
            font-weight: 600;
        }

        .btn-fixed-bottom {
            display: none;
            position: fixed;
            width: 80% !important;
            bottom: 65px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #0974ba;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            border-radius: 50px;
            z-index: 1000;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
            border: 1px solid #cccccc;
        }

        @media (max-width: 768px) {
            .btn-fixed-bottom {
                display: block;
            }
        }
    </style>
@endsection

@section('content')
    <section class="bread-crumb">
        <div class="container">
            <ul class="breadcrumb">
                <li class="home">
                    <a href="{{ route('home') }}" title="Trang chủ"><span>Trang chủ</span></a>
                    <span class="mr_lr">
                        &nbsp;
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                            class="svg-inline--fa fa-chevron-right fa-w-10">
                            <path fill="currentColor"
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                class=""></path>
                        </svg>
                        &nbsp;
                    </span>
                </li>
                <li>
                    <a class="changeurl" href="{{ route('front.show-product-category', ['categorySlug' => $product->category->slug]) }}" title="{{ $product->category->name }}"><span>{{ $product->category->name }}</span></a>
                    <span class="mr_lr">
                        &nbsp;
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                            class="svg-inline--fa fa-chevron-right fa-w-10">
                            <path fill="currentColor"
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                class=""></path>
                        </svg>
                        &nbsp;
                    </span>
                </li>
                <li><strong><span>{{ $product->name }}</span></strong>
                <li>
            </ul>
        </div>
    </section>
    <section class="product layout-product" itemscope itemtype="https://schema.org/Product" ng-controller="ProductDetailController">
        <div class="container">
            <div class="details-product">
                <div class="row">
                    <div class="product-detail-left product-images col-12 col-md-5 col-lg-6">
                        <div class="product-image-block relative">
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper" id="lightgallery">
                                    <a class="swiper-slide" data-hash="0"
                                        href="{{ $product->image ? $product->image->path : 'http://placehold.co/480x480' }}"
                                        title="Click để xem">
                                        <img height="480" width="480"
                                            src="{{ $product->image ? $product->image->path : 'http://placehold.co/480x480' }}"
                                            alt="{{ $product->name }}"
                                            data-image="{{ $product->image ? $product->image->path : 'http://placehold.co/480x480' }}"
                                            class="img-responsive mx-auto d-block swiper-lazy" />
                                    </a>
                                    @foreach ($product->galleries as $key => $gallery)
                                    <a class="swiper-slide" data-hash="{{ $key + 1 }}"
                                        href="{{ $gallery->image ? $gallery->image->path : 'http://placehold.co/480x480' }}"
                                        title="Click để xem">
                                        <img height="480" width="480"
                                            src="{{ $gallery->image ? $gallery->image->path : 'http://placehold.co/480x480' }}"
                                            alt="{{ $product->name }}"
                                            data-image="{{ $gallery->image ? $gallery->image->path : 'http://placehold.co/480x480' }}"
                                            class="img-responsive mx-auto d-block swiper-lazy" />
                                    </a>
                                    @endforeach
                                </div>
                                {{-- <div class="freeship_tag">
                                    <img width="460" height="130" class="lazyload image1"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/icon_tag_3.png?1749877282061"
                                        alt="Quà tặng">
                                </div>
                                <div class="hotdeal">
                                    <img width="40" height="40" alt="Hot deal" class="lazyload image1"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/icon_tag_5.png?1749877282061" />
                                </div> --}}
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" data-hash="0">
                                        <div class="p-100">
                                            <img height="80" width="80"
                                                src="{{ $product->image ? $product->image->path : 'http://placehold.co/480x480' }}"
                                                alt="{{ $product->name }}"
                                                data-image="{{ $product->image ? $product->image->path : 'http://placehold.co/480x480' }}"
                                                class="swiper-lazy" />
                                        </div>
                                    </div>
                                    @foreach ($product->galleries as $key => $gallery)
                                    <div class="swiper-slide" data-hash="{{ $key + 1 }}">
                                        <div class="p-100">
                                            <img height="80" width="80"
                                                src="{{ $gallery->image ? $gallery->image->path : 'http://placehold.co/480x480' }}"
                                                alt="{{ $product->name }}"
                                                data-image="{{ $gallery->image ? $gallery->image->path : 'http://placehold.co/480x480' }}"
                                                class="swiper-lazy" />
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="details-pro col-12 col-md-7 col-lg-6">
                        <h1 class="title-product">{{ $product->name }}</h1>
                        <div class="product-top clearfix">
                            <div class="sku-product clearfix">
                                <span class="d-none" itemprop="brand" itemtype="http://schema.org/Brand" itemscope>
                                    <meta itemprop="name" content="{{ $product->brand ? $product->brand->name : 'Đang cập nhật' }}" />
                                    Thương hiệu: <strong>{{ $product->brand ? $product->brand->name : 'Đang cập nhật' }}</strong>
                                </span>
                                <span class="variant-sku" itemprop="sku" content="{{ $product->sku }}">Mã: <span
                                        class="a-sku">{{ $product->sku }}</span></span><br>
                                <span class="d-none" itemprop="type" itemtype="http://schema.org/Type" itemscope>
                                    <meta itemprop="name" content="{{ $product->material ? $product->material : 'Đang cập nhật' }}" />
                                    Chất liệu: <strong>{{ $product->material ? $product->material : 'Đang cập nhật' }}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="inventory_quantity">
                            <span class="mb-break">
                                <span class="stock-brand-title">Thương hiệu:</span>
                                <span class="a-vendor">{{ $product->origin ? $product->origin : 'Đang cập nhật' }}
                                </span>
                            </span>
                            <span class="line">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                            <span class="mb-break">
                                <span class="stock-brand-title">Tình trạng:</span>
                                <span class="a-stock">{{ $product->status ? 'Còn hàng' : 'Hết hàng' }}</span>
                            </span>
                        </div>
                        <form data-cart-form id="add-to-cart-form" class="form-inline">
                            @if ($product->price > 0 && $product->base_price > 0)
                            <div class="price-box clearfix">
                                <span class="special-price">
                                    <span class="price product-price">{{ formatCurrency($product->price) }}₫</span>
                                    <meta itemprop="price" content="{{ $product->price }}">
                                    <meta itemprop="priceCurrency" content="VND">
                                </span>
                                <!-- Giá Khuyến mại -->
                                <span class="old-price" itemprop="priceSpecification" itemscope=""
                                    itemtype="http://schema.org/priceSpecification">
                                    <del class="price product-price-old">
                                        {{ formatCurrency($product->base_price) }}₫
                                    </del>
                                    <meta itemprop="price" content="{{ $product->base_price }}">
                                    <meta itemprop="priceCurrency" content="VND">
                                </span>
                                <!-- Giás gốc -->
                                <span class="label_product">
                                    - {{ round(($product->base_price - $product->price) / $product->base_price * 100) }}%
                                </span>
                            </div>
                            @elseif ($product->price > 0 && $product->base_price == 0)
                            <div class="price-box clearfix">
                                <span class="special-price">
                                    <span class="price product-price">{{ formatCurrency($product->price) }}₫</span>
                                    <meta itemprop="price" content="{{ $product->price }}">
                                    <meta itemprop="priceCurrency" content="VND">
                                </span>
                            </div>
                            @elseif ($product->price == 0 && $product->base_price > 0)
                            <div class="price-box clearfix">
                                <span class="special-price">
                                    <span class="price product-price">{{ formatCurrency($product->base_price) }}₫</span>
                                    <meta itemprop="price" content="{{ $product->base_price }}">
                                    <meta itemprop="priceCurrency" content="VND">
                                </span>
                            </div>
                            @else
                            <div class="price-box clearfix">
                                <span class="special-price">
                                    <span class="price product-price">Liên hệ</span>
                                    <meta itemprop="price" content="0">
                                    <meta itemprop="priceCurrency" content="VND">
                                </span>
                            </div>
                            @endif
                            {{-- <a class="btn-hethong" href="javascript:" title="Gợi ý tìm size">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path
                                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z">
                                    </path>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                </svg>
                                <span>Tìm cửa hàng gần bạn nhất</span>
                            </a> --}}
                            <div class="form-product  ">
                                <div class="clearfix form-group ">
                                    <div class="flex-quantity">
                                        <div class="custom custom-btn-number show">
                                            <label>Số lượng:</label>
                                            <div class="input_number_product">
                                                <button class="btn_num num_1 button button_qty"
                                                    onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;"
                                                    type="button">&minus;</button>
                                                <input type="text" id="qtym" name="quantity" value="1"
                                                    maxlength="3" class="form-control prd_quantity"
                                                    onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                    onchange="if(this.value == 0)this.value=1;">
                                                <button class="btn_num num_2 button button_qty"
                                                    onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;"
                                                    type="button"><span>&plus;</span></button>
                                            </div>
                                        </div>
                                        <div class="btn-mua button_actions clearfix">
                                            <button type="submit" ng-click="addToCartFromProductDetail()"
                                                class="btn btn_base normal_button btn_add_cart add_to_cart btn-cart">
                                                <svg width="24" height="24" viewBox="0 0 33 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M22.5923 27.9999H4.30586C3.28215 27.9999 2.38467 27.255 2.17432 26.2236L0.0427557 15.4655C-0.0834545 14.8065 0.0708127 14.1476 0.491513 13.6176C0.89819 13.1019 1.51522 12.801 2.17432 12.801H24.7239C25.383 12.801 25.986 13.1019 26.4067 13.6176C26.8133 14.1333 26.9816 14.8065 26.8554 15.4655L24.7239 26.2236C24.5135 27.255 23.616 27.9999 22.5923 27.9999ZM2.17432 13.8038C1.82373 13.8038 1.48717 13.9614 1.24878 14.2479C1.01038 14.5344 0.940254 14.8925 1.01037 15.2506L3.14193 26.0087C3.25412 26.5674 3.74492 26.9828 4.30586 26.9828H22.5923C23.1532 26.9828 23.6441 26.5674 23.7563 26.0087L25.8878 15.2506C25.9579 14.8925 25.8738 14.52 25.6494 14.2479C25.425 13.9757 25.0885 13.8038 24.7239 13.8038H2.17432Z"
                                                        fill="black"></path>
                                                    <path d="M25.7905 17.5427H1.10938V18.5455H25.7905V17.5427Z"
                                                        fill="black"></path>
                                                    <path d="M24.8924 22.27H1.99219V23.2728H24.8924V22.27Z" fill="black">
                                                    </path>
                                                    <path
                                                        d="M22.7062 11.4545H21.7245C21.7245 6.79889 18.0083 3.00275 13.4507 3.00275C8.89314 3.00275 5.17695 6.79889 5.17695 11.4545H4.19531C4.19531 6.24021 8.34623 2 13.4507 2C18.5553 2 22.7062 6.24021 22.7062 11.4545Z"
                                                        fill="black"></path>
                                                </svg>
                                                <span class="txt-main text_1">Thêm vào giỏ hàng</span>
                                            </button>
                                            <button class="btn-buyNow btn" ng-click="addToCartCheckoutFromProductDetail()">
                                                <span class="txt-main">Mua ngay</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <div class="sapo-buyxgety-module-detail-v2">
                            {!! $product->intro !!}
                        </div>
                        <div class="clearfix"></div>
                        {{-- <div class="product-policises-wrapper">
                            <ul class="product-policises">
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="40" height="40" class="lazyload"
                                            src="data:image/png;base64,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"
                                            data-src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/policy_image_1.png?1749877282061"
                                            alt="Nhận<b> Sudes Point</b> cho mỗi lần mua " />
                                    </div>
                                    <div class="content_poli">
                                        Nhận<b> Sudes Point</b> cho mỗi lần mua
                                    </div>
                                </li>
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="40" height="40" class="lazyload"
                                            src="data:image/png;base64,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"
                                            data-src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/policy_image_2.png?1749877282061"
                                            alt="Luôn có <b>14 </b>ngày đổi trả miễn phí " />
                                    </div>
                                    <div class="content_poli">
                                        Luôn có <b>14 </b>ngày đổi trả miễn phí
                                    </div>
                                </li>
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="40" height="40" class="lazyload"
                                            src="data:image/png;base64,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"
                                            data-src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/policy_image_3.png?1749877282061"
                                            alt="Giao nhanh miễn phí 2H <b>Trễ tặng 100K</b>" />
                                    </div>
                                    <div class="content_poli">
                                        Giao nhanh miễn phí 2H <b>Trễ tặng 100K</b>
                                    </div>
                                </li>
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="40" height="40" class="lazyload"
                                            src="data:image/png;base64,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"
                                            data-src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/policy_image_4.png?1749877282061"
                                            alt="Dino đền <b>100% </b>nếu phát hiện hàng giả" />
                                    </div>
                                    <div class="content_poli">
                                        Dino đền <b>100% </b>nếu phát hiện hàng giả
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    {{-- <div class="col-lg-12 col-col-md-12 col-sm-12 col-xs-12">
                        <div class="title_section_coupon">Mua nhiều giảm giá</div>
                        <section class="section_coupon">
                            <div class="coupon-swiper swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="item_coupon swiper-slide">
                                        <div class="image">
                                            <img width="88" height="88"
                                                src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/icon_coupon.png?1749877282061"
                                                alt="10%">
                                            <span>10%</span>
                                        </div>
                                        <div class="content_wrap">
                                            <div class="content-top">
                                                NHẬP MÃ:DINOS10
                                                <span>Mã giảm 10% cho đơn hàng tối thiểu 500k.</span>
                                            </div>
                                            <div class="content-bottom">
                                                <div class="coupon-code js-copy" data-copy="DINOS10" title="Sao chép">Sao
                                                    chép mã</div>
                                                <a title="Chi tiết" href="javascript:void(0)" class="info-button"
                                                    data-coupon="DINOS10"
                                                    data-content="Áp dụng cho đơn hàng từ 500k trở lên. Không đi kèm với chương trình khác">Điều
                                                    kiện</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item_coupon swiper-slide">
                                        <div class="image">
                                            <img width="88" height="88"
                                                src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/icon_coupon.png?1749877282061"
                                                alt="15%">
                                            <span>15%</span>
                                        </div>
                                        <div class="content_wrap">
                                            <div class="content-top">
                                                NHẬP MÃ:DINOS15
                                                <span>Mã giảm 15% cho đơn hàng tối thiểu 800k.</span>
                                            </div>
                                            <div class="content-bottom">
                                                <div class="coupon-code js-copy" data-copy="DINOS15" title="Sao chép">Sao
                                                    chép mã</div>
                                                <a title="Chi tiết" href="javascript:void(0)" class="info-button"
                                                    data-coupon="DINOS15"
                                                    data-content="Áp dụng cho đơn hàng từ 800k trở lên<br>
                                     Không đi kèm với chương trình khác">Điều
                                                    kiện</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item_coupon swiper-slide">
                                        <div class="image">
                                            <img width="88" height="88"
                                                src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/icon_coupon.png?1749877282061"
                                                alt="20%">
                                            <span>20%</span>
                                        </div>
                                        <div class="content_wrap">
                                            <div class="content-top">
                                                NHẬP MÃ:DINOS20
                                                <span>Mã giảm 20% cho đơn hàng tối thiểu 1000k.</span>
                                            </div>
                                            <div class="content-bottom">
                                                <div class="coupon-code js-copy" data-copy="DINOS20" title="Sao chép">Sao
                                                    chép mã</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item_coupon swiper-slide">
                                        <div class="image">
                                            <img width="88" height="88"
                                                src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/icon_coupon.png?1749877282061"
                                                alt="0K">
                                            <span>0K</span>
                                        </div>
                                        <div class="content_wrap">
                                            <div class="content-top">
                                                NHẬP MÃ:FREESHIP
                                                <span>Miễn phí vận chuyển cho đơn hàng trên 1500K.</span>
                                            </div>
                                            <div class="content-bottom">
                                                <div class="coupon-code js-copy" data-copy="FREESHIP" title="Sao chép">
                                                    Sao chép mã</div>
                                                <a title="Chi tiết" href="javascript:void(0)" class="info-button"
                                                    data-coupon="FREESHIP"
                                                    data-content="Áp dụng cho đơn hàng từ 1500K trở lên">Điều kiện</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="popup-coupon">
                            <div class="content">
                                <div class="title">Thông tin voucher</div>
                                <a href="javascript:void(0)" class="close-pop">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.1" x="0px" y="0px" viewBox="0 0 512.001 512.001"
                                        style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path
                                                    d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717    L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859    c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287    l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285    L284.286,256.002z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <ul>
                                    <li>
                                        <span>Mã khuyến mãi:</span>
                                        <span class="code"></span>
                                    </li>
                                    <li>
                                        <span>Điều kiện:</span>
                                        <span class="dieukien"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <script>
                            var coupon = new Swiper('.coupon-swiper', {
                                slidesPerView: 4,
                                loop: false,
                                grabCursor: true,
                                spaceBetween: 20,
                                roundLengths: true,
                                slideToClickedSlide: false,
                                autoplay: false,
                                breakpoints: {
                                    300: {
                                        slidesPerView: 1.2,
                                        spaceBetween: 10
                                    },
                                    500: {
                                        slidesPerView: 1.2,
                                        spaceBetween: 10
                                    },
                                    640: {
                                        slidesPerView: 1.8,
                                        spaceBetween: 10
                                    },
                                    767: {
                                        slidesPerView: 2.5,
                                        spaceBetween: 20
                                    },
                                    1260: {
                                        slidesPerView: 4,
                                        spaceBetween: 20
                                    },

                                }
                            });
                            $(document).on('click', '.js-copy', function(e) {
                                e.preventDefault();
                                var copyText = $(this).attr('data-copy');
                                var copyTextarea = document.createElement("textarea");
                                copyTextarea.textContent = copyText;
                                copyTextarea.style.position = "fixed";
                                document.body.appendChild(copyTextarea);
                                copyTextarea.select();
                                document.execCommand("copy");
                                document.body.removeChild(copyTextarea);
                                var cur_text = $(this).text();
                                var $cur_btn = $(this);
                                $(this).addClass("iscopied");
                                $(this).text("Đã lưu");
                                setTimeout(function() {
                                    $cur_btn.removeClass("iscopied");
                                    $cur_btn.text(cur_text);
                                }, 1500)
                            })
                            $('.info-button').click(function() {
                                var code = $(this).attr('data-coupon'),
                                    dieukien = $(this).attr('data-content');
                                $('.popup-coupon .code').html(code);
                                $('.popup-coupon .dieukien').html(dieukien);
                                $('.popup-coupon, .backdrop__body-backdrop___1rvky').addClass('active');
                            });
                            $('.close-pop').click(function() {
                                $('.popup-coupon, .backdrop__body-backdrop___1rvky').removeClass('active');
                            });
                        </script>
                    </div> --}}
                    <div class="col-lg-9 col-col-md-9 col-sm-12 col-xs-12">
                        <div class="product-tab e-tabs not-dqtab">
                            <ul class="tabs tabs-title clearfix">
                                <li class="tab-link active" data-tab="#tab-1">
                                    <h3>Mô tả sản phẩm</h3>
                                </li>
                            </ul>
                            <div class="tab-float">
                                <div id="tab-1" class="tab-content active content_extab">
                                    <div class="rte product_getcontent">
                                        <div id="content">
                                            {!! $product->body !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="details-pro-3 col-12 col-md-12 col-lg-3">
                        <div class="pro-right-stick">
                            <div class="product-favi">
                                <a href="javascript:void(0)" title="Sản phẩm liên quan">
                                    <div class="title-head">
                                        Sản phẩm liên quan
                                    </div>
                                </a>
                                <div class="product-favi-content">
                                    @foreach ($productsRelated as $relatedProduct)
                                    <div class="product-view">
                                        <a class="image_thumb"
                                            href="{{ route('front.show-product-detail', $relatedProduct->slug) }}"
                                            title="{{ $relatedProduct->name }}">
                                            <img width="480" height="480" class="lazyload"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                data-src="{{ $relatedProduct->image ? $relatedProduct->image->path : 'http://placehold.co/480x480' }}"
                                                alt="{{ $relatedProduct->name }}">
                                        </a>
                                        <div class="product-info">
                                            <h3 class="product-name"><a
                                                    href="{{ route('front.show-product-detail', $relatedProduct->slug) }}"
                                                    title="{{ $relatedProduct->name }}">{{ $relatedProduct->name }}</a></h3>
                                            <div class="price-box">
                                                @if ($relatedProduct->price > 0 && $relatedProduct->base_price > 0)
                                                <span class="price">{{ formatCurrency($relatedProduct->price) }}₫</span>
                                                <span class="compare-price">{{ formatCurrency($relatedProduct->base_price) }}₫</span>
                                                @elseif ($relatedProduct->price > 0 && $relatedProduct->base_price == 0)
                                                <span class="price">{{ formatCurrency($relatedProduct->price) }}₫</span>
                                                @elseif ($relatedProduct->price == 0 && $relatedProduct->base_price > 0)
                                                <span class="price">{{ formatCurrency($relatedProduct->base_price) }}₫</span>
                                                @else
                                                <span class="price">Liên hệ</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).on('click', '.modalsize-close, #modal-size-product .modalsize-overlay, .fancybox-overlay', function(e) {
            $("#modal-size-product").fadeOut(0);
            awe_hidePopup();
        });
        $(document).ready(function($) {
            var modal = $('.modalsize-product');
            var btn = $('.btn-hethong');
            var span = $('.modalsize-close');
            btn.click(function() {
                modal.show();
            });
            span.click(function() {
                modal.hide();
            });
            $(window).on('click', function(e) {
                if ($(e.target).is('.modal')) {
                    modal.hide();
                }
            });
        });
    </script>
    <script>
        $(".fakeRadio").click(function() {
            var wasChecked = !$(this).prop("checked");
            $(".fakeRadio").prop("checked", false);
            $(this).prop("checked", (!wasChecked) ? true : false);
            if (wasChecked) {
                document.getElementById("quatang").value = "";
            } else {
                document.getElementById("quatang").value = $(this).val();
            }
        });
        var variantsize = false;
        var ww = $(window).width();

        function validate(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
        jQuery(function($) {

            // Add label if only one product option and it isn't 'Title'. Could be 'Size'.

            // Hide selectors if we only have 1 variant and its title contains 'Default'.

            $('.selector-wrapper').hide();

            $('.selector-wrapper').css({
                'text-align': 'left',
                'margin-bottom': '15px'
            });
        });

        jQuery('.swatch :radio').change(function() {
            var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
            var optionValue = jQuery(this).val();
            jQuery(this)
                .closest('form')
                .find('.single-option-selector')
                .eq(optionIndex)
                .val(optionValue)
                .trigger('change');
            $(this).closest('.swatch').find('.header .value-roperties').html(optionValue);
        });
        setTimeout(function() {
            $('.swatch .swatch-element').each(function() {
                $(this).closest('.swatch').find('.header .value-roperties').html($(this).closest('.swatch')
                    .find('input:checked').val());
            });
        }, 500);
    </script>
    <script>
        function activeTab(obj) {
            $('.product-tab ul li').removeClass('active');
            $(obj).addClass('active');
            var id = $(obj).attr('data-tab');
            $('.tab-content').removeClass('active');
            $(id).addClass('active');
        }
        $('.product-tab ul li').click(function() {
            activeTab(this);
            return false;
        });
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 4,
            slidesPerView: 10,
            freeMode: true,
            lazy: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            hashNavigation: true,
            slideToClickedSlide: true,
            breakpoints: {
                260: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                300: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                330: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                    direction: 'vertical'
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                    direction: 'vertical'
                },
                1199: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                    direction: 'vertical'
                },
            },
            navigation: {
                nextEl: '.gallery-thumbs .swiper-button-next',
                prevEl: '.gallery-thumbs .swiper-button-prev',
            },
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 0,
            lazy: true,
            hashNavigation: true,
            thumbs: {
                swiper: galleryThumbs
            }
        });
        // $(document).ready(function() {
        //     $("#lightgallery").lightGallery({
        //         thumbnail: false
        //     });
        // });
    </script>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.countdown-content').each(function() {
                const $container = $(this);
                const key = 'countdown_end_time'; // localStorage key
                const timeStr = $container.data('time'); // "HH:MM:SS"
                const timeParts = timeStr.split(':').map(Number);
                const cycleSeconds = timeParts[0] * 3600 + timeParts[1] * 60 + timeParts[2];

                function setNewEndTime() {
                    const newEnd = Date.now() + cycleSeconds * 1000;
                    localStorage.setItem(key, newEnd);
                    return newEnd;
                }

                // Lấy endTime từ localStorage hoặc khởi tạo mới
                let endTime = parseInt(localStorage.getItem(key), 10);
                if (!endTime || isNaN(endTime) || endTime <= Date.now()) {
                    endTime = setNewEndTime();
                }

                function updateDisplay(secondsLeft) {
                    const hrs = String(Math.floor(secondsLeft / 3600)).padStart(2, '0');
                    const mins = String(Math.floor((secondsLeft % 3600) / 60)).padStart(2, '0');
                    const secs = String(secondsLeft % 60).padStart(2, '0');

                    const $numbers = $container.find('.countdown-item-number');
                    $numbers.eq(0).text(hrs);
                    $numbers.eq(1).text(mins);
                    $numbers.eq(2).text(secs);
                }

                updateDisplay(Math.floor((endTime - Date.now()) / 1000)); // Hiển thị ban đầu

                setInterval(function() {
                    const now = Date.now();
                    let remainingSeconds = Math.floor((endTime - now) / 1000);

                    if (remainingSeconds <= 0) {
                        endTime = setNewEndTime(); // Reset lại thời gian mới
                        remainingSeconds = cycleSeconds;
                    }

                    updateDisplay(remainingSeconds);
                }, 1000);
            });
        });

        // Plus number quantiy product detail
        var plusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal)) {
                    jQuery('input[name="quantity"]').val(currentVal + 1);
                } else {
                    jQuery('input[name="quantity"]').val(1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        // Minus number quantiy product detail
        var minusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    jQuery('input[name="quantity"]').val(currentVal - 1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        app.controller('ProductDetailController', function($scope, $http, $interval, cartItemSync, $rootScope, $compile) {
            $scope.product = @json($product);
            $scope.form = {
                quantity: 1
            };

            $scope.selectedAttributes = [];
            jQuery('.product-attribute-values .badge').click(function() {
                if (!jQuery(this).hasClass('active')) {
                    jQuery(this).parent().find('.badge').removeClass('active');
                    jQuery(this).addClass('active');
                    if ($scope.selectedAttributes.length > 0 && $scope.selectedAttributes.find(item => item
                            .index == jQuery(this).data('index'))) {
                        $scope.selectedAttributes.find(item => item.index == jQuery(this).data('index'))
                            .value = jQuery(this).data('value');
                    } else {
                        let index = jQuery(this).data('index');
                        $scope.selectedAttributes.push({
                            index: index,
                            name: jQuery(this).data('name'),
                            value: jQuery(this).data('value'),
                        });
                    }
                } else {
                    jQuery(this).parent().find('.badge').removeClass('active');
                    jQuery(this).removeClass('active');
                    $scope.selectedAttributes = $scope.selectedAttributes.filter(item => item.index !=
                        jQuery(this).data('index'));
                }
                $scope.$apply();
            });

            $scope.addToCartFromProductDetail = function() {
                let quantity = $('.input_number_product input[name="quantity"]').val();

                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity)
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thao tác thành công !')
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.addToCartCheckoutFromProductDetail = function() {
                let quantity = $('.input_number_product input[name="quantity"]').val();
                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity)
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thao tác thành công !')
                            window.location.href = "{{ route('cart.checkout') }}";
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }
        });
    </script>
@endpush
