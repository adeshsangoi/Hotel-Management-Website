<?php
	session_start();
	if(isset($_POST['log_user'])) {
	$uname = $_POST['uname'];
	$password = $_POST['password'];

	$con = mysqli_connect('localhost', 'root', 'aadi2912','hrs');
	mysqli_select_db($con,'hrs');

	$result = mysqli_query($con,"SELECT * FROM users WHERE username='$uname' AND Password='$password' and type = 'staff' ");

	if(mysqli_num_rows($result)){
		$res = mysqli_fetch_array($result,MYSQLI_BOTH);
		$_SESSION['uname'] = $res[1];
		// echo $_SESSION['uname'];
		echo "<script> location.href='search_room.php'; </script>";
		
		exit;
	}

	else{
		
		// echo "<script type='text/javascript'>alert(\"No user found\");</script>";
		echo "No user found.";
		
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | User</title>

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

	table {

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
      
        indexes:["back*"],
        smart:true,
        action:function(i,wildcard)
        { 
          location.href = ("index.php");
        }
    };
    artyom.addCommands(commandPlay); 
  
  	var commandPlay2 = {
      
        indexes:["Register*"],
        smart:true,
        action:function(i,wildcard)
        { 
          artyom.say("Opening Register page");

          location.href = ("register.php");

            
        }
    };
    artyom.addCommands(commandPlay2); 
  }


</script> 

	</head>

<body>
	<br><br><br>
	<form method="post" action="login.php">
		<table align = "center" cellpadding="10">
			<tr>
	  	<div class="input-group">
  	  <td><label>Username</label></td>
  	  <td><input type="text" id = "uname1221" name="uname"></td>

  	</div>
  </tr>

  <tr>
	<div class="input-group">
  	  <td><label>Password</label></td>

  	 <td> <input type="password" id = "pass1221" name="password"> </td>
  	</div>
  </tr>
  <tr align="center">
<td colspan="2">
  	<div class="input-group">
  	  <button type="submit" class="btn" id = "login1221" name="log_user">Login</button>
  	</div>
  </td>
  </tr>
</table>
  	<p>
  		Didn't Register? <a href="register.php">Sign Up</a>
  	</p>
  </form>

   <a href="index.php"><button type="button">Back to Home Page</button></a> 
    <br>
    <br>
    <hr>
</body>
</html>