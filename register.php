<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/d95a706c26.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbarStyle.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            overflow-x: hidden;
            scrollbar-width: none;
        }

        body::-webkit-scrollbar {
            width: 0;
            height: 0;
        }

        .errorMsg {
            font-size: smaller;
        }

        #register_btn {
            display: inline-block;
            color: #fff;
            text-transform: capitalize;
            transition: all .42s ease;
        }

        #register_btn:hover {
            background-color: whitesmoke;
            color: #111;
        }

        .register {
            background-color: #FDE7DA;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/Design.png" alt="Logo" width="60" height="53" class="d-inline-block align-text-top rounded-circle">
            </a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header text-dark border-bottom border-dark">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Marco's Cooking</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body d-flex flex-column p-4 flex-lg-row p-lg-0 ">
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
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="booking">Booking</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="shopping.php">Shopping</a>
                        </li>
                    </ul>
                    <form class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-2" action="searchRecipe.php" method="GET">

                        <a class="btn btn-outline-secondary mx-2" href="login.php">Login</a>
                        <a class="btn btn-outline-secondary" href="register.php">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container pt-3">
        <div class="row justify-content-end">
            <div class="col-12 col-md-6">
                <form class="p-4 register mb-3">
                    <h3 class="text-center fw-bold">Registration</h3>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" class="form-control p-2" id="username">
                        <div id="name-error" class="mt-2 text-danger errorMsg"></div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control p-2" id="email">
                        <div id="email-error" class="mt-2 text-danger errorMsg"></div>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label fw-bold">Role</label>
                        <select class="form-select p-2" id="role">
                            <option value="owners">Pet Owners</option>
                            <option value="petHospital">Pet Hospital</option>
                            <option value="petSpa">Pet Spa</option>
                            <option value="petHotel">Pet Hotel</option>
                            <option value="petShop">Pet Shop</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control p-2" id="password">
                        <div id="pass-error" class="mt-2 text-danger errorMsg"></div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label fw-bold">Confirm Password</label>
                        <input type="password" class="form-control p-2" id="confirmPassword">
                        <div id="confirm-pass-error" class="mt-2 text-danger errorMsg"></div>
                    </div>

                    <div class="mb-3">
                        <label for="profilePicture" class="form-label fw-bold">Upload Profile</label>
                        <input type="file" class="form-control" id="profilePicture" accept="image/*">
                        <div id="profile-picture-error" class="mt-2 text-danger errorMsg"></div>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 mb-3" id="register_btn">Register</button>
                    <div class="text-center">
                        Already have an account? <a href="login.php">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                            <label for="phoneNumber" class="form-label fw-bold">Phone Number</label>
                            <input type="text" class="form-control p-2" id="phoneNumber">
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
                        <div class="mb-3 ms-2">
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
    <button class="accessibility-button" onclick="toggleAccessibilityMenu()">
        <img src="images/Handicapped Access Only Sing 3d Icon.png" alt="accessibility-icon" width="30" height="30">
    </button>

    <div class="accessibility-menu" id="accessibilityMenu">
        <button id="increaseTextBtn" class="accessibility-btn">Increase Text</button>
        <button id="decreaseTextBtn" class="accessibility-btn">Decrease Text</button>
        <button id="underlineLinksBtn" class="accessibility-btn">Underline Links</button>
        <button id="resetBtn" class="accessibility-btn">Reset</button>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/navbar.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    function validateEmail(email) {
        const re = /\S+@\S+\.\S+/;
        return re.test(String(email).toLowerCase());
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

        $('#register_btn').click(function(e) {
            e.preventDefault();
            var username = $('#username').val();
            var email = $('#email').val();
            var role = $('#role').val();
            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();
            var profilePic = $('#profilePicture')[0].files[0];

            $('#name-error, #email-error, #pass-error, #confirm-pass-error, #profile-picture-error').empty();

            var error = false;
            if (username === '') {
                $('#name-error').html('Please fill out this field');
                error = true;
            }
            if (email === '') {
                $('#email-error').html('Please fill out this field');
                error = true;
            } else if (!validateEmail(email)) {
                $('#email-error').html('Please enter a valid email address');
                error = true;
            }

            if (password === '') {
                $('#pass-error').html('Please fill out this field');
                error = true;
            }
            if (confirmPassword === '') {
                $('#confirm-pass-error').html('Please fill out this field');
                error = true;
            }
            if (!profilePic) {
                $('#profile-picture-error').html('Please upload a profile picture');
                error = true;
            }

            if (error) {
                return;
            }

            if (password !== confirmPassword) {
                $('#confirm-pass-error').html('Passwords do not match');
                return;
            }

            var passV = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
            if (!passV.test(password)) {
                $('#pass-error').html('Password must contain 7 to 15 characters with at least one numeric digit and a special character');
                return;
            }

            var formData = new FormData();
            formData.append('username', username);
            formData.append('email', email);
            formData.append('role', role);
            formData.append('password', password);
            formData.append('profilePicture', profilePic);

            $.ajax({
                type: "POST",
                url: "api/registerAPI.php",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
            }).done(function(msg) {
                if (msg === 'Success') {
                    if (role === 'petSpa' || role === 'petHospital' || role === 'petHotel') {
                        $('#businessModal').modal('show');
                    } else {
                        window.location.href = "index.php";
                    }
                } else if (msg === 'Email already registered') {
                    $('#email-error').html('This email is already registered');
                } else {
                    alert("Unable to register!");
                }
            });
        });

        $('#businessForm').submit(function(e) {
            e.preventDefault();

            var businessName = $('#businessName').val();
            var businessDescription = $('#businessDescription').val();
            var phoneNumber = $('#phoneNumber').val();
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
                        window.location.href = "index.php";
                    } else {
                        alert("Unable to submit business details!");
                    }
                },
                error: function() {
                    alert("Error submitting business details!");
                }
            });
        });
    });
</script>
</body>

</html>