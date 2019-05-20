
<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }}  | Login </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <style>

        h3, a , input , button ,label{
            font-family: 'Cairo', sans-serif !important;

        }
        </style>

    <link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('assets/demo/default/media/img/logo/favicon.ico')}}" />
</head>

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(cpanel/assets/app/media/img//bg/bg-3.jpg);">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="{{asset('assets/app/media/img/logos/logo-2.png')}}" style="
    opacity: 0.6; width: 20%">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">سجل الدخول الي لوحه التحكم</h3>
                    </div>

                    <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        @if ($errors->has('email'))

                            <div class="alert alert-brand alert-dismissible fade show   m-alert m-alert--square m-alert--air" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                                <strong>Error !</strong> {{ $errors->first('email') }}.
                            </div>

                        @endif
                        @if ($errors->has('password'))

                            <div class="alert alert-brand alert-dismissible fade show   m-alert m-alert--square m-alert--air" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                                <strong>Error !</strong> {{ $errors->first('password') }}.
                            </div>

                        @endif

                        <div class="form-group m-form__group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input class="form-control m-input" value="{{ old('email') }}" type="text" placeholder="الايميل" required name="email" autocomplete="off">

                        </div>

                        <div class="form-group m-form__group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="كلمه المرور" required name="password">
                        </div>

                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox  m-checkbox--focus">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرني
                                    <span></span>
                                </label>
                            </div>

                        </div>
                        <div class="m-login__form-action">
                            <button  type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary"> تسجيل الدخول</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!--begin::Base Scripts -->
<script src="{{asset('cpanel/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('cpanel/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Base Scripts -->

<!--begin::Page Snippets -->
{{--<script src="{{asset('cpanel/assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>--}}

<!--end::Page Snippets -->
</body>

<!-- end::Body -->
</html>