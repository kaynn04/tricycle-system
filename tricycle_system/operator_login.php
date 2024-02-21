<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: customer_welcome.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="logreg.css">
</head>
<body>
    <div class="container">
    <?php
        if (isset($_POST["login"])) {
            $usernameOrEmail = $_POST["usernameOrEmail"];
            $password = $_POST["password"];
            require_once "database.php";

            // Assuming you have separate columns for email and username
            $sql = "SELECT * FROM operator_information_tbl WHERE (email = ? OR username = ?)";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ss", $usernameOrEmail, $usernameOrEmail);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        // Redirect to customer_dashboard.php
                        session_start();
                        $_SESSION["user"] = $user;
                        header("Location: operator_dashboard.php");
                        die();
                    } else {
                        echo "<div class='alert alert-danger'>Password does not match</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Username/Email does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error in preparing the statement</div>";
            }
        }
    ?>
        <form action="operator_login.php" method="post">
            <div class="form-group">
                <input type="text" placeholder="Enter Username or Email:" name="usernameOrEmail" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>

        <div><p>Not registered yet <a href="operator_register.php">Register Here</a></p></div>
        <div><p>Go back? <a href="index.php">Click Here</a></p></div>
    </div>
</body>
</html>