<?php

include 'db.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = md5($_POST['password']);
 if($err == 0){
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
	$sql2 = "SELECT * FROM users WHERE email='$email'";
	$result2 = mysqli_query($conn,$sql2);
	$num = mysqli_num_rows($result2);
	$row = mysqli_fetch_assoc($result2);
	if ($num==1){
    	$_SESSION['email'] = $email;
         $_SESSION['id'] = $row['id'];
         $_SESSION['name'] = $name;
		 setcookie($email, $password, time() + (86400 * 30), "/");
         header("location: task.php");

	}
 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 }
 else{
	 header ('location: reg.php');
 }
?>