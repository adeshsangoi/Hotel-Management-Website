<?php
	// Start the session
	session_start();
	if($_SESSION['uname']=="")
{
	echo "<script> location.href='index.php';</script>";
}
	if(isset($_POST['reg_user'])) {

	$con = mysqli_connect('localhost', 'root', 'aadi2912','hrs');
	mysqli_select_db($con,'hrs');
	
	$roomno = $_POST['roomno'];
	//$telno = $_POST['telno'];
	//$addr = $_POST['address'];
	//$email = $_POST['email'];
	$roomtype = $_POST['roomtype'];
	$cost = $_POST['cost'];
	
	
	
		$checkexist = mysqli_query($con,"SELECT roomno FROM rooms WHERE roomno = '$roomno'");
		if(mysqli_num_rows($checkexist)){
			echo "Room number already exists!!!<br>";
		}
		else {
			echo "Room added";
			mysqli_query($con,"INSERT INTO rooms VALUES('$roomno', '$roomtype','$cost',0,NULL)" );
			echo "<script> location.href='adminhome.php';</script>";
			exit;
		}
		
	
}

?>
<!DOCTYPE html>
<html>
<head><title>Admin Page</title>

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
    float:right;
}
	a{
		color: white;
	}
	body
	{
		
		color: white;
		
		background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('hotel1.jpg');
		
	}
	form 
	{
		text-align: center;
	}

	
	</style> 
</head>
<body>
	<a href="logout.php"><button type="button">Log Out</button></a>
	<br>
	<br>
	<form method="post" action="addroom.php">
		<table align="center" cellpadding="10">
			<tr>

		<div class="input-group">
			<td><label>Room Number</label></td>
			<td><input type="text" name="roomno"></td>
		</div>
		</tr>
		<tr>
		<div class="input-group">
			<td><label>Room Type</label></td>
			<td><input type="text" name="roomtype"></td>
		</div>
	</tr>
	<tr>

		<div class="input-group">
		<td>	<label>Cost</label>
		</td>
			<td><input type="text" name="cost"></td>
		</tr>
			<tr>
		</div>
		<td colspan="2">
			<div class="input-group">
			<button type="submit" class="btn" name="reg_user">ADD ROOM</button>
		</td>
		</div>
	</tr>
		</table>
		
	</form>
</body>
</html>