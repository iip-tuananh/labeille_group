@extends('site.layouts.master')
@section('title')
    {{ $config->meta_title ?? $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image ? $banners[0]->image->path : 'http://placehold.co/911x364') }}
@endsection
@section('css')
    <style>
        .gradient-icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            font-size: 24px;
            border-radius: 6px;
            background: linear-gradient(270deg, #00AEEF 0%, #06a3e480 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
@endsection
@section('content')
    <section class="section_slider container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-12">
                <div class="slide-swiper swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($banners as $banner)
                            <div class="swiper-slide">
                                <a href="{{ $banner->link }}" class="a_tow_slide" title="{{ $banner->title }}">
                                    <picture>
                                        <source media="(min-width: 1200px)"
                                            srcset="{{ $banner->image ? $banner->image->path : 'http://placehold.co/1200x480' }}">
                                        <source media="(min-width: 992px)"
                                            srcset="{{ $banner->image ? $banner->image->path : 'http://placehold.co/1200x480' }}">
                                        <source media="(min-width: 569px)"
                                            srcset="{{ $banner->image ? $banner->image->path : 'http://placehold.co/1200x480' }}">
                                        <source media="(min-width: 480px)"
                                            srcset="{{ $banner->image ? $banner->image->path : 'http://placehold.co/1200x480' }}">
                                        <source media="(max-width: 480px)"
                                            srcset="{{ $banner->image ? $banner->image->path : 'http://placehold.co/1200x480' }}">
                                        <img width="911" height="364"
                                            src="{{ $banner->image ? $banner->image->path : 'http://placehold.co/1200x480' }}"
                                            alt="{{ $banner->title }}" class="img-responsive center-block" />
                                    </picture>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-12">
                @foreach ($smallBanners as $smallBanner)
                    <div class="banner_slide">
                        <a class="a_banner a_banner_1" href="{{ $smallBanner->link }}" title="{{ $smallBanner->title }}">
                            <img width="444" height="177"
                                src="{{ $smallBanner->image ? $smallBanner->image->path : 'http://placehold.co/444x177' }}"
                                alt="{{ $smallBanner->title }}" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @foreach ($categorySpecial as $category)
        @if ($category->products->count() > 0)
            <section class="section_product section_product_1 container">
                <h2 class="title-module">
                    <a href="top-ban-chay" title="{{ $category->name }}">{{ $category->name }}</a>
                    <span class="box_title">
                        <img width="280" height="48" src="/site/images/labeille4.png?1749877282061"
                            alt="{{ $category->name }}" />
                    </span>
                </h2>
                <div class="swi_product_one swiper-container">
                    <div class="swiper-wrapper load-after" data-section="section_product_1">
                        @foreach ($category->products as $product)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 swiper-slide item_null">
                                @include('site.products.product_item', [
                                    'product' => $product,
                                ])
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="show-more-pro">
                    <a href="{{ route('front.show-product-category', $category->slug) }}" title="Xem tất cả"
                        class="a-show-more">Xem tất cả</a>
                </div>
            </section>
        @endif
    @endforeach
    <script>
        $(document).ready(function($) {
            function runSwiperProOne() {
                var swi_product_one = null;

                function initSwiperProOne() {
                    swi_product_one = new Swiper('.swi_product_one', {
                        slidesPerView: 4,
                        // spaceBetween: 10,
                        slidesPerGroup: 1,
                        navigation: {
                            nextEl: '.swi_product_one .swiper-button-next',
                            prevEl: '.swi_product_one .swiper-button-prev',
                        },
                        breakpoints: {
                            280: {
                                slidesPerView: 2,
                                // spaceBetween: 10
                            },
                            640: {
                                slidesPerView: 2,
                                // spaceBetween: 10
                            },
                            768: {
                                slidesPerView: 3,
                                // spaceBetween: 10
                            },
                            992: {
                                slidesPerView: 4,
                                // spaceBetween: 10
                            },
                            1024: {
                                slidesPerView: 4,
                                // spaceBetween: 10
                            },
                            1199: {
                                slidesPerView: 4,
                                // spaceBetween: 10
                            }
                        }
                    });
                }

                function destroySwiperProOne() {
                    if (swi_product_one) {
                        swi_product_one.destroy(true, true);
                        swi_product_one = null;
                    }
                }

                function toggleSwiperProOne() {
                    if ($(window).width() <= 767 && swi_product_one) {
                        destroySwiperProOne();
                    } else if ($(window).width() > 767 && !swi_product_one) {
                        initSwiperProOne();
                    }
                }
                toggleSwiperProOne();
                $(window).resize(toggleSwiperProOne);
            }
            lazyBlockProduct('section_product_1', '0px 0px -250px 0px', runSwiperProOne);
        });
    </script>

    <section class="section_3_banner">
        <div class="container">
            <div class="box-about-us grid grid-cols-1 md:grid-cols-[1fr_1fr] items-center">
                <div class="box-about-us-image order-2 md:order-1">
                    <img src="{{ $aboutUs->image ? $aboutUs->image->path : 'http://placehold.co/1188x1018' }}"
                        alt="About Us">
                </div>
                <div class="box-about-us-content order-1 md:order-2">
                    <h2 class="title-module">
                        <span>Chuyện của</span>
                        <a href="{{ route('front.about-us') }}" title="{{ $config->web_title }}"
                            style="color: #2e705e;">{{ $config->web_title }}
                        </a>
                    </h2>
                    <p>
                        {!! $aboutUs->description !!}
                    </p>
                </div>
            </div>
            <style>
                .grid {
                    display: grid;
                }

                .section_3_banner {
                    background: linear-gradient(to top, #fff 50%, #b2d18f 50%);
                }

                .box-about-us {
                    display: grid;
                    gap: 20px;
                    padding-top: 40px;
                }

                .grid-cols-1 {
                    grid-template-columns: repeat(1, minmax(0, 1fr));
                }

                @media (min-width: 768px) {
                    .section_3_banner {
                        background: linear-gradient(to right, #fff 33.333%, #b2d18f 33.333%);
                        /* border-top: 3px solid #b2d18f; */
                    }

                    .md\:grid-cols-\[1fr_1fr\] {
                        grid-template-columns: 1fr 1fr;
                    }

                    .md\:order-1 {
                        order: 1;
                    }

                    .md\:order-2 {
                        order: 2;
                    }

                    .section_3_banner .box_banner_index {
                        padding-top: 20px !important;
                        padding-bottom: 40px !important;
                    }
                }

                .box-about-us-image {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .box-about-us-content {
                    padding: 20px;
                }

                .section_3_banner .box_banner_index {
                    padding-top: 20px;
                    padding-bottom: 0px;
                }
            </style>
            <div class="box_banner_index row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a class="three_banner" href="javascript:void(0)" title="sứ mệnh">
                        <img width="440" height="210" class="lazyload"
                            src="data:image/png;base64,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"
                            data-src="{{ $aboutUs->mission_image ? $aboutUs->mission_image->path : 'http://placehold.co/880x420' }}"
                            alt="sứ mệnh" />
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a class="three_banner" href="javascript:void(0)" title="Tầm nhìn">
                        <img width="440" height="210" class="lazyload"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABJIAAACWBAMAAAB3Hb8pAAAAG1BMVEXMzMyWlpacnJyqqqrFxcWxsbGjo6O3t7e+vr6He3KoAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAGCElEQVR4nO3dy2/bNgDHcerhx9F0l3RHK03XHONtHXaUF7fbMc6Aoke7LZAe7axId4w7oPu3x5celunEQ2bEC78foJIcWoIK/EBSpCQLAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAkEbSt1l59e7wx+0PUUrfZO/z+5wX/m8WsrHZkoVe8el0u0NM7G5Pi+0nuzlj7KehbGyuJmmmNw63O8SwSlLbbE13c8rYR6mUjc2VJLkP51sdYlYlyVZPBzs8ceyZpEpS4knSUvY//ZrJb7c6RJWkrpQvxldS3uzwzLFX0mGZpGIz/WxNdPdopluo9q3NW3WI7MDs+KnYY0bzForu77oaaW46w76pW3LTfOVbHELIb4q/Ls3mqPoDHrfEtEbNTaurm7TEXn8NN3eUavulposu7A6npoyOUiBuS1KswxDbHtJSDrY4RLf6VmZ6SF3Z/89PGXvptiRNdIs2suGIy2YqM5VNrbmr7dcpx51SF6Fsc6uIRyUdj8dF01Rt2s+mZVrYcCR2tNH8QWeqXTVbtf1aZRvYcYOSQznf6fljn9TiU09SYmqjiQ1Hq0xObDKylMeeQyRlborvT24fiMKjsiFJSxMLV6l0yomPrhkjmq3WNW6/try5zr7TJUUdtrhrngWPyIYkDU1PZ2bHFrvVgJIeI+o0etJuv1h+UV2m/lxnyg5lLhlQCog/SamtVbIiSWV0RiokcWPM2+0XyWKKJC6TNNjRWWP/+JNku0nFxVdaJSlR1dOiUdW4/UZukmVeXuuNSFJA/Eka2b6yLJJUn+adZ435NFe6lPJt+lWqFEVlknoCofAnaWIjVM6D1EueN288cqULeWKWT1SSbIIikhQQf5KyJyt/qZXEUjan01zpxFRVLVWPkaQQeZPUcZfx662bKlq7XcmV/vanWWVyTusWIm+S2i4C6z1uPQ7QnE1bvYdgIk/pcYfIm6SRuzpbHwXQHevmDP9qktSlP6MAIfImaeEGsddHJvW4d/O+t9UkqYqIkckQeZM0c5P4a7MlZr6kOS+7miTVzWa2JES+JKVFtbM2g2ufGhlsPIQwSWIGN0S+JBWXbkWl0i7vKtEt1rtmR2mtdSvqsBl3lQTEl6R2MWK0dqeb7oT/Lfu55xCtoxPzaSGn3OkWIl+Syqv39btvO6rhyxqNlt2vqMj0Td/cfRsgX5LKa67yiYCy56yztWwMcrunm1znSt/BVDwRwPPcAfElqewprz+lNFEhazcS4vazFVGiKyKeUgqQL0mzcrK/+eRkqmucbuPh2nLe7dgsD3hyMki+JFV1UPNp7sQXker+pLfjr2aMgKe5A+RJUm2arfmGiaUJ1ag2KlDtV7xQ4EbwhokQeZJUnxxpvPVm5rrSKxdlq2+YMPUXb70JjydJ9SHtZOVNXLYHbm6c9BzCfPcwN9tD3sSFVWezO98OWHr1rv/+xm6mP0neDggAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAO4tcv+A+yFJ+Ddkf9M7WRtJ6qlPkZRS9IWIe8L+VvBZdinEa/lBRAMhst2eKfZbL/1hQ4knSWZ5eCOuXZLS5/lfajG+yKOPojPb/dlif/XEL+L7ZyLOO2qjdXQqooueXiVHE1UaXTwT7bkqqSXp6VRcuiQl53bROo2uRXvxkP8PPDSVpNaH1+fJfCT+EG/GL0X0wazejHUVE6mi7kC8FLUk9U66A5ekOLeLdBDFN1/oVAVNtW5xng66pxfzn8Wxqn2i3KyOxUiVRqpIXKp/+scQ9M8h6CRdt+cuSVGx6EWd6SVJCprqcZuqZnAyHei06GDoVa/oJ/XEl0T/vEZVJ8VXYr1OEi8GJCloPR0FXfFMP06F/o06lQe9qtVJ8YX7oktS60Cs95PE5JwkBU0lQveTxMX86lxc52c6LnpV9ZNE56n7okuS+WCWtWs3weBT4HQi1LWbWOajXHSyE50Hvaqu3URn4L5YT5JtAc9kMZ4kSBLu0p7f/R3gblcPfQJ4HKKThz4DAAAAAACwn/4ByLvPrpIItisAAAAASUVORK5CYII="
                            data-src="{{ $aboutUs->vision_image ? $aboutUs->vision_image->path : 'http://placehold.co/880x420' }}"
                            alt="Tầm nhìn" />
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a class="three_banner" href="javascript:void(0)" title="giá trị cốt lõi">
                        <img width="440" height="210" class="lazyload"
                            src="data:image/png;base64,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"
                            data-src="{{ $aboutUs->core_values_image ? $aboutUs->core_values_image->path : 'http://placehold.co/880x420' }}"
                            alt="giá trị cốt lõi" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section_product section_product_2"
        style="background-image: url({{ $aboutUs->raw_material_area_image ? $aboutUs->raw_material_area_image->path : 'http://placehold.co/1920x760' }})">
        <div class="container">
            <div class="box_product">
                <div class="box_product_2">
                    <h2 class="title-product grid grid-cols-1 md:grid-cols-[1fr_1fr]">
                        <a href="javascript:void(0)" title="Vùng nguyên liệu">Vùng nguyên liệu
                            <img width="92" height="56" src="/site/images/icon_title_2.png"
                                alt="{{ $config->web_title }}" />
                        </a>
                        <div class="swi_product_tow swiper-container">
                            <div class="swiper-wrapper load-after" data-section="section_product_2">
                                @foreach ($aboutUs->galleries as $gallery)
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 swiper-slide item_null">
                                        <div class="three_banner">
                                            <img width="358" height="358" class="lazyload"
                                                src="data:image/png;base64,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"
                                                data-src="{{ $gallery->image ? $gallery->image->path : 'http://placehold.co/358x358' }}"
                                                alt="" style="border: 1px solid #fff"/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </h2>
                    <div style="font-size: 14px">{!! $aboutUs->raw_material_area !!}</div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .section_product_2 .title-product {
            display: grid;
        }
    </style>
    <script>
        $(document).ready(function($) {
            function runSwiperProTow() {
                var swi_product_tow = null;

                function initSwiperProTow() {
                    swi_product_tow = new Swiper('.swi_product_tow', {
                        slidesPerView: 3,
                        // spaceBetween: 10,
                        slidesPerGroup: 1,
                        centeredSlides: true,
                        autoplay: {
                            delay: 2500,
                            disableOnInteraction: false,
                        },
                        loop: true,
                        // pagination: {
                        //     el: '.swi_product_tow .swiper-pagination',
                        //     clickable: true
                        // },
                        breakpoints: {
                            280: {
                                slidesPerView: 2,
                                // spaceBetween: 10
                            },
                            640: {
                                slidesPerView: 2,
                                // spaceBetween: 10
                            },
                            768: {
                                slidesPerView: 3,
                                // spaceBetween: 10
                            },
                            992: {
                                slidesPerView: 3,
                                // spaceBetween: 10
                            },
                            1024: {
                                slidesPerView: 3,
                                // spaceBetween: 10
                            },
                            1199: {
                                slidesPerView: 3,
                                // spaceBetween: 10
                            }
                        }
                    });
                }

                function destroySwiperProTow() {
                    if (swi_product_tow) {
                        swi_product_tow.destroy(true, true);
                        swi_product_tow = null;
                    }
                }

                function toggleSwiperProTow() {
                    if ($(window).width() <= 767 && swi_product_tow) {
                        destroySwiperProTow();
                    } else if ($(window).width() > 767 && !swi_product_tow) {
                        initSwiperProTow();
                    }
                }
                toggleSwiperProTow();
                $(window).resize(toggleSwiperProTow);
            }
            lazyBlockProduct('section_product_2', '0px 0px -250px 0px', runSwiperProTow);
        });
    </script>

    @foreach ($categorySpecialPost as $category)
        <section class="secttion_blog container">
            <div class="tabwrap not-dqtab4 e-tabs ajax-tab-4" data-section="ajax-tab-4">
                <h2 class="title-module">
                    <a href="{{ route('front.list-blog', $category->slug) }}"
                        title="{{ $category->name }}">{{ $category->name }}</a>
                    <span class="box_title">
                        <img width="280" height="48" src="/site/images/labeille4.png"
                            alt="{{ $category->name }}" />
                    </span>
                </h2>
                <div class="twrap navbar-pills tabs tabs-title tabtitle4 link_tab_check_click_4 closetab ajax clearfix">
                    <div class="tab-link item has-content" data-tab="tab-blog-1" data-url="tin-tuc">
                        {{-- <span>Tin tức </span> --}}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="uwrap_tab">
                    <div class="tab-content tab-blog-1">
                        <div class="row">
                            @foreach ($category->posts as $post)
                                <div class="col-lg-3 col-md-3 col-sm-6 ">
                                    <div class="item_blog_index">
                                        <a class="image-blog" href="{{ route('front.detail-blog', $post->slug) }}"
                                            title="{{ $post->name }}">
                                            <img width="800" height="500"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                data-src="{{ $post->image ? $post->image->path : 'http://placehold.co/800x500' }}"
                                                alt="{{ $post->name }}" class="lazyload img-responsive" />
                                            <p class="update_date clearfix">
                                                <span class="day_art">{{ $post->created_at->format('d-m-Y') }}</span>
                                            </p>
                                        </a>
                                        <div class="blog_content">
                                            <h3><a href="{{ route('front.detail-blog', $post->slug) }}"
                                                    title="{{ $post->name }}">{{ $post->name }}</a></h3>
                                            <p class="blog_description">{!! $post->intro !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="show-more-pro">
                            <a href="{{ route('front.list-blog', $category->slug) }}" title="Xem tất cả"
                                class="a-show-more">Xem tất cả</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <section class="section_6_banner">
        <div class="container">
            <h2 class="title-module">
                <a href="javascript:void(0);" title="Đối tác">Đối tác liên kết</a>
                <span class="box_title">
                    <img width="280" height="48" src="/site/images/labeille4.png?1749877282061" alt="Đối tác" />
                </span>
            </h2>
            <div class="box_banner_index partner-list swiper-container">
                <div class="swiper-wrapper load-after" data-section="section_6_banner">
                @foreach ($partners as $partner)
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-xs-12 swiper-slide item_null">
                        <a class="three_banner" href="{{ $partner->link }}" title="{{ $partner->name }}">
                            <img width="260" height="130" class="lazyload"
                                src="data:image/png;base64,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"
                                data-src="{{ $partner->image ? $partner->image->path : 'http://placehold.co/260x130' }}"
                                alt="{{ $partner->name }}" />
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function($) {
            function runSwiperPartner() {
                var swi_partner = null;

                function initSwiperPartner() {
                    swi_partner = new Swiper('.partner-list', {
                        slidesPerView: 3,
                        // spaceBetween: 10,
                        slidesPerGroup: 1,
                        centeredSlides: true,
                        autoplay: {
                            delay: 2500,
                            disableOnInteraction: false,
                        },
                        loop: true,
                        // pagination: {
                        //     el: '.swi_product_tow .swiper-pagination',
                        //     clickable: true
                        // },
                        breakpoints: {
                            280: {
                                slidesPerView: 1,
                                // spaceBetween: 10
                            },
                            640: {
                                slidesPerView: 2,
                                // spaceBetween: 10
                            },
                            768: {
                                slidesPerView: 3,
                                // spaceBetween: 10
                            },
                            992: {
                                slidesPerView: 4,
                                // spaceBetween: 10
                            },
                            1024: {
                                slidesPerView: 5,
                                // spaceBetween: 10
                            },
                            1199: {
                                slidesPerView: 6,
                                // spaceBetween: 10
                            }
                        }
                    });
                }

                function destroySwiperPartner() {
                    if (swi_partner) {
                        swi_partner.destroy(true, true);
                        swi_partner = null;
                    }
                }

                function toggleSwiperPartner() {
                    if ($(window).width() <= 767 && swi_partner) {
                        destroySwiperPartner();
                    } else if ($(window).width() > 767 && !swi_partner) {
                        initSwiperPartner();
                    }
                }
                toggleSwiperPartner();
                $(window).resize(toggleSwiperPartner);
            }
            lazyBlockProduct('section_6_banner', '0px 0px -250px 0px', runSwiperPartner);
        });
    </script>
@endsection
@push('script')
@endpush
