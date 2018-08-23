<?php   
session_start();
if(!isset($_SESSION['sess_user']) && !isset($_SESSION['sess_aid'])){  
   header("location:page2.php");
					exit();

   } else {  
 
?>  <!doctype html>  

<html>  
<head>  
<title>Welcome3</title>  
<link rel="stylesheet" type="text/css" href="page.css">
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
<h2>Booking Details:</h2>

<div class="right"><button class="button">
	<a href="logout1.php"  style="color:white">Logout</a></button>
</div><br><br><br> 
<form action="" method="POST">  	
	<legend>  
    <fieldset>
	<center>
	<br>
	<b><p>Successfully Booked.</p></b>
	<br>
	<h2>Booked Flight Details : </h2><br>
	<?php
	$user=$_SESSION['sess_user'];  
$aid=$_SESSION['sess_aid'];

	$con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
 
	$sql1="SELECT r.seats FROM records r,custlogin c WHERE c.username='$user' ORDER BY r.bookingid DESC LIMIT 1";

if($result = mysqli_query($con, $sql1)){

if (mysqli_num_rows($result)>0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $seats=$row["seats"];
		//echo $seats;
		$seats--;
		//echo $seats;
    }
} else {
    echo "0 results";
} }
$sql2="UPDATE planes SET seats='$seats' WHERE pid IN(SELECT * FROM (SELECT pid FROM records r ORDER BY r.bookingid DESC LIMIT 1) temp_tab)";
if (mysqli_query($con, $sql2)) {
    //echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}

mysqli_close($con);
	?>
	<?php
	
	$con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
  
$sql="SELECT * FROM records ORDER BY bookingid DESC LIMIT 1";

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
		echo "<th>Seat No.</th>";
		echo "<th>Pickup</th>";
		echo "<th>Destination</th>";
		//echo "<th>Email</th>";
		echo "<th>Fare</th>";
		echo "</tr>";
		while($row=mysqli_fetch_assoc($result)){ ?>      
                
              <?php echo "<tr>";?>
              <td><?php echo $row['username'];?></td>
			  <td><?php echo $row['bookingid'];?></td>
			  <td><b><?php echo $row['deptime'];?></b></td>
			  <td><b><?php echo $row['classname'];?></b></td>			  
			  <td><?php echo $row['pid'];?></td>
			  <td><?php echo $row['seats'];?></td>
			  <td><b><?php echo $row['pickup'];?></b></td>
			  <td><b><?php echo $row['destination'];?></b.</td>
			  <td><b><?php echo $row['fare'];?></b></td>
			  <?php echo "</tr>";?>
<?php			  
                }
				echo "</table>";
	}
	mysqli_free_result($result);
}

	?>
	
	<!--<br><br> <input type="submit" value="Cancel Flight" name="cancel" /><br><br>-->
	<br><br><input type="submit" value="Cancel Flight" name="cancel" onclick="myFunction()"/>

<p id="demo"></p>

<script>
function myFunction() {
    var txt;
    if (confirm("Cancel Flight..??") == true) {
        txt = "Flight Cancelled!";
    } else {
        txt = "Flight Was Not Cancelled!";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>



	<?php
	$user=$_SESSION["sess_user"];
	if(isset($_POST["cancel"])){
	
  $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  

  $sql="CALL Cancel";
  if (mysqli_query($con, $sql)) {
    echo "Successfully Canceled";
	$_SESSION['sess_user']=$user;
	
	header("Location: page1.php");  
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);}


	

   }
	?>
	</center>
<p align="right"> Page 3 </p>
</fieldset>  
</legend>
</form>
</body>  
</html>

