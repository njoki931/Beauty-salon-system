<?php
include('includes/dbconnection.php');
session_start();
// error_reporting(0);
if (isset($_POST['update_profile'])) {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile_number = $_POST['mobile_number'];
  $gender = $_POST['gender'];
  $details = $_POST['details'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  // Validate email
$email = ($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Set error message
    $email_error = "Invalid email format";
}
// Validate phone number
$mobile_number = ($_POST["mobile_number"]);

if (!preg_match("/^\+?[1-9]\d{1,14}$/", $mobile_number)) {
    // Set error message
    $phone_error = "Invalid phone number format";
}

  if ($password != $confirm_password) {
    $confirm_password_err = "Password does not match";
  } else {
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "UPDATE tblcustomers SET Name = '$username', Email = '$email', MobileNumber = '$mobile_number', password = '$password' WHERE Email = '$email'");
    if ($query) {
      echo "<script>alert('Details Updated successfuly!');</script>";
    } else {
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
  }
}
$email = $_SESSION['email'];
$ret = mysqli_query($con, "SELECT * FROM tblcustomers WHERE Email = '$email'");
$cnt = 1;
while ($row = mysqli_fetch_array($ret)) {
  $email = $row['Email'];
  $username = $row['Name'];
  $mobile_number = $row['MobileNumber'];
  $gender = $row['Gender'];
  $details = $row['Details'];
  $cnt = $cnt + 1;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Beauty Spa Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include('includes/header.php') ?>
  <section style="min-height: 50vh; margin-top: 20vh">
    <div class="container">
      <form action="" method="POST">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Update Profile</h2>
          <a href="./manage_appointments.php" class="btn btn-primary">My Appointments</a>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control">
        </div>
        <div class="form-group">
          <label for="mobile_number">Mobile Number</label>
          <input type="text" name="mobile_number" value="<?php echo $mobile_number; ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <input type="text" name="gender" value="<?php echo $gender; ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="details">Details</label>
          <input type="text" name="details" value="<?php echo $details; ?>" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="update_profile" value="Update" class="btn btn-primary">
        </div>
      </form>
    </div>
  </section>
  <?php include('includes/footer.php') ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>