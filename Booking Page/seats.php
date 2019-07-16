<?php
include 'config.php';
$conn = OpenCon();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SHOWBOOK Booking</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->



</head>
<body style="background-size: cover">


	<div class="container-contact100" style="background-size:cover">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="booking.php" method="POST" >
				<span class="contact100-form-title">
					SHOWBOOK!!
				</span>
                <?php
                if(isset($_POST['ShowTime'])){
					  $filename = $_POST['ShowTime'];
				//	 echo $_POST['ShowTime'];
												   }

					if(isset($_POST['service'])){
							   $screen_no = $_POST['service'];
				//	echo $_POST['service'];						
					}
					if(isset($filename) && isset($screen_no)){					
							$seat=mysqli_query($conn,"SELECT AVAILABLE FROM AVAILABILITY_SEATS WHERE SCREEN_NO ='$screen_no'AND TIME_ID =$filename" );
                            $maxrow = mysqli_fetch_assoc($seat);
                            $seatsleft=$maxrow["AVAILABLE"];
                            if($seatsleft>0)
                            {
                                echo 'Number of Seats Left is '.$seatsleft;
                                echo '<input class="input100" type="number" min="1" max="'.$seatsleft.'" name="seats" placeholder="Enter the number of seats">';
                            }
                            else
                            {
                                echo 'No Seats Left';
                            }
						
                            }
                            session_start();
                            $_SESSION['screen_no'] = $screen_no;
                            $_SESSION['timename'] = $filename;
        				?>
		
                <div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" class="contact100-form-btn"  >
							<span>
								SUBMIT
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
						</div>
				</div>

                </form>
                </div>
                </div>

                <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
  
</script>

</body>
</html>

			