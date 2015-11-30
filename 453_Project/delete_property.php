<?php
include 'dbRequests.php';

if (isset($_GET['delete']))
{
  $prop_id = $_POST['prop_id'];
  $sql = "DELETE FROM property WHERE PropertyID = '$prop_id'"; // is coming from input type name="id"
  $delete_property = executeQuery($sql);

}
$sql = "select * from property";

$result = executeQuery($sql);

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>List of Properties to delete</title>
<style>
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
			      width: 120px;

			}
 td {
          padding: 15px;
		  text-shadow: 0 0 15px #33cc33;
		  
          }

 table{
              background-color: #f5f5f5;
               border:3px solid #73AD21;
          	   border-radius: 8px;
          	  box-shadow:inset 0 0 7px #D4D4D4;
			  box-shadow:inset 0 0 7px #33cc33;
			  width:70%;
			  

          }
</style>
</head>
<body>

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
<center><p style="font-family:Constantia; font-size:25px; color:#33cc33;"><b>Delete Property</b></p></center>



<center>
    <table>
		<tr><td></td></tr>   
	<tr>
        <th align="center"><font color="#33cc33" size="4px">PropertyName</th>
        <th align="center"><font color="#33cc33" size="4px">Address</th>
        <th align="center"><font color="#33cc33" size="4px">ZipCode</th>
       <th align="center"><font color="#33cc33" size="4px">PhoneNo</th>
        <!-- <th><input class="inputStyleBack" input type="button" onClick="location.href='add_admin.html.php'" value="Back"></th>  -->


      </tr>
      <?php foreach ($result as $property):
      ?>

        <tr>

        <td> <?php echo $property['PropertyName']; ?> </td>
          <td> <?php echo $property['Address']; ?> </td>
           <td> <?php echo $property['ZipCode']; ?> </td>
           <td> <?php echo $property['PhoneNo']; ?> </td>

           <td>
           <form action="?delete" method="post">
            <input type="hidden" name="prop_id" value="<?php echo $property['PropertyID']; ?>">
           <input class="inputStyleSubmit" input type="submit" value="Delete">
          </form>
        </td>
        </tr>
      <?php endforeach;
      ?>

    </table>
	
	
	</center>
    </body>
