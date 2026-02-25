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
    <title>Bootstrap demo</title>
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

        .cart-icon {
            font-size: 1.3rem;
            position: relative;
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s ease, color 0.3s ease;
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

        .card {
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-header {
            background-color: #343a40;
            color: #fff;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 2rem;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .nav-tabs .nav-link {
            border: none;
            border-radius: 0;
            color: #495057;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .nav-tabs .nav-link.active {
            background-color: #343a40;
            color: #fff;
            border: none;
        }

        .nav-tabs {
            border-bottom: 1px solid #dee2e6;
        }

        .tab-content {
            padding-top: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .input-group-text {
            cursor: pointer;
        }

        .btn-dark {
            background-color: #343a40;
            border: none;
        }

        .btn-dark:hover {
            background-color: #23272b;
        }

        .form-control {
            border-radius: 5px;
        }

        .errorMsg {
            font-size: 0.85rem;
            color: #ff4d4d;
        }

        .text-end {
            text-align: end;
        }

        .text-center {
            text-align: center;
        }

        .btn-cancel {
            background-color: #ffc107;
            color: #343a40;
            border: none;
        }

        .btn-cancel:hover {
            background-color: #ffa000;
        }

        /* Centering profile picture horizontally */
        /* Centering profile picture horizontally and vertically */
        .profile-pic-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            height: 100%;
            /* Ensures container takes full height of its parent */
        }

        .profile-pic {
            width: 150px;
            /* Adjust size as needed */
            height: 150px;
            /* Adjust size as needed */
            object-fit: cover;
            border-radius: 50%;
            /* Ensures circular shape */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            /* Optional: Adds a subtle shadow */
        }

        .service-image-container {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid #f5f5f5;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease-in-out;
        }

        .service-image-container:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
        }

        .service-image-container img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .service-image-container:hover img {
            transform: scale(1.1);
        }

        .card2 {
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: stretch;
        }

        .card-body2 {
            padding: 20px;
            flex: 1;
            /* Allow the card body to take available space */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 1px solid #6c757d;
            /* Adds the border */
            border-radius: 15px;
            /* Adjust the border-radius as needed */
            /* Distribute space evenly */
        }

        .card-title {
            color: #333;
            font-weight: bold;
        }

        .card-text {
            color: #555;
        }

        .card-header3 {
            font-size: medium;
        }

        .card-body3 {
            padding: 1.5rem;
        }

        .card-title3 {
            font-size: 1.25rem;
            font-weight: 500;
        }

        .card-subtitle {
            font-size: 1rem;
        }

        .list-group-item {
            padding: 0.75rem 1.25rem;
        }

        .badge {
            font-size: 0.875rem;
        }

        .cancel-booking-btn {
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
                                <a href="cart.php" class="cart-icon position-relative me-3 mt-2">
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
        <div class="card">
            <div class="card-header text-center">Account Settings</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Left column for profile picture -->
                        <div class="profile-pic-container">
                            <img src="" class="img-fluid profile-pic" alt="User Avatar" id="profile">
                            <div class="mt-2">
                                <div class="fw-lighter">
                                    <div>
                                        <span id="username"></span>
                                    </div>
                                    <div>
                                        Role: <span id="role"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-dark mb-4" id="updateProfileButton"><i class="fa-regular fa-pen-to-square"></i> Update Photo </button>
                                <input type="file" id="profileImageInput" accept="image/*" style="display: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Right column for form content -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="accountTab" data-bs-toggle="tab" data-bs-target="#accountSetting" type="button" role="tab" aria-controls="accountSetting" aria-selected="true">Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="passwordTab" data-bs-toggle="tab" data-bs-target="#passwordSetting" type="button" role="tab" aria-controls="passwordSetting" aria-selected="false">Password</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="servicesTab" data-bs-toggle="tab" data-bs-target="#myServices" type="button" role="tab" aria-controls="myServices" aria-selected="false">My Services</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-4" id="myTabContent">
                            <div class="tab-pane fade show active" id="accountSetting" role="tabpanel" aria-labelledby="accountTab">
                                <form>
                                    <div class="mb-3">
                                        <label for="usernameField" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="usernameField" value="" disabled>
                                        <div id="name-error" class="mt-2 errorMsg"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailField" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="emailField" value="" disabled>
                                        <div id="email-error" class="mt-2 errorMsg"></div>
                                        <div id="email-exists-error" class="mt-2 errorMsg d-none"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="roleField" class="form-label">Role</label>
                                        <input type="text" class="form-control" id="roleField" value="" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phoneNumber" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phoneNumber" value="" disabled>
                                        <div id="phone-error" class="mt-2 errorMsg"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" value="" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender" disabled>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-dark btn-cancel" id="editButton">Edit</button>
                                        <button type="button" class="btn btn-dark d-none" id="updateButton">Update</button>
                                        <button type="button" class="btn btn-dark d-none" id="cancelButton">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="passwordSetting" role="tabpanel" aria-labelledby="passwordTab">
                                <form>
                                    <h4 class="mb-4">Change Password</h4>
                                    <div class="mb-3">
                                        <label for="oldPassword" class="form-label">Old Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="oldPassword" required>
                                            <button class="btn btn-dark" type="button"><i class="fa-solid fa-eye"></i></button>
                                        </div>
                                        <div id="oldpass-error" class="mt-2 errorMsg"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label">New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="newPassword" required>
                                            <button class="btn btn-dark" type="button"><i class="fa-solid fa-eye"></i></button>
                                        </div>
                                        <div id="newpass-error" class="mt-2 errorMsg"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="retypeNewPassword" class="form-label">Re-type New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="retypeNewPassword" required>
                                            <button class="btn btn-dark" type="button"><i class="fa-solid fa-eye"></i></button>
                                        </div>
                                        <div id="retypeNewPass-error" class="mt-2 errorMsg"></div>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-dark" id="updatePasswordButton">Update Password</button>
                                    </div>
                                </form>
                            </div>
                            <!-- MyServicesTab -->
                            <div class="tab-pane fade" id="myServices" role="tabpanel" aria-labelledby="bookingsTab">
                                <!-- Add this button above the tab navigation or wherever you prefer -->
                                <div class="text-end mb-3 fs-6">
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#businessModal">
                                        <i class="fa-solid fa-plus"></i> Create New Service
                                    </button>
                                </div>

                                <div class="row" id="latest-card-container">
                                    <!-- append cards here -->
                                </div>

                            </div>

                            <div class="tab-pane fade" id="myBookings" role="tabpanel" aria-labelledby="bookingsTab">
                                <!-- Content for My Bookings -->
                            </div>
                            <div class="tab-pane fade" id="myPurchases" role="tabpanel" aria-labelledby="purchasesTab">
                                <!-- Content for My Purchases -->
                            </div>
                            <div class="tab-pane fade" id="myCustomers" role="tabpanel" aria-labelledby="customersTab">
                                <!-- Content for My Customers -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bookings Modal -->
    <div class="modal fade" id="bookingsModal" tabindex="-1" aria-labelledby="bookingsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingsModalLabel">Bookings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bookingsModalBody">
                    <!-- Bookings will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Service Modal -->
    <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editServiceModalLabel">Edit Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editServiceForm">
                        <input type="hidden" id="editServiceId">
                        <div class="mb-3">
                            <label for="editServiceName" class="form-label">Service Name</label>
                            <input type="text" class="form-control" id="editServiceName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editServiceDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editServiceDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editServicePhone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="editServicePhone" required>
                        </div>

                        <div class="mb-3">
                            <label for="editOpeningHours" class="form-label">Opening Hours</label>
                            <input type="text" class="form-control" id="editOpeningHours" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClosingHours" class="form-label">Closing Hours</label>
                            <input type="text" class="form-control" id="editClosingHours" required>
                        </div>
                        <div class="mb-3">
                            <label for="editOpeningDays" class="form-label">Opening Days</label>
                            <input type="text" class="form-control" id="editOpeningDays" required>
                        </div>
                        <div class="text-end"><button type="submit" class="btn btn-dark">Save Changes</button></div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- New Service Modal -->
    <div class="modal fade" id="businessModal" tabindex="-1" aria-labelledby="businessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="businessModalLabel">Business Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="p-4 register mb-3" id="businessForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="businessName" class="form-label fw-bold">Business Name</label>
                            <input type="text" class="form-control p-2" id="businessName">
                            <div id="business-name-error" class="mt-2 text-danger errorMsg"></div>
                        </div>
                        <div class="mb-3">
                            <label for="businessDescription" class="form-label fw-bold">Business Description</label>
                            <textarea class="form-control p-2" id="businessDescription"></textarea>
                            <div id="business-description-error" class="mt-2 text-danger errorMsg"></div>
                        </div>
                        <div class="mb-3">
                            <label for="servicePhone" class="form-label fw-bold">Phone Number</label>
                            <input type="text" class="form-control p-2" id="servicePhone">
                            <div id="phone-number-error" class="mt-2 text-danger errorMsg"></div>
                        </div>
                        <div class="mb-3">
                            <label for="availableServices" class="form-label fw-bold">Available Services</label>
                            <textarea class="form-control p-2" id="availableServices"></textarea>
                            <div id="available-services-error" class="mt-2 text-danger errorMsg"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="openingHours" class="form-label fw-bold"> Opening Hour: </label>
                                <input type="time" class="form-control p-2" id="openingHours" required>
                                <div id="opening-hours-error" class="mt-2 text-danger errorMsg"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="closingHours" class="form-label fw-bold">Closing Hour: </label>
                                <input type="time" class="form-control p-2" id="closingHours" required>
                                <div id="opening-hours-error" class="mt-2 text-danger errorMsg"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Opening Days</label>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="btn-group" role="group" aria-label="Opening Days">
                                            <input type="checkbox" class="btn-check" id="monday" autocomplete="off" value="Monday">
                                            <label class="btn btn-outline-dark" for="monday">Mon</label>

                                            <input type="checkbox" class="btn-check" id="tuesday" autocomplete="off" value="Tuesday">
                                            <label class="btn btn-outline-dark" for="tuesday">Tue</label>

                                            <input type="checkbox" class="btn-check" id="wednesday" autocomplete="off" value="Wednesday">
                                            <label class="btn btn-outline-dark" for="wednesday">Wed</label>

                                            <input type="checkbox" class="btn-check" id="thursday" autocomplete="off" value="Thursday">
                                            <label class="btn btn-outline-dark" for="thursday">Thu</label>

                                            <input type="checkbox" class="btn-check" id="friday" autocomplete="off" value="Friday">
                                            <label class="btn btn-outline-dark" for="friday">Fri</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="btn-group" role="group">


                                            <input type="checkbox" class="btn-check" id="saturday" autocomplete="off" value="Saturday">
                                            <label class="btn btn-outline-dark" for="saturday">Sat</label>

                                            <input type="checkbox" class="btn-check" id="sunday" autocomplete="off" value="Sunday">
                                            <label class="btn btn-outline-dark" for="sunday">Sun</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="opening-days-error" class="mt-2 text-danger errorMsg"></div>
                        </div>


                        <div class="mb-3">
                            <label for="businessLogo" class="form-label fw-bold">Upload Business Logo</label>
                            <input type="file" class="form-control" id="businessLogo" accept="image/*">
                            <div id="logo-picture-error" class="mt-2 text-danger errorMsg"></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark w-100 mb-3" id="businessSubmitBtn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="mb-3"></div>

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
        const role = '<?php echo $role; ?>';


        searchIcon.addEventListener('click', function() {
            window.location.href = 'searchRecipe.php';
        });

        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get('tab');
        if (tab) {
            const tabButton = document.querySelector(`button[data-bs-target="#${tab}"]`);
            if (tabButton) {
                tabButton.click();
            }
        }

        if (role === 'owners') {
            document.getElementById('servicesTab').style.display = 'none';
            document.getElementById('myTab').innerHTML += `
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="bookingsTab" data-bs-toggle="tab" data-bs-target="#myBookings" type="button" role="tab" aria-controls="myBookings" aria-selected="false">My Bookings</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="purchasesTab" data-bs-toggle="tab" data-bs-target="#myPurchases" type="button" role="tab" aria-controls="myPurchases" aria-selected="false">My Purchases</button>
            </li>
            `;
        } else if (role === 'petShop') {
            document.getElementById('servicesTab').style.display = 'none';
            document.getElementById('myTab').innerHTML += `
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="bookingsTab" data-bs-toggle="tab" data-bs-target="#myBookings" type="button" role="tab" aria-controls="myBookings" aria-selected="false">My Bookings</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="customersTab" data-bs-toggle="tab" data-bs-target="#myCustomers" type="button" role="tab" aria-controls="myCustomers" aria-selected="false">My Customers</button>
            </li>
            `;
        } else {
            document.getElementById('myTab').innerHTML += `
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="purchasesTab" data-bs-toggle="tab" data-bs-target="#myPurchases" type="button" role="tab" aria-controls="myPurchases" aria-selected="false">My Purchases</button>
            </li>`;
        }
    });



    function validateEmail(email) {
        const re = /\S+@\S+\.\S+/;
        return re.test(String(email).toLowerCase());
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


    $("#updateProfileButton").click(function() {
        $("#profileImageInput").trigger("click");
    });

    $(document).ready(function() {
        var isLoggedIn = <?php echo $userLoggedIn ? 'true' : 'false'; ?>;
        console.log(isLoggedIn);
        const userRole = '<?php echo $role; ?>';
        $('.fa-eye').on('click', function() {
            var inputField = $(this).closest('.input-group').find('input');
            if (inputField.attr('type') === 'password') {
                inputField.attr('type', 'text');
            } else {
                inputField.attr('type', 'password');
            }
        });


        $('#updatePasswordButton').on('click', function(e) {
            e.preventDefault();
            var oldPassword = $('#oldPassword').val();
            var newPassword = $('#newPassword').val();
            var retypeNewPassword = $('#retypeNewPassword').val();

            $('#oldpass-error, #newpass-error, #retypeNewPass-error').html('');


            var error = false;
            if (oldPassword === '') {
                $('#oldpass-error').html("Please fill out this field");
                error = true;
            }
            if (newPassword === '') {
                $('#newpass-error').html("Please fill out this field");
                error = true;
            }
            if (retypeNewPassword === '') {
                $('#retypeNewPass-error').html("Please fill out this field");
                error = true;
            }

            if (error) {
                return;
            }

            if (newPassword !== retypeNewPassword) {
                $('#retypeNewPass-error').html("Passwords do not match");
                return;
            }

            var passV = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

            if (!passV.test(newPassword)) {
                $('#newpass-error').html('Password must contain 7 to 15 characters with at least one numeric digit and a special character');
                return;
            }

            $.ajax({
                type: 'POST',
                url: 'api/changePasswordApi.php',
                data: {
                    oldPassword: oldPassword,
                    newPassword: newPassword
                },

                success: function(response) {
                    var responseData = JSON.parse(response);
                    if (responseData.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Changed',
                            text: 'Your password has changed successfully.',
                            confirmButtonText: 'OK'
                        });
                        $('#oldPassword').val('');
                        $('#newPassword').val('');
                        $('#retypeNewPassword').val('');
                    } else if (responseData.error === "Old password is incorrect") {

                        $('#oldpass-error').html(responseData.error);
                    } else {
                        alert(responseData.error);
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseText;
                    $('#oldpass-error').text(errorMessage);
                }
            });
        });

        function displayMyServices() {
            $.ajax({
                type: 'GET',
                url: 'api/getMyServices.php',
                dataType: 'json',
                success: function(response) {
                    if (response.length > 0) {
                        response.forEach(function(service) {
                            var starsHTML = generateStars(service.overall_rating);
                            const serviceImageUrl = service.service_image.replace("../", "");
                            var rowHtml = `
                                <div class="row align-items-center mb-4 py-3 border rounded shadow-sm bg-white">
                                    <div class="col-md-2 text-center">
                                        <img src="${serviceImageUrl}" alt="${service.service_name}" class="img-fluid rounded-circle" style="max-width: 80px;">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="mb-0 fw-bold">${service.service_name}</h5>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <p class="mb-0 text-muted ms-2"><i class="fa-solid fa-phone me-1"></i> ${service.service_phone}</p>
                                            <button class="btn btn-sm btn-dark w-30 view-bookings-btn" data-service-id="${service.service_id}" data-service-type="${service.service_type}" style="min-width: 150px;">View Bookings</button>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <p class="mb-0 text-muted ms-2">Service Type: ${service.service_type}</p>
                                            <button class="btn btn-sm btn-dark w-30 edit-service-btn" data-service-id="${service.service_id}" data-service-name="${service.service_name}" data-service-description="${service.service_desc}" data-service-phone="${service.service_phone}" data-opening-hours="${service.openingHours}"  data-closing-hours="${service.closingHours}" data-opening-days="${service.openingDays}" style="min-width: 150px;">Edit Service <i class="fa-regular fa-pen-to-square"></i></button>
                                        </div>
                                    </div>
                                </div>`;
                            $('#latest-card-container').append(rowHtml);
                        });
                        $('.view-bookings-btn').click(function() {
                            var serviceId = $(this).data('service-id');
                            var serviceType = $(this).data('service-type');
                            fetchBookings(serviceId, serviceType);
                        });
                        $('.edit-service-btn').click(function() {
                            var serviceId = $(this).data('service-id');
                            var serviceName = $(this).data('service-name');
                            var serviceDesc = $(this).data('service-description');
                            var servicePhone = $(this).data('service-phone');
                            var openingHours = $(this).data('opening-hours');
                            var closingHours = $(this).data('closing-hours');
                            var openingDays = $(this).data('opening-days');

                            $('#editServiceId').val(serviceId);
                            $('#editServiceName').val(serviceName);
                            $('#editServiceDescription').val(serviceDesc);
                            $('#editServicePhone').val(servicePhone);
                            $('#editOpeningHours').val(openingHours);
                            $('#editClosingHours').val(closingHours);
                            $('#editOpeningDays').val(openingDays);
                            $('#editServiceModal').modal('show');
                        });
                    } else {
                        $('#latest-card-container').append('<p>No Services found.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching services:', error);
                }
            });
        }

        function fetchBookings(serviceId, serviceType) {
            var apiUrl = '';

            if (serviceType === 'petHotel') {
                apiUrl = 'api/getPetHotelBookings.php';
            } else {
                apiUrl = 'api/getBookings.php';
            }

            $.ajax({
                type: 'GET',
                url: apiUrl,
                data: {
                    serviceId: serviceId
                },
                dataType: 'json',
                success: function(response) {
                    var bookingsHtml = '';

                    if (response.length > 0) {
                        response.forEach(function(booking) {
                            if (serviceType === 'petHotel') {
                                bookingsHtml += `
                        <div class="card mb-3 booking-item" data-booking-id="${booking.booking_id}" data-service-type="${serviceType}">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Booking ID: ${booking.booking_id}</h5>
                                <div class="form-check">
                                    <input class="form-check-input mark-as-finished" type="checkbox" data-booking-id="${booking.booking_id}" id="finished_${booking.booking_id}">
                                    <label class="form-check-label mark-as-finished-label" for="finished_${booking.booking_id}">
                                        Done
                                    </label>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Customer Name:</strong> ${booking.user_name}</p>
                                        <p><strong>Check-in Date:</strong> ${booking.checkin_date}</p>
                                        <p><strong>Check-out Date:</strong> ${booking.checkout_date}</p>
                                        <p><strong>Check-in Hour:</strong> ${booking.checkin_hour}</p>
                                        <p><strong>Check-out Hour:</strong> ${booking.checkout_hour}</p>
                                        <p><strong>Pet Type:</strong> ${booking.pet_type}</p>
                                        <p><strong>Room Type:</strong> ${booking.room_type}</p>
                                        <p><strong>Door-to-Door:</strong> ${booking.door_to_door_info}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Service Type:</strong> ${booking.service_type}</p>
                                        <p><strong>Pet Name:</strong> ${booking.petName}</p>
                                        <p><strong>Pet Age:</strong> ${booking.petAge}</p>
                                        <p><strong>Species:</strong> ${booking.species}</p>
                                        <p><strong>Pet Gender:</strong> ${booking.petGender}</p>
                                        <p><strong>Important Info:</strong> ${booking.importantInfo}</p>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                            } else {
                                bookingsHtml += `
                        <div class="card mb-3 booking-item" data-booking-id="${booking.booking_id}" data-service-type="${serviceType}">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Booking ID: ${booking.booking_id}</h5>
                                <div class="form-check">
                                    <input class="form-check-input mark-as-finished" type="checkbox" data-booking-id="${booking.booking_id}" id="finished_${booking.booking_id}">
                                    <label class="form-check-label mark-as-finished-label" for="finished_${booking.booking_id}">
                                        Mark as Finished
                                    </label>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Customer Name:</strong> ${booking.user_name}</p>
                                        <p><strong>Booking Date:</strong> ${booking.booking_date}</p>
                                        <p><strong>Booking Time:</strong> ${booking.booking_time}</p>
                                        <p><strong>Pet Type:</strong> ${booking.pet_type}</p>
                                        <p><strong>Service Type:</strong> ${booking.service_type}</p>
                                        <p><strong>Door-to-Door:</strong> ${booking.door_to_door_info}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Pet Name:</strong> ${booking.petName}</p>
                                        <p><strong>Pet Age:</strong> ${booking.petAge}</p>
                                        <p><strong>Species:</strong> ${booking.species}</p>
                                        <p><strong>Pet Gender:</strong> ${booking.petGender}</p>
                                        <p><strong>Important Info:</strong> ${booking.importantInfo}</p>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                            }
                        });
                    } else {
                        bookingsHtml = '<p>No bookings found for this service.</p>';
                    }

                    $('#bookingsModalBody').html(bookingsHtml);
                    $('#bookingsModal').modal('show');

                    // Add event listener for "Mark as Finished" checkboxes
                    $('.mark-as-finished').on('change', function() {
                        var bookingId = $(this).data('booking-id');
                        var serviceType = $(this).closest('.booking-item').data('service-type');
                        if (this.checked) {
                            markBookingAsFinished(bookingId, serviceType);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching bookings:', error);
                }
            });
        }

        function markBookingAsFinished(bookingId, serviceType) {
            $.ajax({
                type: 'POST',
                url: 'api/markBookingAsFinished.php',
                data: {
                    bookingId: bookingId,
                    serviceType: serviceType
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $(`.booking-item[data-booking-id="${bookingId}"]`).remove();
                    } else {
                        alert('Error marking booking as finished.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error marking booking as finished:', error);
                }
            });
        }

        $(document).on('submit', '#editServiceForm', function(e) {
            e.preventDefault();

            var serviceId = $('#editServiceId').val();
            var serviceName = $('#editServiceName').val();
            var serviceDescription = $('#editServiceDescription').val();
            var servicePhone = $('#editServicePhone').val();
            var openingHours = $('#editOpeningHours').val();
            var closingHours = $('#editClosingHours').val();
            var openingDays = $('#editOpeningDays').val();

            $.ajax({
                type: 'POST',
                url: 'api/updateService.php',
                data: {
                    serviceId: serviceId,
                    serviceName: serviceName,
                    serviceDescription: serviceDescription,
                    servicePhone: servicePhone,
                    openingHours: openingHours,
                    closingHours: closingHours,
                    openingDays: openingDays
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // $('#editServiceModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Updated Successfully',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Update Error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error updating service:', error);
                }
            });
        });

        $('#businessForm').submit(function(e) {
            e.preventDefault();

            var businessName = $('#businessName').val();
            var businessDescription = $('#businessDescription').val();
            var phoneNumber = $('#servicePhone').val();
            var availableServices = $('#availableServices').val();
            var openingHours = $('#openingHours').val();
            var closingHours = $('#closingHours').val();
            var businessLogo = $('#businessLogo')[0].files[0];

            var openingDays = [];
            $('#businessModal .btn-check:checked').each(function() {
                openingDays.push($(this).val());
            });
            $('#business-name-error, #business-description-error, #phone-number-error, #available-spots-error, #available-services-error, #opening-hours-error, #opening-days-error, #logo-picture-error').empty();

            var error = false;
            if (businessName === '') {
                $('#business-name-error').html('Please fill out this field');
                error = true;
            }
            if (businessDescription === '') {
                $('#business-description-error').html('Please fill out this field');
                error = true;
            }
            if (phoneNumber === '') {
                $('#phone-number-error').html('Please fill out this field');
                error = true;
            }
            if (availableServices === '') {
                $('#available-services-error').html('Please fill out this field');
                error = true;
            }
            if (openingHours === '') {
                $('#opening-hours-error').html('Please fill out this field');
                error = true;
            }
            if (closingHours === '') {
                $('#opening-hours-error').html('Please fill out this field');
                error = true;
            }
            if (openingDays.length === 0) {
                $('#opening-days-error').html('Please select at least one opening day');
                error = true;
            }

            if (!businessLogo) {
                $('#logo-picture-error').html('Please upload a logo');
                error = true;
            }

            if (error) {
                return;
            }

            var businessFormData = new FormData();
            businessFormData.append('businessName', businessName);
            businessFormData.append('businessDescription', businessDescription);
            businessFormData.append('phoneNumber', phoneNumber);
            businessFormData.append('availableServices', availableServices);
            businessFormData.append('openingHours', openingHours);
            businessFormData.append('closingHours', closingHours);
            businessFormData.append('openingDays', JSON.stringify(openingDays));

            if (businessLogo) {
                businessFormData.append('businessLogo', businessLogo);
            }

            $.ajax({
                type: "POST",
                url: "api/businessDetailsAPI.php",
                data: businessFormData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(msg) {
                    if (msg === 'Success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Service Added',
                            text: 'Your new service has registered successfully.',
                            confirmButtonText: 'OK'
                        });
                        window.location.href = "userinfo.php";
                    } else {
                        alert("Unable to submit business details!");
                    }
                },
                error: function() {
                    alert("Error submitting business details!");
                }
            });
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

        $("#usernameField, #emailField, #phoneNumber, #dob, #gender").prop(
            "disabled",
            true
        );

        // Edit button click event
        $("#editButton").click(function() {
            $("#usernameField, #emailField, #phoneNumber, #dob, #gender").prop(
                "disabled",
                false
            );
            $("#updateButton").removeClass("d-none");
            $("#cancelButton").removeClass("d-none");
            $(this).addClass("d-none");
        });

        $.ajax({
            type: "GET",
            url: "api/userInfoApi.php",
            dataType: "json",
            success: function(response) {
                $("#username").html(response.username);
                $("#email").html(response.email);
                $("#role").html(response.role);
                $("#usernameField").val(response.username);
                $("#emailField").val(response.email);
                $("#roleField").val(response.role);
                $("#phoneNumber").val(response.phone);
                $("#dob").val(response.birthday);
                $("#gender").val(response.gender);
                const correctedImageUrl = response.profile.replace("../", "");
                $("#profile").attr("src", correctedImageUrl);
            },
            error: function() {
                console.error("Failed to fetch user information");
            },
        });

        $("#cancelButton").click(function() {
            // Fetch original values
            $.ajax({
                type: "GET",
                url: "api/userInfoApi.php",
                dataType: "json",
                success: function(response) {
                    $("#usernameField").val(response.username);
                    $("#emailField").val(response.email);
                    $("#phoneNumber").val(response.phone);
                    $("#dob").val(response.birthday);
                    $("#gender").val(response.gender);
                    $('#name-error').text("");
                    $("#email-error").text("");
                },
                error: function() {
                    console.error("Failed to fetch user information");
                },
            });
            $("#usernameField, #emailField, #phoneNumber, #dob, #gender").prop(
                "disabled",
                true
            );
            $("#updateButton").addClass("d-none");
            $("#editButton").removeClass("d-none");
            $("#cancelButton").addClass("d-none");
            $("#email-exists-error").addClass("d-none").text("");
        });

        $("#updateButton").click(function() {
            var updatedUsername = $("#usernameField").val();
            var updatedEmail = $("#emailField").val();
            var updatedPhone = $("#phoneNumber").val();
            var updatedDob = $("#dob").val();
            var updatedGender = $("#gender").val();

            $("#name-error, #email-error").empty();

            var error = false;
            if (updatedUsername === "") {
                $("#name-error").html("Please fill out this field");
                error = true;
            }
            if (updatedEmail === "") {
                $("#email-error").html("Please fill out this field");
                error = true;
            } else if (!validateEmail(updatedEmail)) {
                $("#email-error").html("Please enter a valid email address");
                error = true;
            }
            if (!updatedDob.value) {
                updatedDob.value = " ";
            }
            console.log('Date of Birth:', updatedDob.value);
            if (error) {
                return;
            }

            $.ajax({
                type: "POST",
                url: "api/updateUserApi.php",
                data: {
                    username: updatedUsername,
                    email: updatedEmail,
                    phone: updatedPhone,
                    birthday: updatedDob,
                    gender: updatedGender,
                },
                dataType: "json",
                success: function(response) {
                    console.log("User information updated successfully:", response);
                    $("#usernameField, #emailField, #phoneNumber, #dob, #gender").prop(
                        "disabled",
                        true
                    );

                    $("#editButton").removeClass("d-none");
                    $("#updateButton").addClass("d-none");
                    $("#cancelButton").addClass("d-none");
                    $("#email-exists-error").addClass("d-none").text("");
                },
                error: function(xhr) {
                    if (
                        xhr.responseJSON &&
                        xhr.responseJSON.error === "Email already exists"
                    ) {
                        $("#email-exists-error")
                            .removeClass("d-none")
                            .text(xhr.responseJSON.error);
                        $("#email-error").empty();
                    } else {
                        console.error("Failed to update user information");
                    }
                },
            });
        });

        $("#profileImageInput").change(function(event) {
            const file = event.target.files[0];

            const formData = new FormData();
            formData.append("profileImage", file);
            $.ajax({
                type: "POST",
                url: "api/updateProfileApi.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log("Profile picture updated successfully:", response);

                    $("#profile").attr("src", URL.createObjectURL(file));
                },
                error: function(xhr) {
                    console.error("Failed to update profile picture:", xhr);
                },
            });
        });

        function fetchBookingsForOwners() {
            $.ajax({
                url: 'api/fetchBookingsForOwners.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const bookingsContainer = document.getElementById('myBookings');

                    // Clear previous content
                    bookingsContainer.innerHTML = '';

                    // Check if data is not empty
                    if (data.length === 0) {
                        bookingsContainer.innerHTML = '<p>No bookings found.</p>';
                    } else {
                        // Create and append new content
                        data.forEach(function(booking) {
                            const bookingCard = document.createElement('div');
                            const serviceImageUrl = booking.service_image.replace("../", "");
                            bookingCard.className = 'card mb-3';

                            // Differentiate between regular and hotel bookings
                            if (booking.type === 'hotel') {
                                bookingCard.innerHTML = `
                        <div class="row g-4 mb-4">
                            <div class="col-md-4 mb-3 d-flex justify-content-center align-items-center">
                                <div class="service-image-container">
                                    <img src="${serviceImageUrl}" class="img-fluid" alt="${booking.service_name}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card2 shadow-lg rounded-4 mt-2 mb-2 me-2 ms-2">
                                    <div class="card-body2 border border-secondary">
                                        <h5 class="card-title mb-3">${booking.service_name}</h5>
                                        <p class="card-text mb-2"><strong>Service Type:</strong> ${booking.service_type}</p>
                                        <p class="card-text mb-2"><strong>Check-in Date:</strong> ${booking.checkin_date}</p>
                                        <p class="card-text mb-2"><strong>Checkout Date:</strong> ${booking.checkout_date}</p>
                                        <p class="card-text mb-2"><strong>Check-in Hour:</strong> ${booking.checkin_hour}</p>
                                        <p class="card-text mb-2"><strong>Checkout Hour:</strong> ${booking.checkout_hour}</p>
                                        <p class="card-text mb-2"><strong>Booking ID:</strong> ${booking.booking_id}</p>
                                        <button class="btn btn-dark mt-3 cancel-booking-btn" 
                                                data-booking-id="${booking.booking_id}" 
                                                data-booking-type="hotel">Cancel Booking</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                            } else {
                                bookingCard.innerHTML = `
                        <div class="row g-4 mb-4">
                            <div class="col-md-4 mb-3 d-flex justify-content-center align-items-center">
                                <div class="service-image-container">
                                    <img src="${serviceImageUrl}" class="img-fluid" alt="${booking.service_name}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card2 shadow-lg rounded-4 mt-2 mb-2 me-2 ms-2">
                                    <div class="card-body2 border border-secondary">
                                        <h5 class="card-title mb-3">${booking.service_name}</h5>
                                        <p class="card-text mb-2"><strong>Service Type:</strong> ${booking.service_type}</p>
                                        <p class="card-text mb-2"><strong>Booking Date:</strong> ${booking.date}</p>
                                        <p class="card-text mb-2"><strong>Time Range:</strong> ${booking.timeRange}</p>
                                        <p class="card-text mb-2"><strong>Booking ID:</strong> ${booking.booking_id}</p>
                                        <button class="btn btn-dark mt-3 cancel-booking-btn" 
                                        data-booking-id="${booking.booking_id}" 
                                        data-booking-type="regular">Cancel Booking</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                            }

                            bookingsContainer.appendChild(bookingCard);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    $('#myBookings').html('<p>Error loading bookings. Please try again later.</p>');
                }
            });
        }

        $(document).on('click', '.cancel-booking-btn', function() {
            const bookingId = $(this).data('booking-id');
            const bookingType = $(this).data('booking-type'); // New data attribute for booking type

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to cancel this booking?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'api/cancelBooking.php',
                        method: 'POST',
                        data: {
                            booking_id: bookingId,
                            booking_type: bookingType // Pass the booking type
                        },
                        success: function(response) {
                            response = JSON.parse(response);
                            if (response.success) {
                                Swal.fire('Cancelled!', 'Your booking has been cancelled.', 'success');
                                fetchBookingsForOwners(); // Refresh the bookings list
                            } else {
                                Swal.fire('Error!', 'Error cancelling booking: ' + response.message, 'error');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            Swal.fire('Error!', 'Error cancelling booking. Please try again later.', 'error');
                        }
                    });
                }
            });
        });


        function fetchPurchases() {
            $.ajax({
                url: 'api/fetchPurchases.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const purchasesContainer = document.getElementById('myPurchases');

                    // Clear previous content
                    purchasesContainer.innerHTML = '';

                    // Check if data is not empty
                    if (data.length === 0) {
                        purchasesContainer.innerHTML = '<p>No purchases found.</p>';
                    } else {
                        // Create and append new content
                        data.forEach(function(purchase) {
                            const purchaseCard = document.createElement('div');
                            purchaseCard.className = 'card mb-3';
                            purchaseCard.innerHTML = `
                            <div class="card3 shadow-sm border-0">
                                <div class="card-header3 d-flex justify-content-between align-items-center bg-dark py-2 px-3">
                                    <h5 class="card-title text-white mb-0">Order Date: ${purchase.order_date}</h5>
                                    <span class="badge bg-dark text-white">Order #${purchase.order_id}</span>
                                </div>
                                <div class="card-body3">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h6 class="card-subtitle text-muted">Total Price:</h6>
                                        <p class="card-text mb-0">$${purchase.total_price}</p>
                                    </div>
                                    <h6 class="card-subtitle text-muted mb-2">Items:</h6>
                                    <ul class="list-group list-group-flush">
                                        ${purchase.total_products.map(item => `<li class="list-group-item">${item}</li>`).join('')}
                                    </ul>
                                </div>
                            </div>
                        `;
                            purchasesContainer.appendChild(purchaseCard);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    $('#myPurchases').html('<p>Error loading purchases. Please try again later.</p>');
                }
            });
        }

        $('#customersTab').on('shown.bs.tab', function() {
            $.ajax({
                url: 'api/fetchCustomers.php',
                method: 'GET',
                success: function(data) {
                    let customers = JSON.parse(data);
                    let customerContent = '';
                    customers.forEach((customer, index) => {
                        const profileImageUrl = customer.profile.replace("../", "");
                        const collapseId = `collapseCustomer${index}`;

                        customerContent += `
                <div class="card mb-4 shadow-sm border-0" id="customerCard${index}">
                    <div class="card-header3 d-flex justify-content-between align-items-center bg-dark text-white py-2 px-3">
                        <h5 class="card-title mb-0 text-white">${customer.username}</h5>
                        <div>
                            <span class="badge bg-dark text-white">Order ID #${customer.order_id}</span>
                            <button class="btn btn-link text-white toggle-details" type="button" aria-expanded="false" aria-controls="${collapseId}">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                    <div id="${collapseId}" class="collapse">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="${profileImageUrl}" alt="${customer.username}" class="rounded-circle mr-3" width="70" height="70">
                                <div class="ms-5">
                                    <h6 class="card-subtitle mb-1">${customer.name} ${customer.surname}</h6>
                                    <p class="card-text mb-1"><strong>Email:</strong> ${customer.email}</p>
                                    <p class="card-text mb-1"><strong>Phone:</strong> ${customer.phone}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <h6 class="card-subtitle text-muted">Order Date:</h6>
                                <p class="card-text mb-0">${customer.order_date}</p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <h6 class="card-subtitle text-muted">Total Price:</h6>
                                <p class="card-text mb-0">$${customer.total_price}</p>
                            </div>
                            <h6 class="card-subtitle text-muted mb-2">Items:</h6>
                            <ul class="list-group list-group-flush mb-3">
                                ${customer.total_products.map(item => `<li class="list-group-item">${item}</li>`).join('')}
                            </ul>
                            <h6 class="card-subtitle text-muted mb-2">Shipping Address:</h6>
                            <p class="card-text mb-0">${customer.address_line1} ${customer.address_line2 ? ', ' + customer.address_line2 : ''}</p>
                            <p class="card-text mb-0">${customer.state}, ${customer.district} ${customer.zip_code}</p>
                        </div>
                        <div class="d-flex justify-content-end me-3">
                            <button class="btn btn-sm btn-outline-dark delete-customer mb-3" data-order-id="${customer.order_id}" data-card-id="customerCard${index}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
                `;
                    });
                    $('#myCustomers').html(customerContent);
                }
            });
        });

        // Delegate the toggle-details click event to the parent container
        $('#myCustomers').on('click', '.toggle-details', function() {
            const collapseTarget = $(this).attr('aria-controls');
            const icon = $(this).find('i');

            if ($(this).attr('aria-expanded') === 'true') {
                // Collapse the card
                $('#' + collapseTarget).collapse('hide');
                $(this).attr('aria-expanded', 'false');
                icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
            } else {
                // Expand the card
                $('.collapse').collapse('hide'); // Close other open collapses
                $('.toggle-details').attr('aria-expanded', 'false');
                $('.toggle-details i').removeClass('fa-chevron-up').addClass('fa-chevron-down');

                $('#' + collapseTarget).collapse('show');
                $(this).attr('aria-expanded', 'true');
                icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
            }
        });

        // Ensure icon changes back when collapse is hidden
        $('#myCustomers').on('hidden.bs.collapse', '.collapse', function() {
            const button = $(this).prev().find('.toggle-details');
            button.attr('aria-expanded', 'false');
            button.find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        });

        // Delegate the delete-customer click event to the parent container
        $('#myCustomers').on('click', '.delete-customer', function() {
            const customerId = $(this).data('order-id');
            const cardId = $(this).data('card-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this customer history?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'api/deleteCustomer.php',
                        method: 'POST',
                        data: {
                            id: customerId
                        },
                        success: function(response) {
                            if (response === 'success') {
                                $('#' + cardId).remove(); // Remove the card from the DOM
                                Swal.fire(
                                    'Deleted!',
                                    'Customer history has been deleted.',
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'There was an issue deleting the customer history.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting customer:', error);
                            Swal.fire(
                                'Error!',
                                'There was an issue deleting the customer history.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

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
        updateCartItemCount();
        fetchPurchases();
        fetchBookingsForOwners();
        fetchAndUpdateNavbar();
        displayMyServices();


    });
</script>
</body>

</html>