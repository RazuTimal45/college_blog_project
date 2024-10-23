<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>RazuBlogg | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" href="{{asset('assets/backend/assets/img/blog.png')}}" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link
        href="../../../../fonts.googleapis.com/css9c93.css?family=PT+Sans:400,400i,700,700i&amp;display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/backend/assets/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/backend/assets/fonts/icofont/icofont.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/backend/ckeditor5-build-classic-41.0.0/ckeditor5-build-classic/sample/css/sample.css')}}">
    <link
        rel="stylesheet"
        href="{{asset('assets/backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css')}}"
    />
    
    <link rel="stylesheet" href="{{asset('assets/backend/assets/plugins/apex/apexcharts.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/backend/assets/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/backend/assets/css/style.css')}}" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.2/dist/css/select2.min.css" rel="stylesheet" />


    <style>
        body{
            height:100vh !important;
        }
        .btns{
            background-color:#03ac13;
        }
        .footer {
            width: 100% !important;
        } 
    </style>
    @yield('css')
</head>
<body>
<div class="offcanvas-overlay"></div>
<div class="wrapper">
    <header
        class="header white-bg fixed-top d-flex align-content-center flex-wrap"
    >
        <div class="logo">
            <a href="{{route('backend.home')}}" class="default-logo"
            ><img src="{{asset('assets/backend/assets/img/blog.png')}}" width="80%" height="50px" alt="" /></a
            ><a href="{{route('backend.home')}}" class="mobile-logo"
            ><img src="{{asset('assets/backend/assets/img/blog.png')}}" width="60%" alt="50px"
                /></a>
        </div>
        <div class="main-header">
            <div class="container-fluid">
                <div class="row justify-content-between">
                    <div class="col-3 col-lg-1 col-xl-4">
                        <div class="main-header-left h-100 d-flex align-items-center">
                            <div class="main-header-user">
                                <a
                                    href="#"
                                    class="d-flex align-items-center"
                                    data-toggle="dropdown"
                                ><div class="menu-icon">
                                        <span></span> <span></span> <span></span>
                                    </div>
                                    <div
                                        class="user-profile d-xl-flex align-items-center d-none"
                                    >
                                        <div class="user-avatar">
                                            <img src="{{asset('assets/backend/assets/img/avatar/user.jpeg')}}" alt="" />
                                        </div>
                                        <div class="user-info">
                                            <h4 class="user-name"></h4>
                                            <p class="user-email"></p>
                                        </div>
                                    </div></a
                                >
                                <div class="dropdown-menu">
                                    <a href="{{route('backend.admin.show')}}">My Profile</a> <a href="#">task</a>
                                    <a href="#">Settings</a>  <a  href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                                </div>
                            </div>
                            <div class="main-header-menu d-block d-lg-none">
                                <div class="header-toogle-menu">
                                    <img src="{{asset('assets/backend/assets/img/menu.png')}}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 col-lg-11 col-xl-8">
                        <div class="main-header-right d-flex justify-content-end">
                            <ul class="nav">
                                <!-- <li class="ml-0 d-none d-lg-flex">
                                    <div class="main-header-print">
                                        <a href="#"
                                        ><img src="{{asset('assets/backend/assets/img/svg/print-icon.svg')}}" alt=""
                                            /></a>
                                    </div>
                                </li> -->
                                <!-- <li class="d-none d-lg-flex">
                                    <div class="main-header-date-time text-right">
                                        <h3 class="time">
                                            <span id="hours">21</span> <span id="point">:</span>
                                            <span id="min">06</span>
                                        </h3>
                                        <span class="date"
                                        ><span id="date">Tue, 12 October 2019</span></span
                                        >
                                    </div>
                                </li> -->
                                <li class="d-none d-lg-flex">
                                    <div class="main-header-btn  ml-md-1">
                                        <a href="/" target="_blank" class="btn btns">Visit Site</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="main-header-message">
                                        <a href="#" class="header-icon" data-toggle="dropdown"
                                        ><img
                                                src="{{asset('assets/backend/assets/img/svg/message-icon.svg')}}"
                                                alt=""
                                                class="svg"
                                            /></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div
                                                class="dropdown-header d-flex align-items-center justify-content-between"
                                            >
                                                <h5> Unread messages</h5>
                                                <a href="#" class="text-mute d-inline-block"
                                                >Clear all</a
                                                >
                                            </div>
                                            <!-- <div class="dropdown-body"> 
                                            
                                               <a
                                                    href="#"
                                                    class="item-single d-flex media align-items-center"
                                                ><div class="figure">
                                                        <img src="{{asset('assets/backend/assets/img/avatar/m2.png')}}" alt="" />
                                                        <span class="avatar-status bg-teal"></span>
                                                    </div>
                                                    <div class="content media-body">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <h6 class="name"></h6>
                                                            <p class="time"></p>
                                                        </div>
                                                        <p class="main-text">
                                                            
                                                        </p>
                                                    </div></a
                                                >
                                               
                                                   <div>
                                                   <p class="main-text text-danger">
                                                    No message found
                                                   </p>
                                                   </div>
                                               
                                            </div>-->
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="main-header-notification">
                                        <a
                                            href="#"
                                            class="header-icon notification-icon"
                                            data-toggle="dropdown"
                                        ><span
                                                class="count"
                                                data-bg-img="{{asset('assets/backend/assets/img/count-bg.png')}}"
                                            > </span
                                            >
                                            <img
                                                src="{{asset('assets/backend/assets/img/svg/notification-icon.svg')}}"
                                                alt=""
                                                class="svg"
                                            /></a>
                                        <div
                                            class="dropdown-menu style--two dropdown-menu-right"
                                        >
                                            <div
                                                class="dropdown-header d-flex align-items-center justify-content-between"
                                            >
                                                <h5> New notifications</h5>
                                                <a href="#" class="text-mute d-inline-block"
                                                >Clear all</a
                                                >
                                            </div>
                                            <div class="dropdown-body">
                                            
                                                <a
                                                    href="#"
                                                    class="item-single d-flex align-items-center"
                                                ><div class="content">
                                                        <div class="mb-2">
                                                            <p class="time" ></p>
                                                        </div>
                                                        <p class="main-text">
                                                           <b></b> Submitted a contact form
                                                        </p>
                                                    </div>
                                                    </a>
                                               
                                                   <div>
                                                   <p class="main-text text-danger">
                                                    No message found
                                                   </p>
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
    <div class="main-wrapper">
        @include('backend.layouts.menu')
        <div class="main-content">
            <div class="container-fluid">
                @yield('main-section')
            </div>
        </div>
    </div> 
        <footer class="bg-body-tertiary text-center fs-20 mx-0">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        Razublogg  © 2024 created by
            <a class="text-body" href="http://rajutimalsina.com.np/">Razu Blogg</a>
        </div>
        </footer>
</div>
<script src="{{asset('assets/backend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/backend/ckeditor5-build-classic-41.0.0/ckeditor5-build-classic/ckeditor.js')}}"></script>
<script src="{{asset('assets/backend/assets/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('assets/backend/assets/js/select2.min.js')}}"></script>
<script src="{{asset('assets/backend/assets/js/jquery_validate.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{asset('assets/backend/assets/plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/backend/assets/plugins/apex/custom-apexcharts.js')}}"></script>
@yield('js')
</body>
</html>
