<?php
session_start();
if(!isset($_SESSION['email']) || !isset($_COOKIE['email'])) {
	exit(header('Location: /rpms'));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Onboard | rpms</title>
    <meta name="description" content="Neat">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/neat.minc619.css?v=1.0">
  </head>
  <body>

    <div class="o-page">
      <header class="c-navbar u-mb-small">
        <a class="c-navbar__brand" href="#">
          <img src="../img/rpms-green.png" alt="RPMS" title="rpms" style="height: 36px;">
        </a>

        <!-- Navigation items that will be collaped and toggled in small viewports -->
        <nav class="c-navbar__nav collapse" id="main-nav">
          <ul class="c-navbar__nav-list">
              <li class="c-navbar__nav-item">
                <a class="c-navbar__nav-link" href="index.html">Home</a>
              </li>
              <li class="c-navbar__nav-item">
                <a class="c-navbar__nav-link" href="dashboard01.html">Dashboard</a>
              </li>
          </ul>
        </nav>
        <!-- // Navigation items  -->

        <div class="c-dropdown dropdown u-mr-small u-ml-auto">
            
          </div>

          <div class="c-dropdown dropdown u-mr-medium">
          
          </div>

          <div class="c-dropdown dropdown">
            <div class="c-avatar c-avatar--xsmall dropdown-toggle" id="dropdownMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
              <img class="c-avatar__img" src="<?php if($_SESSION['image']==null){echo '../img/avatar.svg';}else{echo $_SESSION['image'];} ?>" alt="Avatar">
            </div>

            <div class="c-dropdown__menu has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAvatar">
              <a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>
              <a class="c-dropdown__item dropdown-item" href="#">View Activity</a>
              <a class="c-dropdown__item dropdown-item" name="logout" href="../pconfig/logout.php">Log out</a>
            </div>
          </div>

        <button class="c-navbar__nav-toggle" type="button" data-toggle="collapse" data-target="#main-nav">
            <i class="feather icon-menu"></i>
        </button><!-- // .c-nav-toggle -->
      </header>

      <div class="container">
        <div class="row u-justify-center">
          <div class="col-lg-6 u-text-center">
            <h2 class="u-mb-small">Hello <?php echo $_SESSION['firstname'];?>, Welcome to RPMS</h2>
            <p class="u-text-large u-mb-large">Track your residence permit application with ease.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-xl-4 u-ml-auto">
            <div class="c-card is-animated">
              <span class="c-icon c-icon--large u-mb-small">
                <i class="feather icon-plus"></i>
              </span>

              <h5 class="u-mb-xsmall">Apply For New Permit</h5>
              <p class="u-mb-medium">Get a permit or renew old permit</p>
              <a class="c-btn c-btn--info has-arrow" href="./new.php">New<i class="feather icon-chevron-right"></i></a>
            </div>
          </div>

          <div class="col-md-6 col-xl-4 u-mr-auto">
            <div class="c-card is-animated">
              <span class="c-icon c-icon--large u-mb-small">
                <i class="feather icon-user"></i>
              </span>

              <h5 class="u-mb-xsmall">View My Profile</h5>
              <p class="u-mb-medium">View or Edit Profile</p>
              <a class="c-btn c-btn--info has-arrow" href="../user/userProfile.php">Profile<i class="feather icon-chevron-right"></i></a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-xl-4 u-ml-auto">
            <div class="c-card is-animated">
              <span class="c-icon c-icon--large u-mb-small">
                <i class="feather icon-zap"></i>
              </span>

              <h5 class="u-mb-xsmall">View Current Permit Status</h5>
              <p class="u-mb-medium">Track your permit progress.</p>
              <a href="./status.php" class="c-btn c-btn--info has-arrow">Track<i class="feather icon-chevron-right"></i>
              </a>
            </div>
          </div>

          <div class="col-md-6 col-xl-4 u-mr-auto">
            <div class="c-card is-animated">
              <span class="c-icon c-icon--large u-mb-small">
                <i class="feather icon-book"></i>
              </span>

              <h5 class="u-mb-xsmall">View Permit History</h5>
              <p class="u-mb-medium">View records of previous permits</p>
              <a href="./history.php" class="c-btn c-btn--info has-arrow">History<i class="feather icon-chevron-right"></i></a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <footer class="c-footer">
              <p>© 2018 RPMS, Inc</p>
              <span class="c-footer__divider">|</span>
              <nav>
                <a class="c-footer__link" href="#">Terms</a>
                <a class="c-footer__link" href="#">Privacy</a>
                <a class="c-footer__link" href="#">FAQ</a>
                <a class="c-footer__link" href="#">Help</a>
              </nav>
            </footer>
          </div>
        </div>
      </div>
    </div><!-- // .o-page -->

    <!-- Main JavaScript -->
    <script src="../js/neat.minc619.js?v=1.0"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'UA-88739867-5');

    </script>
  </body>
</html>