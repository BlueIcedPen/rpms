<?php
session_start();
if(!isset($_SESSION['email']) || !isset($_COOKIE['email'])) {
	exit(header('Location: /'));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>History | RPMS</title>
    <meta name="description" content="RPMS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/custom.css" type="text/css">
    <link rel="stylesheet" href="../css/neat.minc619.css?v=1.0">
    <link rel="stylesheet" href="../css/styles.css">
  	<link rel="stylesheet" type="text/css" href="../fonts/table/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/table/animate.css">
    <link rel="stylesheet" href="../css/table/select2.css">
    <link rel="stylesheet" href="../css/table/scroll/perfect-scrollbar.css">
    <link rel="stylesheet" href="../css/table/main.css?v=1.0">
    <link rel="stylesheet" href="../css/table/util.css">
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
              <a class="c-sidebar__link" href="./status.php">
                <i class="c-sidebar__icon feather icon-zap"></i>Status
              </a>
            </li>
            </li>
            <li>
              <a class="c-sidebar__link" href="./history.php" style="color: green">
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

        <h2 class="c-navbar__title">Officer Terminal - Submitted Permit Applications</h2>

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
        <div class="col-md-12" >
          <div class="c-alert c-alert--info u-mb-medium">
          	<div class="container" style="min-width: 320px; align-items:center;">
	            <!-- <div class="limiter"> -->
                <div class="table100 ver5 m-b-110">
                  <!-- <div class="container-table100">
			              <div class="wrap-table100"> -->
                      <?php
                        try{
                          require_once("../pconfig/config.php");

                          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sql = "SELECT * FROM permits_table WHERE user_id = :id ORDER BY permit_id DESC";
                            $res = $conn->prepare($sql);
                            $res->bindParam(':id', $_SESSION['user_id']);
                            $res->execute();
                            if($res->rowCount() > 0){
                              echo '<div class="table100-head">
                                      <table>
                                        <thead>
                                          <tr class="row100 head" style="text-align: left; text-fill: #00ff00;">
                                            <th class="cell100 column1">No.</th>
                                            <th class="cell100 column2">Applicant</th>
                                            <th class="cell100 column3">Passport Number</th>
                                            <th class="cell100 column4">Nationality</th>
                                            <th class="cell100 column5">Phone</th>
                                            <th class="cell100 column6">Date Applied</th>
                                          </tr>
                                        </thead>
                                      </table>
                                    </div>';
                                    $i = 0;
                              while($row = $res->fetch(PDO::FETCH_ASSOC)){
                                echo '<div class="table100-body js-pscroll ps ps--active-y">
                                        <table>
                                          <tbody>
                                            <tr class="row100 body">
                                              <td class="cell100 column1">'.++$i.'.</td>
                                              <td class="cell100 column2">'.$row['user_title'].' '.$row['user_firstname'].' '.$row['user_lastname'].'</td>
                                              <td class="cell100 column3">'.$row['user_passport'].'</td>
                                              <td class="cell100 column4">'.$row['nationality'].'</td>
                                              <td class="cell100 column5">+233'.$row['phone'].'</td>
                                              <td class="cell100 column6">'.$row['apply_date'].'</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>';
                              }
                                echo '<div class="ps__rail-y" style="top: 0; height: 0; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>';
                                echo '<div class="ps__rail-x" style="left: 0px; bottom: 0px;"></div>';
                                // Free result set
                              unset($res);
                            } else{echo "There are currently no submitted applications.";}
                            // Close connection
                            unset($conn);
                        }catch(PDOException $e){
                            echo "<script type='text/javascript'>alert('".$e->getMessage()."');</script>";
                        }
                    
                      ?>
                    <!-- </div>
                  </div> -->
                </div>
              <!-- </div> -->
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
  <script src="../js/script.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
  <script  src="../js/index.js"></script>  
  <script  src="../js/table/perfect-scrollbar.min.js"></script>
  <script  src="../js/index.js"></script>  
  <script  src="../js/bootstrap/popper.min.js"></script>
  <script  src="../js/bootstrap/tooltip.js"></script>
  <script  src="../js/table/select2.js"></script>
  <script  src="../js/table/main.js"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-88739867-5');
    
/*
* Table
*/
$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);
			$(window).on('resize', function(){ps.update();})
		});
  </script>
</body>
</html>
