<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.php">Beauty<span>Spa</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        <?php
        if (strlen($_SESSION['sid'] == 0)) {
          echo '        <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>';
        } else {
          echo '        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
          <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>';
        }
        ?>

        <li class="nav-item"><a href="admin" class="nav-link">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>