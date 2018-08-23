<!doctype html>  
<html>  
<head>  
<title>User Login</title>  
    <style>   
        body{  
   background-image: url("planelanding.jpg");      
       margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
	background-size: 100%;
    background-attachment: fixed; 
	color: #E4F1FE;
    font-family: 'Yantramanav', sans-serif;;  
    font-size: 100%;  
      
        }  
            h1 {  
    color: rgb(1,50,67);  
    font-family: verdana;  
    font-size: 100%;  
}  
        h3 {  
    color: rgb(144,198,149);  
    font-family: verdana;  
    font-size: 100%;  
}
		 a {
    color: rgb(236,236,236);
}</style>  
</head>  
<body>  
     <br><center><h1><u> AIRLINE RESERVATION SYSTEM </u></h1></center>  <br>
   <p><a href="userregister.php">Register</a> | <a href="userlogin.php">Login</a></p>  
<br>
   <h3>User Login Form</h3>  
<form action="" method="POST">  
<br /><b>Username: </b><input type="text" name="user"><br />  
<br /><b>Password: </b><input type="password" name="pass"><br />   
<br /><input type="submit" value="Login" name="submit" />  

</form>  
<?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
	
    $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());    
	
	$sql="SELECT * FROM custlogin WHERE username='".$user."' AND password='".$pass."'";
    $query=mysqli_query($con,$sql);  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbuser=$row['username'];  
    $dbpassword=$row['password'];  
    }  
  
    if($user == $dbuser && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: page1.php");  
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