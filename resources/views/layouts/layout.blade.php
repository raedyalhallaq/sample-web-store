<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Store | Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        * {
            font-family: 'Cairo', sans-serif;

        }

        h3, a {
            font-family: 'Cairo', sans-serif !important;

        }

        #loading {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: block;
            opacity: 0.8;
            background-color: #fff;
            z-index: 199;
            text-align: center;
        }

        body select.form-control:not([size]):not([multiple]) {
            height: unset;
        }

        body .form-control{
            line-height:unset;
        }

        #loading-image {
            position: absolute;
            top: 250px;
            left: 550px;
            z-index: 200;
        }

        .m-topbar .m-topbar__nav.m-nav > .m-nav__item > .m-nav__link .m-nav__link-badge {
            right: 50%;
            margin-right: -11px !important;
            position: absolute;
            top: 3px !important;
        }
        .m-body .m-content{
            overflow:hidden;
        }
        .dt-bootstrap4 .dropdown .dropdown-menu.dropdown-menu-right{
            /* left:-20px !important; */
            margin-right:10px!important;
        }
    </style>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>


{{--  <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />--}}

<!--RTL version:-->
    <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet"
          type="text/css"/>

    <!--end::Page Vendors -->
    <link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <!--RTL version:-->
    <link href="{{asset('assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
{{--<link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />--}}

<!--RTL version:-->

    <link href="{{asset('assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>

    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{asset('assets/demo/default/media/img/logo/favicon.ico')}}"/>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    @yield('css')

</head>


