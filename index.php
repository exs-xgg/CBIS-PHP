<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>CBIS - Tarlac Hospital </title>
  
	<link rel="stylesheet" href="css/design.css" media="screen" type="text/css" />

	<link rel="shortcut icon" href="img/colored.png" type="image/x-icon" />

</head>

<body>

  <div class="wrap">
		<div class="avatar">
      <img src="img/white.png">
		</div>
		<form action="functions/login.php" method="POST">
			<input type="text" placeholder="username" name="username" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" placeholder="password" name="pass" required>
			<a href="" class="forgot_link">forgot?</a>
			<button type="submit" name="login">Sign in</button>
		</form>
	</div>

	  <script src="js/index.js"></script>

</body>

</html>