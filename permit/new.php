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
    <title>New Permit | Neat</title>
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
              <a class="c-sidebar__link" href="./new.php" style="color: green">
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
            <li>
              <a class="c-sidebar__link" href="./history.php">
                <i class="c-sidebar__icon feather icon-book"></i>History
              </a>
            </li>
          </ul>          

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
        <div class="row">
          <div class="col-md-10">
            <div class="c-alert c-alert--info u-mb-medium">
              <span class="c-alert__icon" id="undo">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
              </span>

              <div class="c-alert__content">
                <div class="row col-md-12">
                  <h3 class="c-alert__title">Create new Permit</h3>
                  <!-- <div class="u-block u-mb-xsmall" style="right: 0;position: absolute;">
                    <label class="c-switch">
                    <input class="c-switch__input" id="edit" onClick="toggleEdit('edit')" type="checkbox" >
                    <span class="c-switch__label">Edit</span>
                    </label>
                  </div> -->
                </div>
                <p>Fill out all fields where it applies and submit to start processing your new permit!</p><br/>
                <form action="../pconfig/initiate.php" method="post" enctype="multipart/form-data">
                  <div class="c-field">
                    <label class="c-field__label">First Name</label>
                    <input class="c-input u-mb-small" id="firstname" name="firstname" type="text" placeholder="First name" required>
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Last Name</label>
                    <input class="c-input u-mb-small" id="lastname" name="lastname" type="text" placeholder="Last name"  required>
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Previous Name</label>
                    <input class="c-input u-mb-small" id="previousname" name="previousname" type="text" placeholder="Previous names">
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Title</label>
                    <input class="c-input u-mb-small"  id="title" name="title" type="text" placeholder="Mr, Miss, Mrs, Dr" required>
                  </div> 
                  
                  <div class="c-field">
                    <label class="c-field__label">Nationality</label>
                    <input class="c-input u-mb-small" id="nationality" name="nationality" type="text" placeholder="Japanese" required>
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Date of Birth</label>
                    <input class="c-input u-mb-small" id="birthDate" name="birthDate" type="date" required>
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Place of Birth</label>
                    <input class="c-input u-mb-small" id="birthPlace" name="birthPlace" type="text" required>
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Passport No. or Travel Cert No.</label>
                    <input class="c-input u-mb-small" id="passnumber" name="passnumber" type="text" required>
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Place of Issue</label>
                    <input class="c-input u-mb-small" id="issuePlace" name="issuePlace" type="text" required>
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Date of Issue</label>
                    <input class="c-input u-mb-small" id="issueDate" name="issueDate" type="date" prequired>
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Expiry Date</label>
                    <input class="c-input u-mb-small" id="expiry" name="expiry" type="date" required>
                  </div>
                                                                                                
                  <div class="c-field">
                    <label class="c-field__label">Address in Ghana(In full)</label>
                    <input class="c-input u-mb-small" id="ghAddress" name="ghAddress" type="text">
                  </div>
                                                                                                
                  <div class="c-field">
                    <label class="c-field__label">Phone</label>
                    <input class="c-input u-mb-small" id="phone" name="phone" type="number" required>
                  </div>
                                                                                                
                  <div class="c-field">
                    <label class="c-field__label">Postal (Office/Business)</label>
                    <input class="c-input u-mb-small" id="postal" name="postal" type="text">
                  </div>
                                                                                                
                  <div class="c-field">
                    <label class="c-field__label">Residential (Hse No.)</label>
                    <input class="c-input u-mb-small" id="residential" name="residential" type="text" required>
                  </div>
                                                                       
                  <div class="c-field">
                    <label class="c-field__label">Address Overseas</label>
                    <input class="c-input u-mb-small" id="overseasAddress" name="overseasAddress" type="text">
                  </div>

                  <div class="c-field">
                    <label class="c-field__label">Name of closest relative in Ghana</label>
                    <input class="c-input u-mb-small" id="closest" name="closest" type="text" placeholder="If any" >
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Educational Qualification</label>
                    <input class="c-input u-mb-small" id="edu_qual" name="edu_qual" type="text">
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Occupation / Profession</label>
                    <input class="c-input u-mb-small" id="occupation" name="occupation" type="text">
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Name of Employer / School in Ghana</label>
                    <input class="c-input u-mb-small" id="boss" name="boss" type="text">
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Address of Employer / School in Ghana</label>
                    <input class="c-input u-mb-small" id="bossAddress" name="bossAddress" type="text">
                  </div>
                                                         
                  <div class="c-field">
                    <label class="c-field__label">First Arrival Date</label>
                    <input class="c-input u-mb-small" id="bossAddress" name="first_arrival" type="date">
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Latest Arrival Date</label>
                    <input class="c-input u-mb-small" id="bossAddress" name="latest_arrival" type="date">
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Date of previous expiry</label>
                    <input class="c-input u-mb-small" id="bossAddress" name="previous_expiry" type="date">
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Reason for Application</label>
                    <input class="c-input u-mb-small" id="reason" name="reason" type="text">
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Proposed Length of stay(In years)</label>
                    <input class="c-input u-mb-small" id="stayLength" name="stayLength" type="text">
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Marital Status</label>
                    <input class="c-input u-mb-small" id="maritalStatus" name="maritalStatus" type="text">
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Name of Spouse</label>
                    <input class="c-input u-mb-small" id="spouseName" name="spouseName" type="text">
                  </div>
                                                   
                  <div class="c-field">
                    <label class="c-field__label">Nationality of Spouse</label>
                    <input class="c-input u-mb-small" id="spouseNationality" name="spouseNationality" type="text">
                  </div>

                  <div class="c-field">
                    <label class="c-field__label">Spouse place of Birth</label>
                    <input class="c-input u-mb-small" id="spousePlace" name="spousePlace" type="text" >
                  </div>
                  
                  <div class="c-field">
                    <label class="c-field__label">Spouse date of Birth</label>
                    <input class="c-input u-mb-small" id="spouseDate" name="spouseDate" type="date" value="">
                  </div>
                                                  
                  <div class="c-field">
                    <label class="c-field__label">Spouse occupation</label>
                    <input class="c-input u-mb-small" id="spouseOccupation" name="spouseOccupation" type="text">
                  </div>

                  <div class="c-field">
                    <label class="c-field__label">Email Address</label>
                    <input class="c-input u-mb-small" id="email" name="email" type="email" placeholder="example@email.com" required>
                  </div>
                  
                  <div class="c-field u-mb-small">
                    <label class="c-field__label">Password</label>
                    <input class="c-input" id="password" name="password" type="password" placeholder="Numbers, Pharagraphs Only" required>
                  </div>

                  <div class="c-field u-mb-small">
                    <label class="c-field__label">Confirm Password</label>
                    <input class="c-input" id="confirm" name="confirm" type="password" placeholder="Rewrite your password"required>
                  </div>
                  </div>
                  
                  <div class="setting image_picker c-card" id="upload">
                    <h2>Upload Passport Picture</h2>
                    <div class="settings_wrap">
                      <label class="drop_target">Standard passport picture
                        <div class="image_preview"></div>
                        <input id="pass_picture" name="pass_picture" type="file"/>
                      </label>
                    </div>
                  </div>
                  
                  <div class="setting image_picker c-card" id="upload">
                    <h2>Upload Passport Data</h2>
                    <div class="settings_wrap">
                      <label class="drop_target">Upload an image of your passport data page
                        <div class="image_preview"></div>
                        <input id="pass_data" name="pass_data" type="file"/>
                      </label>
                    </div>
                  </div>
                  
                  <div class="setting image_picker c-card" id="upload">
                    <h2>Request Letter</h2>
                    <div class="settings_wrap">
                      <label class="drop_target">Upload your application request letter
                        <div class="image_preview"></div>
                        <input id="letter" name="letter" type="file"/>
                      </label>
                    </div>
                  </div>

                  <input type="submit" id="submit" name="submit" class="c-btn c-btn--fullwidth c-btn--info input-submit" value="submit"/>
                </form>
              </div>
            </div><!-- // .c-alert -->
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
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-88739867-5');

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