<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a href="#" class="title">Pasada</a>

        <div class="buttons">
            <div class="dropdown">
                <button onclick="myFunction()" class="partner">Be Our Partner <span class="dropdown-arrow">▼</span></button>
                <div id="myDropdown" class="partner_content">
                    <a href="#">Customer</a>
                    <a href="#">Operator</a>
                    <a href="#">Driver</a>
                </div>
            </div>

            <!-- New buttons for login and register -->
            <button class="login" onclick="openLogin()">Login</button>
            <button class="register" onclick="openRegistration()">Register</button>
        </div>
    </header>

    <div id="loginOverlay" class="overlay">
        <div class="loginregister-content">
            <h2>Login as:</h2>
            <button class="loginregister-option" onclick="location.href='customer_login.php'">Customer</button>
            <button class="loginregister-option" onclick="location.href='operator_login.php'">Operator</button>
            <button class="loginregister-option" onclick="location.href='driver_login.php'">Driver</button>
            <!-- ... (other registration form elements) ... -->
            <button class="close_button" onclick="closeLogin()">Close</button>
        </div>
    </div>

    <div id="registrationOverlay" class="overlay">
        <div class="loginregister-content">
            <h2>Register as:</h2>
            <button class="loginregister-option" onclick="location.href='customer_register.php'">Customer</button>
            <button class="loginregister-option" onclick="location.href='operator_register.php'">Operator</button>
            <button class="loginregister-option" onclick="location.href='driver_register.php'">Driver</button>
            <!-- ... (other registration form elements) ... -->
            <button class="close_button" onclick="closeRegistration()">Close</button>
        </div>
    </div>

    <script src="function1.js"></script>
</body>
</html>
