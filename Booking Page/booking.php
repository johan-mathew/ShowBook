<?php
include 'config.php';
$conn = OpenCon();
session_start();
 $screen_no  =  $_SESSION['screen_no'] ;
 $filename   =  $_SESSION['timename'] ;
if(isset($_POST['seats'])){
    $noofseats= $_POST['seats'];
}
if(isset($filename) && isset($screen_no) && isset($noofseats)){					
    $custid=mysqli_query($conn,"SELECT MAX(CUST_ID) AS MAX_CUST_ID FROM BOOKING_DETAILS");
    $maxid=mysqli_fetch_assoc($custid);
    $newid=$maxid["MAX_CUST_ID"];
    $newid=$newid+1;
    $_SESSION['booking_id']=$newid;
    $movies=mysqli_query($conn,"SELECT DISTINCT MOVIE_NAME FROM MOVIES WHERE SCREEN_NO=".$screen_no);
    $movie_name=mysqli_fetch_assoc($movies);
    $movie_fetch=$movie_name["MOVIE_NAME"];
    $seat=mysqli_query($conn,"SELECT AVAILABLE FROM AVAILABILITY_SEATS WHERE SCREEN_NO ='$screen_no'AND TIME_ID =$filename" );
    $maxrow = mysqli_fetch_assoc($seat);
    $upperend=$maxrow["AVAILABLE"];
    $lowerend=$upperend-$noofseats;
    $new_available=$lowerend-1;
    $update_seats=mysqli_query($conn,"UPDATE AVAILABILITY_SEATS SET AVAILABLE='$new_available' WHERE SCREEN_NO='$screen_no' AND TIME_ID='$filename'");
    $range=$upperend." to ".$lowerend;
   /* echo $newid;
    echo "         ";
    echo $movie_fetch;
    echo "         ";
    echo $noofseats;
    echo "         ";
    echo $screen_no;
    echo "         ";
    echo $range;
    echo "         ";
    echo $filename;
   */
    $insert_data=mysqli_query($conn,"INSERT INTO `booking_details` (`CUST_ID`, `MOVIE_NAME`, `SEAT`, `SCREEN_NO`, `SEAT_RANGE`, `TIME_ID`) VALUES ('".$newid."','".$movie_fetch."','".$noofseats."','".$screen_no."','".$range."','".$filename."')");
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booking Processing</title>
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
			<form class="contact100-form validate-form" action="status\index.php" method="POST" >
				<p>Booking Processing</p>
                <div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" href="status\index.php" class="contact100-form-btn"  >
							<span>
								CHECK STATUS
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

