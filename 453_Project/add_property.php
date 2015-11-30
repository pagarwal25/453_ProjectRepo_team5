<?php
include 'dbRequests.php';
if(isset($_POST['submit']))
{
	//if we hit submit button, store the entered val in some variables
	$propertyID = $_POST["PropertyID"];
	$propertyName = $_POST["PropertyName"];
	$address = $_POST["Address"];
	$zipCode = $_POST["ZipCode"];
  $phoneNo = $_POST["PhoneNo"];
  $rating = $_POST["Rating"];
	$sql = "INSERT INTO property VALUES('$propertyID','$propertyName','$address','$zipCode','$phoneNo','$rating')";
	$insert_property = executeQuery($sql);
}
?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body><style>
.center
			{
		    margin: auto;
		    width: 60%;
		    border:3px solid #73AD21;
			border-radius: 10px;
			 text-shadow: 0 0 15px #33cc33;
			 box-shadow:inset 0 0 7px #33cc33;
		    padding: 10px;
			}


.inputStyleBack
{
		padding: 16px 16px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 10px;
		margin: 4px 2px;
		-webkit-transition-duration: 0.4s; /* Safari */
		transition-duration: 0.4s;
		cursor: pointer;
			background-color: #555555;
			color: white;
			width: 150px;

}
.inputStyleSubmit
			{
			    padding: 16px 16px;
			    text-align: center;
			    text-decoration: none;
			    display: inline-block;
			    font-size: 10px;
			    margin: 4px 2px;
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
			    cursor: pointer;
			      background-color: #008CBA;
			      color: white;
			      height:auto;
			      width: 140px;

			}
td {  padding: 10px;}


</style>


<nav class= "navbar nav-default  nav-fixed-top">

<div class="container-fluid">

    <div id="content">
      <ul id="navlist">
		<a href="index.html"><p style="font-family:Constantia;">Cozy Homes'</p></a>
		<p style="font-family:Constantia; font-size:15px; margin-top:25px;">Administrator Control</p>
		 <li class="active headerItem"><a href="add_admin.html.php">Go Back </a></li> 

      </ul>
    </div>
  </div>

</nav>

<form action="add_property.php" method="POST">
<center><p style="font-family:Constantia; font-size:25px; color:#33cc33;"><b>Form to add Property</b></p></center>
<!-- <h3 >Form to add Property</h3> -->
<div class="center">
	<table>
  	<tr><td>
					<label for="PropertyID">Add Property ID:</label>
		      <td><input type="text" name="PropertyID"></td>
        </td></tr>
				<br/><br/>

        <tr><td>
              <label for="Property Name">Add Property Name:</label>
              <td><input type="text" name="PropertyName"></td>
            </td></tr>
            <br/>

		</td></tr>
    	<tr><td>Enter Address:<td><input type="text" name="Address"></td></td></tr><br/>
    		<tr><td>Enter Zipcode:<td><input type="text" name="ZipCode"></td></td></tr>
    		<tr><td>Enter Phone No:<td><input type="text" name="PhoneNo"></td></td></tr>
        <tr><td>Enter Rating:<td><input type="text" name="Rating"></td></td></tr>


	</td></tr>
  	<tr><td>  <input class="inputStyleSubmit" input type="submit" value="Submit" name="submit"></td>
		<!--<td><input class="inputStyleBack" input type="button" onClick="location.href='add_admin.html.php'" value="Back"></td> --></tr>
</div>
</table>
</form>
</body>
</html>
