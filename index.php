<?php
	session_start();
?>
<!DOCTYPE html>
<htm>
<head>
   <title>Task Manager</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	<body class="w3-green">
		<div class="w3-green" style="margin-top: 0px;">
			<div class="w3-card-8 w3-teal" style="margin-left:35%;margin-top:5%;width:30%;height:100%;">
				<div class="w3-margin-left w3-margin-right w3-center">
					<br><h2 style="text-shadow: 2px 2px 2px black">Task Manager</h2>
					<h5 style="text-shadow: 2px 2px 2px black">- To do list -</h5>
					<form method="POST" action="reg.do.php">
						<input type="text" placeholder="Enter your name" name="name" style="width:100%;" class="w3-round w3-input w3-border w3-light-grey" /><p>
						<input type="text" placeholder="Enter your email" name="email" style="width:100%;" class="w3-round w3-input w3-border w3-light-grey" /><p>
						<input type="password" placeholder="Enter your password" name="password" style="width:100%;"  class="w3-round w3-input w3-border w3-light-grey" /><p>
						<button type="submit" class="w3-btn w3-grey" style="width:100%;">Sign Up</button>
					</form>
					<br>
					<a href="login.php" ><button class="w3-btn w3-blue" style="box-shadow: 2px 2px 5px black">Log In</button></a>
					<br><br>
				</div>
			</div>
		</div>
		
	</body>
</html>
