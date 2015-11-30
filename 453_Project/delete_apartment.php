<?php
include 'dbRequests.php';
$sql = "select apartment.ApartmentID, apartment.LeasePeriod, apartment.Price, property.PropertyName, propertytype.TypeName
									FROM apartment, property, propertytype
									WHERE apartment.TypeID=propertytype.TypeID and
									property.PropertyID=apartment.PropertyID";

//   Alternate
//
// "select apartment.ApartmentID, apartment.LeasePeriod, apartment.Price, property.PropertyName, propertytype.TypeName
// FROM apartment INNER JOIN property
// ON apartment.PropertyID=property.PropertyID
// INNER JOIN propertytype
// on apartment.TypeID=propertytype.TypeID"

$result = executeQuery($sql);

if (isset($_GET['delete']))
{
  $aptID = $_POST['apt_id'];
  $sql = "DELETE FROM apartment WHERE ApartmentID = '$aptID'"; // is coming from input type name="id"
  $delete_apartment = executeQuery($sql);
  //$s->bindValue(':apt_id', $_POST['apt_id']);
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>List of Apartments to delete</title>
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
			      width: 140px;

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
<center><p style="font-family:Constantia; font-size:25px; color:#33cc33;"><b>Delete Apartment</b></p></center>



<center>
    <table>
	<tr><td></td></tr>
      <tr>
        <th align="center"><font color="#33cc33" size="4px">ApartmentID</th>
       <th align="center"><font color="#33cc33" size="4px">PropertyName</th>
       <th align="center"><font color="#33cc33" size="4px">Price</th>
       <th align="center"><font color="#33cc33" size="4px">Lease Period</th>
        <th align="center"><font color="#33cc33" size="4px">Type</th>
				<!--<th><input class="inputStyleBack" input type="button" onClick="location.href='add_admin.html.php'" value="Back"></th>  -->

      </tr>
      <?php foreach ($result as $apartment):
      ?>

        <tr>
        <td> <?php echo $apartment['ApartmentID']; ?> </td>
        <td style= "width:150px"> <?php echo $apartment['PropertyName']; ?> </td>
          <td> <?php echo $apartment['Price']; ?> </td>
           <td> <?php echo $apartment['LeasePeriod']; ?> </td>
           <td> <?php echo $apartment['TypeName']; ?> </td>

           <td>
           <form action="?delete" method="post">
            <input type="hidden" name="apt_id" value="<?php echo $apartment['ApartmentID']; ?>">
           <input class="inputStyleSubmit" input type="submit" value="Delete">
          </form>
        </td>
        </tr>
      <?php endforeach;
      ?>

    </table>
	
	
	</center>
    </body>
