<?php
$zipcode =$_POST['zipcode'];
$priceMin =$_POST['minPrice'];
$priceMax =$_POST['maxPrice'];
$type =$_POST['Property_type'];



try
{


  $pdo = new PDO('mysql:host=localhost;dbname=cozy_homes', 'pagarwal', 'pa251188');

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{

  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}


try{
	$sql = 'SELECT property.PropertyID,
				   Apartment.ApartmentID,
				   property.PropertyName,
				   propertytype.TypeName,
				   apartment.Price,
				   apartment.LeasePeriod,
				   property.Address,
				   property.ZipCode,
				   property.PhoneNo,
				   property.Rating
			FROM Property, Apartment, propertytype
			WHERE propertytype.TypeID= apartment.TypeID AND
				  apartment.PropertyID = property.PropertyID AND
				  propertytype.TypeName = :TypeName AND
				  property.ZipCode = :ZipCode AND
				  Price BETWEEN :minPrice AND :maxPrice';
	 $s = $pdo->prepare($sql);
    $s->bindValue(':minPrice', $priceMin);
    $s->bindValue(':maxPrice', $priceMax);
	$s->bindValue(':ZipCode', $zipcode);
	$s->bindValue(':TypeName', $type);
	$s->execute();
	$result = $s->fetchAll();

	//$result = $pdo->query($sql);
}

catch (PDOException $e)
  {
    $error = 'Error fetching departments: ' . $e->getMessage();
  include 'error.html.php';
  exit();
  }

  

  
 
  
  
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<title>List of Departments</title>
<style>
table,th,td
{
border:0px solid black;
padding:5px;
text-align:center;
padding:10px;
}
td {
    height: 100px;
    vertical-align: center;
}
th{background:white}
tr:nth-child(even) {background: #66b2ff}
tr:nth-child(odd) {background: #FFF}
body{
	background:image:url('453_test/images/Rightframe.jpg'	);
}
.recorded{
        border:2px red solid;
        border-radius:5px; //round corner for modern browsers
        -moz-border-radius:5px; //round corner for old mozilla
        -webkit-border-radius:5px; //round corner for old Chrome or Safari
        background: red;
        box-shadow: 0 2px 4px red; //shadow for modern browsers
        -moz-box-shadow: 0 2px 4px red; //shadow for old mozilla
        -webkit-box-shadow: 0 2px 4px red; //shadow for old Chrome or Safari
        font:italic bold 12px/14px sans-serif;
        text-align:center;
   }


</style>
</head>
<body style="font-family:Constantia;">


    <center><p style="text-align:center; font-family:Constantia; font-size:30px; font-weight:bold;">List of all the options:<p></center>
   

    


    <center>
	<table >
	<tr>
	<th>Apartment ID</th>
	<th>BuildingName</th>
	<!-- <th>Aprtment Type</th>  -->
	<th>Price</th>
	<th>LeasePeriod (in mths)</th>
	<th>Address</th>
	
	<th>PhoneNo</th>
	<th>Rating</th>
	<th>Click for more Info.</th>
	

	</tr>
    <?php foreach($result as $Apartment): ?>
      <tr>
	<td style= "width:50px"> <?php echo $Apartment['ApartmentID']; ?> </td>     
	 <td style= "width:150px"> <?php echo $Apartment['PropertyName']; ?> </td>
     <!-- <td style= "width:200px"> <?php echo $Apartment['TypeName']; ?> </td> --> 
        <td> <?php echo $Apartment['Price']; ?> </td>
         <td style= "width:100px"> <?php echo $Apartment['LeasePeriod']; ?> </td>
		 <td> <?php echo $Apartment['Address']; ?> </td>
		 <!--<td style= "width:50px"> <?php echo $Apartment['aptNo']; ?> </td>-->
		 <td style= "width:150px"> <?php echo $Apartment['PhoneNo']; ?> </td>  
		 <td> <?php echo $Apartment['Rating']; ?> </td>
		 
		 
		 <!-- more information code -->
		 <td>
		 
		 <form action="popup_utility.html.php" method="POST" target="_blank" id="popup_utility" name="popup_utility">
			 <input type="hidden" name="PropertyID" value="<?php echo $Apartment['PropertyID']; ?>">
			 <input type="hidden" name="PropertyName" value="<?php echo $Apartment['PropertyName']; ?>">
			 <input type="hidden" name="Price" value="<?php echo $Apartment['Price']; ?>">
			 <input type="submit" name="moreInfo" id="moreInfo" value="More Information">
		 </form>
		 </td>
		 
		 
		 <!-- interested icon code  -->
		
			
        

      </tr>
	 
    <?php endforeach; ?>
    </table>
	</center>

  </body>
</html>
