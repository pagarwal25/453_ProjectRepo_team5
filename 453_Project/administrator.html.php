



<html>
<head>
<script type="text/javascript" src="js/Validation.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Cozy Homes' - Administrator</title>
<head>
<body a link="black" vlink="black">

<center><h1>Cozy Homes'</h1></center>

<!--Menu -->
<center><a href="index.html">Home</a> | <a href="newUser.html">New-User</a> | <a href="existingUser.html.php">Existing-User</a> | <b>Administrator</b> | <a href="aboutUs.html">About US</a></center>

<br/>
<center>
<h3>Administrator Login </h3>


<form action="?verifyAdmin" method="POST">


		<input class ="inputStyle" type="text" id="email" name="email" placeholder=" Enter email address">
		<br/>
		<br/>
		<input class ="inputStyle" type="text" id="password" name="password" placeholder=" Enter Password">
		<br/>
		<br/>
		<input class ="inputStyleSubmit" type="Submit" id="submit" value="submit">

</form>


</center>

</body>
</html>
<?php

if(isset($_GET['verifyAdmin']))

{
	$email=$_POST['email'];
	$password=$_POST['password'];
	if($email!=="" && $password!=="")
	{	
		header('Location: add_admin.html.php?email='.urlencode($email).'&password='.urlencode($password));
		
	}
	
	
	else
	{
	?>
		<!DOCTYPE html>
	<html lang="en">
	<head>
	<style>
	 p font{
		 cursor:pointer;
	 }
	 </style>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>

	<div class="container">
		<center>
	  <p id="error" data-toggle="modal" data-target="#myModal"><font color="red">Error! Click here for details.</p>
	  <!-- Trigger the modal with a button -->
	  
		</center>
	  <!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">No Valid email address found</h4>
			</div>
			<div class="modal-body">
			  <p>Please enter your correct email address</p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">try again</button>
			</div>
		  </div>
		  
		</div>
	  </div>
	  
	</div>

	</body>
	</html>
		
	<?php
	
	}
}
?>

