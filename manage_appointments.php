<?php
include('includes/dbconnection.php');
session_start();
// error_reporting(0);

$email = $_SESSION['email'];
if (isset($_POST['cancel'])) {
    $appointment_id = $_POST['apt_id'];
    // echo "<script>alert('Details Updated successfuly" . $appointment_id . " !');</script>";
    $query = mysqli_query($con, "UPDATE tblappointment SET Cancelled = 'yes' WHERE AptNumber = '$appointment_id'");
    if ($query) {
        echo "<script>alert('Appointment Cancelled!');</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Beauty Salon Management System</title>
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
    <section style="min-height: 67vh; margin-top: 20vh">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>My Appointments</h2>
                <a href="./profile.php" class="btn btn-primary">My Profile</a>
            </div>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Appointment Number</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Services</th>
                        <th>Status</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $email;
                    $ret = mysqli_query($con, "SELECT * FROM tblappointment WHERE Email = '$email' AND Cancelled = 'no'");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {

                    ?>

                        <tr>
                            <th scope="row"><?php echo $cnt; ?></th>
                            <td><?php echo $row['AptNumber']; ?></td>
                            <td><?php echo $row['AptDate']; ?></td>
                            <td><?php echo $row['AptTime']; ?></td>
                            <td><?php echo $row['Services']; ?></td>
                            <td><?php if ($row['Status'] == 1) {
                                    echo "Selected";
                                } elseif ($row['Status'] == 2) {
                                    echo "Rejected";
                                } else {
                                    echo "Pending";
                                } ?></td>
                            <td><?php echo $row['Remark']; ?></td>
                            <td>
                                <form action="" method="POST">
                                    <input type="text" name="apt_id" value="<?php echo $row['AptNumber'] ?>" hidden>
                                    <input type="submit" value="Cancel" class="btn btn-primary" id="<?php echo  $row['ID']; ?>" name="cancel">
                                </form>
                            </td>
                        </tr>
                    <?php
                        $cnt = $cnt + 1;
                    } ?>
                </tbody>
            </table>
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