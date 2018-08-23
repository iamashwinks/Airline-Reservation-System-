<?php   
session_start();  
//if(!isset($_SESSION["sess_id"])){  
//    header("location:member.php");  
//} else {  
?> 
<!doctype html>	
<html>  
<head>  
<title>View</title>  
<link rel="stylesheet" type="text/css" href="emp.css">
<style>
table {
    border-collapse: collapse;
    width: 80%;
	color: #00332E;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>

</head>  
<body>  
<center><h1><u> AIRLINE RESERVATION SYSTEM </u></h1></center>

<div class="right"><button class="button">
	<a href="logout.php"  style="color:white">Logout</a></button>
</div><br>
<input type="button" value="Filter Search" onclick="location.href='filter.php';" />
<br><br><br>
<center>
<h3> Booked Details: </h3><br>
<form action="" method="POST"> 
<!--	<input type="submit" value="View Booking" name="view" /><br><br>-->
<?php
//}
//if(isset($_POST["view"])){

 $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
  
//$lastInsertID =  mysqli_insert_id($con);

		
$sql="select * from records";
	if($result=mysqli_query($con,$sql)){
	$numrows=mysqli_num_rows($result);  
    if($numrows > 0){
echo "<table border='1'>";
		echo "<tr>";
		echo "<table border='1'>";
		echo "<tr>";
		echo "<th>Username</th>";
		echo "<th>Booking id</th>";
		echo "<th>Departure date</th>";
		echo "<th>Classname</th>";
		echo "<th>Pid</th>";
		echo "<th>Seat no.</th>";
		echo "<th>Pickup</th>";
		echo "<th>Destination</th>";
		//echo "<th>Email</th>";
		echo "<th>Fare</th>";
		echo "</tr>";
		while($row=mysqli_fetch_assoc($result)){ ?>      
                
              <?php echo "<tr>";?>
              <td><b><?php echo $row['username'];?></b></td>
			  <td><?php echo $row['bookingid'];?></td>
			  <td><b><?php echo $row['deptime'];?></b></td>
			  <td><b><?php echo $row['classname'];?></b></td>			  
			  <td><?php echo $row['pid'];?></td>
			  <td><?php echo $row['seats'];?></td>
			  <td><b><?php echo $row['pickup'];?></b></td>
			  <td><b><?php echo $row['destination'];?></b></td>
			  <td><b><?php echo $row['fare'];?></b></td>
			  <?php echo "</tr>";?>
<?php			  
                }
				echo "</table>";
	}
	mysqli_free_result($result);
//}
}
 	
?>
<br><br>

<input type="submit" value="View New Booked Users" name="view" /><br><br>
<?php
if(isset($_POST["view"])){
$con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
$result=mysqli_query($con,"CALL no_of_Users") or die("Query Fail:".mysql_error());
while($row=mysqli_fetch_array($result)){
	//echo $row[0];
}
}
?>
<br><br>
<input type="button" value="Insert Flights" onclick="location.href='enter.php';" />

</form>
</center>
</body>  
</html>
