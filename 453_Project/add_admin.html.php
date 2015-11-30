
<?php
include 'dbRequests.php';
session_start();
if(isset($_SESSION['email']))
{
  $email = $_SESSION['email'];
}

// comment
else
{
  $email = $_GET['email'];
  $password = $_GET['password'];
  try
  {
    $sql="select UserName,PwdHash from admindetails where UserName='$email' ";// fetching Username and compare it with testbox adminid.
    $result = executeQuery($sql);

    if($result->rowcount()== 0)
    {
      echo "AdminId or password incorrect!";
      $database_adminid=" ";
      $database_password=" ";
    }
    else
    {
      foreach($result as $row)//fetching adminid and password from DB as it's a more than 1 column, let's put foreach
      {
        $database_adminid= $row['UserName'];
        $database_password= $row['PwdHash'];
      }
    }

    if($database_adminid==$email && $database_password==$password)
    {
      
      $_SESSION['email'] = $email;
    }
    else
    {
    echo "Login Unsuccessful!! Try again!!";
    }
  }
  catch (Exception $e)
  {
    echo $e;
    $error = 'Database error ';
    include 'error.html.php';
    exit();
  }
  # code...
}

$sql = 'SELECT TypeName FROM propertytype';
$result = executeQuery($sql);

while ($row = $result->fetch())
{
	$TypeName[] = $row['TypeName'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
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

	function jsAddApartment()
	{document.getElementById('iRightFrame').src='add_apartment.php';}

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
		 
		 
		 <li class="dropdown headerItem">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">More
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="new_listing.php">Newlisting</a></li>
            <li><a href="admin_update_trigger.php">history</a></li>
            
          </ul>
        </li>
		<li class="active headerItem"><a href="#">Welcome <?php echo $email;?>!</a></li>

      </ul>
    </div>
  </div>

</nav>


<div class="bodycontent">
<div id="ileftdiv">
	<form action="rightResult_admin.html.php"  method="post" id="input_form" name="inputform" class="inputForm" target="rightFrame">
	<div>


        <input type="hidden" name="username" id="username" value="<?php echo $email;?>">
    </div>
<div class="customerServiceStyle">
<br/>
<center><p style="font-family:Constantia; font-size:20px;">Customer Service</p></center>
<div>
<br/>
<input type="button"  onClick="location.href='listingPage_admin.html.php'" value="Find suitable Aparment"><br>
</div>
</div>



	 
	 

	
	<div class="customerServiceStyle">
	<br/>
	<center><p style="font-family:Constantia; font-size:20px;"> Control Apartments</p></center>
  
<br/>
   
     <input type="button"  onClick="location.href='add_apartment.php'" value="Add new Apartment"><br>
     <input type="button" onClick="location.href='modify_apartment.php'" value="Modify apartment"><br>
     <input type="button" onClick="location.href='delete_apartment.php'" value="Delete apartment"><br>

	
	 </div>
	 
	 <div class="customerServiceStyle">
	 <br/>
	<center><p style="font-family:Constantia; font-size:20px;">Control Properties</p></center>
	<br/>

	<input type="button" onClick="location.href='add_property.php'" value="Add New Property"><br>
     <input type="button" onClick="location.href='modify_property.php'" value="Modify Property"><br>
     <input type="button" onClick="location.href='delete_property.php'" value="Delete Property"><br>
</div>    


<!--
<div class="customerServiceStyle">
<br/>
	<input type="button" onClick="location.href='new_listing.php'" value="New Listing">

     <input type="button" onClick="location.href='admin_update_trigger.php'" value="History"><br>
</div>   
   --> 
    </form>
</div>
<div id="iRightDiv">
	<iframe id="iRightFrame" src="right_admin.html.php" scrolling="Yes" frameBorder="1" name="rightFrame" />
</div>
</div>
</div>
</body>
<html>
