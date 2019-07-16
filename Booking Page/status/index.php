<?php
include 'config.php';
$conn = OpenCon();
session_start();
$cid=$_SESSION['booking_id'];
echo $cid; 
?>
<html>
    <head>
      <link rel="stylesheet" href="style.css">
    </head>
    
    <body id="particles-js">
         
        
        <div class="split left" >
            <?php
            
            $sql = "SELECT SCREEN_NO FROM BOOKING_DETAILS where CUST_ID=$cid";

            $result = mysqli_query($conn, $sql);
            $res= mysqli_fetch_assoc($result);
            
            if($res["SCREEN_NO"]==1)
            {
                echo'<img width=100% height=100% src="1.jpg" />';
            }
            elseif($res["SCREEN_NO"]==2)
            {
                echo '<img width=100% height=100% src="2.jpg" />';
            }
            else{
                
                echo '<img width=100% height=100% src="3.jpg" />';
            }
            ?>
        </div>
        
        <div class="split right" >
            
            <div class= "Booking">
            <br>
            <?php
            echo"<h3><ul>SHOWBOOK </ul></h3>";
            echo "<hr color='black' height=50px>";
 
            $sql = "SELECT CUST_ID FROM BOOKING_DETAILS where CUST_ID=$cid";
            $result = mysqli_query($conn, $sql);
            $res= mysqli_fetch_assoc($result);
        
            echo "<ul>BOOKING ID: &nbsp". $res["CUST_ID"]. "</ul>";
            
            $sql = "SELECT MOVIE_NAME FROM BOOKING_DETAILS where CUST_ID=$cid";
            $result = mysqli_query($conn, $sql);
            $res= mysqli_fetch_assoc($result);
        
            echo "<ul>MOVIE NAME: ". $res["MOVIE_NAME"]. "</ul>";
            
            $sql = "SELECT SCREEN_NO FROM BOOKING_DETAILS where CUST_ID=$cid";
            $result = mysqli_query($conn, $sql);
            $res= mysqli_fetch_assoc($result);
        
            echo "<ul>SCREEN NO:  &nbsp ". $res["SCREEN_NO"]. "</ul>";
            
            $sql = "SELECT SEAT_RANGE FROM BOOKING_DETAILS where CUST_ID=$cid";
            $result = mysqli_query($conn, $sql);
            $res= mysqli_fetch_assoc($result);
        
            echo "<ul>SEATS BOOKED:". $res["SEAT_RANGE"]. "</ul>";
            $sql = "SELECT TIME_ID FROM BOOKING_DETAILS where CUST_ID=$cid";
            $result = mysqli_query($conn, $sql);
            $res= mysqli_fetch_assoc($result);
            if($res["TIME_ID"]==1)
                echo "<ul> TIME : 9:00 AM";
            elseif($res["TIME_ID"]==2)
                echo "<ul> TIME : 12:00PM";
            else
                echo "<ul>TIME : 3:00PM";
            ?>
            
            
            </div>
           <output style="text-align:center;background-color: #0066ff; margin:auto; display:block; margin-top:5%; border:none">Thank you for booking. Enjoy the movie</output>
        <br><a href="../../index.php">
        <button  type="button">HOME</button></a>
        <script src="particles.js"></script>
        <script src="js/app.js"></script>    
    
        
    </body>
</html>