<?php
include('../functions/connect.php');
session_start();

if(isset($_SESSION['user']) && $_SESSION['type'] == 'Admin')
{ 
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The Administrator Panel</title>
  <meta name="description" content="The Administrator Panel">
  <meta name="author" content="EXS">

</head>

<body>
    Hello, <?php echo $_SESSION['user']; ?>! <br>
    <a href = "../functions/logout.php">logout</a>
    
</body>
</html>

<?php
}
else{
	header ("location:../index.php?restricted=true");
}