@extends('site.layouts.master')
@section('title')
    {{ $config->meta_title ?? $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image ? $banners[0]->image->path : 'http://placehold.co/1200x480') }}
@endsection
@section('css')
    <link href="/site/css/breadcrumb_style.scss.css?1749877282061" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/account_oder_style.scss.css?1749877282061" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')
    <div ng-controller="LoginClientController" ng-cloak>
        <section class="bread-crumb">
            <div class="container">
                <ul class="breadcrumb" >
                    <li class="home">
                        <a  href="{{route('front.home-page')}}" title="Trang chủ"><span >Trang chủ</span></a>
                        <span class="mr_lr">&nbsp;<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-chevron-right fa-w-10"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" class=""></path></svg>&nbsp;</span>
                    </li>
                    <li><strong ><span><% title %></span></strong></li>
                </ul>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="wrap_background_aside page_login">
                    <div class="row">
                        <div
                            class="col-lg-4 col-md-6 col-sm-12 col-xl-4 offset-0 offset-xl-4 offset-lg-4 offset-md-3 offset-xl-3 col-12">
                            <div class="row" ng-show="formLogin">
                                <div class="page-login pagecustome clearfix">
                                    <div class="wpx" style="margin-bottom: 0">
                                        <h1 class="title_heads a-center"><span>Đăng nhập</span></h1>
                                        <div id="login" class="section">
                                            <form id="customer_login">
                                                <div class="form-signup clearfix">
                                                    <fieldset class="form-group">
                                                        <input type="text" class="form-control form-control-lg"
                                                            id="customer_email" ng-model="account_name"
                                                            placeholder="Email hoặc Tên đăng nhập" Required>
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <input type="password" class="form-control form-control-lg"
                                                            id="customer_password" ng-model="password"
                                                            placeholder="Mật khẩu" Required>
                                                    </fieldset>
                                                    <div class="pull-xs-left">
                                                        <input class="btn btn-style btn_50" type="submit" value="Đăng nhập"
                                                            ng-click="loginClient()" />
                                                    </div>
                                                    <div class="btn_boz_khac">
                                                        <div class="btn_khac">
                                                            <span class="quenmk"
                                                                style="font-size: 16px; line-height: 24px; cursor: pointer; float: left;"
                                                                ng-click="showFormRecoverPassword()">Quên mật khẩu?</span>
                                                            <a href="javascript:void(0)" ng-click="showFormRegister()"
                                                                class="btn-link-style btn-register"
                                                                style="font-size: 16px; line-height: 24px; float: right;"
                                                                title="Đăng ký tại đây">Đăng ký tại đây</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="h_recover" ng-show="formRecoverPassword" style="margin-top: 20px;">
                                            <div id="recover-password" class="form-signup">
                                                <form id="recover_customer_password">
                                                    <div class="form-signup"
                                                        style="color: red; font-size: 16px; line-height: 24px;">
                                                        <span>Để lấy lại mật khẩu, vui lòng nhập email của bạn. Mật khẩu sẽ
                                                            được gửi đến email của bạn.</span>
                                                    </div>
                                                    <div class="form-signup clearfix">
                                                        <fieldset class="form-group" style="margin-bottom: 12px;">
                                                            <input type="email" style="margin-bottom: 0;"
                                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                                                class="form-control form-control-lg" value=""
                                                                ng-model="recover_email" id="recover-email"
                                                                placeholder="Email" Required>
                                                            <span class="invalid-feedback d-block error"
                                                                style="text-align: left;" role="alert"
                                                                ng-if="errors && errors['recover_email']">
                                                                <strong><% errors['recover_email'][0] %></strong>
                                                            </span>
                                                        </fieldset>
                                                    </div>
                                                    <div class="action_bottom">
                                                        <input class="btn btn-style btn_50" style="margin-top: 0px;"
                                                            type="submit" value="Lấy lại mật khẩu"
                                                            ng-click="recoverPassword()" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" ng-show="formRegister">
                                <div class="page-login pagecustome clearfix">
                                    <div class="wpx" style="margin-bottom: 0">
                                        <h1 class="title_heads a-center"><span>Đăng ký</span></h1>
                                        <span class="block a-center dkm margin-top-10">Đã có tài khoản, đăng nhập <a
                                                href="javascript:void(0)" ng-click="showFormLogin()"
                                                class="btn-link-style btn-register"
                                                style="font-size: 16px; line-height: 24px; font-weight: 600;">tại
                                                đây</a></span>
                                        <div id="login" class="section">
                                            <form id="customer_register" accept-charset="UTF-8">
                                                <div class="form-signup clearfix">
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                            <fieldset class="form-group" style="margin-bottom: 12px">
                                                                <input type="text" class="form-control form-control-lg"
                                                                    style="margin-bottom: 0;" value=""
                                                                    name="name" id="name" placeholder="Họ và tên"
                                                                    required>
                                                                <span class="invalid-feedback d-block error"
                                                                    style="text-align: left;" role="alert"
                                                                    ng-if="errors && errors['name']">
                                                                    <strong><% errors['name'][0] %></strong>
                                                                </span>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                            <fieldset class="form-group" style="margin-bottom: 12px">
                                                                <input type="text" class="form-control form-control-lg"
                                                                    style="margin-bottom: 0;" value=""
                                                                    name="account_name" id="account_name"
                                                                    placeholder="Tên đăng nhập" required>
                                                                <span class="invalid-feedback d-block error"
                                                                    style="text-align: left;" role="alert"
                                                                    ng-if="errors && errors['account_name']">
                                                                    <strong><% errors['account_name'][0] %></strong>
                                                                </span>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                            <fieldset class="form-group" style="margin-bottom: 12px">
                                                                <input type="email"
                                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                                                    class="form-control form-control-lg"
                                                                    style="margin-bottom: 0;" value=""
                                                                    name="email" id="email" placeholder="Email"
                                                                    required="">
                                                                <span class="invalid-feedback d-block error"
                                                                    style="text-align: left;" role="alert"
                                                                    ng-if="errors && errors['email']">
                                                                    <strong><% errors['email'][0] %></strong>
                                                                </span>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                            <fieldset class="form-group" style="margin-bottom: 12px">
                                                                <input placeholder="Số điện thoại" type="text"
                                                                    pattern="\d+"
                                                                    class="form-control form-control-comment form-control-lg"
                                                                    style="margin-bottom: 0;" name="phone_number">
                                                                <span class="invalid-feedback d-block error"
                                                                    style="text-align: left;" role="alert"
                                                                    ng-if="errors && errors['phone_number']">
                                                                    <strong><% errors['phone_number'][0] %></strong>
                                                                </span>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                            <fieldset class="form-group" style="margin-bottom: 12px">
                                                                <input type="password"
                                                                    class="form-control form-control-lg"
                                                                    style="margin-bottom: 0;" value=""
                                                                    name="password" id="password" placeholder="Mật khẩu"
                                                                    required>
                                                                <span class="invalid-feedback d-block error"
                                                                    style="text-align: left;" role="alert"
                                                                    ng-if="errors && errors['password']">
                                                                    <strong><% errors['password'][0] %></strong>
                                                                </span>
                                                            </fieldset>
                                                        </div>
                                                        {{-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                        <fieldset class="form-group" style="margin-bottom: 12px">
                                                            <input type="text"
                                                                class="form-control form-control-lg" style="margin-bottom: 0;" value=""
                                                                name="invite_code" id="invite_code" placeholder="Nhập mã giới thiệu (nếu có)" ng-model="invite_code">
                                                            <span class="invalid-feedback d-block error" style="text-align: left;" role="alert"
                                                                ng-if="errors && errors['invite_code']">
                                                                <strong><% errors['invite_code'][0] %></strong>
                                                            </span>
                                                        </fieldset>
                                                    </div> --}}
                                                    </div>
                                                    <div class="section">
                                                        <button type="submit" value="Đăng ký"
                                                            ng-click="registerClient()" class="btn  btn-style btn_50">Đăng
                                                            ký</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script type="text/javascript">
        app.controller('LoginClientController', function($scope) {
            $scope.formLogin = true;
            $scope.formRegister = false;
            $scope.formRecoverPassword = false;
            $scope.title = 'Đăng nhập tài khoản';
            $scope.showFormLogin = function() {
                $scope.formLogin = true;
                $scope.formRegister = false;
                $scope.formRecoverPassword = false;
                $scope.title = 'Đăng nhập tài khoản';
            }
            $scope.showFormRegister = function() {
                $scope.formLogin = false;
                $scope.formRegister = true;
                $scope.formRecoverPassword = false;
                $scope.title = 'Đăng ký tài khoản';
            }

            if (window.location.href.includes('register=true')) {
                $scope.showFormRegister();
            }

            // if (DEFAULT_CLIENT_USER) {
            //     localStorage.setItem('showMenuAdminClient', true);
            //     window.location.href = '{{ route('front.client-account') }}';
            // } else {
            //     let invite_code = '{{ request()->invite_code }}';
            //     if (invite_code) {
            //         $scope.showFormRegister();
            //         $scope.invite_code = invite_code;
            //     }
            // }

            $scope.showFormRecoverPassword = function() {
                $scope.formRecoverPassword = !$scope.formRecoverPassword;
                console.log($scope.formRecoverPassword);

                $scope.formLogin = true;
                $scope.formRegister = false;
            }

            $scope.errors = {};

            $scope.registerClient = function() {
                let data = $('#customer_register').serialize();
                $.ajax({
                    url: '{{ route('front.register-client-submit') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            $scope.account_name = response.data.account_name;
                            $scope.password = response.data.password;
                            $scope.showFormLogin();
                        } else {
                            toastr.error(response.message);
                            $scope.errors = response.errors;
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                })
            }

            $scope.loginClient = function() {
                let data = {
                    account_name: $scope.account_name,
                    password: $scope.password
                };
                $.ajax({
                    url: '{{ route('front.login-client-submit') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = '{{ route('front.home-page') }}';
                            // localStorage.setItem('{{ env('prefix') }}-token', response.data.token);
                            // localStorage.setItem('showMenuAdminClient', true);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                })
            }

            $scope.recoverPassword = function() {
                $.ajax({
                    url: '{{ route('front.recover-password-submit') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        recover_email: $scope.recover_email
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            $('.h_recover').hide();
                        } else {
                            $scope.errors = response.errors;
                            toastr.error(response.message);
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                })
            }

            // function showRecoverPasswordForm() {
            //     document.getElementById('recover-password').style.display = 'block';
            //     document.getElementById('login').style.display = 'none';
            // }

            // function hideRecoverPasswordForm() {
            //     document.getElementById('recover-password').style.display = 'none';
            //     document.getElementById('login').style.display = 'block';
            // }
        })
    </script>
@endpush
