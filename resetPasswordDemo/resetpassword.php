<?php
include("config.php");

if(!isset($_GET["code"])){
	exit("cant find code ");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($conn , "SELECT email FROM resetpassword WHERE code = '$code'");
if(mysqli_num_rows($getEmailQuery) == 0){
	exit("cant find page ");
}


if(isset($_POST["password"])){
	$pw = $_POST["password"];

	$row = mysqli_fetch_array($getEmailQuery);
	$email = $row["email"];

	$query = mysqli_query($conn , "UPDATE users SET password = '$pw' WHERE email = '$email' ");

	if($query){
		$query = mysqli_query($conn , "DELETE FROM resetpassword WHERE code ='$code'");
		exit("password updated ");
	}else{
		exit("something went wrong ");
	}
}
?>

<form method="POST">
	<input type="password" name="password" placeholder="new  password">
	<br>
	<input type="submit" name="submit" value= "update password">
</form>