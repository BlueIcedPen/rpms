<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>rpms</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

  <!-- Favicon ================== -->
  <!-- Standard -->
  <link rel="shortcut icon" href="img/favicon-144.png">
  <!-- Retina iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="144x144" href="img/favicon-144.png">
  <!-- Retina iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="114x114" href="img/favicon-114.png">
  <!-- Standard iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="72x72" href="img/favicon-72.png">
  <!-- Standard iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="57x57" href="img/favicon-57.png">

  <!--  Resources style ================== -->
  <link href="css/feijoa.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="css/custom.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>
    <body>
      <section id="parent" class="animsition">

        <div id="subscribe">
          <div class="row border">
            <div class="col-sm-9 col-xs-9">
              <h2 class=""><strong>Sign In</strong> for <br> Management</h2>
            </div>
            <div class="mail-icon">
              <i class="ion-paper-airplane"></i>
            </div>
            <div class="col-sm-12 col-xs-12 mb50">
              <h4 class="">Update <br>residence permit <br> details</h4>
            </div>

            <form id="subscribe-form" name="susb" class="col-sm-12 login-form" action="./pconfig/adminlogin.php" method="post">
              <input type="email" name="admin_email" class="input input-email round" placeholder="Email Address">
              <input type="password" name="admin_pass" class="input input-email round" placeholder="Password">
              <input type="submit" name="admin_submit" class="submit btn-solid round input-submit" value="Sign In">
              <div id="subscribe-result">
              </div>
            </form>
          </div>
        </div>

        <div id="leftSide" class="color ">


          <div id="container" class="angle-pattern angle" >
            <div id="output">
            </div>

            <div id="home" class=" col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
              <!-- Your logo -->
    			    <img src="img/rpms.png" alt="" class="quick fadeIn mt50 main-logo" />

              <div class="h-content top-28">
                <h1 class="mid animated fadeInUp fw300 italic mb20  pacifico">Residence Permit...</h1>
                <h1 class="mid animated fadeInUp fw700">Be part <br> of the process!</h1>

                <div class="mt40 slow animated fadeInUp">
                  <a id="subs" href="#subscribe" class="btn-solid mr20 round">OFFICER</a>
                  <a id="info" href="#info" class="btn-nb round">NON-CITIZEN</a>
                </div>

              </div>

              <div class="social_tab quick fadeIn fixed">
                <p class="notoSerif">Stay in touch.</p>
                <ul class="social_icons">
                  <li><a href="#"><i class="ti-facebook "></i></a></li>
                  <li><a href="#"><i class="ti-twitter-alt "></i></a></li>
                  <li><a href="#"><i class="ti-pinterest-alt "></i></a></li>
                  <li><a href="#"><i class="ti-google "></i></a></li>
                </ul>
              </div>
            </div>

          </div>
          <div id="controls" class="controls"></div>



        </div>


        <div id="rightSide" class="visible">
          <div class="background-img-holder percent84">
            <img src="img/home-bg.jpg" alt="This is my work">
          </div>

          <div id="rightContent">
            <div class="close-bar">
              <a href="#info" class="close-icon"><i class="menu ion-close-round"></i></a>
              <div class="share_icons">
                <ul class="color-bg icon-container">
                  <li class="facebook"><a href="#"><i class="ti-facebook "></i></a></li>
                  <li class="twitter"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                  <li class="pinterest"><a href="#"><i class="ti-pinterest-alt "></i></a></li>
                </ul>
              </div>
              <h5 class="follow  mr15 fw600">Follow us </h5>
            </div>

            <div class="about mb50 mt50">
              <!-- <img class="mb50 mt65" src="img/red-lunch-green-knolling.jpg" alt="work" /> -->
              <h2 class="mb30">There is <strong>Nothing</strong> swifter than the <br> permit <strong>process.</strong>.</h2>
              <p>
                Get into your account to apply for a new permit, track a current one or view your permit history.
              </p>
            </div>

            <section id="fancyTabWidget" class="tabs t-tabs">
              <ul class="nav nav-tabs fancyTabs" role="tablist">
              
                          <li class="tab fancyTab active" style="width: 50%">
                          <div class="arrow-down"><div class="arrow-down-inner"></div></div>	
                              <a id="tab0" href="#tabBody0" role="tab" aria-controls="tabBody0" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-desktop"></span><span class="hidden-xs">Sign In</span></a>
                            <div class="whiteBlock"></div>
                          </li>
                          
                          <li class="tab fancyTab" style="width: 50%">
                          <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                              <a id="tab1" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-firefox"></span><span class="hidden-xs">Create Account</span></a>
                              <div class="whiteBlock"></div>
                          </li>
              </ul>
              <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
                          <div class="tab-pane  fade active in" id="tabBody0" role="tabpanel" aria-labelledby="tab0" aria-hidden="false" tabindex="0">
                              <div>
                                <div class="row">
                                    
                                      <div class="col-md-12">
                                        <!-- LOGIN FORM -->
                                        <div class="user">
                                          <div class="form-wrap">
                                              <!-- TABS -->
                                            <div class="tabs">
                                                  <h3 class="login-tab"><a class=".log-in active" href="#login-tab-content"><span>Login<span></a></h3>
                                            </div>
                                              <!-- TABS CONTENT -->
                                            <div class="tabs-content">
                                                  <!-- TABS CONTENT LOGIN -->
                                              <div id="login-tab-content" class="active">
                                                <form class="login-form" action="/rpms/pconfig/login.php" method="post">
                                                  <input type="email" class="input" id="user_login_email" name="user_login_email" autocomplete="on" placeholder="Email" required>
                                                  <input type="password" class="input" id="user_login_pass" name="user_login_pass" autocomplete="off" placeholder="Password" required>
                                                  <input type="checkbox" class="checkbox" checked id="remember_me" name="remember_me">
                                                  <label for="remember_me">Remember me</label>
                                                  <input type="submit" name="login_submit" class="button" value="Login">
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true" tabindex="0">
                              <div class="row">
                                    
                                      <div class="col-md-12">
                                        <!-- LOGIN FORM -->
                                        <div class="user">
                                          <div class="form-wrap">
                                              <!-- TABS -->
                                            <div class="tabs">
                                                  <h3 class="login-tab"><a class="log-in active" href="#login-tab-content"><span>Register<span></a></h3>
                                            </div>
                                              <!-- TABS CONTENT -->
                                            <div class="tabs-content">
                                                  <!-- TABS CONTENT REGISTER -->
                                              <div id="login-tab-content" class="active">
                                                <form class="login-form" action="/pconfig/register.php" method="post">
                                                    <input type="email" class="input" id="user_reg_email" name="user_reg_email" autocomplete="on" placeholder="Email" required>
                                                    <input type="text" class="input" id="user_reg_firstname" name="user_reg_firstname" autocomplete="on" placeholder="First Name" required>
                                                    <input type="text" class="input" id="user_reg_lastname" name="user_reg_lastname" autocomplete="on" placeholder="Last Name" required>
                                                    <input type="text" class="input" id="user_reg_passport" name="user_reg_passport" autocomplete="off" placeholder="Passport Number" required>
                                                    <input type="password" class="input" id="user_reg_pass" name="user_reg_pass" autocomplete="off" placeholder="Password" required>
                                                    <input type="submit" name="reg_submit" class="button" value="Sign Up">
                                                  </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                          </div>
                          
              </div>
      
          </section>


            <div id="contact" class="row">

              <div class="mb20 col-sm-12">
                <h2 ><strong>Get in <span class="notoSerif italic fw500">touch</span>,</strong> <br> we'd love to hear from you.</h2>
              </div>

              <div class="col-sm-4 col-xs-12 mt30 mb30">
                <p class="col-sm-12 col-xs-6">
                  <strong>Address :</strong> <br>
                  438 Marine Parade <br>
                  Elwood, Victoria <br>
                  P.O Box 3184<br>
              </p>

                <p class="col-sm-12 col-xs-6">
                  <strong>Phone: </strong><br>  (123) 456-7890 <br> <br>
                </p>

              </div>

              <div class="col-sm-8 pl0 pr0">
                <form id="contact_form" class="row" method="post" action="https://www.coderare.com/deft/new/php/mailer.php">
                    <div class="col-sm-6 col-xs-12 ">
                      <!-- <label for="name">Full Name</label> -->
                      <!-- <span class="placeholder-icon ion-android-person"></span> -->
                      <input type="name" name="name" class="input-name input-field" placeholder="Full Name">
                    </div>

                    <div class="col-sm-6 col-xs-12 pl5">
                      <!-- <label for="email">Email Address</label> -->
                      <!-- <span class="placeholder-icon ion-android-mail pl5"></span> -->
                      <input type="email" name="email" class="input-email input-field" placeholder="Email Address">
                    </div>

                    <div class="col-sm-12 col-xs-12">
                      <!-- <label for="message">Message</label> -->
                      <!-- <span class="placeholder-icon ion-android-chat"></span> -->
                      <textarea name="message" class="input-message" placeholder="Message"></textarea>
                    </div>

                    <div class="col-sm-12 col-xs-12">
                      <button class="btn-solid pull-right round input-submit">Send</button>

                      <div id="form-messages" class="pull-left col-sm-8 col-xs-8">
                        <span class="success col-sm-12 col-xs-12"></span>
                        <span class="error col-sm-12 col-xs-12"></span>
                      </div>
                    </div>


                </form>
              </div>

            </div>


            <footer class="mt70 mb50">
              <p class="">&copy; 2016 Deft made with <i class="ion-heart"></i> by Coderare</p>
              <!-- <div class="social pull-right">
                <i class="up ion-social-facebook"></i>
                <i class="up ion-social-twitter"></i>
              </div> -->
            </footer>

          </div>

        </div>
      </section>


      <!-- Root element of PhotoSwipe. Must have class pswp. -->
      <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- Background of PhotoSwipe.
             It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                          <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
      </div>

      <script src="js/jquery-1.11.3.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/animsition.min.js"></script>
      <script src="js/jquery.countdown.min.js"></script>
      <script src="js/photoswipe.min.js"></script>
      <script src="js/photoswipe-ui-default.min.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/angle.js"></script>
      <script src="js/script.js"></script>
  </body>
</html>
