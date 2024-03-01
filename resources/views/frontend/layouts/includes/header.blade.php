<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fatzee's</title>

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <!-- google fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- OWL CAROUSEL CSS -->
    <link rel="stylesheet" href="{{asset('front_assets/owlcarousel/owl.carousel.min.css')}}" media="all" />
    <link rel="stylesheet" href="{{asset('front_assets/owlcarousel/owl.theme.default.min.css')}}" media="all" />

    <!-- Swiper Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{asset('front_assets/css/reset.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('front_assets/css/plugins.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('front_assets/css/color.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('front_assets/css/style2.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('front_assets/css/style-red.min.css')}}">
    <!-- <link type="text/css" rel="stylesheet" href="css/style-olive.min.css"> -->
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{asset('front_assets/images/favicon.ico')}}">

</head>

<body>

    <div class="loader"><img src="{{asset('front_assets/images/loader.png')}}" alt=""></div>
    <!--================= main start ================-->
    <div id="main">
        <!--=============== header ===============-->
        <header>
            <div class="header-inner">
                <!--navigation social links-->
                <div class="nav-social">
                    <div class="container-fluid">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="btmheader">
                    <div class="container">
                        <!--logo-->
                        <div class="logo-holder">
                            <a href="index.php">
                                <img src="{{asset('front_assets/images/Logo.png')}}" class="respimg logo-vis" alt="">
                                <img src="{{asset('front_assets/images/Logo.png')}}" class="respimg logo-notvis" alt="">
                            </a>
                        </div>
                        <!-- profile dropdown in responsive -->

                        <!-- <div class="dropdown profiledropres ml-auto">-->
                        <!--    <button class="btn profilebtn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--        <i class="fa-solid fa-user"></i> <span class="profilename">Stephen</span>-->
                        <!--    </button>-->
                        <!--    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                        <!--        <a class="dropdown-item" href="#"><i class="fa-regular fa-user"></i>View Profile</a>-->
                        <!--        <a class="dropdown-item" href="#"><i class="fa-regular fa-user"></i>Orders</a>-->
                        <!--        <a class="dropdown-item" href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--Navigation -->
                        <div class="nav-holder">
                            <nav>
                                <ul>
                                    <li><a href="index.php" class="headNavLink">Home</a>
                                    </li>
                                    <li><a href="{{route('manu')}}" class="headNavLink">Menu</a></li>
                                    <li><a href="https://shariahboard.org/certified-listings" class="headNavLink" target="_blank">Zabiha Halal</a></li>
                                    <li><a href="gallery.php" class="headNavLink">Gallery</a></li>
                                    <li><a href="contact.php" class="headNavLink">Contact Us</a></li>
                                </ul>
                                @auth
                                <a href="{{route('user.logout')}}" class="loginBtn">Log Out</a>
                                <button class="cartBtn" onclick="openOrder()">
                                    <div class="cartBtnIcon">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span class="cartNameSpan">{{ UserCartCount(auth()->user()->id)}}</span>
                                    </div>
                                </button>
                                @endauth
                                @guest
                                <button class="loginBtn" onclick="openlogin()">Login/Sign Up</button>
                                @endguest


                                <!-- profile dropdown -->

                                <!-- <div class="dropdown profiledrop">
                                    <button class="btn profilebtn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-user"></i> <span class="profilename">Stephen</span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="fa-regular fa-user"></i>View Profile</a>
                                        <a class="dropdown-item" href="#"><i class="fa-regular fa-user"></i>Orders</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                                    </div>
                                </div> -->
                            </nav>
                        </div>
                        <button class="cartBtnRes" onclick="openOrder()">
                            <div class="cartBtnIcon">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="cartNameSpan">2</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- login page modal -->

        <section class="loginPage" id="addSection1" onclick="closelogin()">
            <div class="loginSection" onclick="event.stopPropagation()">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="loginImg">
                            <img src="assets/images/gallery/8.jpg" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="loginContenSection">
                            <div class="loginTitle">
                                <h2>Welcome</h2>
                                <p>Lorem ipsum, dolor sit amet consectetur elit.</p>
                            </div>
                            <form class="loginForm" id="loginForm" onsubmit="return false">
                                <div class="foginFrom">
                                    <input type="email" placeholder="UserName" name="email">
                                    <div class="loginLogo">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                                <div class="foginFrom">
                                    <input type="password" placeholder="Password" name="password">
                                    <div class="loginLogo">
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                </div>
                            </form>
                            <div class="forgetpass">
                                <!-- <a href="#" class="frgpsdBtn">Forget Password ?</a> -->
                                <a href="#" class="frgpsdBtn" onclick="openRgeFrom()">Create Account</a>
                            </div>
                            <div class="logonpageBtn">
                                <button class="toginBtn userlogin_btn">Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- register Page modal -->

        <section class="register_page" id="addSection2">
            <div class="registerSection">
                <div class="regoverlay">
                    <div class="registerTitle">
                        <h2>Register</h2>
                        <button class="rgcloseBtn" onclick="closergeFeom()"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <form id="registerForm" onsubmit="return false">
                        <div class="rerFrom">
                            <div class="fname">
                                <label for="fname">Fast Name</label>
                                <input type="text" name="fname">
                            </div>
                            <div class="fname">
                                <label for="fname">Last Name</label>
                                <input type="text" name="lname">
                            </div>
                        </div>
                        <div class="regfromnumber">
                            <div class="fnumber">
                                <label for="fname">Mobile Number</label>
                                <input type="number" name="phone">
                            </div>
                        </div>
                        <div class="regfromnumber">
                            <div class="fnumber">
                                <label for="fname">Email</label>
                                <input type="email" name="email">
                            </div>
                        </div>
                        <div class="rerFrom">
                            <div class="fname">
                                <label for="fname">Password</label>
                                <input type="password" name="password">
                            </div>
                            <div class="fname">
                                <label for="fname">Confirm Password</label>
                                <input type="password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="submitBtn">
                            <button class="regAUBMITbTN userRegister">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>


        <!-- menu order modal -->

        <section class="menuOrdermodal" id="menuOrder" onclick="closeOrder()">
            <form id="menuOrderForm"  action="{{ route('menu.order') }}" method="POST">
                @csrf
                <div class="menuOrderInn" onclick="event.stopPropagation()">

                    <div class="menuorderTop">
                        <div class="menuOrderDiv">
                            <input type="radio" id="delivery" name="type" value="delivery">
                            <i class="fa-solid fa-house"></i>
                            <p>Delivery</p>
                        </div>
                        <div class="menuOrderDiv">
                            <input type="radio" id="pickup" name="type" value="pickup">
                            <i class="fa-solid fa-truck-pickup"></i>
                            <p>Pick Up</p>
                        </div>
                    </div>
                    @auth
                        @php
                            $menu = UserCartData(auth()->user()->id);

                        @endphp
                    @if(count($menu) > 0)
                        @foreach($menu as $item)
                            <div class="menuorderBtm">
                                <div class="orderNameDet">
                                    <p>{{ $item->product->product_name }}</p>
                                </div>
                                <div class="cartnumber">
                                    <span class="cartminus">-</span>
                                    <input type="text" value="{{ $item->quantity }}" />
                                    <span class="cartplus">+</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @endauth


                    <div class="specialReq">
                        <p>Special Instructions(Optional)</p>
                        <input type="text" placeholder="e.g. allergies, spice level, requests" name="special_instruction">
                    </div>

                    <a href="#"><button class="orderNowMdlBtn">Order Now</button></a>
                </div>
            </form>
        </section>