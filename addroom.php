<?php
	// Start the session
	session_start();
	
	if(isset($_POST['reg_user'])) {

	$con = mysqli_connect('localhost', 'root', 'aadi2912','hrs');
	mysqli_select_db($con,'hrs');
	
	$roomno = $_POST['roomno'];
	//$telno = $_POST['telno'];
	//$addr = $_POST['address'];
	//$email = $_POST['email'];

	$roomtype = $_POST['roomtype'];
	$cost = $_POST['cost'];
	
	
	
		$checkexist = mysqli_query($con,"SELECT room_no FROM rooms WHERE room_no = '$roomno'");
		if(mysqli_num_rows($checkexist)){
			echo "Room number already exists!!!<br>";
		}
		else {
			echo "Room added";
			mysqli_query($con,"INSERT INTO rooms(room_no,room_type,status,cost,bookedby) VALUES('$roomno', '$roomtype',0,'$cost',NULL)" );
			echo "<script> location.href='adminhome.php';</script>";
			exit;
		}
		
	
}

?>
<!DOCTYPE html>
<html>
<head><title>Add Rooms | Admin</title>

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
	        <script type="text/javascript" src="artyom.window.js"></script>
    <script type="text/javascript" src="artyom.window.min.js"></script>
<script type="text/javascript">
  

  window.onload = function() 
  {

    console.log("loading window....")

    const artyom = new Artyom();
    artyom.initialize({
         lang:"en-US",// More languages are documented in the library
          continuous:true,//if you have https connection, you can activate continuous 
          debug:true,//Show everything in the console
         listen:true, // Start listening when this function is triggered
         soundex:true,
        }).then(function(){
        artyom.say("Proceed");
        
    }).catch(function(){
        artyom.say("An error occurred during the initialization");
    });

    var commandPlay = {
      
        indexes:["Back*"],
        smart:true,
        action:function(i,wildcard)
        { 
          location.href = ("adminhome.php");
            
        }
    };
    artyom.addCommands(commandPlay); 
    var commandPlay3 = {
      
        indexes:["log out*"],
        smart:true,
        action:function(i,wildcard)
        { 

          location.href = ("logout.php");
            
        }
    };
    artyom.addCommands(commandPlay3); 

}
</script>

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
			<td><input type="text" id = 'no1221' required name="roomno"></td>
		</div>
		</tr>
		<tr>
		<div class="input-group">
			<td><label>Room Type</label></td>
			<td><input type="text" id = 'type1221' name="roomtype" required></td>
		</div>
	</tr>
	<tr>

		<div class="input-group">
		<td>	<label>Cost</label>
		</td>
			<td><input type="text" name="cost" id = 'cost1221' pattern=[0-9]+ required> </td>
		</tr>
			<tr>
		</div>
		<td colspan="2">
			<div class="input-group">
			<button type="submit" class="btn" id = 'add1221' name="reg_user">ADD ROOM</button>
		</td>
		</div>
	</tr>
		</table>
		
	</form>

	<a href="adminhome.php"><button id = 'back1221' type="button">Back to Home Page</button></a> 
	<br>
	<br>
	<hr>
</body>
</html>