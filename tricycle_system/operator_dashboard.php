<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fare Calculator</title>
    <link rel="stylesheet" href="design.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <a href="#" class="title">Pasada</a>

        <div class="buttons">
            <div class="dropdown">
                <button onclick="myFunction()" class="partner">Services Offered<span class="dropdown-arrow">∨</span></button>
                <div id="myDropdown" class="partner_content two">
                    <a href="#">Hatid-Sundo</a>
                    <a href="#">Renta</a>
                    <a href="#">Padala</a>
                </div>
            </div>

            <button class="login" onclick="detailsOperator()">User</button>
            <!-- New buttons for login and register -->
            <button class="register" onclick="logOut()">Log out</button>
        </div>
    </header>

    <script src="function1.js"></script>
</body>
</html>