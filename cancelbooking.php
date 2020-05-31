
<!DOCTYPE html>
<html>
    <head>
	    <!-- Website Title & Description for Search Engine purposes -->
		<title>Cancel Booking | User</title>
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="includes/css/social-button.css" />
		
		<link href="includes/css/font-awesome.min.css" type="text/css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="includes/css/styles.css" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="includes/js/modernizr-2.6.2.min.js"></script>
    </head>
    <style>
    button {
    background-color: #1c9696; 
    border: none;
    color: white;
    padding: 5px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    
}
    table,th,td{
    	border: 3px solid black;
    	width: 50%;
    margin-left: auto;
    margin-right: auto;
    
    }
    	th,td {
    text-align: center;
    padding:"45px";

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
          location.href = ("search_room.php");
            
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

<body>
	<a href="logout.php" style="float: right";><button type="button">Log Out</button></a>
	<h3>ROOMS BOOKED:</h3>
	<br>
	<br>
	<br>
 <?php

 session_start();

$servername = "localhost";
$username = "root";
$password = "aadi2912";
$dbname = "hrs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$currentuser=$_SESSION['uname'];
if($_SESSION['uname']=="")
{
    echo "<script> location.href='index.php';</script>";
}
$sql = "SELECT room_no, room_type, cost FROM rooms WHERE status=1 AND bookedby='$currentuser'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table cellpadding='10'><tr><th>Room Number</th><th>Room Type</th><th>Cost</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
    	$no=$row["room_no"];
        echo "<tr><td>" . $no . "</td><td>" . $row["room_type"]. "</td><td>" . $row["cost"]. "</td><td><a href='cancelled.php?roomid=$no'><button type='button' > Cancel </button></a></td></tr>";
    }
   echo "</table>";
} else {
    echo "<h3>Sorry! No rooms Booked right now. </h3>";
}

mysqli_close($conn);
?> 
    	<br><br>
	
	<a href="search_room.php"><button type="button">Back to Home Page</button></a> 
</body>
</html>