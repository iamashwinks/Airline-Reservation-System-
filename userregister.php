<!doctype html>
<html>
<head>
<title>User Register</title>

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
         h2 {
    color: rgb(144,198,149);
    font-family: verdana;
    font-size: 100%;
}
		 a {
    color: rgb(241,169,160);
}</style>
</head>
<body>

    <center><h1><u> AIRLINE RESERVATION SYSTEM </u></h1></center>  <br>
   <p><a href="userregister.php">Register</a> | <a href="userlogin.php">Login</a></p>
    <center><h2>User Registration Form</h2></center>  <br>
<form action="" method="POST">
    <legend>
    <fieldset>

<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Username: </b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="user"/><br />
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Email:</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="email" name="email" placeholder="eg. email@gmail.com"/><br />
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Contact Number:</b>&nbsp; &nbsp; &nbsp;<input type="number" name="cnum" pattern="/(7|8|9)\d{9}/"/><br />
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Age:</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="number" name="age" min="0" max="100" /><br>
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Password:</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" name="pass"/><br />
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>Confirm Password:</b>&nbsp; &nbsp;<input type="password" name="conf"/><br /><br>
<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" value="Register" name="submit" />
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="reset"/><br>
             <br>
        </fieldset>
        </legend>
</form>

<?php
if(isset($_POST["submit"])){
if(!empty($_POST['user']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['cnum']) && !empty($_POST['pass']) && !empty($_POST['conf'])) {
    $user=$_POST['user'];
    $age=$_POST['age'];
	$email=$_POST['email'];
	$cnum=$_POST['cnum'];
	$pass=$_POST['pass'];
	$conf=$_POST['conf'];

	if ($pass != $conf) {
	echo("Error... Passwords do not match");
	exit;
	}
    $con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());  

	$sql="SELECT * FROM custlogin WHERE username='".$user."'";
    $query=mysqli_query($con,$sql);
    $numrows=mysqli_num_rows($query);
    if($numrows==0)
    {
    $sql="CALL insertData('$user','$age','$email','$cnum','$pass')";

    $result=mysqli_query($con,$sql);
        if($result){
    echo "Account Successfully Created.. Please Login.. ";
    } else {
    echo "Failure!";
    }

    } else {
    echo "That username already exists! Please try again with another.";
    }

} else {
    echo "All fields are required!";
}
}
?>
</body>
</html>
