<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
{
  $username=$_POST['username'];
  $password=md5($_POST['password']);
  $sql ="SELECT * FROM tblusers WHERE username=:username and Password=:password ";
  $query=$dbh->prepare($sql);
  $query-> bindParam(':username', $username, PDO::PARAM_STR);
  $query-> bindParam(':password', $password, PDO::PARAM_STR);
  $query-> execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    foreach ($results as $result) {
      $_SESSION['sid']=$result->id;
      $_SESSION['name']=$result->name;
      $_SESSION['lastname']=$result->lastname;
      $_SESSION['permission']=$result->permission;
      $_SESSION['email']=$result->email;

      echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    }

    if(!empty($_POST["remember"])) {
      //COOKIES for username
      setcookie ("user_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
      //COOKIES for password
      setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
    } else {
      if(isset($_COOKIE["user_login"])) {
        setcookie ("user_login","");
        if(isset($_COOKIE["userpassword"])) {
          setcookie ("userpassword","");
        }
      }
    }
  }else{
    echo "<script>alert('Invalid Details');</script>";
  }
}


  ?>


  <?php @include("includes/head.php"); ?>
  <body class="hold-transition login-page">
    <!-- Logo box -->
    <div class="login-box">  
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <div class="login-logo">
            <p><b>
            </b></p><!-- Link can also be removed -->
            <center><img src="company/NEW (1).png" width="150" height="130" class="user-image" alt="User Image"/></center>
          </div>
          <p class="login-box-msg"><b> <h4> <center> Welcome </center></h4> </b></p>

          <form action="" method="post">
            <div class="input-group mb-3">
              <input type="text" name="username" class="form-control" placeholder="Username" required value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password" required value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember"  <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?>>
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" name="login" class="btn btn-primary btn-block" data-toggle="modal" data-taget="#modal-default">Login</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <p class="mb-1">
            <a href="forgotpassword.php">I forgot my password</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <?php @include("includes/foot.php"); ?>
    <script src="assets/js/core/js.cookie.min.js"></script>
  </body>
  </html>