<header class="header" ng-cloak>
    <div class="top-header">
        <div class="top-hea">
            <div class="top-content">
                @if ($config->text_top_header)
                    @foreach (explode("\n", $config->text_top_header) as $key => $text)
                        <div class="top-item">{{ $text }}</div>
                        @if ($key < count(explode("\n", $config->text_top_header)) - 1)
                            <div class="separator"></div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="top-content-mobile swiper-container">
                <div class="swiper-wrapper">
                    @if ($config->text_top_header)
                        @foreach (explode("\n", $config->text_top_header) as $text)
                            <div class="swiper-slide">
                                <div class="top-item">{{ $text }}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12 col-12 header-logo">
                    <button class="menu-icon" aria-label="Menu" id="btn-menu-mobile" title="Menu">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line y1="4.5" x2="24" y2="4.5" stroke="#fff"></line>
                            <line y1="11.5" x2="24" y2="11.5" stroke="#fff"></line>
                            <line y1="19.5" x2="24" y2="19.5" stroke="#fff"></line>
                        </svg>
                    </button>
                    <a href="{{ route('front.home-page') }}" class="logo-wrapper" title="{{ $config->web_title }}"><img
                            class="lazyload" width="206" height="82"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="{{ $config->image ? $config->image->path : 'http://placehold.co/206x82' }}"
                            alt="{{ $config->web_title }}" /></a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="list-top-item header_tim_kiem">
                        <form action="{{ route('front.search') }}" method="get"
                            class="header-search-form input-group search-bar" role="search">
                            <div class="box-search">
                                <input type="text" name="query" required id="live-search"
                                    class="input-group-field auto-search search-auto form-control"
                                    placeholder="Bạn muốn tìm gì?" autocomplete="off">
                                <button type="submit" class="btn icon-fallback-text" aria-label="Tìm kiếm"
                                    title="Tìm kiếm">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.1404 13.4673L19.852 19.1789C20.3008 19.6276 19.6276 20.3008 19.1789 19.852L13.4673 14.1404C12.0381 15.4114 10.1552 16.1835 8.09176 16.1835C3.6225 16.1835 0 12.5613 0 8.09176C0 3.6225 3.62219 0 8.09176 0C12.561 0 16.1835 3.62219 16.1835 8.09176C16.1835 10.1551 15.4115 12.038 14.1404 13.4673ZM0.951972 8.09176C0.951972 12.0356 4.14824 15.2316 8.09176 15.2316C12.0356 15.2316 15.2316 12.0353 15.2316 8.09176C15.2316 4.14797 12.0353 0.951972 8.09176 0.951972C4.14797 0.951972 0.951972 4.14824 0.951972 8.09176Z"
                                            fill="#222"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="search-suggest live-search-results">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 box-right">
                    <div class="box-icon-right">
                        {{-- <div class="box-maps">
                            <div class="icon_maps">
                                <img width="64" height="64"
                                    src="/site/images/maps_page_icon.png"
                                    alt="Hệ thống cửa hàng">
                            </div>
                            <div class="content_maps">
                                <a href="/he-thong-cua-hang" title="Hệ thống cửa hàng">Hệ thống cửa hàng</a>
                            </div>
                        </div>
                        <div class="box-tap-chi">
                            <div class="icon_tap_chi">
                                <img width="64" height="64"
                                    src="/site/images/tapchi_page_icon.png"
                                    alt="Tạp chí làm đẹp">
                            </div>
                            <div class="content_tap_chi">
                                <a href="/tin-tuc" title="Tạp chí làm đẹp">Tạp chí làm đẹp</a>
                            </div>
                        </div> --}}
                        <div class="box-maps">
                            <div class="icon_maps">
                                <img width="64" height="64"
                                    src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/tcdh_page_icon.png?1749877282061"
                                    alt="Tra cứu đơn hàng">
                            </div>
                            <div class="content_maps">
                                <a href="{{ route('front.user-order') }}" title="Tra cứu đơn hàng">Tra cứu đơn hàng</a>
                            </div>
                        </div>
                        <div class="box-tap-chi">
                            <div class="icon_tap_chi">
                                <img width="64" height="64"
                                    src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/ttht_page_icon.png?1749877282061"
                                    alt="Trung tâm hỗ trợ">
                            </div>
                            <div class="content_tap_chi">
                                <a href="{{ route('front.contact-us') }}" title="Trung tâm hỗ trợ">Trung tâm hỗ trợ</a>
                            </div>
                        </div>
                        <div class="box-menu">
                            <div class="icon_menu">
                                <svg class="svgopen" width="22" height="4" viewBox="0 0 22 4" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="2" cy="2" r="2" fill="black"></circle>
                                    <circle cx="11" cy="2" r="2" fill="black"></circle>
                                    <circle cx="20" cy="2" r="2" fill="black"></circle>
                                </svg>
                                <svg class="svgclose" width="10" height="10" viewBox="0 0 18 18"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.2453 9L17.5302 2.71516C17.8285 2.41741 17.9962 2.01336 17.9966 1.59191C17.997 1.17045 17.8299 0.76611 17.5322 0.467833C17.2344 0.169555 16.8304 0.00177586 16.4089 0.00140366C15.9875 0.00103146 15.5831 0.168097 15.2848 0.465848L9 6.75069L2.71516 0.465848C2.41688 0.167571 2.01233 0 1.5905 0C1.16868 0 0.764125 0.167571 0.465848 0.465848C0.167571 0.764125 0 1.16868 0 1.5905C0 2.01233 0.167571 2.41688 0.465848 2.71516L6.75069 9L0.465848 15.2848C0.167571 15.5831 0 15.9877 0 16.4095C0 16.8313 0.167571 17.2359 0.465848 17.5342C0.764125 17.8324 1.16868 18 1.5905 18C2.01233 18 2.41688 17.8324 2.71516 17.5342L9 11.2493L15.2848 17.5342C15.5831 17.8324 15.9877 18 16.4095 18C16.8313 18 17.2359 17.8324 17.5342 17.5342C17.8324 17.2359 18 16.8313 18 16.4095C18 15.9877 17.8324 15.5831 17.5342 15.2848L11.2453 9Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <div class="box_item_menu">
                                <ul class="ant-dropdown-menu">
                                    <li>
                                        <span class="anticon">
                                            <img width="64" height="64"
                                                src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/skst_page_icon.png?1749877282061"
                                                alt="Đăng ký CTV">
                                        </span>
                                        <a href="javascript:void(0)" title="Đăng ký CTV">
                                            Đăng ký CTV
                                        </a>
                                    </li>
                                    @if (Auth::guard('client')->check())
                                    <li>
                                        <span class="anticon">
                                            <img width="64" height="64"
                                                src="/site/images/icon-logout.png"
                                                alt="Đăng xuất">
                                        </span>
                                        <a href="{{ route('front.logout-client') }}" title="Đăng xuất">
                                            Đăng xuất
                                        </a>
                                    </li>
                                    @endif
                                    {{-- <li>
                                        <span class="anticon">
                                            <img width="64" height="64"
                                                src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/ttht_page_icon.png?1749877282061"
                                                alt="Trung tâm hỗ trợ">
                                        </span>
                                        <a href="/lien-he" title="Trung tâm hỗ trợ">
                                            Trung tâm hỗ trợ
                                        </a>
                                    </li>
                                    <li>
                                        <span class="anticon">
                                            <img width="64" height="64"
                                                src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/tcdh_page_icon.png?1749877282061"
                                                alt="Tra cứu đơn hàng">
                                        </span>
                                        <a href="/apps/kiem-tra-don-hang" title="Tra cứu đơn hàng">
                                            Tra cứu đơn hàng
                                        </a>
                                    </li>
                                    <li>
                                        <span class="anticon">
                                            <img width="64" height="64"
                                                src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/skst_page_icon.png?1749877282061"
                                                alt="Đăng ký CTV">
                                        </span>
                                        <a href="/apps/affiliate-v2" title="Đăng ký CTV">
                                            Đăng ký CTV
                                        </a>
                                    </li>
                                    <li>
                                        <span class="anticon">
                                            <img width="64" height="64"
                                                src="//bizweb.dktcdn.net/100/495/928/themes/921279/assets/kstd_page_icon.png?1749877282061"
                                                alt="Khảo sát tiêu dùng">
                                        </span>
                                        <a href="/khao-sat-ve-tieu-dung-my-pham" title="Khảo sát tiêu dùng">
                                            Khảo sát tiêu dùng
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="ant-divider-vertical"></div>
                        <div class="box-account">
                            @if (!Auth::guard('client')->check())
                                <div class="icon_maps">
                                    <svg width="24" height="24" viewBox="0 0 29 29" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.5 0C6.50896 0 0 6.50896 0 14.5C0 22.491 6.50896 29 14.5 29C22.491 29 29 22.491 29 14.5C29 6.50896 22.5063 0 14.5 0ZM14.5 1.06955C21.9104 1.06955 27.9305 7.08957 27.9305 14.5C27.9305 17.7392 26.7845 20.7034 24.8746 23.0258C24.3093 21.1006 23.148 19.3588 21.4979 18.0448C20.2908 17.0669 18.8699 16.3641 17.3419 15.9821C19.2366 14.9737 20.52 12.9721 20.52 10.6802C20.52 7.36459 17.8156 4.66017 14.5 4.66017C11.1844 4.66017 8.47998 7.33404 8.47998 10.6649C8.47998 12.9568 9.76344 14.9584 11.6581 15.9668C10.1301 16.3488 8.70917 17.0516 7.50211 18.0295C5.86723 19.3435 4.69073 21.0854 4.12539 23.0105C2.21549 20.6881 1.06955 17.7239 1.06955 14.4847C1.08483 7.08957 7.10485 1.06955 14.5 1.06955ZM14.5 15.6154C11.765 15.6154 9.54952 13.3999 9.54952 10.6649C9.54952 7.92993 11.765 5.71444 14.5 5.71444C17.235 5.71444 19.4505 7.92993 19.4505 10.6649C19.4505 13.3999 17.235 15.6154 14.5 15.6154ZM14.5 27.9152C10.7871 27.9152 7.42571 26.4025 4.99631 23.9578C5.40885 21.9868 6.52423 20.1839 8.17439 18.8546C9.9315 17.4489 12.1776 16.6697 14.5 16.6697C16.8224 16.6697 19.0685 17.4489 20.8256 18.8546C22.4758 20.1839 23.5911 21.9868 24.0037 23.9578C21.5743 26.4025 18.2129 27.9152 14.5 27.9152Z"
                                            fill="black"></path>
                                    </svg>
                                </div>
                                <div class="content_account">
                                    <a href="{{ route('front.login-client') }}" title="Đăng nhập">Đăng nhập</a>
                                </div>
                            @else
                                <div class="icon_maps">
                                    <img src="{{ Auth::guard('client')->user()->image_avatar }}" alt="avatar"
                                        width="26" height="26" style="border-radius: 50%;">
                                </div>
                                <div class="content_account">
                                    <a href="javascript:void(0)"
                                        title="{{ Auth::guard('client')->user()->name }}">{{ Auth::guard('client')->user()->name }}</a>
                                </div>
                            @endif
                        </div>
                        <div class="header-action_cart">
                            <a href="{{ route('cart.checkout') }}" class="cart-header" title="Giỏ hàng">
                                <svg width="24" height="24" viewBox="0 0 33 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.5923 27.9999H4.30586C3.28215 27.9999 2.38467 27.255 2.17432 26.2236L0.0427557 15.4655C-0.0834545 14.8065 0.0708127 14.1476 0.491513 13.6176C0.89819 13.1019 1.51522 12.801 2.17432 12.801H24.7239C25.383 12.801 25.986 13.1019 26.4067 13.6176C26.8133 14.1333 26.9816 14.8065 26.8554 15.4655L24.7239 26.2236C24.5135 27.255 23.616 27.9999 22.5923 27.9999ZM2.17432 13.8038C1.82373 13.8038 1.48717 13.9614 1.24878 14.2479C1.01038 14.5344 0.940254 14.8925 1.01037 15.2506L3.14193 26.0087C3.25412 26.5674 3.74492 26.9828 4.30586 26.9828H22.5923C23.1532 26.9828 23.6441 26.5674 23.7563 26.0087L25.8878 15.2506C25.9579 14.8925 25.8738 14.52 25.6494 14.2479C25.425 13.9757 25.0885 13.8038 24.7239 13.8038H2.17432Z"
                                        fill="black"></path>
                                    <path d="M25.7905 17.5427H1.10938V18.5455H25.7905V17.5427Z" fill="black">
                                    </path>
                                    <path d="M24.8924 22.27H1.99219V23.2728H24.8924V22.27Z" fill="black"></path>
                                    <path
                                        d="M22.7062 11.4545H21.7245C21.7245 6.79889 18.0083 3.00275 13.4507 3.00275C8.89314 3.00275 5.17695 6.79889 5.17695 11.4545H4.19531C4.19531 6.24021 8.34623 2 13.4507 2C18.5553 2 22.7062 6.24021 22.7062 11.4545Z"
                                        fill="black"></path>
                                </svg>
                                <span class="count_item count_item_pr" ng-if="cart.count > 0"><% cart.count %></span>
                            </a>
                            <div class="top-cart-content">
                                <div class="CartHeaderContainer">
                                    <form class="cart ajaxcart cartheader" ng-if="cart.count > 0">
                                        <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">
                                            <div class="ajaxcart__row" ng-repeat="item in cart.items">
                                                <div class="ajaxcart__product cart_product" data-line="1">
                                                    <a ng-href="/san-pham/<% item.attributes.slug %>.html"
                                                        class="ajaxcart__product-image cart_image"
                                                        title="<% item.name %>">
                                                        <img width="80" height="80"
                                                            ng-src="<% item.attributes.image %>"
                                                            alt="<% item.name %>">
                                                    </a>
                                                    <div class="grid__item cart_info">
                                                        <div class="ajaxcart__product-name-wrapper cart_name">
                                                            <a ng-href="/san-pham/<% item.attributes.slug %>.html"
                                                                class="ajaxcart__product-name h4"
                                                                title="<% item.name %>"><% item.name %></a>
                                                            <div class="cart_attribute">
                                                                <div ng-repeat="attribute in item.attributes.attributes"
                                                                    style="line-height: 1;">
                                                                    <span class="cart_attribute_name"
                                                                        style="margin-left: 8px; font-weight: 600; font-size: 14px;"><% attribute.name %>
                                                                        :</span>
                                                                    <span class="cart_attribute_value"
                                                                        style="font-size: 14px;"><% attribute.value %></span>
                                                                </div>
                                                            </div>
                                                            <a title="Xóa"
                                                                class="cart__btn-remove remove-item-cart ajaxifyCart--remove"
                                                                href="javascript:;" data-line="1"
                                                                ng-click='removeItem(item.id)'></a>
                                                        </div>
                                                        <div class="grid">
                                                            <div
                                                                class="grid__item one-half cart_select cart_item_name">
                                                                <div class="ajaxcart__qty input-group-btn">
                                                                    <button type="button"
                                                                        class="ajaxcart__qty-adjust ajaxcart__qty--minus items-count"
                                                                        data-id="" data-qty="1" data-line="1"
                                                                        aria-label="-"
                                                                        ng-click="decrementQuantity(item); changeQty(item.quantity, item.id)">
                                                                        -
                                                                    </button>
                                                                    <input type="text" name=""
                                                                        class="ajaxcart__qty-num number-sidebar"
                                                                        maxlength="3" ng-model="item.quantity"
                                                                        value="<%item.quantity%>" min="0"
                                                                        data-id="" data-line="1"
                                                                        aria-label="quantity" pattern="[0-9]*"
                                                                        ng-change="changeQty(item.quantity, item.id)">
                                                                    <button type="button"
                                                                        class="ajaxcart__qty-adjust ajaxcart__qty--plus items-count"
                                                                        data-id="" data-line="1" data-qty="3"
                                                                        aria-label="+"
                                                                        ng-click="incrementQuantity(item); changeQty(item.quantity, item.id)">
                                                                        +
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="grid__item one-half text-right cart_prices">
                                                                <span
                                                                    class="cart-price"><% item.price | number %>₫</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer"
                                            ng-if="cart.count > 0">
                                            <div class="ajaxcart__subtotal">
                                                <div class="cart__subtotal">
                                                    <div class="cart__col-6">Tổng tiền:</div>
                                                    <div class="text-right cart__totle"><span
                                                            class="total-price"><% cart.total | number %>₫</span></div>
                                                </div>
                                            </div>
                                            <div class="cart__btn-proceed-checkout-dt ">
                                                <button onclick="location.href='{{ route('cart.checkout') }}'"
                                                    type="button"
                                                    class="button btn btn-default cart__btn-proceed-checkout"
                                                    id="btn-proceed-checkout" title="Xem giỏ hàng">Xem giỏ
                                                    hàng</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="cart--empty-message" ng-if="!cart.items || cart.count == 0">
                                        <img width="32" height="32"
                                            src="/site/images/no-cart.png?1677998172667">
                                        <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box-catelory">
            <div class="row align-items-center">
                <div class="col-lg-12 header-mid">
                    <div class="navigation-horizontal">
                        <nav class="header-nav">
                            <div class="title_menu">
                                <span class="title_">Danh mục sản phẩm</span>
                            </div>
                            <ul id="nav" class="nav">
                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }} ">
                                    <a class="nav-link" href="{{ route('front.home-page') }}" title="Trang chủ">
                                        Trang chủ
                                    </a>
                                </li>
                                <li class="nav-item has-childs  {{ Route::is('front.about-us') ? 'active' : '' }}">
                                    <a href="{{ route('front.about-us') }}" class="nav-link" title="Về chúng tôi">
                                        Về chúng tôi
                                        <i class="dropcon"></i></a>
                                    <i class="open_mnu down_icon"></i>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item-lv2">
                                            <a class="nav-link" href="{{ route('front.about-us') }}" title="Giới thiệu">Giới thiệu</a>
                                        </li>
                                        <li class="nav-item-lv2">
                                            <a class="nav-link" href="{{ route('front.about-us') }}" title="Tầm nhìn">Tầm nhìn</a>
                                        </li>
                                        <li class="nav-item-lv2">
                                            <a class="nav-link" href="{{ route('front.about-us') }}" title="Sứ mệnh">Sứ mệnh</a>
                                        </li>
                                        <li class="nav-item-lv2">
                                            <a class="nav-link" href="{{ route('front.about-us') }}" title="Giá trị cốt lõi">Giá trị cốt lõi</a>
                                        </li>
                                        <li class="nav-item-lv2">
                                            <a class="nav-link" href="{{ route('front.about-us') }}" title="Vùng nguyên liệu">Vùng nguyên liệu</a>
                                        </li>
                                    </ul>
                                </li>
                                @foreach ($productCategories as $category)
                                    <li class="nav-item has-childs has-mega ">
                                        <a href="{{ route('front.show-product-category', $category->slug) }}"
                                            class="nav-link" title="{{ $category->name }}">
                                            {{ $category->name }}
                                            @if ($category->childs->count() > 0)
                                                <i class="dropcon"></i>
                                            @endif
                                        </a>
                                        @if ($category->childs->count() > 0)
                                            <i class="open_mnu down_icon"></i>
                                            <div class="mega-content">
                                                <div class="row">
                                                    <div class="mega-menu-list col-lg-9">
                                                        <ul class="level0">
                                                            @foreach ($category->childs as $child)
                                                                <li class="level1 parent item fix-navs">
                                                                    <a class="hmega"
                                                                        href="{{ route('front.show-product-category', $child->slug) }}"
                                                                        title="{{ $child->name }}">{{ $child->name }}</a>
                                                                    @if ($child->childs->count() > 0)
                                                                        <ul class="level1">
                                                                            @foreach ($child->childs as $child2)
                                                                                <li class="level2">
                                                                                    <a href="{{ route('front.show-product-category', ['slug' => $child2->slug]) }}"
                                                                                        title="{{ $child2->name }}">{{ $child2->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3 mega-banner">
                                                        <a href="{{ route('front.show-product-category', $category->slug) }}"
                                                            title="{{ $category->name }}" class="banner-effect">
                                                            <img width="311" height="358"
                                                                src="{{ $category->image ? $category->image->path : 'http://placehold.co/311x358' }}"
                                                                data-src="{{ $category->image ? $category->image->path : 'http://placehold.co/311x358' }}"
                                                                alt="{{ $category->name }}"
                                                                class="lazyload img-responsive mx-auto d-block loaded"
                                                                data-was-processed="true">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu mega-drop">
                                                @foreach ($category->childs as $child)
                                                    <li class="dropdown-submenu nav-item-lv2 has-childs2">
                                                        <a class="nav-link"
                                                            href="{{ route('front.show-product-category', $child->slug) }}"
                                                            title="{{ $child->name }}">{{ $child->name }} <i
                                                                class="dropcon"></i></a>
                                                        @if ($child->childs->count() > 0)
                                                            <i class="open_mnu down_icon"></i>
                                                            <ul class="dropdown-menu">
                                                                @foreach ($child->childs as $child2)
                                                                    <li class="nav-item-lv3">
                                                                        <a class="nav-link"
                                                                            href="{{ route('front.show-product-category', ['slug' => $child2->slug]) }}"
                                                                            title="{{ $child2->name }}">{{ $child2->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                @foreach ($postCategories as $category)
                                    <li class="nav-item has-childs  ">
                                        <a href="{{ route('front.list-blog', $category->slug) }}" class="nav-link"
                                            title="{{ $category->name }}">
                                            {{ $category->name }}
                                            @if ($category->childs->count() > 0)
                                                <i class="dropcon"></i>
                                            @endif
                                        </a>
                                        @if ($category->childs->count() > 0)
                                            <i class="open_mnu down_icon"></i>
                                            <ul class="dropdown-menu">
                                                @foreach ($category->childs as $child)
                                                    <li class="dropdown-submenu nav-item-lv2 has-childs2">
                                                        <a class="nav-link"
                                                            href="{{ route('front.list-blog', $child->slug) }}"
                                                            title="{{ $child->name }}">{{ $child->name }}
                                                            @if ($child->childs->count() > 0)
                                                                <i class="dropcon"></i>
                                                            @endif
                                                        </a>
                                                        @if ($child->childs->count() > 0)
                                                            <i class="open_mnu down_icon"></i>
                                                            <ul class="dropdown-menu">
                                                                @foreach ($child->childs as $child2)
                                                                    <li class="nav-item-lv3">
                                                                        <a class="nav-link"
                                                                            href="{{ route('front.list-blog', $child2->slug) }}"
                                                                            title="{{ $child2->name }}">{{ $child2->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                {{-- <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('front.contact-us') }}" title="Liên hệ">
                                        Liên hệ
                                    </a>
                                </li> --}}
                            </ul>
                            <div class="line_box"></div>
                            <div class="box-account li_box_mobile ">
                                @if (!Auth::guard('client')->check())
                                    <div class="icon_maps">
                                        <svg width="24" height="24" viewBox="0 0 29 29" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.5 0C6.50896 0 0 6.50896 0 14.5C0 22.491 6.50896 29 14.5 29C22.491 29 29 22.491 29 14.5C29 6.50896 22.5063 0 14.5 0ZM14.5 1.06955C21.9104 1.06955 27.9305 7.08957 27.9305 14.5C27.9305 17.7392 26.7845 20.7034 24.8746 23.0258C24.3093 21.1006 23.148 19.3588 21.4979 18.0448C20.2908 17.0669 18.8699 16.3641 17.3419 15.9821C19.2366 14.9737 20.52 12.9721 20.52 10.6802C20.52 7.36459 17.8156 4.66017 14.5 4.66017C11.1844 4.66017 8.47998 7.33404 8.47998 10.6649C8.47998 12.9568 9.76344 14.9584 11.6581 15.9668C10.1301 16.3488 8.70917 17.0516 7.50211 18.0295C5.86723 19.3435 4.69073 21.0854 4.12539 23.0105C2.21549 20.6881 1.06955 17.7239 1.06955 14.4847C1.08483 7.08957 7.10485 1.06955 14.5 1.06955ZM14.5 15.6154C11.765 15.6154 9.54952 13.3999 9.54952 10.6649C9.54952 7.92993 11.765 5.71444 14.5 5.71444C17.235 5.71444 19.4505 7.92993 19.4505 10.6649C19.4505 13.3999 17.235 15.6154 14.5 15.6154ZM14.5 27.9152C10.7871 27.9152 7.42571 26.4025 4.99631 23.9578C5.40885 21.9868 6.52423 20.1839 8.17439 18.8546C9.9315 17.4489 12.1776 16.6697 14.5 16.6697C16.8224 16.6697 19.0685 17.4489 20.8256 18.8546C22.4758 20.1839 23.5911 21.9868 24.0037 23.9578C21.5743 26.4025 18.2129 27.9152 14.5 27.9152Z"
                                                fill="black"></path>
                                        </svg>
                                    </div>
                                    <div class="content_account">
                                        <a href="{{ route('front.login-client') }}" title="Đăng nhập">Đăng nhập</a>
                                    </div>
                                @else
                                    <div class="icon_maps">
                                        <img src="{{ Auth::guard('client')->user()->image_avatar }}" alt="avatar"
                                            width="24" height="24">
                                    </div>
                                    <div class="content_account">
                                        <a href="javascript:void(0)"
                                            title="{{ Auth::guard('client')->user()->name }}">{{ Auth::guard('client')->user()->name }}</a>
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="box-account li_box_mobile">
                                <div class="icon_maps">
                                    <svg width="27" height="24" viewBox="0 0 30 29" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M30 9.70911C30 8.13337 28.1141 2.75357 27.0365 1.24149C26.4818 0.461581 25.5784 0 24.6117 0H5.38827C4.42155 0 3.51823 0.461581 2.96355 1.24149C1.8859 2.75357 0 8.13337 0 9.70911C0 10.8551 0.459588 11.9215 1.26783 12.7173C1.34707 12.7969 1.42631 12.8606 1.50555 12.9402V25.0527C1.50555 27.2173 3.24881 28.9682 5.40412 28.9682L14.9921 28.9841V27.8699H10.8558V20.3732C10.8558 19.4023 11.6482 18.6065 12.6149 18.6065H17.3534C18.3201 18.6065 19.1125 19.4023 19.1125 20.3732V29L24.5642 28.9841C26.7195 28.9841 28.4628 27.2333 28.4628 25.0686V12.9402C28.542 12.8765 28.6212 12.7969 28.7005 12.7173C29.5404 11.9215 30 10.8551 30 9.70911ZM22.7734 1.11416H24.6117C25.2139 1.11416 25.7845 1.40066 26.1331 1.89407C27.1632 3.32656 28.8906 8.4517 28.8906 9.70911C28.8906 10.5527 28.5578 11.3326 27.9556 11.9215C27.3534 12.5104 26.561 12.8128 25.7211 12.781C24.1046 12.7173 22.7734 11.3008 22.7734 9.62953V1.11416ZM21.664 9.70911C21.664 11.3963 20.2853 12.781 18.6054 12.781C16.9255 12.781 15.5468 11.3963 15.5468 9.70911V1.11416H21.664V9.62953C21.664 9.66136 21.664 9.67728 21.664 9.70911ZM8.33597 1.11416H14.4532V9.70911C14.4532 11.3963 13.0745 12.781 11.3946 12.781C9.71474 12.781 8.33597 11.3963 8.33597 9.70911C8.33597 9.67728 8.33597 9.64545 8.33597 9.62953V1.11416ZM1.10935 9.70911C1.10935 8.43579 2.83677 3.32656 3.86688 1.89407C4.21553 1.40066 4.78605 1.11416 5.38827 1.11416H7.22662V9.62953C7.22662 11.3167 5.91125 12.7333 4.27892 12.781C3.43899 12.8128 2.64659 12.5104 2.04437 11.9215C1.44216 11.3326 1.10935 10.5527 1.10935 9.70911ZM27.3693 25.0527C27.3693 26.5966 26.1173 27.854 24.58 27.854L20.2377 27.8699V20.3573C20.2377 18.7656 18.954 17.4764 17.3693 17.4764H12.6307C11.046 17.4764 9.76228 18.7656 9.76228 20.3573V27.854H5.41997C3.88273 27.854 2.63074 26.5966 2.63074 25.0527V13.5928C3.15372 13.7997 3.72425 13.9111 4.32647 13.8793C5.78447 13.8315 7.06815 12.972 7.76545 11.7464C8.47861 13.0198 9.84152 13.8793 11.3946 13.8793C12.9319 13.8793 14.2789 13.0357 15.0079 11.7783C15.7211 13.0357 17.084 13.8793 18.6212 13.8793C20.1743 13.8793 21.5372 13.0198 22.2504 11.7464C22.9477 12.972 24.2314 13.8156 25.6894 13.8793C25.7369 13.8793 25.7845 13.8793 25.8479 13.8793C26.3867 13.8793 26.8938 13.7838 27.3851 13.5928V25.0527H27.3693Z"
                                            fill="black"></path>
                                    </svg>
                                </div>
                                <div class="content_account">
                                    <a href="/he-thong-cua-hang" title="Hệ thống cửa hàng">Hệ thống cửa hàng</a>
                                </div>
                            </div> --}}
                            <div class="box-account li_box_mobile">
                                <div class="icon_maps">
                                    <svg width="29" height="24" viewBox="0 0 29 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.2908 18.1931C24.971 18.1931 24.6513 18.0652 24.3955 17.8094L22.605 16.0509H14.2919C12.7252 16.0509 11.4463 14.772 11.4463 13.2053V6.33098C11.4463 4.76429 12.7252 3.48535 14.2919 3.48535H26.154C27.7207 3.48535 28.9997 4.76429 28.9997 6.33098V13.1733C28.9997 14.5801 27.9765 15.7631 26.6017 15.9869V16.8822C26.6017 17.4257 26.2819 17.8734 25.8023 18.0652C25.6425 18.1611 25.4826 18.1931 25.2908 18.1931ZM14.2599 4.41258C13.2048 4.41258 12.3415 5.27586 12.3415 6.33098V13.1733C12.3415 14.2284 13.2048 15.0917 14.2599 15.0917H22.9567L25.035 17.138C25.1948 17.2979 25.3867 17.2339 25.4506 17.2019C25.5146 17.17 25.6744 17.074 25.6744 16.8502V15.0597H26.1221C27.1772 15.0597 28.0405 14.1964 28.0405 13.1413V6.33098C28.0405 5.27586 27.1772 4.41258 26.1221 4.41258H14.2599Z"
                                            fill="black"></path>
                                        <path
                                            d="M8.21618 7.41801C8.21618 6.61868 8.63184 6.26697 9.01552 5.97921C9.36722 5.72343 9.65498 5.49961 9.65498 4.98804C9.65498 4.44449 9.23933 4.09278 8.72776 4.09278C8.21618 4.09278 7.76855 4.41252 7.73658 4.95606H6.90527C6.93725 3.837 7.80053 3.26147 8.72776 3.26147C9.68696 3.26147 10.5502 3.90094 10.5502 4.98804C10.5502 5.78737 10.1346 6.13908 9.7509 6.42684C9.43117 6.68263 9.11144 6.93841 9.11144 7.41801V7.57788H8.21618V7.41801ZM8.18421 8.18538H9.17538V9.20852H8.18421V8.18538Z"
                                            fill="black"></path>
                                        <path
                                            d="M18.3209 10.4552C18.6917 10.4552 18.9923 10.1546 18.9923 9.78375C18.9923 9.41292 18.6917 9.1123 18.3209 9.1123C17.95 9.1123 17.6494 9.41292 17.6494 9.78375C17.6494 10.1546 17.95 10.4552 18.3209 10.4552Z"
                                            fill="black"></path>
                                        <path
                                            d="M20.2076 10.4554C20.5784 10.4554 20.879 10.1548 20.879 9.78399C20.879 9.41316 20.5784 9.11255 20.2076 9.11255C19.8367 9.11255 19.5361 9.41316 19.5361 9.78399C19.5361 10.1548 19.8367 10.4554 20.2076 10.4554Z"
                                            fill="black"></path>
                                        <path
                                            d="M22.0933 10.4554C22.4641 10.4554 22.7648 10.1548 22.7648 9.78399C22.7648 9.41316 22.4641 9.11255 22.0933 9.11255C21.7225 9.11255 21.4219 9.41316 21.4219 9.78399C21.4219 10.1548 21.7225 10.4554 22.0933 10.4554Z"
                                            fill="black"></path>
                                        <path
                                            d="M3.70891 14.7078C3.54905 14.7078 3.3572 14.6758 3.19734 14.6118C2.71774 14.42 2.398 13.9404 2.398 13.4288V12.5336C1.05512 12.3098 0 11.1267 0 9.71991V2.84563C0 1.27894 1.27894 0 2.84563 0H14.7078C16.2745 0 17.5534 1.27894 17.5534 2.84563V3.93273H16.6262V2.84563C16.6262 1.79051 15.7629 0.927229 14.7078 0.927229H2.8776C1.82248 0.927229 0.959201 1.79051 0.959201 2.84563V9.68793C0.959201 10.7431 1.82248 11.6063 2.8776 11.6063H3.32523V13.3968C3.32523 13.6207 3.4851 13.7166 3.54905 13.7486C3.61299 13.7805 3.80483 13.8445 3.9647 13.6846L6.04297 11.6383H11.8941V12.5655H6.42665L4.60417 14.356C4.34838 14.5799 4.02865 14.7078 3.70891 14.7078Z"
                                            fill="black"></path>
                                    </svg>
                                </div>
                                <div class="content_account">
                                    <a href="{{ route('front.contact-us') }}" title="Trung tâm hỗ trợ">
                                        Trung tâm hỗ trợ
                                    </a>
                                </div>
                            </div>
                            <div class="box-account li_box_mobile">
                                <div class="icon_maps">
                                    <svg width="29" height="24" viewBox="0 0 29 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M29 8.4062C29 3.78434 25.4769 0 21.1094 0C18.8966 0 16.8876 0.961594 15.4608 2.54357C15.0532 2.35746 14.5873 2.2644 14.1506 2.2644H3.40663C1.51406 2.2644 0 3.90842 0 5.89365V17.4018C0 19.387 1.51406 21 3.37751 21H14.1797C16.0432 21 17.5572 19.387 17.5572 17.4018V15.9129C18.6345 16.5022 19.8283 16.8124 21.1094 16.8124C22.4197 16.8124 23.6717 16.4712 24.749 15.8508L27.4859 20.7518L28.243 20.2866L25.506 15.3855C27.6315 13.8656 29 11.322 29 8.4062ZM10.8022 3.19498V9.52289C10.8022 9.89513 10.511 10.2053 10.1616 10.2053H7.39558C7.04619 10.2053 6.75502 9.89513 6.75502 9.52289V3.19498H10.8022ZM16.7129 17.4018C16.7129 18.8907 15.5773 20.0694 14.2088 20.0694H3.37751C1.97992 20.0694 0.873494 18.8597 0.873494 17.4018V5.89365C0.873494 4.40473 2.00904 3.226 3.37751 3.226H5.88153V9.55392C5.88153 10.4535 6.5512 11.1669 7.39558 11.1669H10.1616C11.006 11.1669 11.6757 10.4535 11.6757 9.55392V3.226H14.1797C14.4127 3.226 14.6456 3.25702 14.8785 3.35008C13.8594 4.77696 13.248 6.54505 13.248 8.43722C13.248 11.322 14.6165 13.8656 16.7129 15.3855V17.4018ZM14.1215 8.4062C14.1215 4.28065 17.2661 0.930576 21.1386 0.930576C25.011 0.930576 28.1556 4.28065 28.1556 8.4062C28.1556 12.5318 25.011 15.8818 21.1386 15.8818C17.2661 15.8818 14.1215 12.5318 14.1215 8.4062Z"
                                            fill="black"></path>
                                        <path d="M24.6034 5.95569H17.6446V6.88626H24.6034V5.95569Z" fill="black">
                                        </path>
                                        <path d="M24.6034 9.92615H17.6446V10.8567H24.6034V9.92615Z" fill="black">
                                        </path>
                                    </svg>
                                </div>
                                <div class="content_account">
                                    <a href="{{ route('front.user-order') }}" title="Tra cứu đơn hàng">Tra cứu đơn
                                        hàng</a>
                                </div>
                            </div>
                            <div class="box-account li_box_mobile">
                                <div class="icon_maps">
                                    <svg width="24" height="24" viewBox="0 0 53 53" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M26.0214 0C11.6603 0 0 11.6603 0 26.0214C0 40.3825 11.6603 52.0429 26.0214 52.0429C40.3825 52.0429 52.0429 40.3825 52.0429 26.0214C52.0429 11.6603 40.3397 0 26.0214 0ZM10.3743 27.8219H15.0899C15.4757 27.8219 15.8186 28.122 15.8186 28.5507V28.8508C15.8186 29.2366 15.5186 29.5796 15.0899 29.5796H10.3743C9.98846 29.5796 9.64551 29.2795 9.64551 28.8508V28.5507C9.64551 28.122 9.98846 27.8219 10.3743 27.8219ZM14.1896 26.7502H11.2317V25.4213H14.1896V26.7502ZM14.7469 24.3495H10.6744C10.0313 23.7494 9.64551 22.9349 9.64551 22.0775C9.64551 20.4056 11.0173 18.9909 12.7321 18.9909C14.4468 18.9909 15.8186 20.3627 15.8186 22.0775C15.7758 22.9349 15.4328 23.7494 14.7469 24.3495ZM11.2317 30.6084H14.1896V47.756C13.1608 47.1987 12.1748 46.5557 11.2317 45.8697V30.6084ZM15.2613 48.2704V30.5655C15.8186 30.5227 16.2902 30.1797 16.5903 29.7082C17.7906 30.8228 20.6628 32.7519 25.9786 32.7519C31.2943 32.7519 34.1665 30.8228 35.3669 29.7082C35.6669 30.1797 36.1385 30.4798 36.6958 30.5655V48.2704C33.4378 49.8566 29.7939 50.7139 25.9786 50.7139C22.1632 50.7139 18.5194 49.8566 15.2613 48.2704ZM36.953 27.8219H41.6686C42.0544 27.8219 42.3974 28.122 42.3974 28.5507V28.8508C42.3974 29.2366 42.0973 29.5796 41.6686 29.5796H36.953C36.5672 29.5796 36.2242 29.2795 36.2242 28.8508V28.5507C36.2242 28.122 36.5243 27.8219 36.953 27.8219ZM40.7683 26.7502H37.8104V25.4213H40.7683V26.7502ZM41.3256 24.3495H37.2531C36.6101 23.7494 36.2242 22.9349 36.2242 22.0775C36.2242 20.4056 37.596 18.9909 39.3108 18.9909C41.0256 18.9909 42.3974 20.3627 42.3974 22.0775C42.3545 22.9349 41.9687 23.7494 41.3256 24.3495ZM37.8104 30.6084H40.7683V45.8269C39.8252 46.5128 38.8392 47.1558 37.8104 47.7131V30.6084ZM41.8401 44.9695V30.5655C42.7403 30.4798 43.4262 29.7082 43.4262 28.8079V28.5078C43.4262 27.6076 42.7403 26.8359 41.8401 26.7502V25.2927C42.8261 24.521 43.4262 23.3207 43.4262 22.0346C43.4262 19.7626 41.5829 17.8763 39.2679 17.8763C36.953 17.8763 35.1525 19.7626 35.1525 22.0346C35.1525 23.3207 35.7527 24.521 36.7387 25.2927V26.7502C35.8813 26.8359 35.1954 27.5647 35.1525 28.465C34.6381 29.0651 32.0231 31.6801 26.0214 31.6801C20.0198 31.6801 17.3619 29.0651 16.8904 28.465C16.8475 27.5647 16.1616 26.8359 15.3042 26.7502V25.2927C16.2902 24.521 16.8904 23.3207 16.8904 22.0346C16.8904 19.7626 15.047 17.8763 12.7321 17.8763C10.4171 17.8763 8.57378 19.7626 8.57378 22.0346C8.57378 23.3207 9.17395 24.521 10.1599 25.2927V26.7502C9.25969 26.8359 8.57378 27.6076 8.57378 28.5078V28.8079C8.57378 29.7082 9.25969 30.4798 10.1599 30.5655V44.9695C4.75845 40.4254 1.28607 33.6092 1.28607 26.0214C1.28607 12.3891 12.3891 1.28607 26.0214 1.28607C39.6538 1.28607 50.7568 12.3891 50.7568 26.0214C50.7139 33.6092 47.2844 40.4254 41.8401 44.9695Z"
                                            fill="black"></path>
                                    </svg>
                                </div>
                                <div class="content_account">
                                    <a href="javascript:void(0)" title="Đăng ký CTV">Đăng ký CTV</a>
                                </div>
                            </div>
                        </nav>
                        <div class="control-menu">
                            <a href="#" id="prev">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="#fff"
                                        d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                                </svg>
                            </a>
                            <a href="#" id="next">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="#fff"
                                        d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    var swipertop = new Swiper('.top-content-mobile', {
        spaceBetween: 0,
        lazy: true,
        autoplay: {
            delay: 3000,
        },
        loop: true,
    });
</script>
