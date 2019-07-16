<?php
include 'config.php';
$conn = OpenCon();
// echo "Connected Successfully";
			
			/*    	if(isset($_POST['ShowTime'])){
					  $filename = $_POST['ShowTime'];
					  echo $_POST['ShowTime'];
												   }

					if(isset($_POST['service'])){
							   $moviename = $_POST['service'];
						echo $_POST['service'];						
					}
					if(isset($filename) && isset($moviename)){					
							$seat=mysqli_query($conn,"SELECT AVAILABLE FROM AVAILABILITY_SEATS,MOVIES WHERE AVAILABILITY_SEATS.SCREEN_NO = MOVIES.SCREEN_NO AND AVAILABILITY_SEATS.TIME_ID = MOVIES.TIME_ID AND MOVIES.MOVIE_NAME ='$moviename'AND MOVIES.TIME_ID =$filename" );
							$maxrow = mysqli_fetch_assoc($seat);
							echo '<input class="input100" type="number" min="1" max="'.$maxrow["AVAILABLE"].'" name="seats" placeholder="Enter the number of seats">';
							}
				*/		?> 

				
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
			<form class="contact100-form validate-form" action="seats.php" method="POST" >
				<span class="contact100-form-title">
					SHOWBOOK!!
				</span>

		

				<!-- <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Enter your email addess">
					<span class="focus-input100"></span>
				</div> -->

				<div class="wrap-input100 input100-select">
					<span class="label-input100">Select Movie</span>
					<div>

					<select id = "pictype"class="selection-2" name="service" required>
					<option value="NULL" disabled selected>Select your Movie</option>
					<?php
					$res=mysqli_query($conn,'SELECT DISTINCT MOVIE_NAME,SCREEN_NO FROM MOVIES' );

					while($row=mysqli_fetch_assoc($res))
					{
					
						echo "<option value=".$row[SCREEN_NO].">".$row[MOVIE_NAME]."</option>";

						
					}
					
					?>
					</select>
						<!-- <select id = "pictype"class="selection-2" name="service" required>
						    <option value="" disabled selected>Select your Movie</option>
							<option value="p1">Spiderman Far From Home</option>
							<option value="p2">Unda</option>
							<option value="p3">Endgame</option>
						</select> -->
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 input100-select">
					<span class="label-input100">Show Time</span>
					<div>
						<select id="select_time" class="selection-2" name="ShowTime" required>
							<option value="" disabled selected>Select your Show Time</option>
							<option value=1>09:00 AM</option>
							<option value=2>12:00 PM</option>
							<option value=3>03:00 PM</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>
			
<!-- 
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
					<span class="focus-input100"></span>
				</div> -->

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" class="contact100-form-btn" href="seats.php" >
							<span>
								NEXT
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
						</div>
				</div>
						<!-- <div id="seatsid" style="display:none;">
						<div class="wrap-input100 "  data-validate="No of Seats is required">
						<span class="focus-input100"></span>
					</div>
					<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button disabled class="contact100-form-btn" onclick="showDiv()">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
						</div>
				</div>
				
					</div>
				 -->
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
