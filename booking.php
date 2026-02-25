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


        .with-border {
            border: 2px solid #000;
            /* Adjust the thickness and color as needed */
            border-radius: 30px;
            /* Add border radius if desired */
        }

        .searchIcon {
            cursor: pointer;
            color: #343a40;
        }

        .title {
            font-weight: bold;
            margin-bottom: 20px;
            color: #343a40;
        }

        .search-container {
            margin-bottom: 30px;
        }

        .btn-custom {
            background-color: #fff;
            border: 2px #343a40;
            color: #343a40;
            font-weight: bold;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-custom:hover {
            background-color: #f0f0f0;
            border: 2px solid #343a40;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .input-group-text {
            background-color: #fff;
        }

        .shadow-custom {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-dark {
            color: #fff;
            /* Set text color to white */
            border-color: #000;
            /* Set border color */
        }

        .btn-dark:hover {
            background-color: #000;
            /* Change background color on hover */
            border-color: #000;
            /* Change border color on hover */
            color: #fff;
            /* Change text color on hover */
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="title">Reserve Your Plot</h2>
            </div>
        </div>

        <div class="row justify-content-center search-container">
            <div class="col-lg-6">
                <div class="input-group shadow-custom">
                    <input type="text" class="form-control shadow-none border-dark" id="searchInput" placeholder="Search" aria-label="Search" list="recipeNames">
                    <datalist id="recipeNames">
                        <!-- Populate options dynamically with recipe names -->
                    </datalist>
                    <span class="input-group-text border-dark">
                        <ion-icon name="search-outline" class="searchIcon"></ion-icon>
                    </span>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-6 col-lg-2 col-md-3 col-sm-6 mb-3">
                <button id="petSpa" class="btn btn-custom w-100" value="petSpa">Pet Spa</button>
            </div>
            <div class="col-6 col-lg-2 col-md-3 col-sm-6 mb-3">
                <button id="petHotel" class="btn btn-custom w-100" value="petHotel">Pet Hotel</button>
            </div>
            <div class="col-6 col-lg-2 col-md-3 col-sm-6 mb-3">
                <button id="petHospital" class="btn btn-custom w-100" value="petHospital">Hospital</button>
            </div>
        </div>

        <div id="selectedFilters" class="mt-3 row row-cols-md-5 row-cols-sm-4 row-cols-4"></div>
    </div>

    <div class="container mt-4">
        <div class="row" id="cards-container"></div>
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
</body>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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

    function showErrorMessage(message) {
        let cardsContainer = document.getElementById('cards-container');
        cardsContainer.innerHTML = `<div class="alert alert-warning" role="alert">${message}</div>`;
    }


    $(document).ready(function() {
        var isLoggedIn = <?php echo $userLoggedIn ? 'true' : 'false'; ?>;
        console.log(isLoggedIn);
        const userRole = '<?php echo $role; ?>';

        let searchFromURL = false;
        updateFilteredResults();
        var service = undefined;

        $('#petSpa').click(function() {
            service = $('#petSpa').val();
            updateFilteredResults(); // Call the function to update filtered results
        });

        $('#petHotel').click(function() {
            service = $('#petHotel').val();
            updateFilteredResults(); // Call the function to update filtered results
        });

        $('#petHospital').click(function() {
            service = $('#petHospital').val();
            updateFilteredResults(); // Call the function to update filtered results
        });


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


        function performSearch(searchTerm) {
            $.ajax({
                url: 'api/searchServicesApi.php',
                method: 'GET',
                dataType: 'json',
                data: {
                    searchTerm: searchTerm
                },

                success: function(data) {
                    console.log(data);
                    renderRecipes(data);
                },
                error: function(err) {
                    showErrorMessage(err.responseText);
                }

            });
        }


        function renderRecipes(data) {
            console.log(data);
            console.log('renderRecipes function called');
            console.trace('Invoked from:');
            console.log(searchFromURL);
            let cardsContainer = document.getElementById('cards-container');
            cardsContainer.innerHTML = '';
            if (searchFromURL === true) {
                if (Array.isArray(data) && data.length > 0) {
                    data.forEach(function(service) {
                        console.log(service);
                        console.log(service.service_image);
                        var starsHTML = generateStars(service.overall_rating);
                        const serviceImageUrl = service.service_image.replace("../", "");
                        console.log(serviceImageUrl);
                        var cardHTML = `
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
                                                <p class="phone mb-0"><i class="fa-solid fa-phone"></i> ${service.service_phone} </p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <p class="vegan mb-0 ms-2 text-muted small-text">Available Spots </p>
                                                <p class="level mb-0 me-2 text-muted small-text">${service.available_spots}</p>
                                            </div>
                                       
                                        <a class="btn btn-dark mt-auto" href="bookNow.php?service_id=${service.service_id}" class="card-link">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#cards-container').append(cardHTML);

                    });
                } else {
                    showErrorMessage("Nothing found based on URL query.");
                }
            } else {
                if (Array.isArray(data) && data.length > 0) {
                    data.forEach(function(service) {
                        console.log(service);
                        var starsHTML = generateStars(service.overall_rating);
                        var formattedOpeningHours = formatOpeningTime(service.openingHours);
                        var formattedClosingHours = formatOpeningTime(service.closingHours);
                        const serviceImageUrl = service.service_image.replace("../", "");
                        var cardHTML = `
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
                                                <p class="phone mb-0"><i class="fa-solid fa-phone"></i> ${service.service_phone} </p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <p class="level mb-0 me-2 text-muted small-text"> <i class="fa-regular fa-clock"></i> ${formattedOpeningHours} to ${formattedClosingHours} </p>
                                            </div>
                                       
                                        <a class="btn btn-dark mt-auto" href="bookNow.php?service_id=${service.service_id}" class="card-link">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#cards-container').append(cardHTML);

                    });
                }
            }
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
        //Search bars searching with enter
        $('#searchInput').on('keypress', function(e) {
            if (e.key === 'Enter') {
                var searchTerm = $(this).val();
                performSearch(searchTerm);
            }
        });


        // Event listener for clicking the search icon
        $('.input-group-text').on('click', function() {
            var searchTerm = $('#searchInput').val();
            performSearch(searchTerm);
        });



        // Retrieve the searchQuery parameter from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('query');

        function sanitizeQuery(query) {
            return query.replace(/[^\w\s]/gi, '').trim();
        }

        if (searchQuery) {
            const sanitizedQuery = sanitizeQuery(searchQuery);

            document.getElementById('searchInput').value = sanitizedQuery;
            console.log(sanitizedQuery);
            searchFromURL = true;
            performSearch(sanitizedQuery);
        }

        var selectedFilters = {};

        function updateFilteredResults() {
            searchFromURL = false;
            $.ajax({
                type: "GET",
                url: "api/filterServiceApi.php",
                data: {
                    service: service
                },
                success: function(response) {
                    console.log(selectedFilters);
                    if (Array.isArray(response) && response.length === 0) {
                        showErrorMessage("Recipes Not Found");
                    } else if (searchFromURL === false) {
                        renderRecipes(response);
                    }
                },
                error: function(err) {
                    console.error(err);
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
        updatePlaceholder();

        fetchServicesNames();
        updateCartItemCount();
        fetchAndUpdateNavbar();
    });
</script>

</body>

</html>