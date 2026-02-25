<?php
session_start();
$userLoggedIn = isset($_SESSION["user_id"]) ? true : false;
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Eats</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="css/navbarStyle.css">
    <link rel="stylesheet" type="text/css" href="css/cardLabelStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
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

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 336px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .img-fluid:hover {
            transform: scale(1.1);
        }

        .p-4 {
            padding: 2rem;
        }

        .card-body {
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .card-title {
            font-size: 1.75rem;
            margin-bottom: 1rem;
            color: #343a40;
            font-weight: bold;
        }

        .card-text {
            margin-bottom: 0.5rem;
            color: #6c757d;
        }

        .cat-card {
            text-align: center;
            margin: 10px 0;
            transition: transform 0.3s;
        }

        .cat-card:hover {
            transform: scale(0.95);
        }

        .cat-card img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 70%;
            border: 2px solid #395065;
            display: block;
            margin: 0 auto 10px auto;
        }

        .cat-card h6 {
            font-size: 0.9rem;
            color: #343a40;
            margin-top: 10px;
        }



        .booking_form .container {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .booking_form .btn-dark {
            background-color: black;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .booking_form .btn-dark:hover {
            background-color: #333;
        }

        .booking_form .form-label {
            font-weight: bold;
        }

        .booking_form .form-check-input {
            margin-right: 0.5rem;
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

        .progress-label-left {
            float: left;
            margin-right: 0.5em;
            line-height: 1em;
        }

        .progress-label-right {
            float: right;
            margin-left: 0.3em;
            line-height: 1em;
        }

        .star-light {
            color: #e9ecef;
        }

        .rating-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background-color: #fff;
        }

        .star-light {
            color: #dcdcdc;
        }

        .text-warning {
            color: goldenrod;
        }

        .progress {
            height: 10px;
            border-radius: 5px;
            background-color: #e9ecef;
        }

        .progress-bar {
            border-radius: 5px;
        }

        .btn-outline-dark {
            border-radius: 25px;
        }

        .reviews-section {
            margin-top: 50px;
        }

        .review {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }

        .review img {
            border-radius: 50%;
        }

        .review h6 {
            margin-bottom: 5px;
        }

        .review p {
            font-size: 15px;
            color: #666;
        }

        .modal-content {
            border-radius: 15px;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
            justify-content: flex-end;
        }

        .modal-title {
            font-weight: bold;
        }

        .submit_star {
            cursor: pointer;
            transition: color 0.3s;
        }

        .submit_star:hover {
            color: goldenrod;
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
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="index.php#aboutus">About</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="nearbyShops.php">Map</a>
                        </li>
                        <?php if ($role == 'owners') : ?>
                            <li class="nav-item mx-2">
                                <a class="nav-link active" href="booking.php">Booking</a>
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

    <div class="container mt-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="image-container">
                    <img id="serviceImage" class="img-fluid rounded-start" alt="Service Image">
                </div>
                <!-- <div class="p-4 fw-bold" style="color: #395065;">
                    <p id="openingHours"></p>
                </div> -->

            </div>
            <div class="col-md-6">
                <div class="p-4">
                    <h6 id="serviceName" class="card-title" style="color: #395065;"></h6>
                    <p id="serviceDesc" class="card-text mb-3"></p>
                    <div class="row">
                        <div class="col-md-6" style="color: #395065;">
                            <p id="servicePhone">
                                <i class="fa-solid fa-phone-volume"></i> <span id="servicePhoneNumber"></span>
                            </p>
                            <p id="openingDays"></p>
                            <!-- <p id="availableSpots"></p> -->

                        </div>
                        <div class="col-md-6" style="color: #395065;">
                            <p id="overallRating" style="color: #dd9f23"></p>
                            <p id="openingHours"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="available_services" id="available_services">
        <div class="row ms-2 my-4">
            <h2 class="fw-bold"> <span style="color: #395065;">Available </span> <span style="color: #DAA520;"> Services </span></h2>
        </div>
        <div class="row" id="serviceIcons">
            <!-- Dynamically generated service icons will go here -->
        </div>
    </section>


    <section class="booking_form my-2" style="background-color: #FEF2DA;">
        <h2 class="fw-bold ms-2"> <span style="color: #395065;">Booking Form </span></h2>
        <div class="container p-4 rounded shadow" style="background-color: white;">

            <!-- Form for petSpa and petHospital -->
            <form id="bookingForm" class="d-none">
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="bookingDate" class="form-label">Choose Date:</label>
                        <input type="date" class="form-control" id="bookingDate" required>
                    </div>
                    <div class="col-md-6">
                        <label for="serviceType" class="form-label">Choose Service:</label>
                        <select class="form-select" id="serviceTypeDropdownSpa" required>
                            <!-- Options will be populated by JS -->
                        </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="timeRange" class="form-label">Choose Time Range:</label>
                        <select class="form-select" id="timeRange" required>
                            <!-- Options will be populated by JS -->
                        </select>
                    </div>


                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Door to Door Info:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="doorToDoorInfo" id="doorToDoorYes" value="Yes" required>
                        <label class="form-check-label" for="doorToDoorYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="doorToDoorInfo" id="doorToDoorNo" value="No" required>
                        <label class="form-check-label" for="doorToDoorNo">No</label>
                    </div>
                </div>

                <h4 class="fw-bold mb-4 p-2"> <span style="color: #395065;">Pet Info Form </span></h4>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="petName" class="form-label">Pet Name:</label>
                        <input type="text" class="form-control" id="petName" required>
                    </div>
                    <div class="col-md-6">
                        <label for="petType" class="form-label">Pet Type:</label>
                        <input type="text" class="form-control" id="petType" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="petGender" class="form-label">Gender:</label>
                        <select class="form-select" id="petGender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="species" class="form-label">Species:</label>
                        <input type="text" class="form-control" id="species" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="petAge" class="form-label">Age:</label>
                        <input type="number" class="form-control" id="petAge" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="mb-3">
                        <label for="importantInfo" class="form-label">Important Info:</label>
                        <textarea class="form-control" id="importantInfo" rows="3"></textarea>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-dark w-100">Book Now</button>
                </div>
            </form>

            <!-- Form for petHotel -->
            <form id="petHotelBookingForm" class="d-none">
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="checkinDate" class="form-label">Check-in Date:</label>
                        <input type="date" class="form-control" id="checkinDate" required>
                    </div>
                    <div class="col-md-6">
                        <label for="checkoutDate" class="form-label">Check-out Date:</label>
                        <input type="date" class="form-control" id="checkoutDate" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="checkinHour" class="form-label">Check-in Hour:</label>
                        <input type="time" class="form-control" id="checkinHour" required>
                    </div>
                    <div class="col-md-6">
                        <label for="checkoutHour" class="form-label">Check-out Hour:</label>
                        <input type="time" class="form-control" id="checkoutHour" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="roomType" class="form-label">Room Type:</label>
                        <select class="form-select" id="roomType" required>
                            <option value="Standard">Standard</option>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="serviceTypeHotel" class="form-label">Additional Service:</label>
                        <select class="form-select" id="serviceTypeDropdownHotel" required>
                            <!-- Options will be populated by JS -->
                        </select>
                    </div>

                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <label class="form-label d-block">Door to Door Info:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="doorToDoorInfoHotel" id="doorToDoorYesHotel" value="Yes" required>
                            <label class="form-check-label" for="doorToDoorYesHotel">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="doorToDoorInfoHotel" id="doorToDoorNoHotel" value="No" required>
                            <label class="form-check-label" for="doorToDoorNoHotel">No</label>
                        </div>
                    </div>
                </div>

                <h4 class="fw-bold mb-4 p-2"> <span style="color: #395065;">Pet Info Form </span></h4>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="petName" class="form-label">Pet Name:</label>
                        <input type="text" class="form-control" id="petNameHotel" required>
                    </div>
                    <div class="col-md-6">
                        <label for="petTypeHotel" class="form-label">Pet Type:</label>
                        <input type="text" class="form-control" id="petTypeHotel" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="petGender" class="form-label">Gender:</label>
                        <select class="form-select" id="petGenderHotel" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="species" class="form-label">Species:</label>
                        <input type="text" class="form-control" id="speciesHotel" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="petAge" class="form-label">Age:</label>
                        <input type="number" class="form-control" id="petAgeHotel" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="mb-3">
                        <label for="importantInfo" class="form-label">Important Info:</label>
                        <textarea class="form-control" id="importantInfoHotel" rows="3"></textarea>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-dark w-100">Book Now</button>
                </div>
            </form>
        </div>
    </section>

    <button class="accessibility-button" onclick="toggleAccessibilityMenu()">
        <img src="images/Handicapped Access Only Sing 3d Icon.png" alt="accessibility-icon" width="30" height="30">
    </button>

    <div class="accessibility-menu" id="accessibilityMenu">
        <button id="increaseTextBtn" class="accessibility-btn">Increase Text</button>
        <button id="decreaseTextBtn" class="accessibility-btn">Decrease Text</button>
        <button id="underlineLinksBtn" class="accessibility-btn">Underline Links</button>
        <button id="resetBtn" class="accessibility-btn">Reset</button>
    </div>

    <!-- Rating -->
    <section class="rating-section">
        <div class="container">
            <div class="mt-5 mb-5">
                <div class="col-md-8 offset-md-2 text-center">
                    <h3 class="mb-3 fw-bold"> <span style="color: #395065;">Rate Pet Service </span></h3>

                </div>



                <div class="card rating-card border border-dark" style="max-width: 630px; margin: 0 auto;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <h1 class="text-dark mt-4 mb-4">
                                    <b><span id="average_rating">0.0</span> / 5</b>
                                </h1>
                                <div class="mb-3">
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                </div>
                                <h3><span id="total_review">0</span> Review</h3>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                </div>
                                </p>
                                <p>
                                <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                </div>
                                </p>
                            </div>
                            <div class="text-end mt-2">
                                <button type="button" name="add_review" id="add_review" class="btn btn-outline-dark" style="width: 150px;">Review</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Reviews Section -->
                <div class="reviews-section mt-5">
                    <h4 class="fw-bold mb-4"> <span style="color: #395065;"> Customer Reviews </span></h4>
                    <div id="reviews-container"></div>
                </div>
            </div>
        </div>
    </section>

    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center mt-2 mb-4">
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </h4>
                    <div class="form-group">
                        <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                    </div>
                    <div id="review_error" class="alert alert-danger d-none" role="alert">
                        Please fill in the review field.
                    </div>
                    <div class="text-end mt-2">
                        <button type="button" name="add_review" id="save_review" class="btn btn-outline-dark" style="width: 150px;">Save Review</button>
                    </div>
                </div>
            </div>
        </div>
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
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d95a706c26.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="js/navbar.js"></script>
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

    new CozeWebSDK.WebChatClient({
        config: {
            bot_id: '7395120490991960081',
        },
        componentProps: {
            title: 'Coze',
        },
    });

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

    document.addEventListener("DOMContentLoaded", function() {
        var searchIcon = document.getElementById('searchSmallicon');

        searchIcon.addEventListener('click', function() {
            window.location.href = 'booking.php';
        });
        var today = new Date();
        var day = ("0" + today.getDate()).slice(-2);
        var month = ("0" + (today.getMonth() + 1)).slice(-2);
        var todayDate = today.getFullYear() + "-" + month + "-" + day;

        document.getElementById('bookingDate').setAttribute('min', todayDate);
        document.getElementById('checkinDate').setAttribute('min', todayDate);

    });
    $(document).ready(function() {
        var isLoggedIn = <?php echo $userLoggedIn ? 'true' : 'false'; ?>;
        console.log(isLoggedIn);
        var userId = <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'null'; ?>;
        const userRole = '<?php echo $role; ?>';

        var queryString = window.location.search;
        var urlParams = new URLSearchParams(queryString);
        var service_id = urlParams.get('service_id');
        console.log(service_id);

        $.ajax({
            url: 'api/getServiceWithId.php',
            type: 'POST',
            dataType: 'json',
            data: {
                service_id: service_id
            },
            success: function(response) {
                // Handle successful response
                console.log(response);

                var openingHour = response.openingHours;
                var closingHour = response.closingHours;
                generateTimeSlots(openingHour, closingHour);

                var formattedOpeningHours = formatOpeningTime(response.openingHours);
                var formattedClosingHours = formatOpeningTime(response.closingHours);

                const serviceImageUrl = response.service_image.replace("../", "");
                // Update the image
                $('#serviceImage').attr('src', serviceImageUrl);

                // Update service name and details
                $('#serviceName').text(response.service_name);
                $('#serviceDesc').text(response.service_desc);
                $('#serviceType').text(response.service_type);
                $('#servicePhone').html(`<i class="fa-solid fa-phone-volume"></i> <span id="servicePhoneNumber">${response.service_phone}</span>`); // Update with phone icon
                // $('#availableSpots').text(`Available Spots: ${response.available_spots}`);
                // $('#openingDays').text(`${response.openingDays}`);
                $('#openingHours').html(`<i class="fa-regular fa-clock"></i> ${formattedOpeningHours} to ${formattedClosingHours}`);
                $('#overallRating').html(generateStars(response.overall_rating));

                if (response.service_type.toLowerCase() === 'pethotel') {
                    $('#petHotelBookingForm').removeClass('d-none');
                } else {
                    $('#bookingForm').removeClass('d-none');
                }

                // Update available services icons
                var availableServices = response.available_services.split(',').map(service => service.trim());
                var serviceIconsHtml = '';
                var serviceOptionsHtml = '';

                availableServices.forEach(service => {
                    var imageUrl = 'images/default-icon.png'; // Default image if service specific image is not defined
                    switch (service.toLowerCase()) {
                        case 'grooming':
                            imageUrl = 'images/pet-grooming.png';
                            break;
                        case 'bath&blowdry':
                            imageUrl = 'images/blowing.png';
                            break;
                        case 'nail clipping':
                            imageUrl = 'images/nail-clipper.png';
                            break;
                        case 'ear cleansing':
                            imageUrl = 'images/ear-cleaning.png';
                            break;
                        case 'boarding':
                            imageUrl = 'images/pet-boarding.png';
                            break;
                        case 'owner communication':
                            imageUrl = 'images/mobile.png';
                            break;
                        case 'training':
                            imageUrl = 'images/frisbee.png';
                            break;
                        case 'dental care':
                            imageUrl = 'images/cleaning.png';
                            break;
                        case 'emergency care':
                            imageUrl = 'images/siren (1).png';
                            break;
                        case 'pet rehabilitation':
                            imageUrl = 'images/rehabilitation.png';
                            break;
                        case 'vaccinations':
                            imageUrl = 'images/vaccination.png';
                            break;
                        default:
                            imageUrl = 'images/default.png';
                    }

                    serviceIconsHtml += `
                    <div class="col-3 col-md-3">
                        <div class="cat-card">
                            <img src="${imageUrl}" alt="${service}">
                            <h6>${service}</h6>
                        </div>
                    </div>
                `;
                    serviceOptionsHtml += `<option value="${service}">${service}</option>`;
                });

                $('#serviceIcons').html(serviceIconsHtml);
                $('#serviceTypeDropdownSpa').html(serviceOptionsHtml);
                // and
                $('#serviceTypeDropdownHotel').html(serviceOptionsHtml);

                var openingDays = response.openingDays.split(',').map(day => day.trim());
                var openingDaysText = getOpeningDaysRange(openingDays);
                $('#openingDays').text(openingDaysText);


            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error("Error fetching service details:", error);
            }
        });

        $('#checkinDate').on('change', function() {
            var checkinDate = $(this).val();
            $('#checkoutDate').attr('min', checkinDate);
        });

        $('#checkoutDate').on('change', function() {
            var checkoutDate = $(this).val();
            $('#checkinDate').attr('max', checkoutDate);
        });

        $('#bookingForm').on('submit', function(e) {
            e.preventDefault();

            if (!isLoggedIn) {
                Swal.fire({
                    icon: 'info',
                    title: 'User Not Login',
                    text: 'Please log in or register first to use this feature',
                    confirmButtonText: 'OK'
                });
                return;
            }

            var bookingData = {
                user_id: userId,
                service_id: service_id,
                booking_date: $('#bookingDate').val(),
                timeRange: $('#timeRange').val(),
                pet_type: $('#petType').val(),
                service_type: $('#serviceTypeDropdownSpa').val(),
                door_to_door_info: $('input[name="doorToDoorInfo"]:checked').val(),
                petName: $('#petName').val(),
                petGender: $('#petGender').val(),
                species: $('#species').val(),
                petAge: $('#petAge').val(),
                importantInfo: $('#importantInfo').val()
            };

            validateBookingDateTime(bookingData);
        });



        $('#petHotelBookingForm').on('submit', function(e) {
            e.preventDefault();

            if (!isLoggedIn) {
                Swal.fire({
                    icon: 'info',
                    title: 'User Not Login',
                    text: 'Please log in or register first to use this feature',
                    confirmButtonText: 'OK'
                });
                return;
            }

            var hotelBookingData = {
                user_id: userId,
                service_id: service_id,
                checkin_date: $('#checkinDate').val(),
                checkout_date: $('#checkoutDate').val(),
                checkin_hour: $('#checkinHour').val(),
                checkout_hour: $('#checkoutHour').val(),
                pet_type: $('#petTypeHotel').val(),
                room_type: $('#roomType').val(),
                service_type: $('#serviceTypeDropdownHotel').val(),
                door_to_door_info: $('input[name="doorToDoorInfoHotel"]:checked').val(),
                petName: $('#petNameHotel').val(),
                petGender: $('#petGenderHotel').val(),
                species: $('#speciesHotel').val(),
                petAge: $('#petAgeHotel').val(),
                importantInfo: $('#importantInfoHotel').val()
            };

            validateHotelBookingDateTime(hotelBookingData);
        });

        $('#bookingDate').on('change', function() {
            var bookingDate = $(this).val();
            console.log(bookingDate); // Assuming you have a way to get the service_id

            fetchBookedTimeSlots(service_id, bookingDate);
        });

        function validateBookingDateTime(bookingData) {
            $.ajax({
                url: 'api/validateBookingDateTime.php',
                type: 'POST',
                data: bookingData,
                dataType: "json",
                success: function(response) {
                    console.log(response.status);
                    if (response.status === 'success') {
                        // Proceed with booking
                        bookService(bookingData);
                    } else {
                        // Show error message that service is closed
                        Swal.fire({
                            icon: 'error',
                            title: 'Booking Error',
                            text: response.message,
                            confirmButtonText: 'Choose Another Date'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error validating booking date and time:", error);
                }
            });
        }

        function validateHotelBookingDateTime(hotelBookingData) {
            $.ajax({
                url: 'api/validateHotelBookingDateTime.php',
                type: 'POST',
                data: hotelBookingData,
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        // Proceed with booking
                        bookPetHotelService(hotelBookingData);
                    } else {
                        // Show error message that pet hotel is closed
                        Swal.fire({
                            icon: 'error',
                            title: 'Booking Error',
                            text: response.message,
                            confirmButtonText: 'Choose Another Date'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error validating hotel booking date and time:", error);
                }
            });
        }

        function bookService(bookingData) {
            $.ajax({
                url: 'api/bookServiceApi.php',
                type: 'POST',
                data: bookingData,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Booking Successful!',
                        text: 'Your booking has been confirmed.',
                        confirmButtonText: 'OK'
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error booking service:", error);
                }
            });
        }

        function bookPetHotelService(hotelBookingData) {
            $.ajax({
                url: 'api/bookPetHotelServiceApi.php',
                type: 'POST',
                data: hotelBookingData,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Booking Successful!',
                        text: 'Your booking has been confirmed.',
                        confirmButtonText: 'OK'
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error booking pet hotel service:", error);
                }
            });
        }

        var daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        function getOpeningDaysRange(openingDays) {
            var daysArray = openingDays.map(day => daysOfWeek.indexOf(day));
            daysArray.sort((a, b) => a - b);

            var ranges = [];
            var start = daysArray[0];
            var end = start;

            for (var i = 1; i < daysArray.length; i++) {
                if (daysArray[i] === end + 1) {
                    end = daysArray[i];
                } else {
                    ranges.push({
                        start: start,
                        end: end
                    });
                    start = daysArray[i];
                    end = start;
                }
            }
            ranges.push({
                start: start,
                end: end
            });

            return ranges.map(range => {
                if (range.start === range.end) {
                    return daysOfWeek[range.start];
                } else {
                    return daysOfWeek[range.start] + " to " + daysOfWeek[range.end];
                }
            }).join(", ");
        }

        function generateTimeSlots(opening, closing) {
            var openingTime = parseTime(opening);
            var closingTime = parseTime(closing);

            var timeSlots = [];
            var currentTime = new Date(openingTime);

            while (currentTime < closingTime) {
                var endTime = new Date(currentTime);
                endTime.setHours(currentTime.getHours() + 1);

                if (endTime > closingTime) {
                    break;
                }

                timeSlots.push(formatTimeSlot(currentTime, endTime));
                currentTime.setHours(currentTime.getHours() + 1);
            }

            var timeRangeSelect = document.getElementById('timeRange');
            timeRangeSelect.innerHTML = '';
            timeSlots.forEach(function(slot) {
                var option = document.createElement('option');
                option.value = slot;
                option.text = slot;
                timeRangeSelect.appendChild(option);
            });
        }

        function parseTime(timeStr) {
            var parts = timeStr.split(':');
            var date = new Date();
            date.setHours(parseInt(parts[0], 10));
            date.setMinutes(parseInt(parts[1], 10));
            date.setSeconds(0);
            return date;
        }

        function formatTimeSlot(start, end) {
            return formatTime(start) + '-' + formatTime(end);
        }

        function formatTime(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            return strTime;
        }

        function formatOpeningTime(timeStr) {
            var parts = timeStr.split(':');
            var hours = parseInt(parts[0], 10);
            var minutes = parts[1];
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            return hours + ':' + minutes + ampm;
        }

        function fetchBookedTimeSlots(serviceId, bookingDate) {
            $.ajax({
                url: 'api/getBookedTimeSlots.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    service_id: serviceId,
                    booking_date: bookingDate
                },
                success: function(response) {
                    if (Array.isArray(response)) {
                        console.log(response);
                        disableBookedTimeSlots(response);
                    } else {
                        console.error("Error fetching booked time slots:", response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching booked time slots:", error);
                }
            });
        }

        // Function to disable booked time slots
        function disableBookedTimeSlots(bookedSlots) {
            var timeRangeSelect = document.getElementById('timeRange');
            var options = timeRangeSelect.options;

            for (var i = options.length - 1; i >= 0; i--) {
                var option = options[i];
                if (bookedSlots.includes(option.value)) {
                    timeRangeSelect.remove(i); // Remove the option from the select element
                }
            }
        }

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
                    const profileImageUrl = response.profile.replace("../", "");

                    updateUserNavbar(profileImageUrl);
                },
                error: function() {
                    console.error("Failed to fetch user information");
                },
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

        function updatePlaceholder() {
            if (navSearch) {
                if (userRole === 'petShop') {
                    navSearch.placeholder = 'Search Pet Services...';
                } else if (userRole === 'petSpa' || userRole === 'petHospital' || userRole === 'petHotel') {
                    navSearch.placeholder = 'Search Pet Products...';
                }
            }
        }

        var rating_data = 0;
        $('#add_review').click(function() {

            $('#review_modal').modal('show');

        });


        $(document).on('mouseenter', '.submit_star', function() {

            var rating = $(this).data('rating');

            reset_background();

            for (var count = 1; count <= rating; count++) {
                $('#submit_star_' + count).addClass('text-warning');
            }

        });

        function reset_background() {
            for (var count = 1; count <= 5; count++) {
                $('#submit_star_' + count).addClass('star-light');
                $('#submit_star_' + count).removeClass('text-warning');
            }
        }

        $(document).on('mouseleave', '.submit_star', function() {

            reset_background();

            for (var count = 1; count <= rating_data; count++) {
                $('#submit_star_' + count).removeClass('star-light');
                $('#submit_star_' + count).addClass('text-warning');
            }

        });


        $(document).on('click', '.submit_star', function() {

            rating_data = $(this).data('rating');

        });

        $('#save_review').click(function() {

            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            var service_id = urlParams.get('service_id');
            var user_review = $('#user_review').val();

            if (user_review.trim() === '') {
                $('#review_error').removeClass('d-none').text('Please fill in the review field.');
                return false;
            } else {
                $('#review_error').addClass('d-none');
            }

            if (isLoggedIn) {
                $.ajax({
                    url: "api/submitRatingApi.php",
                    method: "POST",
                    data: {
                        service_id: service_id,
                        rating_data: rating_data,
                        user_review: user_review
                    },
                    success: function(data) {
                        $('#review_modal').modal('hide');
                        load_rating_data();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data,
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(status + ': ' + error);
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Not Logged In',
                    text: 'Please log in to submit your review.',
                    confirmButtonText: 'Login',
                    showCancelButton: true,
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.php';
                    }
                });
            }
        });

        load_rating_data();

        $(document).on('click', '.edit-review', function() {
            $('#review_modal').modal('show');
        });


        function load_rating_data() {
            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            var service_id = urlParams.get('service_id');
            $.ajax({
                url: "api/submitRatingApi.php",
                method: "POST",
                data: {
                    action: 'load_data',
                    service_id: service_id
                },
                dataType: "JSON",
                success: function(data) {
                    $('#average_rating').text(data.average_rating);
                    $('#total_review').text(data.total_review);

                    if (data.user_rating !== null && data.user_rating !== undefined) {
                        var user_rating = data.user_rating;

                        $('.user_star').each(function(index) {
                            if (index < user_rating) {
                                $(this).removeClass('star-light');
                                $(this).addClass('text-dark');
                            } else {
                                $(this).removeClass('text-dark');
                                $(this).addClass('star-light');
                            }
                        });
                    } else {
                        $('.user_star').removeClass('text-dark').addClass('star-light');
                    }

                    var count_star = 0;

                    $('.main_star').each(function() {
                        count_star++;
                        if (Math.ceil(data.average_rating) >= count_star) {
                            $(this).addClass('text-warning');
                            $(this).addClass('star-light');
                        }
                    });


                    $('#total_five_star_review').text(data.five_star_review);

                    $('#total_four_star_review').text(data.four_star_review);

                    $('#total_three_star_review').text(data.three_star_review);

                    $('#total_two_star_review').text(data.two_star_review);

                    $('#total_one_star_review').text(data.one_star_review);

                    $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                    $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                    $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                    $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                    $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                    // Append reviews to the container
                    $('#reviews-container').html('');

                    if (data.reviews && data.reviews.length > 0) {
                        data.reviews.forEach(function(review) {
                            const profileImageUrl = review.profile.replace("../", "");
                            var edit_button = review.user_id == userId ? `<button class="btn btn-outline-dark btn-sm ms-2 edit-review" style="font-size: 0.85rem; padding: 0.35rem 0.6rem;" data-review-id="${review.review_id}">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        ` : '';
                            console.log(edit_button);
                            var review_html = `
                        <div class="review">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center flex-grow-1">
                                    <img src="${profileImageUrl}" alt="User Profile" class="rounded-circle me-2" width="50" height="50">
                                    <div>
                                        <h6 class="mb-0">${review.username}</h6>
                                        <small style="color: goldenrod;">${generateStars(review.user_rating)}</small>
                                    </div>
                                </div>
                                ${edit_button}
                            </div>
                            <p class="mt-2 ms-5">${review.review_comment}</p>
                        </div>
                        <hr>`;
                            $('#reviews-container').append(review_html);
                        });
                    } else {
                        $('#reviews-container').html('<p>No reviews yet.</p>');
                    }

                }
            })
        }
        updatePlaceholder();
        fetchServicesNames();
        updateCartItemCount();
        fetchAndUpdateNavbar();
    });
</script>

</body>

</html>