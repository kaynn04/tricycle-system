<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: operator_dashboard.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="logreg.css">
</head>
<body>
    <div class="container">
        <?php
        require_once "database.php";

        $stmtInsertUser = null;

        if (isset($_POST["submit"])) {
            $userName = $_POST["userName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            $lastName = $_POST["lastName"];
            $firstName = $_POST["firstName"];
            $middleName = $_POST["middleName"];
            $sex = $_POST["sex"];
            $birthDate = $_POST["birthDate"];
            $blockNo = $_POST["blockNo"];
            $lotNo = $_POST["lotNo"];
            $street = $_POST["street"];
            $barangay = $_POST["barangay"];
            $city = $_POST["city"];
            $licenseNo = $_POST["licenseNo"];
            $licenseExpirationDate = $_POST["licenseExpirationDate"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if (empty($email) || empty($password) || empty($passwordRepeat) || empty($lastName) || empty($firstName) || empty($sex) || empty($blockNo) || empty($lotNo) || empty($street) || empty($barangay) || empty($city) || empty($licenseNo) || empty($licenseExpirationDate)) {
                array_push($errors, "All fields are required (except Middle Name)");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Password does not match");
            }

            $sqlCheckEmail = "SELECT * FROM operator_information_tbl WHERE email = ?";
            $stmtCheckEmail = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmtCheckEmail, $sqlCheckEmail)) {
                mysqli_stmt_bind_param($stmtCheckEmail, "s", $email);
                mysqli_stmt_execute($stmtCheckEmail);
                $resultCheckEmail = mysqli_stmt_get_result($stmtCheckEmail);

                if (mysqli_num_rows($resultCheckEmail) > 0) {
                    array_push($errors, "Email already exists!");
                }
            } else {
                die("Error in preparing SQL statement to check email");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sqlInsertInfo = "INSERT INTO operator_information_tbl (userName, email, password, lastName, firstName, middleName, sex, birthDate, blockNo, lotNo, street, barangay, city, licenseNo, licenseExpiration) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmtInsertInfo = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($stmtInsertInfo, $sqlInsertInfo)) {
                    mysqli_stmt_bind_param($stmtInsertInfo, "sssssssssssssss", $userName, $email, $passwordHash, $lastName, $firstName, $middleName, $sex, $birthDate, $blockNo, $lotNo, $street, $barangay, $city, $licenseNo, $licenseExpirationDate);
                    mysqli_stmt_execute($stmtInsertInfo);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";

                    // Get the AccountID of the inserted user
                    $accountID = mysqli_insert_id($conn);
                } else {
                    die("Error in preparing SQL statement to insert user account");
                }
            }
        }
        ?>
        <form action="operator_register.php" method="post">
            <!-- Add other form fields based on the database structure -->
            <div class="form-group">
                <input type="text" class="form-control" name="userName" placeholder="User Name:" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="lastName" placeholder="Last Name:" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="firstName" placeholder="First Name:" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="middleName" placeholder="Middle Name:">
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <select class="form-control" name="sex" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="birthDate" placeholder="Birth Date:" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="blockNo" placeholder="Block No:" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="lotNo" placeholder="Lot No:" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="street" placeholder="Street:" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="barangay" placeholder="Barangay:" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="city" placeholder="City:" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="licenseNo" placeholder="License No:" required>
            </div>

            <div class="form-group">
                <input type="date" class="form-control" name="licenseExpirationDate" placeholder="License Expiration Date:" required>
            </div>

            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="operator_login.php">Login Here</a></p></div>
        <div><p>Go back? <a href="index.php">Click Here</a></p></div>
      </div>
    </div>
</body>
</html>