<?php
session_start();
if(!isset($_SESSION['sess_aid']) && !isset($_SESSION['sess_user'])){  
   header("location:page1.php");
					exit();

   } else {  

?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="page.css">
</head>
<body>	
	
	<center><h1><u> AIRLINE RESERVATION SYSTEM </u></h1></center><br><br>
	<form method="post" action="">
	<h2>Last Password Changed DATE AND TIME : </h2><br>
	<?php
	$con=@mysqli_connect('localhost','root','','airline') or die(mysql_error());    
	
		$result=mysqli_query($con,"select LastUpdateDate from custlogin where username='".$_SESSION['sess_user']."'");
		while($row = mysqli_fetch_array($result))
		{
			echo $row['LastUpdateDate'];
		}
		
	?>
	
	<form method="post" action="">
	
	<br><br><h2>CHANGE Password : </h2>
	
	<br>	<label><b>Current Password :</b></label> &ensp;
		<input type="Password" name="C_Password">
	
		<br><br>
		
		<label><b>New Password :</b></label> &ensp; &ensp; &ensp;
		<input type="Password" name="Password_1">
	 &ensp; &ensp; &ensp; &ensp;
		<label><b>Confirm Password :</b></label> &ensp;
		<input type="Password" name="Password_2">
	
	<br><br><br>
 &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; 
 &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp;
			<input type="submit" name="submit1" value="Update Password" /> 
			
	</form>
	<?php
		
		
		if(isset($_REQUEST['submit1']))
		{
			
	$cpassword=$_POST['C_Password'];
	$password_1=$_POST['Password_1'];
	$password_2=$_POST['Password_2'];
		$myq=mysqli_query($con,"select * from custlogin where username='".$_SESSION['sess_user']."'");
			$myqrow=mysqli_fetch_assoc($myq);
			$old_password=$myqrow['password'];
			if ($cpassword!=$old_password){
		?>
		<script>
			window.alert('Current Password Incorrect');
			window.history.back();
		</script>
		<?php
	}
	
	
	else{
		if ($password_1==$password_2){
			$newpassword=$password_1;
			
			mysqli_query($con,"update custlogin set password='$newpassword' where username='".$_SESSION['sess_user']."'");
		session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: page1.php");  
    
		?>
		<script>
			window.alert('New Password Updated Successfully!');
			window.history.back();
		</script>
		<?php
		}
		else{?>
			<script>
			window.alert('Password Mismatch');
			window.history.back();
		</script><?php
		}
		
		
	}

			
		}
			
   }		
		
	?></form>
<br><br><br>
<input type="button" value="Back" onclick="location.href='page1.php';" /><br>
</body>
</html>
