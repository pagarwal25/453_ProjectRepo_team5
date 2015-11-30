<?php
include 'dbRequests.php';
if (isset($_POST['update']))
{
	$index=$_POST['index'];
	$propertyID=$_POST['propertyID'.$index];
	//echo $apartmentid;
	$propertyName=$_POST['propertyName'.$index];
	//echo $price;
	$address=$_POST['address'.$index];
  $phoneNo=$_POST['phoneNo'.$index];
  $rating=$_POST['rating'.$index];
	//echo $lease;
	$sql = "UPDATE property SET PropertyName='$propertyName',Address='$address', PhoneNo= '$phoneNo', Rating ='$rating'
  WHERE PropertyID='$propertyID'";
	$update_property = executeQuery($sql);
}
$sql = "select * from property";
$result = executeQuery($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Modify Property</title>
<!-- <h3> Modify Property</h3> -->
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
          padding: 10px;
		  text-shadow: 0 0 15px #33cc33;
          }
		   .inputStyle
       {
          border-radius: 0px;
      	box-shadow:inset 0 0 7px #D4D4D4;
      	height: 30px;
      	font-size: 0.8em;
      	border: 1px solid #D4D4D4;
      	width:180px ;
		text-align:center;
	   }
	   
	    .inputStyle_small
       {
          border-radius: 0px;
      	box-shadow:inset 0 0 7px #D4D4D4;
      	height: 30px;
      	font-size: 0.8em;
      	border: 1px solid #D4D4D4;
      	width:40px ;
		text-align:center;
	   }
	   

	   .inputStyle_PhoneNo
       {
          border-radius: 0px;
      	box-shadow:inset 0 0 7px #D4D4D4;
      	height: 30px;
      	font-size: 0.8em;
      	border: 1px solid #D4D4D4;
      	width:100px ;
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
<center><p style="font-family:Constantia; font-size:25px; color:#33cc33;"><b>Modify Property</b></p></center>


<!--<form action ="?update" method ="POST"> -->
<center>
    <table>
	<tr><td></td></tr>
      <tr>
	  
        <th align="center"><font color="#33cc33" size="4px">PropertyID</th>
				<td></td>
        <th align="center"><font color="#33cc33" size="4px">PropertyName</th>
				<td></td>
        <th align="center"><font color="#33cc33" size="4px">Address </th>	<td></td>
				<th><font color="#33cc33" size="px">PhoneNo</th>	<td></td>
        <th align="center"><font color="#33cc33" size="4px">Rating </th>	<td></td>
				<!--<td><input class="inputStyleBack" input type="button" onClick="location.href='add_admin.html.php'" value="Back"></td> -->


      </tr>
      <?php $index=0;?>
    <?php foreach ($result as $propertydetails): ?>
      <form action ="?update" method ="POST">
    <tr>
        	 <td>
        		   <label for="propertyid">PropertyID : </label>
        	 </td>
    				<td>
    					  <input class="inputStyle_small" type="text" readOnly="readOnly" id="propertyID" name=<?php echo "propertyID".$index?>  value="<?php echo $propertydetails['PropertyID'];?>"/>
    				</td>

						<td>
         		   <label for="Property Name">PropertyName : </label>
         	 </td>
     				<td>
     					  <input class="inputStyle" type="text" readOnly="readOnly" id="propertyName" name=<?php echo "propertyName".$index?>  value="<?php echo $propertydetails['PropertyName'];?>"/>
     				</td>



        	 <td>
        		    <label for="address">Address: </label>
        	 </td>
    				<td>
    					  <input class="inputStyle" type="text" id="address" name=<?php echo "address".$index?>  value="<?php echo $propertydetails['Address'];?>"/>
    				</td>




            <td><label for="phoneNo">PhoneNo : </label></td>
           <td>
               <input class="inputStyle_PhoneNo" type="text" id="phoneNo" name=<?php echo "phoneNo".$index?>  value="<?php echo $propertydetails['PhoneNo'];?>"/>
           </td>


           <td><label for="rating">Rating : </label></td>
          <td>
              <input class="inputStyle_small" type="text" id="rating" name=<?php echo "rating".$index?>  value="<?php echo $propertydetails['Rating'];?>"/>
          </td>




    				<td align="left">
              <input type="hidden" name= "index" value ="<?php echo $index?>">
    					<input class="inputStyleSubmit" type="submit" value="Update" name="update" />
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
