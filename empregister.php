<!doctype html>  
<html>  
<head>  
<title>Admin Register</title>  
    <style>   
        body{  
   background-image: url("crew.jpg");      
       margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
	background-size: 100%;
    background-attachment: fixed; 
	color: #261A15;
    font-family: 'Yantramanav', sans-serif;;  
    font-size: 100%;  
      
        }  
         h1 {  
    color: rgb(44,62,80);  
    font-family: verdana;  
    font-size: 100%;  
}  
         h2 {  
    color: rgb(1,50,67);  
    font-family: verdana;  
    font-size: 100%;  
}
		 a {
    color: rgb(102, 51, 153);
}</style>  
</head>  
<body>  
     
    <center><h1><u> AIRLINE RESERVATION SYSTEM </u></h1></center>  <br>
   <p><a href="empregister.php">Register</a> | <a href="emplogin.php">Login</a></p>  
    <center><h2>Admin Registration Form</h2></center>  <br>
<form action="" method="POST">  
    <legend>  
    <fieldset>  
          
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Employee name: </b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="emp"/><br />  
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Employee Id: </b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="empid"/><br />  
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Position: </b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="position"/><br />  
<!--<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Airport Id: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="number" name="aid"/><br />  -->
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Password: </b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" name="emppass"/><br /> 
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Confirm Password: </b>&nbsp; &nbsp; &nbsp; &nbsp;<input type="password" name="empconf"/><br /><br>  
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" value="Register" name="submit" /> 
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="reset"/><br>
             <br> 
        </fieldset>  
        </legend>  
</form>  
<?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['emp']) && !empty($_POST['empid']) && !empty($_POST['position'])&& !empty($_POST['emppass']) && !empty($_POST['empconf'])) {  
    $emp=$_POST['emp'];
	$empid=$_POST['empid'];
	$pos=$_POST['position'];
	//$aid=$_POST['aid'];
	$emppass=$_POST['emppass'];  
	$empconf=$_POST['empconf'];
	
	if ($emppass != $empconf) {
	echo("Error... Passwords do not match");
	exit;
	}
      $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
  
	$sql="SELECT * FROM employee WHERE name='".$emp."'";
    $query=mysqli_query($con,$sql);  
    $numrows=mysqli_num_rows($query);  
    if($numrows==0)  
    {  
    $sql="INSERT INTO employee(name,eid,position,password) VALUES('$emp','$empid','$pos','$emppass');";  
    //$sql.="INSERT INTO airport(airportid) VALUES('$aid');";
  
    $result=mysqli_multi_query($con,$sql);  
        if($result){  
    echo "Employee Account Successfully Created.. Please Login.. ";  
    } else {  
    echo "Failure!";  
    }  
  
    } else {  
    echo "That Employee name already exists! Please try again with another.";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>   