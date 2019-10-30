<?php
session_start();
if(!isset($_SESSION['email']) || !isset($_COOKIE['email'])) {
	exit(header('Location: /'));
}
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>New Permit | Neat</title>
    <meta name="description" content="Neat">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/custom.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/neat.minc619.css?v=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

  <div class="o-page">
    <div class="o-page__sidebar js-page-sidebar">
      <aside class="c-sidebar">
        <div class="c-sidebar__brand">
          <a href="#"><img src="../img/rpms-green.png" alt="RPMS" style="height: 36px;"></a>
        </div>

        <!-- Scrollable -->
        <div class="c-sidebar__body">
          <span class="c-sidebar__title">Dashboards</span>
          <ul class="c-sidebar__list">
            <li>
              <a class="c-sidebar__link" href="./new.php">
                <i class="c-sidebar__icon feather icon-plus"></i>New Permit
              </a>
            </li>
            <li>
              <a class="c-sidebar__link" href="../user/userProfile.php">
                <i class="c-sidebar__icon feather icon-user"></i>Profile
              </a>
            </li>
            <li>
              <a class="c-sidebar__link" href="./status.php" style="color: green">
                <i class="c-sidebar__icon feather icon-zap"></i>Status
              </a>
            </li>
            </li>
            <li>
              <a class="c-sidebar__link" href="./history.php">
                <i class="c-sidebar__icon feather icon-book"></i>History
              </a>
            </li>
          </ul>  
				</div>
        <a class="c-sidebar__footer" href="../pconfig/logout.php">
          Logout <i class="c-sidebar__footer-icon feather icon-power"></i></a>
      </aside>
    </div>
    <main class="o-page__content">
      <header class="c-navbar u-mb-medium">
        <button class="c-sidebar-toggle js-sidebar-toggle">
          <i class="feather icon-align-left"></i>
        </button>

        <h2 class="c-navbar__title">New Permit</h2>

        <div class="c-dropdown dropdown">
          <div class="c-avatar c-avatar--xsmall dropdown-toggle" id="dropdownMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
            <img class="c-avatar__img" src="<?php if($_SESSION['image']==null){echo '../img/avatar.svg';}else{echo $_SESSION['image'];} ?>" alt="Avatar">
          </div>

          <div class="c-dropdown__menu has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAvatar">
            <a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>
            <a class="c-dropdown__item dropdown-item" href="#">View Activity</a>
            <a class="c-dropdown__item dropdown-item" href="../pconfig/logout.php">Log out</a>
          </div>
        </div>
      </header>

      <div class="container">
        <div class="col-md-12" style="min-width: 510px; max-width: 920px;">
          <div class="c-alert c-alert--info u-mb-medium" style="min-height: 700px; background-image: url('squares.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
          	<div class="container" style="min-width: 320px; align-items:center;">
              <?php
                try{
                  require_once("../pconfig/config.php");

                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $email = $_SESSION['email'];
                  $sql = "SELECT * FROM permits_table WHERE user_email = :email ORDER BY permit_id DESC LIMIT 1";
                  $res = $conn->prepare($sql);
                  $res->bindParam(':email', $email);
                  $res->execute();
                  if($res->rowCount() > 0){
                    while($row = $res->fetch(PDO::FETCH_ASSOC)){
                      if ($row['curr_status'] === "Rejected"){
                        echo '<h3 class="error" style="color: red; font-style: italic;">Your application was invalid and was rejected. Please apply for another again with appropriate details!</h3><br/><p>Contact us for more details.</p>';
                      } else {
                        echo '<div class="boxes">
                              <div class="box"></div>
                              <div class="box"></div>
                              <div class="box">
                                <div class="progress">
                                  <div class="bar">
                                    <div class="bar__fill" style="width:';
                                    if($row['curr_status'] === "Submitted"){echo ' 0';}else if($row['curr_status'] === "Approved"){echo ' 50';}else if($row['curr_status'] === "Complete"){echo ' 100';}
                                  echo '%;"></div>
                                  </div>
                                  <div class="point';
                                    if($row['curr_status'] === "Submitted"){echo ' point--active';}else if($row['curr_status'] === "Approved"){echo ' point--complete';}else if($row['curr_status'] === "Complete"){echo ' point--complete';}
                                  echo '">
                                    <div class="bullet"></div>
                                    <label class="label">Submitted</label>
                                  </div>
                                  <div class="point';
                                    if($row['curr_status'] === "Approved"){echo ' point--active';}else if($row['curr_status'] === "Complete"){echo ' point--complete';}
                                  echo '">
                                    <div class="bullet"></div>
                                    <label class="label">Approved</label>
                                  </div>
                                  <div class="point';
                                  if($row['curr_status'] === "Complete"){echo ' point--active';}
                                echo '">
                                    <div class="bullet"></div>
                                    <label class="label">Complete        </label>
                                  </div>
                                </div>
                              </div>
                            </div>';
                      }
                    }
                    // Free result set
                    unset($res);
                  } else {echo "Submit your first permit application to view status";}
                  // Close connection
                  unset($conn);
                }catch(PDOException $e){
                    echo "<script type='text/javascript'>alert('".$e->getMessage()."');</script>";
                }
            
              ?>
	          </div>
	        </div>
				</div>

	      <div class="row">
          <div class="col-12">
	            <footer class="c-footer">
	              <p>© 2018 Neat, Inc</p>
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
    </main>
  </div>

  <!-- Main JavaScript -->
  <script src="../js/neat.minc619.js?v=1.0"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
  <script  src="../js/index.js?v=1.0"></script>  
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
