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
	
	if($_SESSION['uname']=="")
{
	echo "<script> location.href='index.php';</script>";
}
	
		$checkexist = mysqli_query($con,"SELECT roomno FROM rooms WHERE roomno = '$roomno'");
		if(mysqli_num_rows($checkexist)){
			echo "Room number already exists!!!<br>";
		}
		else {
			echo "Room added";
			mysqli_query($con,"INSERT INTO rooms VALUES('$roomno', '$roomtype','$cost',0,NULL)" );
			echo "<script> location.href='admin.php';</script>";
			exit;
		}
		
	
}

?>
<!DOCTYPE html>
<html>
<head><title>Admin Home Page</title>

	<style>
	button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px; float:right;
}
#lo{

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
      
        indexes:["Add room*"],
        smart:true,
        action:function(i,wildcard)
        { 
          location.href = ("addroom.php");
            
        }
    };
    artyom.addCommands(commandPlay); 
    var commandPlay3 = {
      
        indexes:["Customer*"],
        smart:true,
        action:function(i,wildcard)
        { 

          location.href = ("viewcustomers.php");
            
        }
    };
    artyom.addCommands(commandPlay3); 

   	var commandPlay2 = {
      
        indexes:["Booking*"],
        smart:true,
        action:function(i,wildcard)
        { 

          location.href = ("viewbookings.php");
            
        }
    };
    artyom.addCommands(commandPlay2);

    var commandPlay4 = {
      
        indexes:["Change*"],
        smart:true,
        action:function(i,wildcard)
        { 

          location.href = ("changerates.php");
            
        }
    };
    artyom.addCommands(commandPlay4);

        var commandPlay5 = {
      
        indexes:["log out*"],
        smart:true,
        action:function(i,wildcard)
        { 

          location.href = ("logout.php");
            
        }
    };
    artyom.addCommands(commandPlay5); 
 
 


}
</script>

</head>
<body>
	<a id="lo" href="logout.php"><button type="button">Log Out</button></a>
	<br>
	<br>
	<table align="center" cellpadding="20">
		<tr>
			<td><a href="addroom.php"><button id = 'add1221' type="button">Add Rooms</button></a>
			</td>
		
		
			<td><a href="viewbookings.php"><button id = 'booking1221' type="button">View Bookings</button></a>
			</td>

			<td><a href="viewcustomers.php"><button type="button">View Customers</button></a></td>

			<td><a href="changerates.php"><button type="button">Change Rates</button></a></td>
		</tr>
	</table>


	
	
</body>
</html>