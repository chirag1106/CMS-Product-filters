<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript">
        BASE_URL = "{{ url('') }}";
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ashirwaad Jewelry | @yield('title')</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.0.0/rangeslider.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slider.css') }}">
</head>

<body>
    <div class="home_black_version">
        <header class="header_area header_black">
            <!-- header top starts -->
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6">
                            <div class="social_icone">
                                <ul>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-right d-flex flex-row-reverse">
                                <ul>
                                    <li class="language">
                                        <a href="#">English <i class="ion-chevron-down"></i></a>
                                        <ul class="dropdown_language">
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Germany</a></li>
                                            <li><a href="#">Hindi</a></li>
                                        </ul>
                                    </li>
                                    <li class="currency">
                                        <a href="#">INR <i class="ion-chevron-down"></i></a>
                                        <ul class="dropdown_currency">
                                            <li><a href="#">USD - Dollar</a></li>
                                            <li><a href="#">EUR - Euro</a></li>
                                            <li><a href="#">GBP - British Pound</a></li>
                                        </ul>
                                    </li>
                                    <li class="top_links">
                                        <a href="#">My Account <i class="ion-chevron-down"></i></a>
                                        <ul class="dropdown_links">
                                            <li><a href="#">Checkout</a></li>
                                            <li><a href="{{ route('admin') }}">Admin Login</a></li>
                                            <li><a href="#">Shopping Cart</a></li>
                                            <li><a href="#">Wishlist</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top ends -->

            <!-- header middle starts -->
            <div class="header_middel">
                <div class="container">
                    <div class="row align-items-center justify-content-between">

                        <div class="col-lg-5">
                            <div class="home_contact">
                                <div class="contact_icone">
                                    <img src="{{ asset('images/icon/icon_phone.png') }}" alt="">
                                </div>
                                <div class="contact_box">
                                    <p>Inquiry / Helpline : <a href="tel: 9711672424">+91-9711672424</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-4">
                            <div class="logo">
                                <a href="{{ route('main') }}"><img src="{{ asset('images/logo/logo-ash.png') }}"
                                        alt=""></a>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-7 col-6">
                            <div class="middel_right">
                                <div class="search_btn">
                                    <a href="#"><i class="ion-ios-search-strong"></i></a>
                                    <div class="dropdown_search">
                                        <form action="#">
                                            <input type="text" placeholder="Search Product ....">
                                            <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="wishlist_btn">
                                    <a href="#"><i class="ion-heart"></i></a>
                                </div>
                                <div class="cart_link">
                                    <a href="#"><i class="ion-android-cart"></i><span
                                            class="cart_text_quantity">Rs.
                                            67,598</span><i class="ion-chevron-down"></i></a>
                                    <span class="cart_quantity">2</span>

                                    <!-- mini cart -->
                                    <div class="mini_cart">
                                        <div class="cart_close">
                                            <div class="cart_text">
                                                <h3>cart</h3>
                                            </div>
                                            <div class="mini_cart_close">
                                                <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                            </div>
                                        </div>
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img
                                                        src="{{ asset('images/nav-product/product.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">Earings</a>
                                                <span class="quantity">Qty : 1</span>
                                                <span class="price_cart">Rs. 54,599</span>
                                            </div>
                                            <div class="cart_remove">
                                                <a href="#"><i class="ion-android-close"></i></a>
                                            </div>
                                        </div>
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img
                                                        src="{{ asset('images/nav-product/product2.jpg') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">Bracelet</a>
                                                <span class="quantity">Qty : 1</span>
                                                <span class="price_cart">Rs. 12,999</span>
                                            </div>
                                            <div class="cart_remove">
                                                <a href="#"><i class="ion-android-close"></i></a>
                                            </div>
                                        </div>
                                        <div class="cart_total">
                                            <span>Subtotal : </span>
                                            <span>Rs. 67,598</span>
                                        </div>
                                        <div class="mini_cart_footer">
                                            <div class="cart_button view_cart">
                                                <a href="#">View Cart</a>
                                            </div>
                                            <div class="cart_button checkout">
                                                <a href="#" class="active">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- mini cart ends  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- header middle ends -->

            <!-- header bottom starts -->

            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="main_menu_inner">
                                <div class="logo_sticky">
                                    <a href="#"><img src="{{ asset('images/logo/logo-ash.png') }}"
                                            alt="logo"></a>
                                </div>
                                <div class="main_menu">
                                    <nav>
                                        <ul>
                                            <li class="active">
                                                <a href="#">Home <i class="ion-chevron-down"></i></a>
                                                <ul class="sub_menu">
                                                    <li><a href="#">Banner</a></li>
                                                    <li><a href="#">Featured</a></li>
                                                    <li><a href="{{ route('products') }}">Collection</a></li>
                                                    <li><a href="#">Best Selling</a></li>
                                                    <li><a href="#">News</a></li>
                                                    <li><a href="#">Blog</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Category <i class="ion-chevron-down"></i></a>
                                                <ul class="mega_menu">
                                                    <li>
                                                        <a href="#">Women</a>
                                                        <ul>
                                                            <li><a href="#">Earring</a></li>
                                                            <li><a href="#">Pendant</a></li>
                                                            <li><a href="#">Rings</a></li>
                                                            <li><a href="#">Chain</a></li>
                                                            <li><a href="#">Bangles</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#">Men</a>
                                                        <ul>
                                                            <li><a href="#">Ring</a></li>
                                                            <li><a href="#">Pendant</a></li>
                                                            <li><a href="#">Bracelet</a></li>
                                                            <li><a href="#">Chain</a></li>
                                                            <li><a href="#">Gemstone</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#">Other</a>
                                                        <ul>
                                                            <li><a href="#">Platinium</a></li>
                                                            <li><a href="#">Silver</a></li>
                                                            <li><a href="#">Coins</a></li>
                                                            <li><a href="#">Gift Card</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Uncut Diamonds <i class="ion-chevron-down"></i></a>
                                                <ul class="sub_menu pages">
                                                    <li><a href="#">Earrings</a></li>
                                                    <li><a href="#">Pendant</a></li>
                                                    <li><a href="#">Ring</a></li>
                                                    <li><a href="#">Bracelet</a></li>
                                                    <li><a href="#">Necklace Set</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">About Us</a></li>
                                            <li>
                                                <a href="#">Special Collection <i
                                                        class="ion-chevron-down"></i></a>
                                                <ul class="sub_menu pages">
                                                    <li><a href="#">Gemstone</a></li>
                                                    <li><a href="#">Gold</a></li>
                                                    <li><a href="#">Rose Gold</a></li>
                                                    <li><a href="#">Silver</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header bottom ends -->
        </header>

        {{-- Page Including --}}

        @yield('homepage')

        @yield('products-filter')

        @yield('login-admin')

        @yield('import-excel')

        @yield('product_info')

        {{-- End Page Including --}}

        <!-- footer section starts -->
        <footer class="footer_widgets footer_black">
            <div class="container">
                <div class="footer_top">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="widgets_container contact_us">
                                <h3>About Ashirwaad</h3>
                                <div class="footer_contact">
                                    <p>Address : Ashirwaad Palace, Krishna Nagar, New Delhi</p>
                                    <p>Phone : <a href="tel:(+91)9711672424">(+91)9711672424</a></p>
                                    <p>Email : contact@ashirwaadjewlers.com</p>
                                    <ul>
                                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="ion-social-rss"></i></a></li>
                                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                        <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-4 col-6">
                            <div class="widgets_container widget_menu">
                                <h3>Information</h3>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="{{ route('products') }}">Collection</a></li>
                                        <li><a href="#">Portfolio</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-5 col-6">
                            <div class="widgets_container widget_menu">
                                <h3>My Account</h3>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="{{ route('admin') }}">Admin Login</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">Portfolio</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Frequently Questions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-7">
                            <div class="widgets_container product_widget">
                                <h3>Top Rated Products</h3>
                                <div class="simple_product">
                                    <div class="simple_product_items">
                                        <div class="simple_product_thumb">
                                            <a href="#"><img src="{{ asset('images/product/14.jpg') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="simple_product_content">
                                            <div class="tag_cate">
                                                <a href="#">Women,</a>
                                                <a href="#">Earrings</a>
                                            </div>
                                            <div class="product_name">
                                                <h3><a href="#">Bracelet</a></h3>
                                            </div>
                                            <div class="product_price">
                                                <span class="old_price">Rs. 45612.54</span>
                                                <span class="current_price">Rs. 41612.54</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simple_product_items">
                                        <div class="simple_product_thumb">
                                            <a href="#"><img src="{{ asset('images/product/28.jpg') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="simple_product_content">
                                            <div class="tag_cate">
                                                <a href="#">Women,</a>
                                                <a href="#">Earrings</a>
                                            </div>
                                            <div class="product_name">
                                                <h3><a href="#">Ring</a></h3>
                                            </div>
                                            <div class="product_price">
                                                <span class="old_price">Rs. 75612.54</span>
                                                <span class="current_price">Rs. 71612.54</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bottom">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright_area">
                                <p>Copyright &copy; 2022 <a href="{{ route('main') }}">ashirwaad</a> All rights
                                    Reserved.</p>
                                <img src="{{ asset('images/icon/papyel2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </footer>
        <!-- footer section ends -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JavaScript Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.0.0/rangeslider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>

    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="{{ asset('/js/import.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>
    <script src="{{ asset('/js/slider.js') }}"></script>
</body>

</html>
