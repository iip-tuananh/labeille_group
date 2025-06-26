@extends('site.layouts.master')
@section('title')
    Liên hệ
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image ? $banners[0]->image->path : 'http://placehold.co/1200x480') }}
@endsection
@section('css')
    <link href="{{ asset('site/css/style_page.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/contact_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/breadcrumb_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')
    <div ng-controller="ContactUsController" ng-cloak>
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
                    <li><strong><span>Liên hệ</span></strong></li>
                </ul>
            </div>
        </section>
        <div class="layout-contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="contact">
                            <h4>Nơi giải đáp toàn bộ mọi thắc mắc của bạn?</h4>
                            <div class="time_work">
                                <div class="item">
                                    <b>Địa chỉ:</b>
                                    {{ $config->address_company }}
                                </div>
                                <div class="item">
                                    <b>Hotline:</b> <a class="fone" href="tel:{{ $config->hotline }}"
                                        title="{{ $config->hotline }}">{{ $config->hotline }}</a>
                                </div>
                                <div class="item">
                                    <b>Email:</b> <a href="mailto:{{ $config->email }}"
                                        title="{{ $config->email }}">{{ $config->email }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-contact">
                            <h4>Liên hệ với chúng tôi</h4>
                            <div id="pagelogin">
                                <form id="contact" accept-charset="UTF-8">
                                    <div class="group_contact">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom: 10px;">
                                                <input placeholder="Họ và tên" type="text" style="margin-bottom: 0;"
                                                    class="form-control  form-control-lg" required value=""
                                                    ng-model="your_name"
                                                    ng-class="{'is-invalid': errors && errors.your_name}">
                                                <div class="invalid-feedback d-block error" role="alert">
                                                    <span ng-if="errors && errors.your_name">
                                                        <% errors.your_name[0] %>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom: 10px;">
                                                <input placeholder="Email" type="email" style="margin-bottom: 0;"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required
                                                    id="email1" class="form-control form-control-lg" value=""
                                                    ng-model="your_email"
                                                    ng-class="{'is-invalid': errors && errors.your_email}">
                                                <div class="invalid-feedback d-block error" role="alert">
                                                    <span ng-if="errors && errors.your_email">
                                                        <% errors.your_email[0] %>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom: 10px;">
                                                <input type="text" placeholder="Điện thoại" style="margin-bottom: 0;"
                                                    class="form-control form-control-lg" required ng-model="your_phone"
                                                    ng-class="{'is-invalid': errors && errors.your_phone}">
                                                <div class="invalid-feedback d-block error" role="alert">
                                                    <span ng-if="errors && errors.your_phone">
                                                        <% errors.your_phone[0] %>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom: 10px;">
                                                <textarea placeholder="Nội dung" id="comment" ng-model="your_message" style="margin-bottom: 10px;"
                                                    class="form-control content-area form-control-lg" rows="5" Required ng-model="your_message"
                                                    ng-class="{'is-invalid': errors && errors.your_message}"></textarea>
                                                <div class="invalid-feedback d-block error" role="alert">
                                                    <span ng-if="errors && errors.your_message">
                                                        <% errors.your_message[0] %>
                                                    </span>
                                                </div>
                                                <button type="submit" class="btn-lienhe" ng-click="submitContact()">Gửi
                                                    thông tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div id="contact_map" class="map">
                            {!! $config->location !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        app.controller('ContactUsController', function($scope, $http) {
            $scope.loading = false;
            $scope.errors = {};
            $scope.submitContact = function() {
                $scope.loading = true;
                let data = {
                    your_name: $scope.your_name,
                    your_email: $scope.your_email,
                    your_phone: $scope.your_phone,
                    your_message: $scope.your_message
                };
                jQuery.ajax({
                    url: '{{ route('front.post-contact') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Thao tác thành công !')
                        } else {
                            $scope.errors = response.errors;
                            toastr.error('Thao tác thất bại !')
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                        $scope.loading = false;
                    }
                });
            };
        });
    </script>
@endpush
