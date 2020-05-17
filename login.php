<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php //include('errors.php'); ?>

		<div class="input-group">
			<label class="required">Username</label>
			<input type="text" name="username" >
			<?php if(!empty($errors['username'])){ echo "<div class='error'>".$errors['username']."</div>"; } ?></div>
		</div>
		<div class="input-group">
			<label>Password </label>
			<input type="password" name="password">
			<?php if(!empty($errors['password'])){ echo "<div class='error'>".$errors['password']."</div>"; } ?></div>
		</div>
		<div class="input-group">
			<button type="submit" class="btn-wide btn btn-success" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>

	</form>

	
</body>
</html>