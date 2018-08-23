<?php   
session_start();  
?> 
<!doctype html>	
<html>  
<head>  
<title>Filter Search</title>  
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
</div><br><br><br>
<center>
<h3> Filter Search: </h3><br>
<form action="" method="POST"> 
<b> From: </b><input type="text" name="from"> &nbsp; &nbsp; &nbsp; &nbsp; <b> To: </b><input type="text" name="to"><br> 
<br><br><input type="submit" value="View Filter Search" name="filter" /> <br><br>
<hr>
<?php
if(isset($_POST["filter"])){
if(!empty($_POST['from']) && !empty($_POST['to'])) {  
    $from=$_POST['from'];  
    $to=$_POST['to'];  
?>
<h3> Filter Search Booked Details: </h3>
<?php
   
 $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error()); 
 $sql="select * from records r WHERE r.pickup='$from' AND r.destination='$to'";
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
	else{ echo "No flights booked";}?><hr>
<?php
	mysqli_free_result($result);
}
}}
?> 
<br><b> Date After: &emsp;</b>  <input type="date" name="date" value="Today"/><br>
<br><br><input type="submit" value="View Filter Search" name="filterdate" /> <br><br><hr>
<?php
if(isset($_POST["filterdate"])){
if(!empty($_POST['date'])) {  
    $date=$_POST['date'];	
?>
<h3> Filter Search Booked Details: </h3>
<?php
   
 $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error()); 
 $sql="select * from records r WHERE r.deptime>='$date'";
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
	else{ echo "No flights booked";}

	mysqli_free_result($result);
}
}}
?> 
<br><br>
<input type="button" value="Insert Flights" onclick="location.href='enter.php';" />

</form>
</center>
</body>  
</html>
