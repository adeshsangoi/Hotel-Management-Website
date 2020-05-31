<!DOCTYPE html>
<html>
    <head>
	  
		<title>Book Rooms | Home</title>
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
    background-color: #1c9696; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    
}


    .button2 {
    background-color:rgb(51,51,51); /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    
}
    table,th,td{
    	
    	
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
      
        indexes:["My booking*"],
        smart:true,
        action:function(i,wildcard)
        { 
          location.href = ("viewmybookings.php");
            
        }
    };
    artyom.addCommands(commandPlay); 

        var commandPlay = {
      
        indexes:["Cancel booking*"],
        smart:true,
        action:function(i,wildcard)
        { 
          location.href = ("cancelbooking.php");
            
        }
    };
    artyom.addCommands(commandPlay); 

        var commandPlay2 = {
      
        indexes:["hotel*"],
        smart:true,
        action:function(i,wildcard)
        { 

          location.href = ("3d2.php");
            
        }
    };
    artyom.addCommands(commandPlay2); 

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

	<a style="float: right;" href="logout.php"><button id = 'logout1221' type="button">Log Out</button></a>
	<br>
	<br>

	<table cellpadding="15">
		<tr>
			<td>
	<a href="viewmybookings.php" ><button id = "view1221" type="button">View My Bookings</button></a>
			</td>
			

			
			<td>
	<a href="cancelbooking.php" ><button type="button">Cancel Booking</button></a>
			</td>
	       <td>
	<a href="3d2.php" ><button type="button">View Hotel 360 degree</button></a>
			</td>

			
			
			</tr>
		</table>
	<h3>ROOMS AVAILABLE:</h3>


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
echo "Welcome user:" . $_SESSION['uname'];
if($_SESSION['uname']=="")
{
	echo "<script> location.href='index.php';</script>";
}

$sql = "SELECT room_no, room_type, cost FROM rooms WHERE status=0";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table style='border: 3px solid black;' cellpadding='10'><tr style='border: 3px solid black;'><th>Room Number</th><th>Room Type</th><th>Cost per 24 Hours</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
    	$no=$row["room_no"];
        if ($no == 'C343')
        {
        echo "<tr style='border: 3px solid black;' ><td>" . $no . "</td><td>" . $row["room_type"]. "</td><td>" . $row["cost"]. "</td><td><a href='reserve_room.php?roomid=$no'><button type='button' > Book </button></a></td>
        	<td>
        	<a href='3d/C343.php' ><button class = 'button2' type='button'>360 degree view</button></a>
        	</td>

        </tr>";
        }


        else if ($no == 'C344')
        {
        echo "<tr style='border: 3px solid black;' ><td>" . $no . "</td><td>" . $row["room_type"]. "</td><td>" . $row["cost"]. "</td><td><a href='reserve_room.php?roomid=$no'><button type='button' > Book </button></a></td>
            <td>
            <a href='3d/C344.php' ><button class = 'button2' type='button'>360 degree view</button></a>
            </td>

        </tr>";
        }


        else if ($no == 'A34')
        {
        echo "<tr style='border: 3px solid black;' ><td>" . $no . "</td><td>" . $row["room_type"]. "</td><td>" . $row["cost"]. "</td><td><a href='reserve_room.php?roomid=$no'><button type='button' > Book </button></a></td>
            <td>
            <a href='3d/A34.php' ><button class = 'button2' type='button'>360 degree view</button></a>
            </td>

        </tr>";
        }


        else if ($no == 'B212')
        {
        echo "<tr style='border: 3px solid black;' ><td>" . $no . "</td><td>" . $row["room_type"]. "</td><td>" . $row["cost"]. "</td><td><a href='reserve_room.php?roomid=$no'><button type='button' > Book </button></a></td>
            <td>
            <a href='3d/B212.php' ><button class = 'button2' type='button'>360 degree view</button></a>
            </td>

        </tr>";
        }

        else
        {
        echo "<tr style='border: 3px solid black;' ><td>" . $no . "</td><td>" . $row["room_type"]. "</td><td>" . $row["cost"]. "</td><td><a href='reserve_room.php?roomid=$no'><button type='button' > Book </button></a></td>
            <td>
            <a href='3d/other.php' ><button class = 'button2' type='button'>360 degree view</button></a>
            </td>

        </tr>";
        }


    }
   echo "</table>";
} else {

    echo "<h3>Sorry! No rooms available right now. Try again later.</h3>";
}

mysqli_close($conn);
?> 
    	<br><br>
	
	
</body>
</html>