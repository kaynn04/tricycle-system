<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tricycle_system_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userID = null;
if (isset($_SESSION["user"])) {
  $userID = $_SESSION["user"]["driverId"];
}
$sql = "SELECT * FROM driver_information_tbl WHERE driverId = $userID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $userInfo = $result->fetch_assoc();
} else {
    echo "No user found";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="design.css">
</head>
<body>
<div class="container bootstrap snippets bootdeys">
<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <a href="driver_dashboard.php" class="btn btn-default">
          <span class="glyphicon glyphicon-chevron-left"></span> Back
      </a>
    <form class="form-horizontal">
        <div class="panel panel-default">
          <div class="panel-body text-center">
           <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar" alt="User avatar">
          </div>
        </div>
      <div class="panel panel-default">
        <div class="panel-heading">
                <h4 class="panel-title">User info</h4>
                </div>
                <div class="panel-body">
                <div class="form-group">
                <label class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="LName" value="<?php echo $userInfo['lastName']; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="FName" value="<?php echo $userInfo['firstName']; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Middle Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="MName" value="<?php echo $userInfo['middleName']; ?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Sex</label>
                <div class="col-sm-10">
                    <select class="form-control" name="Sex">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Birth Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="BirthDate" placeholder="Birth Date">
                </div>
            </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">Contact info</h4>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Mobile number</label>
            <div class="col-sm-10">
              <input type="tel" name="ContactNo" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">E-mail address</label>
            <div class="col-sm-10">
              <input type="email" name="Email" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">Address info</h4>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Block #</label>
            <div class="col-sm-10">
              <input type="tel" name="BlockNo" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Lot #</label>
            <div class="col-sm-10">
              <input type="tel" name="LotNo" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Street</label>
            <div class="col-sm-10">
              <input type="email" name="Street" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Barangay</label>
            <div class="col-sm-10">
              <input type="tel" name="Barangay" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">City</label>
            <div class="col-sm-10">
              <input type="tel" name="City" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">License info</h4>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">License #</label>
            <div class="col-sm-10">
              <input type="tel" name="LicenseNo" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Lot #</label>
            <div class="col-sm-10">
              <input type="tel" name="LicenseExpirationDate" class="form-control">
            </div>
          </div>
        </div>
      </div>

      
      <div class="form-group">
        <div class="col-sm-10 col-sm-offset-5">
            <a href="driver_profile_edit.php"> <button type="button" class="btn btn-primary">Edit Information</button></a>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>
</body>
</html>