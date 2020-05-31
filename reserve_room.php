<?php
	session_start();
	
	$con = mysqli_connect('localhost', 'root', 'aadi2912','hrs');
	mysqli_select_db($con,'hrs');
	$no=$_REQUEST['roomid'];

	// echo "The room you have chosen is " . $no;
	$user=$_SESSION['uname'];
	if($_SESSION['uname']=="")
	{
	echo "<script> location.href='index.php';</script>";
	}

	mysqli_query($con,"UPDATE rooms SET status= 1, bookedby = '$user' WHERE room_no = '$no' " );
	//echo "<script> location.href='login.php';</script>";

	//$result = mysqli_query($con,"SELECT * FROM users WHERE username='$uname' AND Password='$password'");

	// if(mysqli_num_rows($result)){
	// 	$res = mysqli_fetch_array($result,MYSQLI_BOTH);
	// 	$_SESSION['uname'] = $res[3];
	// 	echo $_SESSION['uname'];
	// 	echo "<script> location.href='search_room.php'; </script>";
	// 	exit;
	// }

	// else{
		
	// 	echo "No user found.";
		
	// }
	// }

	
?>


<!DOCTYPE html>
<html>
<head>
    <title>Room Reserved</title>
   
    <style>
	
	button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    float: center;
}
	a{
		color: white;
	}
	body
	{
		
		color: white;
		
		background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('hotel1.jpg');

	}
	

	
	</style>
</head>
<body>
 <h3>Congratulations! Room number <?php echo $no ?> has been booked by <?php echo $user ?>! </h3>
     <a href="search_room.php"><button align="center" type="button">Go back to previous page</button></a>
     		</body>
	
</html>
