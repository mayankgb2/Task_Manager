<?php

// Create connection

   session_start();
   include("db.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      
      $sql = "SELECT id, name FROM users WHERE email = '$email' and password = '$password'";
      
	  if($result = mysqli_query($conn,$sql)){
      $row = mysqli_fetch_assoc($result);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("email");
         $_SESSION['email'] = $email;
         $_SESSION['id'] = $row['id'];
         $_SESSION['name'] = $row['name'];
		 setcookie($email, $password, time() + (86400 * 30), "/");
         header("location: task.php");
      }else {
		 header("location: login.php");
      }
	  }
	  else{
		  echo mysqli_error($conn);
	  }
   }
?>