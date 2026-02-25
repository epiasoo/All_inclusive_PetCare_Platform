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
    <title>Paw's Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbarStyle.css">
    <link rel="stylesheet" type="text/css" href="css/cardLabelStyle.css">
    <script src="https://kit.fontawesome.com/d95a706c26.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

        .input-group {
            max-width: 600px;
            margin: 0 auto;
        }

        /* Style for the search input field */
        #search-input {
            border: 1px solid #6D757D;
            /* Set border color to black */
            border-radius: 4px;
            /* Optional: rounded corners */
            padding: 8px;
            /* Add some padding */
            font-size: 16px;
            /* Adjust font size */
            outline: none;
            /* Remove default outline */
        }

        #search-input:focus {
            border-color: #333;
            /* Optional: change border color on focus */
            box-shadow: 0 0 5px rgba(255, 165, 0, 0.5);
            /* Optional: add shadow on focus */
        }

        #search-button {
            border-radius: 0 20px 20px 0;
        }

        .filter-section {
            padding: 15px;
            border-radius: 10px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }

        .filter-section h4 {
            margin-bottom: 10px;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .filter-section .form-label {
            font-weight: 500;
        }

        .filter-section .form-select,
        .filter-section button {
            font-size: 0.9rem;
            padding: 8px;
            border-radius: 5px;
        }

        #applyFilters {
            margin-top: 10px;
            width: 100%;
        }

        .low-stock {
            color: red;
            font-weight: bold;
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

    <div class="container my-5">
        <?php
        $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
        ?>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" id="search-input" class="form-control" placeholder="Search products..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                    <button class="btn btn-outline-secondary" id="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Filter Section -->
        <div class="row">
            <div class="col-12">
                <div class="filter-section bg-transparent p-3 rounded">
                    <form id="filterForm">
                        <div class="row g-3 align-items-end">
                            <!-- Category Dropdown -->
                            <div class="col-md-5">
                                <select id="mainCategory" class="form-select">
                                    <option value="">-- Select Category --</option>
                                    <option value="Food & Treats">Food & Treats</option>
                                    <option value="Grooming">Grooming</option>
                                    <option value="Collars & Leashes">Collars & Leashes</option>
                                    <option value="Accessories">Accessories</option>
                                    <option value="Health & Management">Health & Management</option>
                                </select>
                            </div>

                            <!-- Sub-category Dropdown -->
                            <div class="col-md-5">
                                <select id="subCategory" class="form-select" disabled>
                                    <option value="">-- Select Sub-Category --</option>
                                </select>
                            </div>

                            <!-- Filter Button -->
                            <div class="col-md-2 text-end">
                                <button type="button" id="applyFilters" class="btn btn-dark w-100">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row" id="product-container">
            <!-- Products will be injected here by JavaScript -->
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


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d95a706c26.js" crossorigin="anonymous"></script>
<script src="js/navbar.js"></script>
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
            window.location.href = 'searchRecipe.php';
        });
    });


    $(document).ready(function() {
        var isLoggedIn = <?php echo $userLoggedIn ? 'true' : 'false'; ?>;
        console.log(isLoggedIn);
        const userRole = '<?php echo $role; ?>';

        function fetchProducts(query = '') {
            $.ajax({
                type: "GET",
                url: "api/fetchAllProducts.php",
                data: {
                    search: query // Send search query
                },
                dataType: "json",
                success: function(products) {
                    let productContainer = $('#product-container');
                    productContainer.empty(); // Clear existing products

                    if (products.length === 0) {
                        productContainer.append('<p class="text-center mt-4">Nothing found.</p>');
                        return; // Exit the function if no products are found
                    }

                    products.forEach(product => {
                        const productImageUrl = product.product_image.replace("../", "");
                        const stockClass = product.stock < 3 ? 'low-stock' : '';
                        const outOfStock = product.stock == 0;
                        const words = product.product_description.split(' '); // Split the description into words
                        const limitedDescription = words.length > 10 ? words.slice(0, 10).join(' ') + '...' : product.product_description;
                        let productHtml = `
                    <div class="col-md-4 mb-4">
                        <div class="card product-card" onclick="window.location.href='viewProductDetails.php?id=${product.product_id}'">
                            <img src="${productImageUrl}" class="card-img-top product-img" alt="${product.product_name}">
                            <div class="card-body">
                                <h5 class="card-title product-name">${product.product_name}</h5>
                                <p class="card-text">${limitedDescription}</p>
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
                `;
                        productContainer.append(productHtml);

                    });

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
                    console.error("Failed to fetch products");
                }
            });
        }

        // Initial load of products
        fetchProducts();

        // Check if there is a query parameter in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('query');

        if (searchQuery) {
            $('#search-input').val(searchQuery); // Set the search input value
            fetchProducts(searchQuery); // Fetch products based on the search query
        }

        // Search functionality
        $('#search-input').on('input', function() {
            const query = $(this).val().trim();
            fetchProducts(query); // Fetch products based on the search query
        });

        $('#search-button').on('click', function() {
            const query = $('#search-input').val().trim();
            fetchProducts(query); // Fetch products based on the search query
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
            if (isLoggedIn) {
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

        $('#mainCategory').on('change', function() {
            var category = $(this).val();
            var subCategorySelect = $('#subCategory');
            subCategorySelect.empty();
            subCategorySelect.append('<option value="">-- Select Sub-Category --</option>');

            if (category) {
                subCategorySelect.prop('disabled', false);

                switch (category) {
                    case 'Food & Treats':
                        subCategorySelect.append('<option value="Dry Food">Dry Food</option>');
                        subCategorySelect.append('<option value="Wet Food">Wet Food</option>');
                        subCategorySelect.append('<option value="Treats">Treats</option>');
                        break;
                    case 'Grooming':
                        subCategorySelect.append('<option value="Shampoos">Shampoos</option>');
                        subCategorySelect.append('<option value="Brushes">Brushes</option>');
                        subCategorySelect.append('<option value="Nail Clippers">Nail Clippers</option>');
                        break;
                    case 'Collars & Leashes':
                        subCategorySelect.append('<option value="Collars">Collars</option>');
                        subCategorySelect.append('<option value="Leashes">Leashes</option>');
                        subCategorySelect.append('<option value="Harnesses">Harnesses</option>');
                        break;
                    case 'Accessories':
                        subCategorySelect.append('<option value="Beds">Beds</option>');
                        subCategorySelect.append('<option value="Bowls">Bowls</option>');
                        subCategorySelect.append('<option value="Toys">Toys</option>');
                        break;
                    case 'Health & Management':
                        subCategorySelect.append('<option value="Supplements">Supplements</option>');
                        subCategorySelect.append('<option value="Flea & Tick">Flea & Tick</option>');
                        subCategorySelect.append('<option value="Dental Care">Dental Care</option>');
                        break;
                }
            } else {
                subCategorySelect.prop('disabled', true);
            }
        });

        document.getElementById('applyFilters').addEventListener('click', function() {
            const mainCategory = document.getElementById('mainCategory').value;
            const subCategory = document.getElementById('subCategory').value;

            console.log('Selected Category:', mainCategory);
            console.log('Selected Sub-Category:', subCategory);

            filterProducts(mainCategory, subCategory);
        });

        function filterProducts(mainCategory, subCategory) {
            $.ajax({
                type: "GET",
                url: "api/filterProducts.php",
                data: {
                    mainCategory: mainCategory,
                    subCategory: subCategory
                },
                dataType: "json",
                success: function(products) {
                    let productContainer = $('#product-container');
                    productContainer.empty();

                    products.forEach(product => {
                        const productImageUrl = product.product_image.replace("../", "");
                        const stockClass = product.stock < 3 ? 'low-stock' : '';
                        const outOfStock = product.stock == 0;
                        const words = product.product_description.split(' '); // Split the description into words
                        const limitedDescription = words.length > 10 ? words.slice(0, 10).join(' ') + '...' : product.product_description;
                        let productHtml = `
                <div class="col-md-4 mb-4">
                    <div class="card product-card" onclick="window.location.href='viewProductDetails.php?id=${product.product_id}'">
                        <img src="${productImageUrl}" class="card-img-top product-img" alt="${product.product_name}">
                        <div class="card-body">
                            <h5 class="card-title product-name">${product.product_name}</h5>
                            <p class="card-text">${limitedDescription}</p>
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
                `;
                        productContainer.append(productHtml);

                        if (isLoggedIn) {
                            $.ajax({
                                type: "GET",
                                url: "api/checkCartStatus.php",
                                data: {
                                    product_id: product.product_id
                                },
                                dataType: "json",
                                success: function(response) {
                                    if (response.inCart) {
                                        $(`.btn-add-to-cart[data-product-id="${product.product_id}"]`)
                                            .text('Added to Cart')
                                            .addClass('added');
                                    }
                                },
                                error: function() {
                                    console.error("Failed to check cart status");
                                }
                            });
                        }
                    });

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
                    console.error("Failed to fetch filtered products");
                }
            });
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

</html>