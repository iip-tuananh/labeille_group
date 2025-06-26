@extends('site.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $short_des }}
@endsection
@section('css')
    <link href="{{ asset('site/css/breadcrumb_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/style_page.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/sidebar_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/collection_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')
    <div class="layout-collection" ng-controller="ProductCategoryController">
        <div class="container">
            <div class="section_3_banner">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a class="three_banner" href="javascript:void(0)" title="{{ $title }}">
                            <img width="1920" height="364" class="lazyload"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABJIAAACWBAMAAAB3Hb8pAAAAG1BMVEXMzMyWlpacnJyqqqrFxcWxsbGjo6O3t7e+vr6He3KoAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAGCElEQVR4nO3dy2/bNgDHcerhx9F0l3RHK03XHONtHXaUF7fbMc6Aoke7LZAe7axId4w7oPu3x5celunEQ2bEC78foJIcWoIK/EBSpCQLAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAkEbSt1l59e7wx+0PUUrfZO/z+5wX/m8WsrHZkoVe8el0u0NM7G5Pi+0nuzlj7KehbGyuJmmmNw63O8SwSlLbbE13c8rYR6mUjc2VJLkP51sdYlYlyVZPBzs8ceyZpEpS4knSUvY//ZrJb7c6RJWkrpQvxldS3uzwzLFX0mGZpGIz/WxNdPdopluo9q3NW3WI7MDs+KnYY0bzForu77oaaW46w76pW3LTfOVbHELIb4q/Ls3mqPoDHrfEtEbNTaurm7TEXn8NN3eUavulposu7A6npoyOUiBuS1KswxDbHtJSDrY4RLf6VmZ6SF3Z/89PGXvptiRNdIs2suGIy2YqM5VNrbmr7dcpx51SF6Fsc6uIRyUdj8dF01Rt2s+mZVrYcCR2tNH8QWeqXTVbtf1aZRvYcYOSQznf6fljn9TiU09SYmqjiQ1Hq0xObDKylMeeQyRlborvT24fiMKjsiFJSxMLV6l0yomPrhkjmq3WNW6/try5zr7TJUUdtrhrngWPyIYkDU1PZ2bHFrvVgJIeI+o0etJuv1h+UV2m/lxnyg5lLhlQCog/SamtVbIiSWV0RiokcWPM2+0XyWKKJC6TNNjRWWP/+JNku0nFxVdaJSlR1dOiUdW4/UZukmVeXuuNSFJA/Eka2b6yLJJUn+adZ435NFe6lPJt+lWqFEVlknoCofAnaWIjVM6D1EueN288cqULeWKWT1SSbIIikhQQf5KyJyt/qZXEUjan01zpxFRVLVWPkaQQeZPUcZfx662bKlq7XcmV/vanWWVyTusWIm+S2i4C6z1uPQ7QnE1bvYdgIk/pcYfIm6SRuzpbHwXQHevmDP9qktSlP6MAIfImaeEGsddHJvW4d/O+t9UkqYqIkckQeZM0c5P4a7MlZr6kOS+7miTVzWa2JES+JKVFtbM2g2ufGhlsPIQwSWIGN0S+JBWXbkWl0i7vKtEt1rtmR2mtdSvqsBl3lQTEl6R2MWK0dqeb7oT/Lfu55xCtoxPzaSGn3OkWIl+Syqv39btvO6rhyxqNlt2vqMj0Td/cfRsgX5LKa67yiYCy56yztWwMcrunm1znSt/BVDwRwPPcAfElqewprz+lNFEhazcS4vazFVGiKyKeUgqQL0mzcrK/+eRkqmucbuPh2nLe7dgsD3hyMki+JFV1UPNp7sQXker+pLfjr2aMgKe5A+RJUm2arfmGiaUJ1ag2KlDtV7xQ4EbwhokQeZJUnxxpvPVm5rrSKxdlq2+YMPUXb70JjydJ9SHtZOVNXLYHbm6c9BzCfPcwN9tD3sSFVWezO98OWHr1rv/+xm6mP0neDggAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAO4tcv+A+yFJ+Ddkf9M7WRtJ6qlPkZRS9IWIe8L+VvBZdinEa/lBRAMhst2eKfZbL/1hQ4knSWZ5eCOuXZLS5/lfajG+yKOPojPb/dlif/XEL+L7ZyLOO2qjdXQqooueXiVHE1UaXTwT7bkqqSXp6VRcuiQl53bROo2uRXvxkP8PPDSVpNaH1+fJfCT+EG/GL0X0wazejHUVE6mi7kC8FLUk9U66A5ekOLeLdBDFN1/oVAVNtW5xng66pxfzn8Wxqn2i3KyOxUiVRqpIXKp/+scQ9M8h6CRdt+cuSVGx6EWd6SVJCprqcZuqZnAyHei06GDoVa/oJ/XEl0T/vEZVJ8VXYr1OEi8GJCloPR0FXfFMP06F/o06lQe9qtVJ8YX7oktS60Cs95PE5JwkBU0lQveTxMX86lxc52c6LnpV9ZNE56n7okuS+WCWtWs3weBT4HQi1LWbWOajXHSyE50Hvaqu3URn4L5YT5JtAc9kMZ4kSBLu0p7f/R3gblcPfQJ4HKKThz4DAAAAAACwn/4ByLvPrpIItisAAAAASUVORK5CYII="
                                data-src="{{ $category->banner ? $category->banner->path : 'http://placehold.co/1920x364' }}"
                                alt="{{ $title }}" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <section class="bread-crumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="home">
                        <a href="{{ route('front.home-page') }}" title="Trang chủ"><span>Trang chủ</span></a>
                        <span class="mr_lr">
                            &nbsp;
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="svg-inline--fa fa-chevron-right fa-w-10">
                                <path fill="currentColor"
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                    class=""></path>
                            </svg>
                            &nbsp;
                        </span>
                    </li>
                    <li><strong><span>{{ $title }}</span></strong></li>
                </ul>
            </div>
        </section>
        <div class="container">
            <h1 class="title-page">{{ $title }}</h1>
            <div class="row">
                {{-- <aside class="dqdt-sidebar sidebar col-lg-2 col-12">
                    <div class="section-box-bg">
                        <div class="filter-content">
                            <div class="filter-container">
                                <div class="filter-container__selected-filter" style="display: none;">
                                    <div class="filter-container__selected-filter-header clearfix">
                                        <span class="filter-container__selected-filter-header-title"><i
                                                class="fa fa-arrow-left hidden-sm-up"></i> Bạn chọn</span>
                                        <a href="javascript:void(0)" onclick="clearAllFiltered()"
                                            class="filter-container__clear-all">
                                            Bỏ hết
                                            <i class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10"
                                                    height="10" x="0" y="0" viewBox="0 0 365.696 365.696"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path xmlns="http://www.w3.org/2000/svg"
                                                            d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0"
                                                            fill="#ffffff" data-original="#000000" style=""
                                                            class=""></path>
                                                    </g>
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                    <div class="filter-container__selected-filter-list">
                                        <ul></ul>
                                    </div>
                                </div>
                                <!-- Lọc Thương hiệu -->
                                <aside class="aside-item filter-vendor f-left">
                                    <div class="aside-title">
                                        <h2 class="title-filter title-head margin-top-0"><span>Thương hiệu</span></h2>
                                    </div>
                                    <div class="aside-content margin-top-0 filter-group">
                                        <ul>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-aha">
                                                    <input type="checkbox" id="filter-aha" data-group="Hãng"
                                                        data-field="vendor" data-text="AHA" value="(AHA)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    AHA
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-sensitive-skin">
                                                    <input type="checkbox" id="filter-sensitive-skin" data-group="Hãng"
                                                        data-field="vendor" data-text="Sensitive Skin"
                                                        value="(Sensitive Skin)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Sensitive Skin
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-bonne">
                                                    <input type="checkbox" id="filter-bonne" data-group="Hãng"
                                                        data-field="vendor" data-text="Bonne" value="(Bonne)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Bonne
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-skin-aqua">
                                                    <input type="checkbox" id="filter-skin-aqua" data-group="Hãng"
                                                        data-field="vendor" data-text="Skin Aqua" value="(Skin Aqua)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Skin Aqua
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-l-oreal">
                                                    <input type="checkbox" id="filter-l-oreal" data-group="Hãng"
                                                        data-field="vendor" data-text="L'Oreal" value="(L'Oreal)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    L'Oreal
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-paula-s">
                                                    <input type="checkbox" id="filter-paula-s" data-group="Hãng"
                                                        data-field="vendor" data-text="Paula's" value="(Paula's)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Paula's
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-dove">
                                                    <input type="checkbox" id="filter-dove" data-group="Hãng"
                                                        data-field="vendor" data-text="Dove" value="(Dove)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Dove
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-kehl-s">
                                                    <input type="checkbox" id="filter-kehl-s" data-group="Hãng"
                                                        data-field="vendor" data-text="Kehl's" value="(Kehl's)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Kehl's
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-kiehl-s">
                                                    <input type="checkbox" id="filter-kiehl-s" data-group="Hãng"
                                                        data-field="vendor" data-text="Kiehl's" value="(Kiehl's)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Kiehl's
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-senka">
                                                    <input type="checkbox" id="filter-senka" data-group="Hãng"
                                                        data-field="vendor" data-text="Senka" value="(Senka)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Senka
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-hatomugi">
                                                    <input type="checkbox" id="filter-hatomugi" data-group="Hãng"
                                                        data-field="vendor" data-text="Hatomugi" value="(Hatomugi)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Hatomugi
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-eucerin">
                                                    <input type="checkbox" id="filter-eucerin" data-group="Hãng"
                                                        data-field="vendor" data-text="Eucerin" value="(Eucerin)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Eucerin
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-simple">
                                                    <input type="checkbox" id="filter-simple" data-group="Hãng"
                                                        data-field="vendor" data-text="Simple" value="(Simple)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Simple
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-svr">
                                                    <input type="checkbox" id="filter-svr" data-group="Hãng"
                                                        data-field="vendor" data-text="SVR" value="(SVR)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    SVR
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-cerave">
                                                    <input type="checkbox" id="filter-cerave" data-group="Hãng"
                                                        data-field="vendor" data-text="CeraVe" value="(CeraVe)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    CeraVe
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-cosrx">
                                                    <input type="checkbox" id="filter-cosrx" data-group="Hãng"
                                                        data-field="vendor" data-text="Cosrx" value="(Cosrx)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Cosrx
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-roche-posay">
                                                    <input type="checkbox" id="filter-roche-posay" data-group="Hãng"
                                                        data-field="vendor" data-text="Roche-Posay" value="(Roche-Posay)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Roche-Posay
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-garnier">
                                                    <input type="checkbox" id="filter-garnier" data-group="Hãng"
                                                        data-field="vendor" data-text="Garnier" value="(Garnier)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Garnier
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-klairs">
                                                    <input type="checkbox" id="filter-klairs" data-group="Hãng"
                                                        data-field="vendor" data-text="Klairs" value="(Klairs)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Klairs
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-centella">
                                                    <input type="checkbox" id="filter-centella" data-group="Hãng"
                                                        data-field="vendor" data-text="Centella" value="(Centella)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Centella
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-cocoon">
                                                    <input type="checkbox" id="filter-cocoon" data-group="Hãng"
                                                        data-field="vendor" data-text="Cocoon" value="(Cocoon)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Cocoon
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-gilaa">
                                                    <input type="checkbox" id="filter-gilaa" data-group="Hãng"
                                                        data-field="vendor" data-text="Gilaa" value="(Gilaa)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Gilaa
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-silkygirl">
                                                    <input type="checkbox" id="filter-silkygirl" data-group="Hãng"
                                                        data-field="vendor" data-text="Silkygirl" value="(Silkygirl)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Silkygirl
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-aprilskin">
                                                    <input type="checkbox" id="filter-aprilskin" data-group="Hãng"
                                                        data-field="vendor" data-text="Aprilskin" value="(Aprilskin)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Aprilskin
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-laneige">
                                                    <input type="checkbox" id="filter-laneige" data-group="Hãng"
                                                        data-field="vendor" data-text="Laneige" value="(Laneige)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Laneige
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-maybelline">
                                                    <input type="checkbox" id="filter-maybelline" data-group="Hãng"
                                                        data-field="vendor" data-text="Maybelline" value="(Maybelline)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Maybelline
                                                </label>
                                            </li>
                                            <li class="filter-item-toggle cursor-pointer">
                                                Xem thêm <i class="fas"><img width="10" height="5"
                                                        alt=""
                                                        src="https://bizweb.dktcdn.net/100/423/358/themes/914990/assets/ico-select.png?1692521760471" /></i>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- End Lọc Thương hiệu -->
                                <!-- Lọc Loại -->
                                <aside class="aside-item aside-itemxx filter-type">
                                    <div class="aside-title">
                                        <h2 class="title-filter title-head margin-top-0"><span>Loại sản phẩm</span></h2>
                                    </div>
                                    <div class="aside-content filter-group">
                                        <ul>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-tay-da-chet">
                                                    <input type="checkbox" id="filter-tay-da-chet"
                                                        data-group="PRODUCT_TYPE" data-field="product_type.filter_key"
                                                        data-text="" value="(&#34;Tẩy Da Chết&#34;)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Tẩy Da Chết
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-tay-da-che">
                                                    <input type="checkbox" id="filter-tay-da-che"
                                                        data-group="PRODUCT_TYPE" data-field="product_type.filter_key"
                                                        data-text="" value="(&#34;Tẩy Da Chế&#34;)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Tẩy Da Chế
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-toner">
                                                    <input type="checkbox" id="filter-toner" data-group="PRODUCT_TYPE"
                                                        data-field="product_type.filter_key" data-text=""
                                                        value="(&#34;Toner&#34;)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Toner
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-sua-rua-mat">
                                                    <input type="checkbox" id="filter-sua-rua-mat"
                                                        data-group="PRODUCT_TYPE" data-field="product_type.filter_key"
                                                        data-text="" value="(&#34;Sữa rửa mặt&#34;)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Sữa rửa mặt
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-gel-rua-mat">
                                                    <input type="checkbox" id="filter-gel-rua-mat"
                                                        data-group="PRODUCT_TYPE" data-field="product_type.filter_key"
                                                        data-text="" value="(&#34;Gel Rửa Mặt&#34;)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Gel Rửa Mặt
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-nuoc-hoa-hong">
                                                    <input type="checkbox" id="filter-nuoc-hoa-hong"
                                                        data-group="PRODUCT_TYPE" data-field="product_type.filter_key"
                                                        data-text="" value="(&#34;Nước Hoa Hồng&#34;)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Nước Hoa Hồng
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-nuoc-tay-trang">
                                                    <input type="checkbox" id="filter-nuoc-tay-trang"
                                                        data-group="PRODUCT_TYPE" data-field="product_type.filter_key"
                                                        data-text="" value="(&#34;Nước Tẩy Trang&#34;)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Nước Tẩy Trang
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-xit-khoa-makeup">
                                                    <input type="checkbox" id="filter-xit-khoa-makeup"
                                                        data-group="PRODUCT_TYPE" data-field="product_type.filter_key"
                                                        data-text="" value="(&#34;Xịt Khoá Makeup&#34;)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Xịt Khoá Makeup
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-sieu-phan-nuoc">
                                                    <input type="checkbox" id="filter-sieu-phan-nuoc"
                                                        data-group="PRODUCT_TYPE" data-field="product_type.filter_key"
                                                        data-text="" value="(&#34;Siêu Phấn Nước&#34;)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Siêu Phấn Nước
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-phan-phu">
                                                    <input type="checkbox" id="filter-phan-phu" data-group="PRODUCT_TYPE"
                                                        data-field="product_type.filter_key" data-text=""
                                                        value="(&#34;Phấn Phủ&#34;)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Phấn Phủ
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-phan-nuoc">
                                                    <input type="checkbox" id="filter-phan-nuoc"
                                                        data-group="PRODUCT_TYPE" data-field="product_type.filter_key"
                                                        data-text="" value="(&#34;Phấn Nước&#34;)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Phấn Nước
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-kem-che-khuyet-diem">
                                                    <input type="checkbox" id="filter-kem-che-khuyet-diem"
                                                        data-group="PRODUCT_TYPE" data-field="product_type.filter_key"
                                                        data-text="" value="(&#34;Kem Che Khuyết Điểm&#34;)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Kem Che Khuyết Điểm
                                                </label>
                                            </li>
                                            <li
                                                class="filter-item filter-item--check-box filter-item--green  overflow-item ">
                                                <label for="filter-kem-nen">
                                                    <input type="checkbox" id="filter-kem-nen" data-group="PRODUCT_TYPE"
                                                        data-field="product_type.filter_key" data-text=""
                                                        value="(&#34;Kem Nền&#34;)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Kem Nền
                                                </label>
                                            </li>
                                            <li class="filter-item-toggle cursor-pointer">
                                                Xem thêm <i class="fas"><img width="10" height="5"
                                                        alt=""
                                                        src="https://bizweb.dktcdn.net/100/423/358/themes/914990/assets/ico-select.png?1692521760471" /></i>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- End Lọc Loại -->
                                <!-- Lọc giá -->
                                <aside class="aside-item filter-price">
                                    <div class="aside-title">
                                        <h2><span>Chọn mức giá</span></h2>
                                    </div>
                                    <div class="aside-content filter-group content_price">
                                        <ul>
                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label data-filter="100-000d" for="filter-duoi-100-000d">
                                                    <input type="checkbox" id="filter-duoi-100-000d"
                                                        data-group="Khoảng giá" data-field="price_min"
                                                        data-text="Dưới 100.000đ" value="(<100000)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Dưới 100.000đ
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label data-filter="300-000d" for="filter-100-000d-300-000d">
                                                    <input type="checkbox" id="filter-100-000d-300-000d"
                                                        data-group="Khoảng giá" data-field="price_min"
                                                        data-text="100.000đ - 300.000đ" value="(>=100000 AND <=300000)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Từ 100.000đ - 300.000đ
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label data-filter="500-000d" for="filter-300-000d-500-000d">
                                                    <input type="checkbox" id="filter-300-000d-500-000d"
                                                        data-group="Khoảng giá" data-field="price_min"
                                                        data-text="300.000đ - 500.000đ" value="(>=300000 AND <=500000)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Từ 300.000đ - 500.000đ
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label data-filter="700-000d" for="filter-500-000d-700-000d">
                                                    <input type="checkbox" id="filter-500-000d-700-000d"
                                                        data-group="Khoảng giá" data-field="price_min"
                                                        data-text="500.000đ - 700.000đ" value="(>=500000 AND <=700000)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Từ 500.000đ - 700.000đ
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green">
                                                <label data-filter="700-000d" for="filter-tren700-000d">
                                                    <input type="checkbox" id="filter-tren700-000d"
                                                        data-group="Khoảng giá" data-field="price_min"
                                                        data-text="Trên 700.000đ" value="(>700000)" data-operator="OR">
                                                    <i class="fa"></i>
                                                    Trên 700.000đ
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- End Lọc giá -->
                                <!-- Lọc tag 1 -->
                                <!-- End lọc tag 1 -->
                                <!-- Lọc tag 2 -->
                                <aside class="aside-item filter-tag">
                                    <div class="aside-title">
                                        <h2 class="title-head margin-top-0">
                                            <span>Loại da</span>
                                        </h2>
                                    </div>
                                    <div class="aside-content filter-group">
                                        <ul>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-da-dau">
                                                    <input type="checkbox" id="filter-da-dau" data-group="tag2"
                                                        data-field="tags" data-text="Da dầu" value="(Da dầu)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Da dầu
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-da-kho">
                                                    <input type="checkbox" id="filter-da-kho" data-group="tag2"
                                                        data-field="tags" data-text="Da khô" value="(Da khô)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Da khô
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-da-nhay-cam">
                                                    <input type="checkbox" id="filter-da-nhay-cam" data-group="tag2"
                                                        data-field="tags" data-text="Da nhạy cảm" value="(Da nhạy cảm)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Da nhạy cảm
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-da-thuong">
                                                    <input type="checkbox" id="filter-da-thuong" data-group="tag2"
                                                        data-field="tags" data-text="Da thường" value="(Da thường)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Da thường
                                                </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-item--green ">
                                                <label for="filter-da-hon-hop">
                                                    <input type="checkbox" id="filter-da-hon-hop" data-group="tag2"
                                                        data-field="tags" data-text="Da hỗn hợp" value="(Da hỗn hợp)"
                                                        data-operator="OR">
                                                    <i class="fa"></i>
                                                    Da hỗn hợp
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- End lọc tag 2 -->
                            </div>
                        </div>
                    </div>
                </aside> --}}
                <div class="block-collection col-lg-12 col-12">
                    <div class="section-box-bg">
                        <div class="category-products">
                            {{-- <div id="open-filters" class="open-filters d-lg-none d-xl-none">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z">
                                        </path>
                                    </svg>
                                    Bộ lọc
                                </span>
                            </div> --}}
                            <div id="sort-by">
                                <label class="left">Sắp xếp: </label>
                                <ul id="sortBy">
                                    <li>
                                        <span>Mặc định</span>
                                        <ul>
                                            <li><a href="javascript:;" onclick="sortby('default')" title="Mặc định">Mặc
                                                    định</a></li>
                                            <li><a href="javascript:;" onclick="sortby('alpha-asc')" title="A &rarr; Z">A
                                                    &rarr; Z</a></li>
                                            <li><a href="javascript:;" onclick="sortby('alpha-desc')" title="Z &rarr; A">Z
                                                    &rarr; A</a></li>
                                            <li><a href="javascript:;" onclick="sortby('price-asc')"
                                                    title="Giá tăng dần">Giá tăng dần</a></li>
                                            <li><a href="javascript:;" onclick="sortby('price-desc')"
                                                    title="Giá giảm dần">Giá giảm dần</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix clear-fix"></div>
                            <div class="products-view products-view-grid list_hover_pro">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-6 col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                            @include('site.products.product_item', ['product' => $product])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pagenav">
                                <nav class="collection-paginate clearfix relative nav_pagi w_100">
                                    {{ $products->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="opacity_sidebar"></div>
@endsection

@push('script')
    <script>
        app.controller('ProductCategoryController', function($scope, $http) {
            $scope.category = @json($category ?? null);
            $scope.filter_sort = 'asc';
            $scope.filterSort = function(sort) {
                $scope.filter_sort = sort;
                $scope.filter();
            }

            $scope.filter_price = [];

            $scope.priceRanges = [{
                    id: 'price13',
                    value: '0:200000',
                    label: 'Dưới 200k',
                    checked: false
                },
                {
                    id: 'price14',
                    value: '200000:350000',
                    label: 'Từ 200k đến 350k',
                    checked: false
                },
                {
                    id: 'price15',
                    value: '350000:500000',
                    label: 'Từ 350k đến 500k',
                    checked: false
                },
                {
                    id: 'price16',
                    value: '500000:800000',
                    label: 'Từ 500k đến 800k',
                    checked: false
                },
                {
                    id: 'price17',
                    value: '800000:1000000',
                    label: 'Từ 800k đến 1 triệu',
                    checked: false
                },
                {
                    id: 'price18',
                    value: '1000000:100000000',
                    label: 'Trên 1 triệu',
                    checked: false
                }
            ];

            $scope.onChangeFilterPrice = function() {
                $scope.filter_price = $scope.priceRanges
                    .filter(function(item) {
                        return item.checked;
                    })
                    .map(function(item) {
                        return item.value;
                    });

                $scope.filter();
            };

            $scope.filter = function() {
                $.ajax({
                    url: '{{ route('front.filter-product') }}',
                    type: 'GET',
                    data: {
                        sort: $scope.filter_sort,
                        category: $scope.category.id,
                        cate_slug: $scope.category.slug,
                        price: $scope.filter_price
                    },
                    success: function(response) {
                        $('#product-list').html(response.html);
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    complete: function() {}
                });
            }

            $scope.filterCategory = function(slug) {
                url = '{{ route('front.show-product-category', ['categorySlug' => ':categorySlug']) }}'
                    .replace(
                        ':categorySlug', slug);
                window.location.href = url;
            }
        });
    </script>
@endpush
