<?php
session_start();
if(!isset($_SESSION['email']) || !isset($_COOKIE['email'])) {
	exit(header('Location: ../'));
}
?>
<!doctype html>
<html lang="en">  
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User Profile | RPMS</title>
    <meta name="description" content="RPMS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/neat.minc619.css?v=1.0">
    <link rel="stylesheet" href="../css/styles.css?v=1.0">
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
              <a class="c-sidebar__link" href="../permit/new.php">
                <i class="c-sidebar__icon feather icon-plus"></i>New Permit
              </a>
            </li>
            <li>
              <a class="c-sidebar__link" href="./userProfile.php" style="color: green">
                <i class="c-sidebar__icon feather icon-user"></i>Profile
              </a>
            </li>
            </li>
            <li>
              <a class="c-sidebar__link" href="../permit/status.php">
                <i class="c-sidebar__icon feather icon-zap"></i>Status
              </a>
            </li>
            <li>
              <a class="c-sidebar__link" href="../permit/history.php">
                <i class="c-sidebar__icon feather icon-book"></i>History
              </a>
            </li>
          </ul>          
        </div>
        <a class="c-sidebar__footer" href="../pconfig/logout.php">
          Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
        </a>
      </aside>
    </div>

    <main class="o-page__content">
      <header class="c-navbar u-mb-medium">
        <button class="c-sidebar-toggle js-sidebar-toggle">
          <i class="feather icon-align-left"></i>
        </button>

        <h2 class="c-navbar__title">My Profile</h2>

        <div class="c-dropdown dropdown u-mr-small">
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
            <a class="c-dropdown__item dropdown-item" href="../pconfig/logout.php">Log out</a>
          </div>
        </div>
      </header>

      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="c-alert c-alert--info u-mb-medium">
              <span class="c-alert__icon" id="undo">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
              </span>

              <div class="c-alert__content">
                <div class="row col-md-12">
                  <h3 class="c-alert__title">Edit Profile</h3>
                  <div class="u-block u-mb-xsmall" style="right: 0;position: absolute;">
                    <label class="c-switch">
                    <input class="c-switch__input" id="edit" onClick="toggleEdit('edit')" type="checkbox" >
                    <span class="c-switch__label">Edit</span>
                    </label>
                  </div>
                </div>
                <p>Correct your details or effect a name change.</p>
                <form action="../pconfig/edit.php" method="post" enctype="multipart/form-data">
                  <div class="setting image_picker c-card div-disabled" id="upload">
                    <h2>Profile Image</h2>
                    <div class="settings_wrap">
                      <label class="drop_target">
                        <div class="image_preview"></div>
                        <input id="inputFile" name="image" type="file"/>
                      </label>
                      <div class="settings_actions vertical"><a data-action="choose_from_uploaded"><i class="fa fa-picture-o"></i> Choose from Uploads</a><a class="disabled" data-action="remove_current_image"><i class="fa fa-ban"></i> Remove Current Image</a></div>
                    </div>
                  </div><br/>
                  <div class="c-field">
                    <label class="c-field__label">First Name</label>
                    <input class="c-input u-mb-small" id="firstname" name="firstname" type="text" placeholder="First name" value="<?php echo $_SESSION['firstname'];?>" required="" disabled>
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Last Name</label>
                    <input class="c-input u-mb-small" id="lastname" name="lastname" type="text" placeholder="Last name" value="<?php echo $_SESSION['lastname'];?>" required="" disabled>
                  </div>  

                  <div class="c-field">
                    <label class="c-field__label">Email Address</label>
                    <input class="c-input u-mb-small" id="email" name="email" type="email" placeholder="example@email.com" value="<?php echo $_SESSION['email'];?>" required="" disabled>
                  </div>
                  
                  <div class="c-field u-mb-small">
                    <label class="c-field__label">Password</label>
                    <input class="c-input" id="password" name="password" type="password" placeholder="Numbers, Pharagraphs Only" value="" required="" disabled>
                  </div>

                  <div class="c-field u-mb-small">
                    <label class="c-field__label">Confirm Password</label>
                    <input class="c-input" id="confirm" name="confirm" type="password" placeholder="Rewrite your password" value="" required="" disabled>
                  </div>

                  <input type="submit" id="submit" name="submit" class="c-btn c-btn--fullwidth c-btn--info input-submit" value="submit" disabled/>
                </form>
              </div>
            </div><!-- // .c-alert -->
          </div>

          <div class="col-md-5">
            <div class="c-card" style="min-width: 320px;">
              <div class="u-text-center">
                <div class="c-avatar c-avatar--large u-mb-small u-inline-flex">
                  <img class="c-avatar__img" src="<?php if($_SESSION['image']==null){echo '../img/avatar.svg';}else{echo $_SESSION['image'];} ?>" alt="Avatar">
                </div>

                <h5><?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['lastname'];?></h5>
              </div>

              <span class="c-divider u-mv-small"></span>

              <span class="c-text--subtitle">Email Address</span>
              <p class="u-mb-small u-text-large"><?php echo $_SESSION['email'];?></p>

              <span class="c-text--subtitle">Phone Number</span>
              <p class="u-mb-small u-text-large">0<?php echo $_SESSION['phone'];?></p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <footer class="c-footer">
              <p>© 2018 RPMS</p>
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
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-88739867-5');

    function toggleEdit(checkbox) {
      var checkbox = document.getElementById(checkbox);
      checkbox.checked ? document.getElementById("firstname").disabled = false : document.getElementById("firstname").disabled = true;
      checkbox.checked ? document.getElementById("lastname").disabled = false : document.getElementById("lastname").disabled = true;
      checkbox.checked ? document.getElementById("email").disabled = false : document.getElementById("email").disabled = true;
      checkbox.checked ? document.getElementById("password").disabled = false : document.getElementById("password").disabled = true;
      checkbox.checked ? document.getElementById("confirm").disabled = false : document.getElementById("confirm").disabled = true;
      checkbox.checked ? document.getElementById("submit").disabled = false : document.getElementById("submit").disabled = true;}

    var $dropzone = $(".image_picker"),
    $droptarget = $(".drop_target"),
    $dropinput = $(".inputFile"),
    $dropimg = $(".image_preview"),
    $remover = $('[data-action="remove_current_image"]');

    $dropzone.on("dragover", function() {
      $droptarget.addClass("dropping");
      return false;
    });

    $dropzone.on("dragend dragleave", function() {
      $droptarget.removeClass("dropping");
      return false;
    });

    $dropzone.on("drop", function(e) {
      $droptarget.removeClass("dropping");
      $droptarget.addClass("dropped");
      $remover.removeClass("disabled");
      e.preventDefault();

      var file = e.originalEvent.dataTransfer.files[0],
          reader = new FileReader();

      reader.onload = function(event) {
        $dropimg.css("background-image", "url(" + event.target.result + ")");
      };

      console.log(file);
      reader.readAsDataURL(file);

      return false;
    });

    $dropinput.change(function(e) {
      $droptarget.addClass("dropped");
      $remover.removeClass("disabled");
      $(".image_title input").val("");

      var file = $dropinput.get(0).files[0],
          reader = new FileReader();

      reader.onload = function(event) {
        $dropimg.css("background-image", "url(" + event.target.result + ")");
      };

      reader.readAsDataURL(file);
    });

    $remover.on("click", function() {
      $dropimg.css("background-image", "");
      $droptarget.removeClass("dropped");
      $remover.addClass("disabled");
      $(".image_title input").val("");
    });

    $(".image_title input").blur(function() {
      if ($(this).val() != "") {
        $droptarget.removeClass("dropped");
      }
    });

  </script>
</body>
</html>