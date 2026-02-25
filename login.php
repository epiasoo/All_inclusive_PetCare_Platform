<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/d95a706c26.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/navbarStyle.css">
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

        #login_btn {
            display: inline-block;
            color: #fff;
            text-transform: capitalize;
            transition: all .42s ease;
        }

        #login_btn:hover {
            background-color: whitesmoke;
            color: #111;
        }


        .loginForm {
            background-color: #FDE7DA;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .errorMsg {
            font-size: smaller;
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
    <div class="container mt-5 pt-5">
        <div class="row justify-content-end">
            <div class="col-md-6">
                <form class="p-4 login mb-4 loginForm">
                    <h3 class="text-center fw-bold"> Login </h3>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control p-2" aria-describedby="emailHelp" id="email">
                        <div id="email-error" class="mt-2 text-danger errorMsg"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control p-2" id="password">
                        <div id="pass-error" class="mt-2 text-danger errorMsg"></div>
                    </div>


                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Remember Me
                            </label>
                        </div>
                        <a href="forgot_password.php" class="text-dark">Forgot Password?</a>
                    </div>

                    <div class="col text-center mb-3">
                        <button type="submit" class="btn btn-dark w-100" id="login_btn">Login</button>
                    </div>
                    <div class="text-center">
                        Not registered? <a href="register.php" class="text-dark">Create an account!</a>
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

    function validateEmail(email) {
        const re = /\S+@\S+\.\S+/;
        return re.test(String(email).toLowerCase());
    }
    $(document).ready(function() {


        $('#login_btn').click(function(e) {
            e.preventDefault();

            var email = $('#email').val();
            var password = $('#password').val();

            var formData = {
                email: email,
                password: password,
            };

            $('#email-error, #pass-error').empty();

            // Check if any field is empty
            var error = false;

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


            if (error) {
                return;
            }

            $.ajax({
                    type: 'POST',
                    url: 'api/loginAPI.php',
                    data: formData,

                })
                .done(function(msg) {
                    if (msg == 'Success') {
                        window.location.href = "index.php";
                    } else if (msg == 'Email not registered') {
                        $('#email-error').html('Email is not registered yet');
                    } else if (msg == 'Incorrect password') {
                        $('#pass-error').html('Password is incorrect');
                    } else {
                        alert("Unable to login!");
                    }
                });
        });
    });
</script>
</body>

</html>