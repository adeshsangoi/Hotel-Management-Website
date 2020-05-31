 <?php
?>
<!DOCTYPE html>
<html>
<head><title>Receptionist Home Page</title>

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

    var commandPlay3 = {
      
        indexes:["check*"],
        smart:true,
        action:function(i,wildcard)
        { 

          location.href = ("checkout.php");
            
        }
    };
    artyom.addCommands(commandPlay3); 

   	var commandPlay2 = {
      
        indexes:["Booking*"],
        smart:true,
        action:function(i,wildcard)
        { 

          location.href = ("viewbookingsrecep.php");
            
        }
    };
    artyom.addCommands(commandPlay2);

    var commandPlay4 = {
      
        indexes:["Available*"],
        smart:true,
        action:function(i,wildcard)
        { 

          location.href = ("viewavailablerecep.php");
            
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
			<td><a  href="viewbookingsrecep.php"><button id = 'booking1221' type="button">View Current Bookings</button></a>
			</td>
		
		
			<td><a href="checkout.php"><button type="button">Check Out for Customer</button></a>
			</td>
			<td><a href="viewavailablerecep.php"><button id = 'room1221' type="button">View Available Rooms</button></a>
			</td>
			
		</tr>
	</table>


	
	
</body>
</html>