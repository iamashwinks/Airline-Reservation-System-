<!doctype html>  
<html>  
<head>  
<title>Admin Login</title>  
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
        h3 {  
    color: rgb(44,62,80);  
    font-family: verdana;  
    font-size: 100%;  
}
		 a {
    color: rgb(102, 51, 153);
}</style>  
</head>  
<body>  
     <br><center><h1><u> AIRLINE RESERVATION SYSTEM </u></h1></center>  <br>
   <p><a href="empregister.php">Register</a> | <a href="emplogin.php">Login</a></p>  
	<br />
   <h3>Admin Login Form</h3>  
<form action="" method="POST">  
<br /><b>Employee name: </b>&nbsp;<input type="text" name="empname"><br />  
<br /><b>Password: </b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" name="emppass"><br />   <br>
<br /><input type="submit" value="Login" name="submit" />  
</form>  
<?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['empname']) && !empty($_POST['emppass'])) {  
    $empname=$_POST['empname'];  
    $emppass=$_POST['emppass'];  
  
      $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  
  
	$sql="SELECT * FROM employee WHERE name='".$empname."' AND password='".$emppass."'";
    $query=mysqli_query($con,$sql);  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbename=$row['name'];  
    $dbpassword=$row['password'];  
    }  
  
    if($empname == $dbename && $emppass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_ename']=$empname;  
     
    /* Redirect browser */  
    header("Location: enter.php");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>   