<?php
session_start();
if(!isset($_SESSION['sess_aid']) && !isset($_SESSION['sess_user'])){
   header("location:page1.php");
					exit();

   } else {

?>
<!doctype html>

<html>
<head>
<title>Welcome2</title>
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
<br><br><h2>Flight Details:</h2><br>
<form action="" method="POST">
	<legend>
    <fieldset>
	<center>
	<br><br>
<h2>Available Flights: </h2>

	<?php
$aid=$_SESSION['sess_aid'];
//echo $aid;
 $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());

$sql="SELECT p.pid,p.seats,p.planename,p.pickup,p.dest,p.class,p.fare FROM planes p, airport a WHERE p.pickup=a.pick AND p.dest=a.dest AND a.airportid=$aid";

	if($result=mysqli_query($con,$sql)){
	$numrows=mysqli_num_rows($result);
    if($numrows > 0){
		echo $numrows." Plane(s) Available..";
		echo "<br><br><table border='1'>";
		echo "<tr>";
		echo "<th>Plane id</th>";
		echo "<th>Seats Available</th>";
		echo "<th>Planename</th>";
		echo "<th>From</th>";
		echo "<th>To</th>";
		echo "<th>Class</th>";
		echo "<th>Fare</th>";
		//echo "<th>Action</th>";
		echo "</tr>";
		while($row=mysqli_fetch_assoc($result)){ ?>

              <?php echo "<tr>";?>

			  <td><?php echo $row['pid'];?></td>
			  <td><?php echo $row['seats'];?></td>
			  <td><?php echo $row['planename'];?></td>
			  <td><?php echo $row['pickup'];?></td>
			  <td><?php echo $row['dest'];?></td>
			  <td><?php echo $row['class'];?></td>
			  <td><?php echo $row['fare'];?></td>
			  <?php $seats=$row['seats'];?>
			  <?php echo "</tr>";?>
<?php
                }
				echo "</table><br><br>";
				?><b> Plane id: &ensp; &ensp; </b><input type="text" name="pid"> &ensp; &ensp;
				<input type="submit" value="Book" name="book" />
			  <?php
	}

	mysqli_free_result($result);
}
else{
        echo "No planes matching your requirements were found.";

}
$user=$_SESSION['sess_user'];

if(isset($_POST["book"])){
if(!empty($_POST['pid'])){
$pid=$_POST['pid'];

  $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());

  if ($seats==='0'){
		?>
		<script>
			window.alert('Seats completely filled.. Press Back..');
			window.history.back();
		</script>
		<?php
	}


	else{

$sql="INSERT INTO records(deptime,fare,classname,pid,seats,pickup,destination,username) SELECT a.depdate,p.fare,p.class,$pid,p.seats,a.pick,a.dest,c.username FROM planes p,airport a,custlogin c WHERE p.pickup=a.pick AND p.dest=a.dest AND a.airportid='$aid' AND c.username='$user' AND pid='$pid'";

	if ($result=mysqli_query($con, $sql)) {

	$_SESSION['sess_user']=$user;
	$_SESSION['sess_aid']=$aid;

	header("Location: page3.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);}

   }}}
	?><br><br><br>
 <input type="button" value="Back" onclick="location.href='page1.php';" /><br><br>
</center>
<p align="right"> Page 2 </p>
</fieldset>
</legend>
</form>
</body>
</html>
