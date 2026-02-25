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
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
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

        .product-card {
            margin-bottom: 20px;
        }

        .card-body {
            background: #f8f9fa;
            border-top: 2px solid #dee2e6;
            border-radius: 0 0 20px 20px;
        }

        .btn-primary {
            background-color: #395065;
            border-color: #395065;
        }

        .btn-primary:hover {
            background-color: #2e3d53;
            border-color: #2e3d53;
        }

        .btn-warning {
            background-color: #ffcc00;
            border-color: #ffcc00;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .modal-header {
            background-color: #395065;
            color: white;
        }

        .modal-footer {
            border-top: none;
        }

        .modal-body {
            padding: 30px;
        }

        .modal-content {
            border-radius: 10px;
        }

        .container {
            padding-top: 30px;
        }

        .fixed-size-image {
            width: 100%;
            height: 300px;
            /* Set the desired height */
            object-fit: cover;
            /* This ensures the image covers the entire area, maintaining aspect ratio */
        }

        .btn {
            padding: 10px 20px;
            border: none;
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

        .update-btn {
            background-color: #6EC8F7;
            color: #fff;
        }

        .update-btn:hover {
            background-color: #5bb1e6;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .delete-btn {
            background-color: #ED6C3C;
            color: #fff;
        }

        .delete-btn:hover {
            background-color: #d85b30;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
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
                        <?php if ($role === 'owners') : ?>
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
        <h3 class="mb-4 fw-bold" style=" color: #395065;">Products</h3>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="input-group" style="max-width: 300px;">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                <input type="text" id="searchInput" class="form-control" placeholder="Search products..." aria-label="Search products" aria-describedby="basic-addon1">
            </div>
            <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fas fa-plus me-2"></i> Add New Product
            </button>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="product-container">
            <!-- Products will be dynamically appended here -->
        </div>
    </div>

    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="product_image" name="product_image" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <input type="number" step="0.01" class="form-control" id="product_price" name="product_price" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" step="1" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="row mb-2">
                            <!-- Main Category Dropdown -->
                            <div class="col-md-6 mb-2">
                                <select id="mainCategory" name="mainCategory" class="form-select">
                                    <option value="">Select Category</option>
                                    <option value="Food & Treats">Food & Treats</option>
                                    <option value="Grooming">Grooming</option>
                                    <option value="Collars & Leashes">Collars & Leashes</option>
                                    <option value="Accessories">Accessories</option>
                                    <option value="Health & Management">Health & Management</option>
                                </select>
                            </div>
                            <!-- Sub-category Dropdown -->
                            <div class="col-md-6">
                                <select id="subCategory" name="subCategory" class="form-select" disabled>
                                    <option value="">Select Sub-Category</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="product_description" class="form-label">Product Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Product Modal -->
    <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateProductForm" enctype="multipart/form-data">
                        <input type="hidden" id="update_product_id" name="product_id">
                        <input type="hidden" id="current_image_url" name="current_image_url">

                        <div class="mb-3">
                            <label for="update_product_image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="update_product_image" name="product_image">
                            <img id="current_image" src="" alt="Current Image" class="img-fluid mt-2" style="max-width: 100px;">
                        </div>
                        <div class="mb-3">
                            <label for="update_product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="update_product_name" name="product_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="update_product_price" class="form-label">Product Price</label>
                            <input type="number" step="0.01" class="form-control" id="update_product_price" name="product_price" required>
                        </div>
                        <div class="mb-3">
                            <label for="update_stock" class="form-label">Stock</label>
                            <input type="number" step="1" class="form-control" id="update_stock" name="stock" required>
                        </div>
                        <div class="row mb-2">
                            <!-- Main Category Dropdown -->
                            <div class="col-md-6 mb-2">
                                <select id="mainCategory2" name="mainCategory2" class="form-select">
                                    <option value="">Select Category</option>
                                    <option value="Food & Treats">Food & Treats</option>
                                    <option value="Grooming">Grooming</option>
                                    <option value="Collars & Leashes">Collars & Leashes</option>
                                    <option value="Accessories">Accessories</option>
                                    <option value="Health & Management">Health & Management</option>
                                </select>
                            </div>
                            <!-- Sub-category Dropdown -->
                            <div class="col-md-6">
                                <select id="subCategory2" name="subCategory2" class="form-select" disabled>
                                    <option value="">Select Sub-Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="update_product_description" class="form-label">Product Description</label>
                            <textarea class="form-control" id="update_product_description" name="product_description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
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

        function fetchProducts(query = '') {
            $.ajax({
                url: 'api/getProducts.php',
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(response) {
                    var productContainer = $('#product-container');
                    productContainer.empty(); // Clear the container

                    response.forEach(function(product) {
                        const productImageUrl = product.product_image.replace("../", "");

                        var productCard = `
                        <div class="col-md-4 product-card">
                            <div class="card">
                                <img src="${productImageUrl}" class="card-img-top fixed-size-image" alt="${product.product_name}">
                                <div class="card-body">
                                    <h5 class="card-title">${product.product_name}</h5>
                                    <p class="card-text">${product.product_description}</p>
                                    <p class="card-text">
                                        <strong>Price: </strong>$${product.product_price} 
                                        <span style="margin-left: 70px;"><strong>Stock: </strong>${product.stock}</span>
                                    </p>
                                    <a href="#" class="btn update-btn" data-bs-toggle="modal" data-bs-target="#updateProductModal" data-product-id="${product.product_id}" data-product-name="${product.product_name}" data-product-price="${product.product_price}" data-stock="${product.stock}" data-product-description="${product.product_description}" data-product-image-url="${productImageUrl}" ><i class="fa-regular fa-pen-to-square"></i></a>
                                     <a href="#" class="btn delete-btn" data-product-id="${product.product_id}"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </div>
                    `;
                        productContainer.append(productCard);
                    });
                },
                error: function() {
                    console.error('Failed to fetch products');
                }
            });
        }

        $('#searchInput').on('input', function() {
            var query = $(this).val();
            fetchProducts(query); // Fetch products based on the search query
        });

        fetchProducts(); // Initial fetch

        $('#addProductForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            console.log(formData);

            $.ajax({
                url: 'api/addProductHandler.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location.href = 'addProducts.php';
                },
                error: function() {
                    console.error('Failed to add product');
                }
            });
        });

        $(document).on('click', '.update-btn', function() {
            var productId = $(this).data('product-id');
            var productName = $(this).data('product-name');
            var productPrice = $(this).data('product-price');
            var stock = $(this).data('stock');
            var productDescription = $(this).data('product-description');
            var productImageUrl = $(this).data('product-image-url');

            $('#updateProductModal').find('#update_product_id').val(productId);
            $('#updateProductModal').find('#update_product_name').val(productName);
            $('#updateProductModal').find('#update_product_price').val(productPrice);
            $('#updateProductModal').find('#update_stock').val(stock);
            $('#updateProductModal').find('#update_product_description').val(productDescription);
            $('#updateProductModal').find('#current_image_url').val(productImageUrl);
            $('#updateProductModal').find('#current_image').attr('src', productImageUrl);
        });

        // Handle 'Update Product' form submission
        $('#updateProductForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            const productImage = $('#update_product_image').prop('files')[0];


            $.ajax({
                url: 'api/updateProductHandler.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location.href = 'addProducts.php';
                },
                error: function() {
                    console.error('Failed to update product');
                }
            });
        });


        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            const productId = $(this).data('product-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'api/deleteProductHandler.php',
                        method: 'POST',
                        dataType: "json",
                        data: {
                            product_id: productId
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire('Deleted!', 'Your product has been deleted.', 'success');
                                fetchProducts(); // Refresh the product list
                            } else {
                                Swal.fire('Error!', 'Failed to delete product.', 'error');
                            }
                        },
                        error: function() {
                            console.error('Failed to delete product');
                        }
                    });
                }
            });
        });
        $('#mainCategory').on('change', function() {
            var category = $(this).val();
            var subCategorySelect = $('#subCategory');
            subCategorySelect.empty();
            subCategorySelect.append('<option value="">Select Sub-Category</option>');

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

        $('#mainCategory2').on('change', function() {
            var category2 = $(this).val();
            var subCategorySelect2 = $('#subCategory2');
            subCategorySelect2.empty();
            subCategorySelect2.append('<option value="">Select Sub-Category</option>');

            if (category2) {
                subCategorySelect2.prop('disabled', false);

                switch (category2) {
                    case 'Food & Treats':
                        subCategorySelect2.append('<option value="Dry Food">Dry Food</option>');
                        subCategorySelect2.append('<option value="Wet Food">Wet Food</option>');
                        subCategorySelect2.append('<option value="Treats">Treats</option>');
                        break;
                    case 'Grooming':
                        subCategorySelect2.append('<option value="Shampoos">Shampoos</option>');
                        subCategorySelect2.append('<option value="Brushes">Brushes</option>');
                        subCategorySelect2.append('<option value="Nail Clippers">Nail Clippers</option>');
                        break;
                    case 'Collars & Leashes':
                        subCategorySelect2.append('<option value="Collars">Collars</option>');
                        subCategorySelect2.append('<option value="Leashes">Leashes</option>');
                        subCategorySelect2.append('<option value="Harnesses">Harnesses</option>');
                        break;
                    case 'Accessories':
                        subCategorySelect2.append('<option value="Beds">Beds</option>');
                        subCategorySelect2.append('<option value="Bowls">Bowls</option>');
                        subCategorySelect2.append('<option value="Toys">Toys</option>');
                        break;
                    case 'Health & Management':
                        subCategorySelect2.append('<option value="Supplements">Supplements</option>');
                        subCategorySelect2.append('<option value="Flea & Tick">Flea & Tick</option>');
                        subCategorySelect2.append('<option value="Dental Care">Dental Care</option>');
                        break;
                }
            } else {
                subCategorySelect.prop('disabled', true);
            }
        });
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
            } else if (userRole === 'owners' && searchCategory) {
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
            } else if (userRole === 'owners') {
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
        fetchAndUpdateNavbar();
    });
</script>

</html>