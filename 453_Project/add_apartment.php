<?php
include 'dbRequests.php';



if(isset($_POST['submit']))
{



		try{
			//making an independent connection variable for trasaction
			$pdo = connectToDB();

			//starting a transaction
			$pdo->beginTransaction();



		//if we hit submit button, store the entered val in some variables
		$propID = $_POST["PropertyID"];
		$apartmentID = $_POST["aptID_new"];
		$price = $_POST["price_newprop"];
		$lease = $_POST["lease_newprop"];
		$type=$_POST["Property_type"];


		$sql = "INSERT INTO apartment VALUES('$apartmentID','$propID',$price,'$lease','$type')";
		$pdo->exec($sql);
		// now data has already ntered


		if($price<0){
			//data will be rollbacked beacause price is negative
		$pdo->rollback();
		$message = "Cannot enter apartment with negative price";
		echo "<script type='text/javascript'>alert('$message');</script>";

		}else{
			//else data will not be rollbacked.and committed.
			$pdo->commit();
		}

		//$pdo->endTransaction();

		}
		catch(PDOException $ex){
				echo $ex->getMessage();
		}




}

	$sql_PropertyName = 'SELECT PropertyName, PropertyID FROM property';
	$result = executeQuery($sql_PropertyName);

	$sql_PropertyType = 'SELECT TypeID, TypeName FROM propertytype';// for type name..
	$resultType = executeQuery($sql_PropertyType);

while ($row = $result->fetch())
{
	$propertyName[$row["PropertyID"]] = $row['PropertyName'];
}
while ($row = $resultType->fetch())
{
	$propertyType[$row["TypeID"]] = $row["TypeName"];//key cha name type id madhe jail and resuly display hoil
}
?>

<html>
<head>

<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
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
			h3
			{
    		text-align: center;
			}
			body{font-family:Verdana;}
			td {  padding: 10px;}
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


<form action="add_apartment.php" method="POST">
<center><p style="font-family:Constantia; font-size:25px; color:#33cc33;"><b>Form to add Apartment</b></p></center>
<!--<h3 >Form to add Apartment</h3> -->
<div class="center">
	<table>
  	<tr><td>
					<label for="PropertyID">Property Name:</label>
		        <td><select name="PropertyID" style="width:200px">
		    		<option value="select">--Select--</option>
		    		<?php foreach($propertyName as $pID => $pName): ?>
		    		<option value="<?php echo $pID;?>"><?php echo $pName;?></option>
		    		<?php endforeach; ?>
		  	</select></td>
				<br/><br/>
		</td></tr>
    	<tr><td>Apartment ID:<td><input type="text" name="aptID_new"></td></td></tr>
    		<tr><td>Price:<td><input type="text" name="price_newprop"></td></td></tr>
    		<tr><td>Lease Period:<td><input type="text" name="lease_newprop"></td></td></tr>

	<tr><td>
			<label for="Property_type">Property Type:</label>
	  <td><select name="Property_type" style="width:200px">
			  			<option value="select">--Select--</option>
					<?php foreach($propertyType as $x => $x_value): ?> //x is key cha name and x_value is its value.. that is x is AAAB and X_value is type name that is description of the type.i.e type name.(x is type id and x.value is type name)
			  		<option value="<?php echo $x;?>"><?php echo $x_value;?></option>
			  		<?php endforeach; ?>
	  	</select></td>
	</td></tr>
  	<tr><td>  <input class="inputStyleSubmit" input type="submit" value="Submit" name="submit"></td>
			      <!-- <td><input class="inputStyleBack" input type="button" onClick="location.href='add_admin.html.php'" value="Back"></td>--></tr>
</div>
</table>
</form>
</body>
</html>
