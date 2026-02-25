<?php
session_start();
$userLoggedIn = isset($_SESSION["user_id"]) ? true : false;
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paw Hubs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="css/navbarStyle.css">
    <link rel="stylesheet" type="text/css" href="css/cardLabelStyle.css">
    <style>
        :root {
            --border-radius: 95% 4% 97% 5%/4% 94% 3% 95%;
            --border-radius-hover: 4% 95% 6% 95%/95% 4% 92% 5%;
        }

        body {
            font-family: "Poppins", sans-serif !important;
            overflow-x: hidden;
            scrollbar-width: none;
            background-color: #FEF2DA;
        }

        body::-webkit-scrollbar {
            width: 0;
            height: 0;
            overflow-x: hidden;
        }

        .navbar {
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            border-radius: 50%;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
            display: inline-block;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .cart-icon {
            font-size: 1.3rem;
            position: relative;
            text-decoration: none;
            /* Remove underline from anchor tag */
            color: inherit;
            /* Use inherited color from parent */
            transition: transform 0.3s ease, color 0.3s ease;
            /* Smooth transition */
        }

        .cart-icon .fa-shopping-cart {
            color: #333;
        }

        .cart-icon:hover .fa-shopping-cart {
            color: #333;
            /* Change color on hover */
            transform: scale(1.2);
            /* Enlarge icon slightly */
        }

        #cart-item-count {
            font-size: 0.75rem;
            padding: 0.2rem 0.5rem;
            background-color: #E07406;
            color: white;
            border-radius: 50%;
            transition: transform 0.3s ease;
            /* Smooth transition for item count */
        }

        .cart-icon:hover #cart-item-count {
            transform: scale(1.1);
            /* Slightly enlarge item count on hover */
        }


        .image {
            width: 50%;
        }

        .image img {
            width: 100%;
            height: auto;
        }

        section {
            padding: 2rem 9%;
        }

        section:nth-child(even) {
            background: #FEF2DA;
        }

        .slide {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .content {
            width: 40%;
            align-items: center;
        }


        .fav-btn {
            background-color: #960C0B;
            color: white;
        }

        .fav-btn:hover {
            background-color: #700B08;
            color: white;
        }

        .btn-outline-danger:hover {
            background-color: #960C0B;
            border-color: #960C0B;
        }

        .swiper-pagination-bullet-active {
            background: grey;
        }

        .cat-card {
            text-align: center;
            background: rgb(240, 238, 239);
            background: linear-gradient(185deg, rgba(240, 238, 239, 1) 3%, rgba(228, 184, 49, 0.482069854308911) 100%);
            padding: 1em;
            border-radius: 20px;
            margin: 0.5em;
            height: 170px;
            width: 140px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-decoration: none !important;
        }


        .cat-card h6 {
            color: black;
            font-weight: 600;
            padding-top: 1.5em;
        }


        .cat-card img {
            object-fit: cover;
            max-width: 80px;
            display: block;
            -webkit-box-reflect: below 0px linear-gradient(transparent, transparent, rgba(0, 0, 0, 0.4))
        }

        .cat-card:hover {
            transform: scale(0.95);
            -webkit-transform: scale(0.95);
            -moz-transform: scale(0.95);
            -ms-transform: scale(0.95);
            -o-transform: scale(0.95);
        }


        .testimonials-img {
            flex: 1 1 42rem;
            position: relative;
            /* Ensures proper positioning of the image */
            overflow: hidden;
            /* Hides overflow from the animated image */
        }

        .testimonials-img img {
            width: 100%;
            border-radius: 2rem;
            animation: aboutImage 9s linear infinite;
        }

        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            background-color: white;
        }

        .product-img {
            height: 300px;
            object-fit: cover;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover .product-img {
            transform: scale(1.1);
        }

        .product-name {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
        }

        .product-price {
            color: #E07406;
            font-size: 1.1rem;
        }


        .btn-add-to-cart {
            background-color: white;
            border: 2px solid black;
            color: black;
            transition: all 0.3s ease-in-out;
        }

        .btn-add-to-cart:hover {
            background-color: black;
            color: white;
            transform: scale(1.05);
        }

        .btn-add-to-cart.added {
            background-color: black;
            color: white;
            cursor: not-allowed;
            /* Shows a not-allowed cursor */
            pointer-events: none;
            /* Prevents further clicks */
            border: 2px solid black;
        }

        .low-stock {
            color: red;
            font-weight: bold;
        }



        @keyframes aboutImage {

            0%,
            100% {
                transform: scale(0.95);
                border-radius: var(--border-radius-hover);
            }

            50% {
                transform: scale(0.8);
                border-radius: var(--border-radius);
            }
        }

        .testimonials-box {
            display: flow-root;
            position: relative;
            padding: 30px;
            padding-top: 0;
            border-radius: 30px;
            margin: 50px 0 30px;
            background: linear-gradient(145deg, #ececec, #ffffff);
            box-shadow: 28px 28px 45px #e6e6e6, -28px -28px 45px #ffffff;
            transition: 0.8s cubic-bezier(0.22, 0.78, 0.45, 1.02);
        }

        .testimonials-box:hover {
            transform: scale(1.05);
            z-index: 2;
        }

        .testimonial-box-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .testimonials-box-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 10px 10px 60px #d4d4d4;
            margin-top: -50px;
        }

        .testimonials-box-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonials-box-text .h3-title {
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        .testimonials-box-text p {
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .sec-sub-title {
            text-transform: uppercase;
            display: inline-block;
            background-color: #f0f0f0;
            padding: 8px 20px;
            border-radius: 20px;
            color: #555;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .social-icon {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            border: 2px solid white;
            transition: all 0.3s ease;
            color: white;
            margin: 0 10px;
        }

        .social-icon:hover {
            background-color: white;
            color: #333;
        }

        .subscribe {
            margin-left: 200px;
        }

        .subscribe .form-control {
            background-color: transparent;
            border: 1px solid #ccc;
        }

        .subscribe .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .about-us {
            padding: 20px;
            border-radius: 8px;
        }

        .about-card {
            width: 100%;
            max-width: 350px;
            margin: 0 auto;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .about-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .about-card img {
            transition: transform 0.3s ease;
        }

        .about-card:hover img {
            transform: scale(1.1);
        }


        .card-body {
            text-align: center;
        }

        .mainBtn {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid black;
            color: black;
            text-decoration: none;
            overflow: hidden;
            transition: color 0.5s, border-color 0.5s;
        }

        .mainBtn::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background-color: black;
            z-index: 0;
            transition: width 0.5s;
        }

        .mainBtn:hover::before {
            width: 100%;
        }

        .mainBtn:hover {
            color: white;
            border-color: black;
        }

        .mainBtn:hover .arrowRight {
            color: white;
            transform: translateX(3px);
            /* Move the arrow to the right */
            transition: transform 0.5s;
        }

        .mainBtn .arrowRight {
            position: relative;
            z-index: 1;
            transition: transform 0.5s;
        }

        .mainBtn span {
            position: relative;
            z-index: 1;
        }

        .footer {
            background-color: #243b4f;
            color: #f1f1f1;
            padding: 40px 0;
        }

        .footer h5 {
            margin-bottom: 20px;
            font-weight: bold;
        }

        .footer p {
            margin: 0;
        }

        .footer .social-icon {
            font-size: 20px;
            color: #f1f1f1;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .footer .social-icon:hover {
            color: #DAA520;
        }

        .footer .contact-info p {
            margin-bottom: 10px;
        }

        .footer .contact-info,
        .footer .social-links {
            margin-bottom: 20px;
        }

        .footer .row-divider {
            border-top: 1px solid #f1f1f1;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .footer p.copy {
            margin-top: 20px;
            font-size: 14px;
            color: #b0b0b0;
        }

        .increase-text {
            font-size: 18px;
        }

        .decrease-text {
            font-size: 14px;
        }

        .underline-links a {
            text-decoration: underline;
        }


        .accessibility-button {
            border: none;
            position: fixed;
            bottom: 20px;
            left: 20px;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            background-color: #395065;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            z-index: 1000;
        }

        .accessibility-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        .accessibility-menu {
            display: none;
            position: fixed;
            bottom: 90px;
            left: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: opacity 0.3s ease;
            z-index: 1000;
        }

        .accessibility-menu button {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            background: #395065;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .accessibility-menu button:hover {
            background: #DAA520;
            transform: translateY(-2px);
        }

        .accessibility-menu button:active {
            transform: translateY(1px);
        }

        .accessibility-menu button:last-child {
            margin-bottom: 0;
        }

        @media(max-width: 991px) {
            .sidebar {
                background-color: rgba(232, 234, 236, 0.9);
                backdrop-filter: blur(10px);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/Design.png" alt="Logo" width="60" height="53" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header text-dark border-bottom border-dark">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Paw's Hub</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column p-4 flex-lg-row p-lg-0">
                    <ul class="navbar-nav justify-content-center align-items-center flex-grow-1 pe-3">
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="index.php#aboutus">About</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="nearbyShops.php">Map</a>
                        </li>
                        <?php if ($role == 'owners') : ?>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="booking.php">Booking</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="shopping.php">Shopping</a>
                            </li>
                        <?php elseif ($role == 'petShop') : ?>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="booking.php">Booking</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="addProducts.php">Products</a>
                            </li>
                        <?php elseif ($role == 'petSpa' || $role == 'petHospital' || $role == 'petHotel') : ?>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="userinfo.php?tab=myServices">My Services</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="shopping.php">Shopping</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="booking.php">Booking</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="shopping.php">Shopping</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <form id="searchForm" class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-2" action="booking.php" method="GET">
                        <div class="search">
                            <span class="icon d-block d-lg-none" id="searchSmallicon">
                                <ion-icon name="search-outline" class="searchBtnforSmall"></ion-icon>
                            </span>
                            <span class="icon d-none d-lg-block">
                                <ion-icon name="search-outline" class="searchBtn"></ion-icon>
                                <ion-icon name="close-outline" class="closeBtn"></ion-icon>
                            </span>
                        </div>
                        <div id="search-box" class="search-box d-none d-lg-block">
                            <input type="text" class="form-control d-none d-lg-block shadow-none" placeholder="Search" aria-label="Search" id="navSearch" name="query" list="servicesNames" autocomplete="off">
                            <datalist id="servicesNames">
                                <!-- Populate options dynamically -->
                            </datalist>
                        </div>
                        <?php if (!isset($_SESSION['user_id']) || $role === 'owners') : ?>
                            <div class="search-category d-none d-lg-block">
                                <select id="searchCategory" class="form-select shadow-none">
                                    <option value="services">Pet Services</option>
                                    <option value="products">Pet Products</option>
                                </select>
                            </div>
                        <?php endif; ?>
                        <a class="btn btn-outline-secondary mx-2 login-button" href="login.php">Login</a>
                        <a class="btn btn-outline-secondary register-button" href="register.php">Register</a>
                        <?php if ($role !== 'petShop') : ?>
                            <div class="d-flex align-items-center">
                                <!-- Cart icon with item count -->
                                <a href="cart.php" class="cart-icon position-relative me-3">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span id="cart-item-count" class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle"></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <section class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide slide">
                    <div class="content">
                        <h1 class="fw-bold">
                            <span style="color: #395065;">Welcome to </span>
                            <span style="color: #DAA520;">PawHubs <i class="fas fa-paw"></i></span>
                        </h1>
                        <p>Discover the best for your pets!</p>
                        <a class="btn mt-auto mainBtn" href="#services">
                            <span>Check our services</span> <i class="fa-solid fa-arrow-right arrowRight"></i>
                        </a>
                    </div>

                    <div class="image">
                        <img src="images/bg4yellow.png" alt="">
                    </div>
                </div>


                <div class="swiper-slide slide">
                    <div class="content">
                        <h1 class="fw-bold"><span style="color: #395065;"> Check nearby <br><span style="color: #DAA520;"> Pet Services</span></span></h1>
                        <p> Discover nearby pet service shops effortlessly with a single click. </p>
                        <a class="btn mt-auto mainBtn" href="nearbyShops.php" class="card-link"><span>View Shops </span><i class="fa-solid fa-arrow-right arrowRight"></i> </a>
                    </div>
                    <div class="image">
                        <div id="map" style="width: 100%; height: 386px;"></div>
                    </div>
                </div>



                <div class="swiper-slide slide" id="roleBasedSlide">
                    <div class="content" id="roleBasedContent">
                        <!-- Content will be injected by JavaScript -->
                    </div>
                    <div class="image">
                        <img src="images/doctor.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <?php if ($role == 'petShop') : ?>
                            <h1 class="text-danger fw-bold"> <span style="color: #395065;"> Add & View <br><span style="color: #DAA520;"> Products </span></span></h1>
                            <p> Manage and add products for your pet shop. </p>
                            <a class="btn mt-auto mainBtn" href="addProducts.php" class="card-link"><span> Add Products </span><i class="fa-solid fa-arrow-right arrowRight"></i> </a>
                        <?php else : ?>
                            <h1 class="text-danger fw-bold"> <span style="color: #395065;"> E-Commerce </span></h1>
                            <p> Place all your pet's needs in the shopping cart right from home. </p>
                            <a class="btn mt-auto mainBtn" href="shopping.php" class="card-link"><span> Shop Now </span><i class="fa-solid fa-arrow-right arrowRight"></i> </a>
                        <?php endif; ?>
                    </div>
                    <div class="image ">
                        <img src="images/catShopping.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <h1 class="fw-bold"><span style="color: #395065;"> Meet Our <br><span style="color: #DAA520;"> Ai </span></span></h1>
                        <p>Experience the feature of Ai, and ask what you need to know about your pets</p>
                        <a class="btn mt-auto mainBtn" id="chatNowBtn2" class="card-link"><span> Chat </span><i class="fa-solid fa-arrow-right arrowRight"></i> </a>
                    </div>
                    <div class="image">
                        <img src="images/robot2.png" alt="">
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <?php if ($role !== 'petShop') : ?>
        <!-- crousel -->
        <div class="container-fluid my-5" id="latestRec">
            <h3 class="text-center fw-bold mb-5"> <span style="color: #395065;"> Latest </span> <span style="color: #DAA520;"> Pet Products </span></h3>
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="owl-carousel owl-theme"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Our Services Section -->
    <section class="services my-5" id="services">
        <h3 class="text-center fw-bold mb-5">
            <span style="color: #395065;"> Meet Our </span> <span style="color: #DAA520;"> Services </span>
        </h3>
        <div class="container">
            <div class="row">
                <!-- Nearby Pet Shops -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">
                                <span style="color: #395065;">Nearby</span>
                                <span style="color: #DAA520;"> Pet Shops</span>
                            </h5>

                        </div>
                        <div class="card-footer text-center">
                            <img src="images/Location Loader 3D Animation (1).gif" alt="Nearby Pet Shops" class="img-fluid" style="max-height: 150px;">
                            <div class="d-flex justify-content-center mt-3">
                                <p class="card-text text-center">
                                    Discover and locate pet shops around you effortlessly. Whether you’re looking for pet food, accessories, or other supplies, find the best shops near your location.
                                </p>

                            </div>
                            <a href="nearbyShops.php" class="btn mainBtn mt-3">
                                <span>View Shops</span>
                                <i class="fa-solid fa-arrow-right arrowRight"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- Booking Pet Services -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">
                                <?php if ($role == 'petSpa' || $role == 'petHospital' || $role == 'petHotel') : ?>
                                    <span style="color: #395065;">Add</span>
                                    <span style="color: #DAA520;"> Pet Services</span>
                                <?php else : ?>
                                    <span style="color: #395065;">Book</span>
                                    <span style="color: #DAA520;"> Pet Services</span>
                                <?php endif; ?>
                            </h5>
                            <div class="card-footer text-center">
                                <?php if ($role == 'petSpa' || $role == 'petHospital' || $role == 'petHotel') : ?>
                                    <img src="images/Store 3D Animated Icon.gif" alt="Add Pet Services" class="img-fluid" style="max-height: 150px;">
                                    <p class="card-text text-center">
                                        Easily add and manage new pet services. Whether it's a new spa treatment or specialized care, update your offerings to keep up with the needs of your clients.
                                    </p>
                                <?php else : ?>
                                    <img src="images/Calendar 3D Animated Icon.gif" alt="Book Pet Services" class="img-fluid" style="max-height: 150px;">
                                    <p class="card-text text-center">
                                        Schedule appointments for various pet services including pet spa, pet hotel, and pet hospital. Ensure your pet gets the best care and attention they deserve.
                                    </p>
                                <?php endif; ?>
                                <a href="<?php echo $role == 'petSpa' || $role == 'petHospital' || $role == 'petHotel' ? 'userinfo.php?tab=myServices' : 'booking.php'; ?>" class="btn mainBtn mt-3">
                                    <span><?php echo $role == 'petSpa' || $role == 'petHospital' || $role == 'petHotel' ? 'Add Now' : 'Book Now'; ?></span>
                                    <i class="fa-solid fa-arrow-right arrowRight"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Shopping Pet Products -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">
                                <?php if ($role == 'petShop') : ?>
                                    <span style="color: #395065;">Add New</span>
                                    <span style="color: #DAA520;"> Products</span>
                                <?php else : ?>
                                    <span style="color: #395065;">Shop</span>
                                    <span style="color: #DAA520;"> Pet Products</span>
                                <?php endif; ?>
                            </h5>

                        </div>
                        <div class="card-footer text-center">
                            <?php if ($role == 'petShop') : ?>
                                <img src="images/Shopping Cart 3D Animated Icon.gif" alt="Add New Products" class="img-fluid" style="max-height: 150px;">
                                <p class="card-text text-center">
                                    Expand your product range by adding new pet products to your shop. Keep your inventory up-to-date and attract more customers with fresh offerings.
                                </p>
                            <?php else : ?>
                                <img src="images/Shopping App 3D Animation.gif" alt="Shop Pet Products" class="img-fluid" style="max-height: 150px;">
                                <p class="card-text text-center">
                                    Explore our wide range of pet products from food to toys and accessories. Shop online and get your pet’s needs delivered right to your door.
                                </p>
                            <?php endif; ?>
                            <a href="<?php echo $role == 'petShop' ? 'addProducts.php' : 'shopping.php'; ?>" class="btn mainBtn mt-3">
                                <span><?php echo $role == 'petShop' ? 'Add Now' : 'Shop Now'; ?></span>
                                <i class="fa-solid fa-arrow-right arrowRight"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Chatting with AI -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">
                                <span style="color: #395065;">Chat</span>
                                <span style="color: #DAA520;"> with AI</span>
                            </h5>
                        </div>
                        <div class="card-footer text-center">
                            <img src="images/AI Chatbot 3D Animated Icon.gif" alt="Chat with AI" class="img-fluid" style="max-height: 150px;">
                            <div class="d-flex justify-content-center mt-3">
                                <p class="card-text text-center">
                                    Have questions about your pet? Our AI assistant is here to help. Get instant answers and advice on pet care and other related topics.
                                </p>
                            </div>
                            <a id="chatNowBtn" class="btn mainBtn mt-3">
                                <span>Chat Now</span>
                                <i class="fa-solid fa-arrow-right arrowRight"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php if ($role !== 'petSpa' && $role !== 'petHospital' && $role !== 'petHotel') : ?>
        <!-- Booking Services Section -->
        <section class="booking-services my-5" id="booking-services">
            <h3 class="text-center fw-bold mb-5">
                <span style="color: #395065;">Top Rated</span> <span style="color: #DAA520;">Services</span>
            </h3>
            <div class="container">
                <div class="row" id="topRatedServicesContainer">
                    <!-- Cards will be inserted here dynamically -->
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Review Section -->
    <!-- <section class="testimonials my-5" id="testimonials">
        <h3 class="text-center fw-bold mb-5">
            <span style="color: #395065;">What Our</span> <span style="color: #DAA520;">Customers Say</span>
        </h3>
        <div class="container">
            <div class="row">
                
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <p class="card-text">"Excellent service! My pet loves their spa treatments and the staff is very friendly and professional."</p>
                            <h5 class="card-title fw-bold">- Customer Name</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <p class="card-text">"Excellent service! My pet loves their spa treatments and the staff is very friendly and professional."</p>
                            <h5 class="card-title fw-bold">- Customer Name</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <p class="card-text">"Excellent service! My pet loves their spa treatments and the staff is very friendly and professional."</p>
                            <h5 class="card-title fw-bold">- Customer Name</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <p class="card-text">"Excellent service! My pet loves their spa treatments and the staff is very friendly and professional."</p>
                            <h5 class="card-title fw-bold">- Customer Name</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center">
                            <p class="card-text">"Excellent service! My pet loves their spa treatments and the staff is very friendly and professional."</p>
                            <h5 class="card-title fw-bold">- Customer Name</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->



    <!-- aboutus -->
    <div class="container title-section mt-5 mb-5" id="about">
        <h3 class="fw-bold text-center">
            <span style="color: #395065;">About</span>
            <span style="color: #DAA520;">Us</span>
        </h3>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 about-us mb-5" style="background-color: #FEF2DA;">
                <div class="row text-center">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card about-card h-100 shadow hover-effect">
                            <div class="card-body">
                                <img src="images/Target 3D Model.png" class="img-fluid mb-3" style="max-height: 100px;">
                                <h5 class="about-card-title fw-bold" style="color: #395065;">Our Mission</h5>
                                <p class="card-text">We are committed to providing the best care and services for your pets, ensuring their happiness and well-being through our comprehensive offerings.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card about-card h-100 shadow hover-effect">
                            <div class="card-body">
                                <img src="images/Shield.png" class="img-fluid mb-3" style="max-height: 100px;">
                                <h5 class="about-card-title fw-bold" style="color: #395065;">Our Team</h5>
                                <p class="card-text">Our dedicated team of pet lovers and professionals is here to support and care for your pets, bringing their passion and expertise to every service we offer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card about-card h-100 shadow hover-effect">
                            <div class="card-body">
                                <img src="images/Vision 3D Animated Icon.png" class="img-fluid mb-3" style="max-height: 100px;">
                                <h5 class="about-card-title fw-bold" style="color: #395065;">Our Vision</h5>
                                <p class="card-text">We envision a world where pets and their owners enjoy a harmonious and joyful life together, supported by our top-notch services and products.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="accessibility-button" onclick="toggleAccessibilityMenu()">
        <img src="images/Handicapped Access Only Sing 3d Icon.png" alt="accessibility-icon" width="30" height="30">
    </button>

    <div class="accessibility-menu" id="accessibilityMenu">
        <button id="increaseTextBtn" class="accessibility-btn">Increase Text</button>
        <button id="decreaseTextBtn" class="accessibility-btn">Decrease Text</button>
        <button id="underlineLinksBtn" class="accessibility-btn">Underline Links</button>
        <button id="resetBtn" class="accessibility-btn">Reset</button>
    </div>





    <!-- footer -->
    <footer class="footer text-light py-5" style="background-color: #243b4f;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Contact Us</h5>
                    <p>Email: <a href="mailto:eiphyusinoo61@gmail.com" class="text-light">eiphyusinoo61@gmail.com</a></p>
                    <p>Phone: <a href="tel:+959777712348" class="text-light">+959 777712348</a></p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-light">Home</a></li>
                        <li><a href="#services" class="text-light">Services</a></li>
                        <li><a href="#latestRec" class="text-light">Latest Products</a></li>
                        <li><a href="#about" class="text-light">About Us</a></li>
                        <li><a href="#contact" class="text-light">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Follow Us</h5>
                    <div class="d-flex mb-3">
                        <a href="#" class="social-icon mx-2">
                            <i class="fab fa-facebook-f fa-lg"></i>
                        </a>
                        <a href="#" class="social-icon mx-2">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="#" class="social-icon mx-2">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                    </div>
                    <h5>Subscribe to our Newsletter</h5>
                    <form>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email" aria-label="Subscriber's email">
                            <button class="btn btn-warning" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-center">
                    <p>&copy; 2024 PawHubs. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d95a706c26.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://sf-cdn.coze.com/obj/unpkg-va/flow-platform/chat-app-sdk/0.1.0-beta.5/libs/oversea/index.js"></script>

    <script>
        let searchBtn = document.querySelector(".searchBtn");
        let closeBtn = document.querySelector(".closeBtn");
        let searchBox = document.querySelector(".search-box");

        searchBtn.onclick = function() {
            searchBox.classList.add("active");
            closeBtn.classList.add("active");
            searchBtn.classList.add("active");
        };

        closeBtn.onclick = function() {
            searchBox.classList.remove("active");
            closeBtn.classList.remove("active");
            searchBtn.classList.remove("active");
        };


        mapboxgl.accessToken = 'pk.eyJ1IjoiZXBpYXNvbyIsImEiOiJjbHdidWN0NjcwbnRxMmtzMjB6MHkybDFvIn0.Um_zq6CMzLAYc6gox59_uw';

        var map = new mapboxgl.Map({
            container: 'map', // Container ID
            style: 'mapbox://styles/mapbox/streets-v11', // Map style
            center: [-74.5, 40], // Initial map center in [lng, lat]
            zoom: 9 // Initial map zoom level
        });

        // Request user's location when the page loads
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            map.flyTo({
                center: [longitude, latitude],
                zoom: 14 // You can adjust the zoom level as needed
            });

            // Optionally add a marker to the map
            new mapboxgl.Marker()
                .setLngLat([longitude, latitude])
                .addTo(map);
        }

        document.addEventListener("DOMContentLoaded", function() {
            var searchIcon = document.getElementById('searchSmallicon');

            searchIcon.addEventListener('click', function() {
                window.location.href = 'searchRecipe.php';
            });
        });

        document.getElementById('chatNowBtn').addEventListener('click', function() {
            new CozeWebSDK.WebChatClient({
                config: {
                    bot_id: '7395120490991960081',
                },
                componentProps: {
                    title: 'Coze',
                },
            });
        });

        document.getElementById('chatNowBtn2').addEventListener('click', function() {
            new CozeWebSDK.WebChatClient({
                config: {
                    bot_id: '7395120490991960081',
                },
                componentProps: {
                    title: 'Coze',
                },
            });
        });

        function generateStars(overall_rating) {
            let filledStars = overall_rating;
            let emptyStars = 5 - overall_rating;


            let filledStarHTML = '';
            for (let i = 0; i < filledStars; i++) {
                filledStarHTML += '<i class="fa-solid fa-star"></i>';
            }


            let emptyStarHTML = '';
            for (let i = 0; i < emptyStars; i++) {
                emptyStarHTML += '<i class="fa-regular fa-star"></i>';
            }


            let starsHTML = filledStarHTML + emptyStarHTML;

            return starsHTML;
        }

        function toggleAccessibilityMenu() {
            const menu = document.getElementById('accessibilityMenu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        const increaseTextBtn = document.getElementById('increaseTextBtn');
        const decreaseTextBtn = document.getElementById('decreaseTextBtn');
        const underlineLinksBtn = document.getElementById('underlineLinksBtn');
        const resetBtn = document.getElementById('resetBtn');
        const body = document.body;
        let textSize = 16; // default text size

        increaseTextBtn.addEventListener('click', function() {
            textSize += 2;
            body.style.fontSize = `${textSize}px`;
        });

        decreaseTextBtn.addEventListener('click', function() {
            if (textSize > 10) {
                textSize -= 2;
                body.style.fontSize = `${textSize}px`;
            }
        });

        underlineLinksBtn.addEventListener('click', function() {
            const links = document.querySelectorAll('a');
            links.forEach(link => {
                link.style.textDecoration = link.style.textDecoration === 'underline' ? 'none' : 'underline';
            });
        });

        resetBtn.addEventListener('click', function() {
            textSize = 16;
            body.style.fontSize = '';
            const links = document.querySelectorAll('a');
            links.forEach(link => {
                link.style.textDecoration = 'none';
            });
            body.classList.remove('readable-font');
        });


        $(document).ready(function() {
            var isLoggedIn = <?php echo $userLoggedIn ? 'true' : 'false'; ?>;
            console.log(isLoggedIn);
            const userRole = '<?php echo $role; ?>';

            updateRoleBasedContent(userRole);

            function updateRoleBasedContent(role) {
                const roleBasedContent = document.getElementById('roleBasedContent');
                if (role === 'petSpa' || role === 'petHotel' || role === 'petHospital') {
                    roleBasedContent.innerHTML = `
            <h1 class="fw-bold"><span style="color: #395065;"> View Your <br><span style="color: #DAA520;"> Services</span></span></h1>
            <p>Manage and view the services you offer.</p>
            <a class="btn mt-auto mainBtn" href="userinfo.php?tab=myServices" class="card-link"><span> View </span><i class="fa-solid fa-arrow-right arrowRight"></i> </a>
        `;
                } else {
                    roleBasedContent.innerHTML = `
            <h1 class="fw-bold"><span style="color: #395065;"> Register <br><span style="color: #DAA520;"> a Booking</span></span></h1>
            <p>Make reservations in pet hospitals, pet spa, pet cafe online from home, bypassing the need to go out or queue up.</p>
            <a class="btn mt-auto mainBtn" href="booking.php" class="card-link"><span> Book in advance </span><i class="fa-solid fa-arrow-right arrowRight"></i> </a>
        `;
                }
            }

            function updateUserNavbar(profileImageUrl) {
                $.ajax({
                    type: "GET",
                    url: "api/checkLoginStatus.php",
                    success: function(response) {
                        const userLoggedIn = response.userLoggedIn;

                        const profileLink = userLoggedIn ?
                            $("<a>")
                            .attr("href", "userinfo.php")
                            .append(
                                $("<img>")
                                .attr({
                                    src: profileImageUrl,
                                    alt: "Profile Picture",
                                    width: 40,
                                    height: 40,
                                    class: "rounded-circle ms-2",
                                })
                            ) :
                            null;

                        // Create the logout button
                        const logoutButton = $("<a>")
                            .addClass("btn btn-outline-secondary mx-2 logout-button")
                            .attr("href", "login.php")
                            .text("Logout")
                            .click(function() {
                                $.ajax({
                                    type: "GET",
                                    url: "api/clearSession.php",
                                    success: function(response) {
                                        window.location.href = "login.php";
                                    },
                                    error: function(xhr, status, error) {
                                        console.error("Error clearing session:", error);
                                    }
                                });
                            });

                        if (userLoggedIn) {
                            $(".login-button").replaceWith(profileLink);
                            $(".register-button").replaceWith(logoutButton);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error checking login status:", error);
                    }
                });
            }

            function fetchAndUpdateNavbar() {
                $.ajax({
                    type: "GET",
                    url: "api/userInfoApi.php",
                    dataType: "json",
                    success: function(response) {
                        if (response && response.profile) {
                            const profileImageUrl = response.profile.replace("../", "");
                            updateUserNavbar(profileImageUrl);
                        } else {
                            updateUserNavbar(null);
                        }
                    },
                    error: function() {
                        console.error("Failed to fetch user information");
                    },
                });
            }

            function renderLatestProducts() {
                $.ajax({
                    url: 'api/latestProducts.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        data.forEach(function(product) {
                            var starsHTML = generateStars(product.overall_rating); // Assuming this function is defined somewhere

                            const productImageUrl = product.product_image.replace("../", "");
                            const stockClass = product.stock < 3 ? 'low-stock' : '';
                            const outOfStock = product.stock == 0;

                            var productHtml = `
                <div class="item mb-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card product-card" onclick="window.location.href='viewProductDetails.php?id=${product.product_id}'">
                            <img src="${productImageUrl}" class="card-img-top product-img" alt="${product.product_name}">
                            <div class="card-body">
                                <h5 class="card-title product-name">${product.product_name}</h5>
                                <p class="card-text">${product.product_description}</p>
                                <p class="card-text">
                                    <strong class="product-price">${product.product_price} MMK</strong>
                                    ${outOfStock ? '' : `<span style="margin-left: 70px;" class="${stockClass}">
                                        <strong>Stock: </strong>${product.stock}
                                    </span>`}
                                </p>
                                <button class="btn btn-add-to-cart mt-2 ${outOfStock ? 'disabled' : ''}" data-product-id="${product.product_id}" ${outOfStock ? 'disabled' : ''}>
                                    <i class="fas fa-shopping-cart"></i> ${outOfStock ? 'Out of Stock' : 'Add to Cart'}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                            $('.owl-carousel').append(productHtml);
                        });

                        // Initialize the carousel after appending the products
                        $('.owl-carousel').owlCarousel({
                            loop: true,
                            margin: 15,
                            nav: true,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                600: {
                                    items: 2
                                },
                                1000: {
                                    items: 3
                                }
                            }
                        });

                        // Bind click event for add-to-cart buttons after they are added to the DOM
                        $('.btn-add-to-cart').on('click', function(e) {
                            e.stopPropagation(); // Prevent the card click event

                            if (!isLoggedIn) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Login Required',
                                    text: 'Please log in first to go shopping.',
                                    confirmButtonText: 'Login'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'login.php'; // Redirect to login page
                                    }
                                });
                                return;
                            }

                            var button = $(this);
                            var product_id = button.data('product-id');

                            // Check if the product is already in the cart
                            $.ajax({
                                type: "POST",
                                url: "api/checkCartStatus.php",
                                data: {
                                    product_id: product_id
                                },
                                dataType: "json",
                                success: function(response) {
                                    if (response.inCart) {
                                        // Product exists in the cart, check stock before updating
                                        $.ajax({
                                            type: "POST",
                                            url: "api/checkProductStock.php",
                                            data: {
                                                product_id: product_id
                                            },
                                            dataType: "json",
                                            success: function(stockResponse) {
                                                var currentQuantity = response.quantity;
                                                console.log(currentQuantity);
                                                var stock = stockResponse.stock;

                                                if (currentQuantity >= stock) {
                                                    Swal.fire({
                                                        icon: 'warning',
                                                        title: 'Stock Limit Reached',
                                                        text: 'Cannot add more items to the cart. The quantity will exceed available stock.',
                                                        confirmButtonText: 'OK'
                                                    });
                                                } else {
                                                    // Update quantity
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "api/updateCartItem.php",
                                                        data: {
                                                            id: response.cart_id,
                                                            change: 1
                                                        },
                                                        success: function(updateResponse) {
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Updated',
                                                                text: 'Quantity updated in the cart.',
                                                                confirmButtonText: 'OK'
                                                            }).then(() => {
                                                                updateCartItemCount(); // Update cart item count
                                                            });
                                                        },
                                                        error: function() {
                                                            console.error("Failed to update cart item quantity");
                                                        }
                                                    });
                                                }
                                            },
                                            error: function() {
                                                console.error("Failed to check product stock");
                                            }
                                        });
                                    } else {
                                        // Product does not exist in the cart, add it
                                        $.ajax({
                                            type: "POST",
                                            url: "api/addToCartApi.php",
                                            data: {
                                                product_id: product_id,
                                                quantity: 1
                                            },
                                            dataType: "json",
                                            success: function(addResponse) {
                                                if (addResponse.status === 'success') {
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Added to Cart',
                                                        text: 'The product has been added to your cart.',
                                                        confirmButtonText: 'OK'
                                                    }).then(() => {
                                                        updateCartItemCount(); // Update cart item count
                                                    });
                                                } else {
                                                    console.error(addResponse.message);
                                                }
                                            },
                                            error: function() {
                                                console.error("Failed to add product to cart");
                                            }
                                        });
                                    }
                                },
                                error: function() {
                                    console.error("Failed to check cart item");
                                }
                            });
                        });
                    },
                    error: function() {
                        console.error("Failed to fetch latest products");
                    }
                });
            }





            function fetchTopServices() {
                $.ajax({
                    url: 'api/getTopServices.php', // Replace with your backend script URL
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            let services = response.data;
                            let cardsHTML = '';

                            services.forEach(service => {
                                let starsHTML = generateStars(service.overall_rating);
                                const serviceImageUrl = service.service_image.replace("../", "");

                                let cardHTML = `
                        <div class="col-lg-4 col-md-6 mb-3">
                            <div class="card h-100 border-0 shadow">
                                <div class="card-img-top position-relative">
                                    <div class="${service.service_type}-label">${service.service_type}</div>
                                    <img src="${serviceImageUrl}" alt="" class="card-img-top with-border">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title fw-bold">${service.service_name}</h6>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <p class="stars mb-0">${starsHTML}</p>
                                        <p class="phone mb-0"><i class="fa-solid fa-phone"></i> ${service.service_phone}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <p class="vegan mb-0 ms-2 text-muted small-text">Available Spots</p>
                                        <p class="level mb-0 me-2 text-muted small-text">${service.available_spots}</p>
                                    </div>
                                    <a class="btn btn-dark mt-auto" href="bookNow.php?service_id=${service.service_id}" class="card-link">Book Now</a>
                                </div>
                            </div>
                        </div>
                    `;

                                cardsHTML += cardHTML;
                            });

                            $('#topRatedServicesContainer').html(cardsHTML);
                        } else {
                            $('#topRatedServicesContainer').html('<p>No services available.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching top-rated services:', {
                            status: status,
                            error: error,
                            responseText: xhr.responseText
                        });
                        $('#topRatedServicesContainer').html('<p>Failed to load services.</p>');
                    }
                });
            }

            function updateCartItemCount() {
                if (isLoggedIn && userRole !== 'petShop') {
                    $.ajax({
                        type: "GET",
                        url: "api/getCartItemCount.php", // PHP script to get cart item count
                        dataType: "json",
                        success: function(response) {
                            $('#cart-item-count').text(response.count);
                        },
                        error: function() {
                            console.error("Failed to fetch cart item count");
                        }
                    });
                }
            }
            const searchForm = document.getElementById('searchForm');
            const searchCategory = document.getElementById('searchCategory');
            const navSearch = document.getElementById('navSearch');

            function populateServicesNames(data) {
                const datalist = document.getElementById('servicesNames');
                datalist.innerHTML = ''; // Clear existing options
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item; // Since item is already a string
                    datalist.appendChild(option);
                });
            }

            function fetchServicesNames() {
                let url = '';
                if (userRole === 'petShop') {
                    url = 'api/fetchServicesNameApi.php'; // Fetch pet services
                } else if (userRole === 'petSpa' || userRole === 'petHospital' || userRole === 'petHotel') {
                    url = 'api/fetchProductsNameApi.php'; // Fetch products only
                } else if (!isLoggedIn || userRole === 'owners' && searchCategory) {
                    const category = searchCategory.value;
                    url = category === 'services' ? 'api/fetchServicesNameApi.php' : 'api/fetchProductsNameApi.php';
                }

                $.ajax({
                    url: url,
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log("Data received:", data);
                        populateServicesNames(data);
                    },
                    error: function(err) {
                        console.error("Error fetching names:", err);
                    },
                });
            }

            function updatePlaceholder() {
                if (navSearch) {
                    if (userRole === 'petShop') {
                        navSearch.placeholder = 'Search Pet Services...';
                    } else if (userRole === 'petSpa' || userRole === 'petHospital' || userRole === 'petHotel') {
                        navSearch.placeholder = 'Search Pet Products...';
                    }
                }
            }

            if (searchCategory) {
                searchCategory.addEventListener('change', fetchServicesNames);
            }

            searchForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                const query = navSearch.value;
                if (userRole === 'petShop') {
                    // Default form submission to booking.php
                    searchForm.submit();
                } else if (userRole === 'petSpa' || userRole === 'petHospital' || userRole === 'petHotel') {
                    // Redirect to shopping.php with the search query
                    window.location.href = 'shopping.php?query=' + encodeURIComponent(query);
                } else if (!isLoggedIn || userRole === 'owners') {
                    const category = searchCategory.value;
                    if (category === 'products') {
                        // Redirect to shopping.php with the search query
                        window.location.href = 'shopping.php?query=' + encodeURIComponent(query);
                    } else {
                        // Proceed with the default form submission to booking.php
                        searchForm.submit();
                    }
                }
            });

            updatePlaceholder();
            fetchTopServices();
            renderLatestProducts();
            fetchServicesNames();
            updateCartItemCount();
            fetchAndUpdateNavbar();
        });

        function showConfirmationMessage() {
            $('#successModal').modal('show');
        }


        var swiper = new Swiper(".home-slider", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 6100,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            loop: true,
        });
    </script>



</body>

</html>