<?php
	// Start the session
	session_start();
	
	if(isset($_POST['reg_user'])) {
	$con = mysqli_connect('localhost', 'root', 'aadi2912','hrs');
	mysqli_select_db($con,'hrs');
	
	$uname = $_POST['username'];
	
	$pword = $_POST['password_1'];
	$pword2 = $_POST['password_2'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	if($pword != $pword2) {
		echo "Passwords do not match. <br>";
	}
	else {
		$checkexist = mysqli_query($con,"SELECT username FROM users WHERE username = '$uname' or email = '$email' ");
		if(mysqli_num_rows($checkexist)){
			echo "User already exists!!!<br>";
		}
		else {
			echo "You are now registered.";
			mysqli_query($con,"INSERT INTO users(username,password,name,email,contact) VALUES('$uname', '$pword','$name','$email','$phone')" );

			echo "<script> location.href='login.php';</script>";
			exit;
		}
		
	}

}

?>
<!DOCTYPE html>
<html>
<head><title>Register</title>
<style>
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
          location.href = ("login.php");
            
        }
    };
    artyom.addCommands(commandPlay); 
  }


</script> 


</head>

<body>
	<br><br>
	<form method="post" action="register.php">
		<table align="center" cellpadding="10">
			<tr>
		<div class="input-group">
			<td><label>Username</label></td>
			<td><input type="text" name="username"></td>
		</div>
	</tr>
	<tr>
		<div class="input-group">
			<td><label>Name</label></td>
			<td><input type="text" name="name" required></td>
		</div>
	</tr>
	<tr>
		<div class="input-group">
			<td><label>Email</label></td>
			<td><input  type="email" name="email" required></td>
		</div>
	</tr>
	<tr>
		<div class="input-group">
			<td><label>Phone</label></td>
			<td><input type="text" minlength="10" maxlength="10" name="phone" required></td>
		</div>
	</tr>

	<tr>
		
		<div class="input-group">
		<td>	<label>Password</label></td>
			<td><input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8" name="password_1" required></td>


		</div>
	</tr>
	<tr>

		<div class="input-group">
		<td>	<label>Confirm password</label></td>
			<td><input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8" name="password_2"></td>
		</div>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
	</td>
</tr>
</table>

		
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
 <a href="index.php"><button type="button">Back to Home Page</button></a> 
    <br>
    <br>
    <hr>

</body>
</html>