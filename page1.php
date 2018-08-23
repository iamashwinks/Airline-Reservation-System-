<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:userlogin.php");  
} else {  
?>  
<!doctype html>  

<html>  
<head>  
<title>Welcome</title>  
<link rel="stylesheet" type="text/css" href="page.css">
</head>  
<body>  
 <center><h1><u> AIRLINE RESERVATION SYSTEM </u></h1></center>
    <br><p> Thank you.. Successfully Logged In..</p> 
	
      
<h2>Welcome, <?php echo $_SESSION["sess_user"]; ?></h2><br>
<div class="right"> 
<button type="submit" name="updatepass" value="updatepass" ><a href="update_password.php"> Update Password </a></button>
</div><br><br>
<form method="POST" action="" >  	
	<legend>  
    <fieldset>
	<center>
	<br><br><br>
<b> Depart On: </b>
    <input type="date" name="depdate" value="Today"/><br><br>
<b> From: </b><input type="text" name="from1"> &nbsp; &nbsp; &nbsp; &nbsp; <b> To: </b><input type="text" name="to1"><br> 
<br> 
<br><br><input type="submit" value="Proceed" name="proceed" /> 
</center>
<p align="right"> Page 1 </p>
<?php   

if(isset($_POST["proceed"])){
if(!empty($_POST['from1']) && !empty($_POST['to1']) && !empty($_POST['depdate'])) {  
    $from=$_POST['from1'];  
    $to=$_POST['to1'];  
    $depdate=$_POST['depdate'];  
	
  $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
	$user=$_SESSION["sess_user"];
	$today = strtotime('today');
$date_timestamp = strtotime($depdate);

if ($date_timestamp < $today) {
?>
		<script>
			window.alert('Enter Valid Date!!..');
			window.history.back();
		</script>
		<?php
	} 	else{
	
	if ($from==$to){
		?>
		<script>
			window.alert('Pickup and Destination cannot be same');
			window.history.back();
		</script>
		<?php
	}
		else{
	$sql="INSERT INTO airport(pick,dest,depdate,airportid) VALUES('$from','$to','$depdate','')";  
	
	if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
	$_SESSION['sess_aid']=$last_id;
	$_SESSION['sess_user']=$user;  
	
	header("Location: page2.php");  
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);}}}
else {  
    echo "All fields are required!";  
} 
}}
?>  
</fieldset>  
</legend>
</form>
</body>  
</html>
