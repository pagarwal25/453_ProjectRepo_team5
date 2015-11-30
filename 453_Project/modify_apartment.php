<?php
include 'dbRequests.php';
if (isset($_POST['update']))
{
	$index=$_POST['index'];
	$apartmentid=$_POST['apartmentid'.$index];
	//echo $apartmentid;
	$price=$_POST['price'.$index];
	//echo $price;
	$lease=$_POST['lease'.$index];
	//echo $lease;
	$sql = "UPDATE apartment SET Price='$price',LeasePeriod='$lease' WHERE ApartmentID='$apartmentid'";
	$update_apartment = executeQuery($sql);
}
$sql = "select apartment.ApartmentID, property.PropertyName, apartment.LeasePeriod, apartment.Price
		from apartment LEFT JOIN property on apartment.PropertyID=property.PropertyID";
$result = executeQuery($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Modify Apartments</title>
<!--<h3> Modify Apartments</h3>-->
<style>
 <style>
       body{font-family:Verdana; background-color:Black;}
		  table{
              background-color: #f5f5f5;
               border:3px solid #73AD21;
          	   border-radius: 8px;
          	  box-shadow:inset 0 0 7px #D4D4D4;
			  box-shadow:inset 0 0 7px #33cc33;

          }
          h3
          {
            text-align: center;
          }

		   td {
          padding: 15px;
		  text-shadow: 0 0 15px #33cc33;
          }
		   .inputStyle
       {
          border-radius: 0px;
      	box-shadow:inset 0 0 7px #D4D4D4;
      	height: 30px;
      	font-size: 0.8em;
      	border: 1px solid #D4D4D4;
      	width:130px ;
		text-align:center;
      }

      input:focus {outline:none;}

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
            width: 100px;

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
        </style>
</style>
</head>

<body style="font-family:Constantia;">
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
<center><p style="font-family:Constantia; font-size:25px; color:#33cc33;"><b>Modify Apartment</b></p></center>

<!--<form action ="?update" method ="POST"> -->
<center>
    <table>
      <tr>
        <th align="center"><font color="#33cc33" size="4px">ApartmentID</th>
				<td></td>
				<th><font color="#33cc33" size="4px">Property Name</th>
				<td></td>
        <th><font color="#33cc33" size="4px">Price</th><td></td>
        <th><font color="#33cc33" size="4px">Lease Period</th><td></td>
					<!-- <td><input class="inputStyleBack" input type="button" onClick="location.href='add_admin.html.php'" value="Back"></td> -->
      </tr>

      <?php $index=0;?>
    <?php foreach ($result as $apartmentdetails): ?>
      <form action ="?update" method ="POST">
    <tr>
        	 <td>
        		   <label for="apartmentid">ApartmentID : </label>
        	 </td>
    				<td>
    					  <input class="inputStyle" type="text" readOnly="readOnly" id="apartmentid" name=<?php echo "apartmentid".$index?>  value="<?php echo $apartmentdetails['ApartmentID'];?>"/>
    				</td>

						<td>
         		   <label for="apartmentid">PropertyName : </label>
         	 </td>
     				<td>
     					  <input class="inputStyle" type="text" readOnly="readOnly" id="propertyName" name=<?php echo "propertyName".$index?>  value="<?php echo $apartmentdetails['PropertyName'];?>"/>
     				</td>



        	 <td>
        		    <label for="price">Price: </label>
        	 </td>
    				<td>
    					  <input class="inputStyle" type="text" id="price" name=<?php echo "price".$index?>  value="<?php echo $apartmentdetails['Price'];?>"/>
    				</td>

    	       <td><label for="lease">Lease Period : </label></td>
    				<td>
                <input class="inputStyle" type="text" id="lease" name=<?php echo "lease".$index?>  value="<?php echo $apartmentdetails['LeasePeriod'];?>"/>
            </td>



    				<td align="left">
              <input type="hidden" name= "index" value ="<?php echo $index?>">
    					<input class="inputStyleSubmit" type="submit" value="Update" name="update">
    	      </td>
    </tr>
				</form>

        <?php $index++;?>
				<?php endforeach; ?>
				</table>
</center>

<!--</form>-->

  </body>
</html>
