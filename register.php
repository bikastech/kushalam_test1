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
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php //include('errors.php'); ?>
		<?php if(!empty($errors['duplicate'])){ echo "<div class='error'>".$errors['duplicate']."</div>"; } ?></div>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
			<?php if(!empty($errors['name'])){ echo "<div class='error'>".$errors['name']."</div>"; } ?></div>
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
			<?php if(!empty($errors['username'])){ echo "<div class='error'>".$errors['username']."</div>"; } ?></div>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
			<?php if(!empty($errors['email'])){ echo "<div class='error'>".$errors['email']."</div>"; } ?></div>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
			<?php if(!empty($errors['password'])){ echo "<div class='error'>".$errors['password']."</div>"; } ?></div>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
			<?php if(!empty($errors['password_2'])){ echo "<div class='error'>".$errors['password_2']."</div>"; } ?></div>
		</div>
		<div class="input-group">
			<button type="submit" class="btn-wide btn btn-success" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>