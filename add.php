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
   <form method="post" action="add.do.php"  class="w3-margin-left w3-container w3-card-4 w3-light-grey" style="width: 60%;">
      <p><label>Task Name</label>
      <input type="text" class="w3-input w3-border" name="name" placeholder="Enter the task name" /></p>
      <p><label>Select Label</label>
      <select name="label" class="w3-input w3-border" >
         <option value="Personal">Personal</option>
         <option value="Work">Work</option>
         <option value="Shopping">Shopping</option>
         <option value="Others">Others</option>
      </select></p>
      <p><label>Select Label</label>
      <input type="date" id="duedate" class="w3-input w3-border" />
      <input type="hidden" id="datepass" name="datepass" /></p>
      <button onclick="myFunction()" type="submit">Submit</button>
      <p>
   </form>

   <script type="text/javascript">
      function myFunction(){
         var date = new Date(document.getElementById("duedate").value);
         var timestamp = date.getTime()/1000;
         document.getElementById("datepass").value = timestamp;
      }
   </script>
</body>
</html>