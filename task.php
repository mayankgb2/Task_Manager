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
	<div class="w3-row-padding">
<?php
	date_default_timezone_set('Asia/Kolkata');
	$cdate = time();
   	include("db.php");
   	$userid = $_SESSION['id'];
   	$sql = "SELECT * FROM work WHERE userid='$userid' ORDER BY status, duedate";
   	$result = mysqli_query($conn,$sql);
   	$count = mysqli_num_rows($result);
   	if ($count == 0){
   		echo "You currently have 0 task. Go to Add Button to Add a task.";
   	}
   	else{
	   	while($row = mysqli_fetch_assoc($result)){
	   		$startdate = $row['entrydate'];
	   		$duedate = $row['duedate'];
	   		$stdate = date("d/m/Y",$startdate);
	   		$ddate = date("d/m/Y",$duedate);
	   		$status = $row['status'];
	   		$label = $row['label'];
	   		$workid = $row['workid'];
	   		if($status==0){
		   		if ( $duedate < $cdate ){
		   			$data = "<span style='color:red'>Time Over</span>";
		   		}
		   		elseif (($startdate + 600)>$cdate){
		   			$data = "<span style='color:blue'>New Record</span>";
		   		}
		   		else{
		   			$data = "<span style='color:orange'>In Progress</span>";
		   		}
	   		}
	   		else{
	   			$data = "<span style='color:green'>Task Completed</span>";
	   		}
	   		?>

<div class="w3-third w3-container">
  <div class="w3-card-4">
    <header class="w3-container w3-light-grey">
      <h3><?php echo $row['name']; ?>
      <span class="w3-tag w3-round-large w3-small w3-green"><?php echo $label; ?></span>
</h3>
          </header>
    <div class="w3-container">
      <p> Started on <?php echo $stdate; ?> | Due date : <?php echo $ddate; ?></p>
      <hr>
      <p><?php echo $data; ?></p><br>
    </div>
    
    	<?php
    		if ($status==0){
    			$que = $userid."_".$workid;
    			?>
    			<a href="update.php?data=<?php echo $que; ?>" style="text-decoration: none;">
    			<button class="w3-button w3-block w3-dark-grey">End Now</button></a>

    	<?php		
    		}
    		else{
    			echo '<button class="w3-button w3-block w3-dark-grey" disabled>Ended</button>';

    		}
    	?>

    </button>
  </div><br>
 </div>
<?php
	   	}
	}
?>
</div>
</body>
</html>
