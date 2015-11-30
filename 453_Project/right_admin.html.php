
<?php
include 'dbRequests.php';

$sql = "SELECT TotalUsers from usercount";
$Users_Count = executeQuery($sql);
$usercount = $Users_Count->fetch();

$sql_PropertyAverage= "select propertytype.TypeName as TypeName, AVG(Price) as Average from propertytype, apartment WHERE apartment.TypeID=propertytype.TypeID GROUP By apartment.TypeID";
$Property_Average = executeQuery($sql_PropertyAverage);
//$PropertyAverage = $Property_Average->fetch();

$sql_zipcode = "select DISTINCT count(ZipCode) as zipcodes from property";
$zipcode = executeQuery($sql_zipcode);
$zipcode = $zipcode->fetch();

$sql_apartment = "select  count(*) as apartment from apartment";
$apartment = executeQuery($sql_apartment);
$apartment = $apartment->fetch();

while ($row = $Users_Count->fetch())
 {
 	$usercount[] = $row['TotalUsers'];
 }
 
 

?>
<html>
<style>
p.big{
	 line-height: 2.0;
	 font-size:20px;
	 font-family:Constantia;
	 text-align:center;
	     margin-top: 85px;
		 color:black;
}
body {
    background-color: lightblue;
	
	 background-image: url("/453_Project/images/Sample.jpg");
}
</style>
<body>

<center>
<p class="big">
This Application is currently used by <font size="6" color="black"><?php echo $usercount['TotalUsers']; ?></font> users. It has 8 different property types that are:
<?php  foreach ($Property_Average as $result){ ?>
<font size="4" color="black"> <?php echo $result['TypeName']; ?></font>
=
<font size="5" color="black"> <?php echo "$".number_format($result['Average'],2); ?></font>
<?php } ?>
respectively as their average price across the zipcodes. In this website there are a total of <font size="6" color="black"> <?php echo $apartment['apartment']; ?></font> apartment across
 <font size="6" color="black"><?php echo $zipcode['zipcodes']; ?></font> different neighbourhoods.
</p>
</center>

</body>
</html>