<?php   
session_start();  
if(!isset($_SESSION["sess_ename"])){  
    header("location:emplogin.php");  
} else {
?>
<!doctype html>	
<html>  
<head>  
<title>Welcome Employee</title>  
<link rel="stylesheet" type="text/css" href="emp.css">
</head>  
<body>  
<center><h1><u> AIRLINE RESERVATION SYSTEM </u></h1></center>
<br><h2>Welcome</h2>

<div class="right"><button class="button">
	<a href="logout.php"  style="color:white">Logout</a></button>
</div><br><br><br>
<form action="" method="POST">
<legend>  
    <fieldset>
	<center>
	<br>
	<h2>Enter Flight Details: </h2><br>
<b> Plane id: &nbsp; &nbsp; &nbsp; &nbsp;</b><input type="number" name="pid"><br><br>
<b> Seats:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b><input type="number" name="seats"><br><br>
<b> Plane name:  &nbsp;</b><input type="text" name="planename"><br><br>
<b> Pickup:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b><input type="text" name="from"><br><br>
<b> Destination:   &nbsp;</b><input type="text" name="to"><br><br>
<b> Class:  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;</b><input type="text" name="class"><br><br>
<b> Fare:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b><input type="text" name="fare">   <br>  	<br><br>
&emsp; &emsp; &emsp; &emsp; &emsp;<input type="submit" value="Insert flight details" name="insert" /><br><br>
</form>
<form action="view.php" method="POST"> 
	<div class="right">
	<input type="button" value="View Booking" onclick="location.href='view.php';" /><br><br>
<input type="button" value="Filter Search" onclick="location.href='filter.php';" />
</div><br>
	</fieldset>  
</legend>
</form>
</body>  
</html>

<?php
if(isset($_POST["insert"])){  
if(!empty($_POST['pid']) && !empty($_POST['seats']) && !empty($_POST['planename']) && !empty($_POST['from']) && !empty($_POST['to']) && !empty($_POST['class']) && !empty($_POST['fare'])) {  
    $pid=$_POST['pid'];
	$seats=$_POST['seats'];
    $planename=$_POST['planename'];
	$from=$_POST['from'];
	$to=$_POST['to'];
	$class=$_POST['class'];  
	$fare=$_POST['fare'];
  $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
  
$sql="SELECT * FROM planes WHERE pid='".$pid."'";
    $query=mysqli_query($con,$sql);  
    $numrows=mysqli_num_rows($query);  
    if($numrows==0)  
    {  
   // $sql="INSERT INTO custlogin(username,idproof,age,email,contactnum,password) VALUES('$user','$id','$age','$email','$cnum','$pass')";  
  $sql="INSERT INTO planes(pid,seats,planename,pickup,dest,class,fare) VALUES('$pid','$seats','$planename','$from','$to','$class','$fare');";  
	
    $result=mysqli_query($con,$sql);  
        //$lastInsertID =  mysqli_insert_id($con);
		if($result){  
    echo " Successfully Inserted..  ";  
	} else {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "That entry(or Pid) already exists! Please try again with another.";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  

}
?>