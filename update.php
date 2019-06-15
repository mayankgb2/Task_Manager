<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Task Manager</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="w3-container w3-center w3-pale-red">
  <h2>Task Manager - To do list</h2>
</div>

<div class="w3-bar w3-black">
  <a href="task.php" class="w3-bar-item w3-button"> <i class="fa fa-home"></i> Home </a>
  <a href="add.php" class="w3-bar-item w3-button"> <i class="fa fa-plus"></i> Add </a>
  <div class="w3-dropdown-hover w3-right">
    <button class="w3-button"><b><i class="fa fa-power-off"></i> <?php echo $_SESSION['name']; ?></b></button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="logout.php" class="w3-bar-item w3-button">Log Out</a>
    </div>
  </div>
</div>
<br>
<?php	
	include("db.php");
	$data = $_GET['data'];
	$data = explode('_', $data);
	$extract_id = $data[0];
	$workid = $data[1];
	$id = $_SESSION['id'];
	if ($extract_id != $id){
		echo "<h2>You are not authorized to do this<h2>";
	}
	else{
		$sql = "UPDATE work SET status=1 WHERE workid='$workid' AND userid='$id'";
		$result = mysqli_query($conn,$sql);
		if ($result === true){
			echo "<h2>Update Successful<h2>";
		}
		else{
			echo "<h2>Error<h2>";
		}
	}



?>