<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<div class="m-grid m-grid--hor m-grid--root m-page">

    <div id="loading">
        <img id="loading-image" src="{{url('assets/img/loading.gif')}}" alt="Loading..."/>
    </div>

    <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">


                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="{{url('cpanel/dashboard')}}" class="m-brand__logo-wrapper">
                                <img alt="" src="{{asset('assets/demo/default/media/img/logo/logo_default_dark.png')}}" style="width: 100%;
                                                                                height: 100%;
                                                                                margin-right: 3em;    "/>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">
                            <a href="javascript:;" id="m_aside_left_minimize_toggle"
                               class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                <span></span>
                            </a>
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                               class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

                    <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
                            id="m_aside_header_menu_mobile_close_btn">
                        <i class="la la-close"></i>
                    </button>
                    <div id="m_header_menu"
                         class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
                        <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                            <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"
                                m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
                                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-paper-plane"></i>
                                    <span class="m-menu__link-title">
                                          <span class="m-menu__link-wrap">
                                              <span class="m-menu__link-text">{{trans('app.app')}}</span>
                                          </span>
                                      </span>
                                    <i class="m-menu__hor-arrow la la-angle-down"></i>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                    <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                            <a href="{{url('cpanel/dashboard')}}" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-business"></i>
                                                <span class="m-menu__link-text">{{trans('app.statistics')}}</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover"
                                            m-menu-link-redirect="1" aria-haspopup="true">
                                            <a href="{{url('admin/users/create')}}" class="m-menu__link">
                                                <i class="m-menu__link-icon flaticon-computer"></i>
                                                <span class="m-menu__link-text">{{trans('app.statistics')}}</span>
                                            </a>
                                        </li>
                                        <li>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                            <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click" m-dropdown-persistent="1">
											<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-music-2"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper" style="width:300px;">
												<span class="m-dropdown__arrow m-dropdown__arrow--center" style="right:64%"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/notification_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">9 New</span>
														<span class="m-dropdown__header-subtitle">User Notifications</span>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                                                    <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                                                        <div class="m-list-timeline m-list-timeline--skin-light">
                                                                            <div class="m-list-timeline__items">
                                                                                <a href="">
                                                                                    <div class="m-list-timeline__item">
                                                                                        <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                                                        <span class="m-list-timeline__text">12 new users registered</span>
                                                                                        <span class="m-list-timeline__time">Just now</span>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </li>
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="{{('/assets/app/media/img/users/100_3.jpg')}}"
                                                         class="m--img-rounded m--marginless" alt=""/>
												</span>
                                        <span class="m-topbar__username m--hide">Nick</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"
                                              style=""></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center"
                                                 style="background: url(assets/app/media/img/misc/user2.jpg); background-size: cover;">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        <img src="{{('/assets/app/media/img/users/100_3.jpg')}}"
                                                             class="m--img-rounded m--marginless" alt=""/>
                                                    </div>
                                                    <div class="m-card-user__details">
                                                        <span class="m-card-user__name m--font-weight-500">{{  Auth::user()->name }}</span>
                                                        <a href=""
                                                           class="m-card-user__email m--font-weight-300 m-link">{{  Auth::user()->email }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__section m--hide">
                                                            <span class="m-nav__section-text">Section</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="{{url('/cpanel/admin/profile')}}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-profile"></i>
                                                                <span class="m-nav__link-title">
                                                                <span class="m-nav__link-wrap">
                                                                    <span class="m-nav__link-text">{{trans('app.profile')}}</span>
                                                                    <span class="m-nav__link-badge">
                                                                    </span>
                                                                </span>
                                                                </span>
                                                            </a>
                                                        </li>


                                                        <li class="m-nav__separator m-nav__separator--fit">
                                                        </li>
                                                        <li class="m-nav__item">
                                                        <a class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                                {{trans('app.logout')}}
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- END: Header -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
            <i class="la la-close"></i>
        </button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

            <!-- BEGIN: Aside Menu -->
            <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
                 m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
                <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                    <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                        <a href="{{url('cpanel')}}" class="m-menu__link ">
                            <i class="m-menu__link-icon flaticon-line-graph"></i>
                            <span class="m-menu__link-title">
                <span class="m-menu__link-wrap">
                  <span class="m-menu__link-text">{{trans('app.home')}}</span>
                  <span class="m-menu__link-badge">
                  </span>
                </span>
              </span>
                        </a>
                    </li>
                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">{{trans('app.admin_panel')}}</h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="{{url('cpanel/admin/profile')}}" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-profile"></i>
                            <span class="m-menu__link-text">{{trans('app.profile')}}</span>
                        </a>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-map"></i>
                            <span class="m-menu__link-text">{{trans('app.admin')}}</span>
                            <i class="m-menu__ver-arrow la la-angle-left"></i>
                        </a>
                        <div class="m-menu__submenu ">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">

                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('cpanel/users')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">{{trans('app.manager')}}</span>
                                    </a>
                                </li>

                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('cpanel/roles')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">{{trans('app.manager_role')}}</span>
                                    </a>
                                </li>

                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('cpanel/permissions')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">{{trans('app.manager_permission')}}</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-map"></i>
                            <span class="m-menu__link-text">{{trans('app.category')}}</span>
                            <i class="m-menu__ver-arrow la la-angle-left"></i>
                        </a>
                        <div class="m-menu__submenu ">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                    <a href="{{url('cpanel/category')}}" class="m-menu__link m-menu__toggle">
                                        <i class="m-menu__link-icon flaticon-mail"></i>
                                        <span class="m-menu__link-text">{{trans('category.category')}} </span>
                                    </a>
                                </li>
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                    <a href="{{url('cpanel/subCategory')}}" class="m-menu__link m-menu__toggle">
                                        <i class="m-menu__link-icon flaticon-mail"></i>
                                        <span class="m-menu__link-text">{{trans('subCategory.subCategory')}} </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-map"></i>
                            <span class="m-menu__link-text">{{trans('app.properties')}}</span>
                            <i class="m-menu__ver-arrow la la-angle-left"></i>
                        </a>
                        <div class="m-menu__submenu ">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                    <a href="{{url('cpanel/properties')}}" class="m-menu__link m-menu__toggle">
                                        <i class="m-menu__link-icon flaticon-mail"></i>
                                        <span class="m-menu__link-text">{{trans('properties.properties')}} </span>
                                    </a>
                                </li>
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                    <a href="{{url('cpanel/elementsProperties')}}" class="m-menu__link m-menu__toggle">
                                        <i class="m-menu__link-icon flaticon-mail"></i>
                                        <span class="m-menu__link-text">{{trans('elementsProperties.elementsProperties')}} </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="{{url('cpanel/products')}}" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-mail"></i>
                            <span class="m-menu__link-text">{{trans('products.products')}} </span>
                        </a>
                    </li>

                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-cart"></i>
                            <span class="m-menu__link-text">{{trans('order.management')}}</span>
                            <i class="m-menu__ver-arrow la la-angle-left"></i>
                        </a>
                        <div class="m-menu__submenu ">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                            <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('cpanel/order')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">{{trans('order.all_orders')}}</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('cpanel/order/underApproval')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">{{trans('order.under_approval')}}</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('cpanel/order/done')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">{{trans('order.done')}}</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('cpanel/order/delivered')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">{{trans('order.delivered')}}</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
			<div class="m-content py-0 px-5">@include('msg')</div>
            @yield('content')
        </div>
    </div>


</div>


<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>
@yield('js')
</body>
</html>


<script>
    $(document).ready(function () {
        $('#loading').hide();
    });

</script>

@include('sweet::alert')
