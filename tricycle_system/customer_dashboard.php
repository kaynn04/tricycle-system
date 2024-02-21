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

            <button class="login" onclick="details()">User</button>
            <!-- New buttons for login and register -->
            <button class="register" onclick="logOut()">Log out</button>
        </div>
    </header>

    <div class="fare-calculator">
        <form action="" method="post">
            <label for="origin">Origin:</label>
            <input type="text" id="origin" name="origin" required>

            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" required>

            <div class="button1">
                <button class="viewDetailsBtn"type="submit" value="submit" name="submit">View Details</button>
                <button type="button" class="clearButton" onclick="clearForm()">Clear</button>
            </div>
        </form>
        <?php
        if (isset($_POST["submit"])) {
            include_once "database.php";

            $origin = $_POST["origin"];
            $destination = $_POST["destination"];

            $query = "SELECT Distance_km, Fare FROM fare_tbl WHERE Origin = ? AND Destination = ?";

            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, "ss", $origin, $destination);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $distance_km, $fare);

                if (mysqli_stmt_fetch($stmt)) {
                    // Add a new div for confirming details
                    echo "<div class='confirm-details'>";
                    echo "<h3>Confirm Details:</h3>";
                    echo "<p>Origin: $origin</p>";
                    echo "<p>Destination: $destination</p>";
                    echo "<p>Distance: $distance_km km</p>";
                    echo "<p>Fare: $fare</p>";
                    echo "<button type='submit' class='placeOrder' onclick='completeOrder()' name='place_order'>Place Order</button>";
                    echo "</div>";
                } else {
                    echo "<div class='alert alert-warning'>No fare information found for the specified origin and destination.</div>";
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "<div class='alert alert-danger'>Error in preparing SQL statement.</div>";
            }

            echo "<script src='function1.js'></script>";

            mysqli_close($conn);
        }
        ?>
    </div>

    <script src="function1.js"></script>
</body>
</html>