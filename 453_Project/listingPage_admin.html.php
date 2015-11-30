<?php

include 'dbRequests.php';


try{
	$sql_PropertyType= 'SELECT TypeName FROM propertytype';
	$result = executeQuery($sql_PropertyType);
}

catch(PDOException $e){
	$error = 'error selecting Property Type'. $e->getMessage();
		include 'error.html.php';
		exit();
}

while ($row = $result->fetch()){
	$TypeName[] = $row['TypeName'];
}


?>
<!DOCTYPE html>
<html>
<head>
	
	<script type="text/javascript">
	function sliderChangeMin(val)
	{
		document.getElementById('sliderStatusMin').innerHTML = val;
		var minPrice= document.getElementById('minPrice');
		minPrice.value = val;
		
	}
	function sliderChangeMax(val)
	{
		document.getElementById('sliderStatusMax').innerHTML = val;
		var maxPrice= document.getElementById('maxPrice');
		maxPrice.value = val;
	}
	
	</script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body a link="black" vlink="black" style="font-family:Constantia;">
<div id="everything">
<nav class= "navbar nav-default  nav-fixed-top">

<div class="container-fluid">
   
    <div id="content">
      <ul id="navlist">
       <a href="index.html"><p style="font-family:Constantia;">Cozy Homes'</p></a>
       <p style="font-family:Constantia; font-size:15px; margin-top:25px;">Administrator Control</p>
	    <li class="active headerItem"><a href="add_admin.html.php">Go Back </a></li> 
		
		
		
		
		 <!-- <li class="active headerItem"><a href="#">Welcome <?php echo $username;?>!</a></li>  -->
       
      </ul>
    </div>
  </div>







</nav>
<div class="bodycontent">
<div id="ileftdiv">
	<form method="post" id="input_form" name="inputform" class="inputForm" target="rightFrame">
	<div>
     
	 
        <!--  <input type="hidden" name="username" id="username" value="<?php echo $username;?>">  -->
    </div>
	
	
	

	 
	 
	 <!-- Property Type like 1 BED 1 BATH -->
	 <div>
      <label for="Property_type">Property Type:</label></br>
        <select class="inputStyle_left" name="Property_type" style="width:200px">
		<option value="select">--Select--</option>
		<?php foreach($TypeName as $TypeName_d): ?>
		
		<option value="<?php echo $TypeName_d;?>"><?php echo $TypeName_d;?></option>
		<?php endforeach; ?>
		</select>
     </div>
	 
	 
	 <!-- Minimun and Maximun Price of Apartment -->
	 <div>
	  <label for="price-min">Price Min.:</label>
	  <br/>
	  <input type="range" min="500" max="7000" steps="10" value="500"  onChange="sliderChangeMin(this.value)"/><br/><span id="sliderStatusMin">500</span>
	  <input type="hidden" id="minPrice" name="minPrice">
	  <br/>
	  	  
	 </div>
	 
	 <div>
	  <label for="price-max">Price Max.:</label>
	  <br/>
	  <input type="range" min="500" max="7000" steps="10" value="500"  onChange="sliderChangeMax(this.value)"/><br/><span id="sliderStatusMax">500</span>
	  <input type="hidden" id="maxPrice" name="maxPrice">
	 <br/>
	  	  
	 </div>
	 
	 
	 <!-- search neighbourhood -->
	 <div>
     <button class="inputStyleSubmit_left" type="submit" value="Search" id="search" formaction="rightNeighbourhood_admin.html.php">Search Neighbourhood</button>
	 </div>
	 <br/>
	 <!-- Zipcode looking for -->
	<div>
     <label for="zipcode">ZipCode:</label></br>
	 
        <input class="inputStyle_left" type="text" name="zipcode" id="zipcode">
    </div>
	
	
	<!-- seach apartments -->
	<div>
     <button class="inputStyleSubmit_left" type="submit" value="Search" id="search" formaction="rightResult_admin.html.php">Search Apartments</button>
	 </div>
	 
	 
	 
    </form>
</div>

<div id="iRightDiv">
	<iframe id="iRightFrame" src="right.html.php" scrolling="Yes" frameBorder="1" name="rightFrame" />
</div>


</div>




</div>

</body>
<html>