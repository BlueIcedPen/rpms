<?php
session_start();
if(!isset($_SESSION['email'])) {
	exit(header('Location: /'));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Officer Terminal | RPMS</title>
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
    <!-- <link rel="stylesheet" href="../css/mdb.css?v=1.0"> -->
    <!-- <link rel="stylesheet" href="../css/style.min.css"> -->
  	<link rel="stylesheet" type="text/css" href="../fonts/table/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/table/animate.css">
    <link rel="stylesheet" href="../css/table/select2.css">
    <link rel="stylesheet" href="../css/table/scroll/perfect-scrollbar.css">
    <link rel="stylesheet" href="../css/table/main.css?v=1.0">
    <link rel="stylesheet" href="../css/table/util.css">
    <link rel="stylesheet" href="../css/styles.css?v=1.0">
<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.0/bootstrap-table.min.css'>
<link rel='stylesheet prefetch' href='https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css'>
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
              <a class="c-sidebar__link" href="submitted.php">
                <i class="c-sidebar__icon feather icon-home"></i>Submitted
              </a>
            </li>
            <li>
              <a class="c-sidebar__link" href="./approved.php">
                <i class="c-sidebar__icon feather icon-bar-chart-2"></i>Approved
              </a>
            </li>
            <li>
              <a class="c-sidebar__link" href="./complete.php">
                <i class="c-sidebar__icon feather icon-pie-chart"></i>Completed
              </a>
            </li>
            <li>
              <a class="c-sidebar__link" href="./filter.php" style="color: green">
                <i class="c-sidebar__icon feather icon-search"></i>Find Permit Request
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

        <h2 class="c-navbar__title">Officer Terminal - Filter request</h2>

        <div class="c-dropdown dropdown">
          <div class="c-avatar c-avatar--xsmall dropdown-toggle" id="dropdownMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
            <img class="c-avatar__img" src="../img/avatar.svg" alt="Admin">
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
                <div class="table100 ver5 m-b-110">
                <?php
                  try{
                    require_once("../pconfig/config.php");

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sql = "SELECT * FROM permits_table ORDER BY permit_id";
                    $res = $conn->query($sql);
                    // if($res->fetch(PDO::FETCH_ASSOC)){
                      if($res->rowCount() > 0){
                        echo '<table id="tabble" class="display" style="width:100%">
                                <div class="table100-head">
                                  <thead>
                                    <tr class="row100 head" style="text-align: left; text-fill: #00ff00;">
                                      <th class="cell100 column1">No.</th>
                                      <th class="cell100 column2">Applicant</th>
                                      <th class="cell100 column3">Passport Number</th>
                                      <th class="cell100 column4">Nationality</th>
                                      <th class="cell100 column5">Phone</th>
                                      <th class="cell100 column6">Apply Date</th>
                                    </tr>
                                  </thead>
                                </div>
                                    <tbody>
                                      ';
                              $i = 0;
                        while($row = $res->fetch(PDO::FETCH_ASSOC)){
                          echo '<tr id="'.$row['permit_id'].'" class="row100 body" onclick="show_hide_row(\'hidden_row'.$row['permit_id'].'\');" >
                                        <td class="cell100 column1">'.++$i.'.</td>
                                        <td class="cell100 column2">'.$row['user_title'].' '.$row['user_firstname'].' '.$row['user_lastname'].'</td>
                                        <td class="cell100 column3">'.$row['user_passport'].'</td>
                                        <td class="cell100 column4">'.$row['nationality'].'</td>
                                        <td class="cell100 column5">+233'.$row['phone'].'</td>
                                        <td class="cell100 column6" style="width: 100%">'.$row['apply_date'].'</td>
                                        <tr id="hidden_row'.$row['permit_id'].'" class="hidden_row show">
                                            <td class="show" colspan=4>
                                            <div>
                                                <h5 style="color: #555;">Permit Details</h5>
                                                <span style="color: black; font-size: 16px;">Passport Picture: </span><img style="height: 100px;" src="'.$row['pass_image'].'"/><br/>
                                                <span style="color: black; font-size: 16px;">Passport Data: </span><img style="height: 100px;" src="'.$row['pass_data'].'"/><br/>
                                                <span style="color: black; font-size: 16px;">Letter: </span><a href="'.$row['letter'].'" download="Application request letter">Download the Letter</a><br/>
                                                <span style="color: black; font-size: 16px;">Name: </span><span style="color: #555; font-size: 14px;">'.$row['user_title'].' '.$row['user_firstname'].' '.$row['user_lastname'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Email: </span><span style="color: #555; font-size: 14px;">'.$row['user_email'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Previous Name: </span><span style="color: #555; font-size: 14px;">'.$row['previous_name'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Passport Number: </span><span style="color: #555; font-size: 14px;">'.$row['user_passport'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Passport Issue Date: </span><span style="color: #555; font-size: 14px;">'.$row['issue_date'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Passport Issue Place:  </span><span style="color: #555; font-size: 14px;">'.$row['issue_place'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Passport Expiry Date: </span><span style="color: #555; font-size: 14px;">'.$row['expiry_date'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Nationality: </span><span style="color: #555; font-size: 14px;">'.$row['nationality'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Date of Birth: </span><span style="color: #555; font-size: 14px;">'.$row['birth_date'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Place of Birth: </span><span style="color: #555; font-size: 14px;">'.$row['birth_place'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Local Address: </span><span style="color: #555; font-size: 14px;">'.$row['local_address'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Phone Number: </span><span style="color: #555; font-size: 14px;">'.$row['phone'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Foreign Address: </span><span style="color: #555; font-size: 14px;">'.$row['foreign_address'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Closest Relative: </span><span style="color: #555; font-size: 14px;">'.$row['closest_relative'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Educational Qualifications: </span><span style="color: #555; font-size: 14px;">'.$row['edu_qualifications'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Profession: </span><span style="color: #555; font-size: 14px;">'.$row['profession'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Work/Institution Adddress: </span><span style="color: #555; font-size: 14px;">'.$row['profession_address'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Employer Name: </span><span style="color: #555; font-size: 14px;">'.$row['employer_name'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">First Arrival Date: </span><span style="color: #555; font-size: 14px;">'.$row['first_arrival_date'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Latest Arrival Date: </span><span style="color: #555; font-size: 14px;">'.$row['latest_arrival_date'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Previous Expiry Date: </span><span style="color: #555; font-size: 14px;">'.$row['previous_expiry'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Reason for Application: </span><span style="color: #555; font-size: 14px;">'.$row['apply_reason'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Proposed Length of Stay(Years): </span><span style="color: #555; font-size: 14px;">'.$row['proposed_stay_length'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Marital Status: </span><span style="color: #555; font-size: 14px;">'.$row['marital_status'].'</span>';
                                                if($row['marital_status']==="Married" || $row['marital_status']==="married"){echo '<br/>
                                                <span style="color: black; font-size: 16px;">Spouse Name: </span><span style="color: #555; font-size: 14px;">'.$row['spouse_name'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Spouse Nationality: </span><span style="color: #555; font-size: 14px;">'.$row['spouse_nationality'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Spouse Date of birth: </span><span style="color: #555; font-size: 14px;">'.$row['spouse_date_of_birth'].'</span><br/>
                                                <span style="color: black; font-size: 16px;">Spouse Place of birth: </span><span style="color: #555; font-size: 14px;">'.$row['spouse_place_of_birth'].'</span>';}
                                                '
                                              </div>
                                              </td>
                                            </tr>
                                      </tr>';
                        }
                          echo '
                                    </tbody>
                                </div></table>';
                          // Free result set
                        unset($result);
                      } else{echo "There are currently no submitted applications.";}
                      // Close connection
                      unset($conn);
                  }catch(PDOException $e){
                      echo "<script type='text/javascript'>alert('".$e->getMessage()."');</script>";
                  }
                ?>
                </div>
              </div>
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
  <script src='https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
  <script  src="../js/index.js"></script>  
  <script  src="../js/table/perfect-scrollbar.min.js"></script>
  <script  src="../js/bootstrap/popper.min.js"></script>
  <script  src="../js/bootstrap/tooltip.js"></script>
  <script  src="../js/table/select2.js"></script>
  <script  src="../js/table/main.js"></script>
  <script src="../js/bootstable.min.js"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-88739867-5');

    function toggleEdit(checkbox) {
      var checkbox = document.getElementById(checkbox);}
/*
* Table
*/
$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});

function show_hide_row(row)
{
 $("#"+row).toggle();
 $("#"+row).toggleClass('show');
}

function modify_row(idd,clas){
 var status=document.getElementById(clas).textContent;
 if(status == "Approve"){status+="d";}
 else if(status == "Reject"){status+="ed";}
 $.ajax
 ({
  type:'POST',
  url:'../pconfig/modify.php',
  data:{
   edit_row:'edit_row',
   id:idd,
   status:status,
   source:'Submitted',
  },
  success:function(response) {
    // Removing row from HTML Table
    $("#"+idd).fadeOut(700, function(){ 
    $("#"+idd).remove();
    });
    $("#hidden_row"+idd).fadeOut(700, function(){ 
    $("#hidden_row"+idd).remove();
    });
  }
 });
}
$('#tabble').DataTable({
        scrollY:        '50vh',
        scrollCollapse: true,
        paging:         false
    } );
  </script>
</body>
</html>
