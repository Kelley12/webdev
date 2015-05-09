<?php
require 'core/init.php';
$general->logged_in_protect();

if (empty($_POST) === false) {

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'Sorry, but we need your username and password.';
	} else if ($users->user_exists($username) === false) {
		$errors[] = 'Sorry that username doesn\'t exists.';
	} else if ($users->email_confirmed($username) === false) {
		$errors[] = 'Sorry, but you need to activate your account. 
					 Please check your email.';
	} else {
		if (strlen($password) > 18) {
			$errors[] = 'The password should be less than 18 characters, without spacing.';
		}
		$login = $users->login($username, $password);
		if ($login === false) {
			$errors[] = 'Sorry, that username/password is invalid';
		}else {
			session_regenerate_id(true);// destroying the old session id and creating a new one
			$_SESSION['id'] =  $login;
			header('Location: index.php');
			exit();
		}
	}
}
?>
<head>
	<title>Login</title>
	<link href="/css/form-control.css" rel="stylesheet">
	<link href="/css/signin.css" rel="stylesheet">
</head>

 <div class="container">
	<form class="form-signin" method="post" action=""> <!-- signin.php" -->
        <?php include 'include/general-header.php'; ?>
        
		<?php
			if(empty($errors) === false){
			echo '<p>' . implode('</p><p>', $errors) . '</p>';
			}
		?>
		
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" autofocus="">
        
		<input type="password" name="password" class="form-control" placeholder="Password">
        
		<label class="checkbox">
			<input type="checkbox" name="remember" value="remember-me"> Remember me
		</label>
		
		<button class="btn btn-primary btn-block" type="submit">Sign in</button>
		<p>
			<a href="/confirm-recover.php">Forgot Password</a>
			<span> or </span>
			<a href="/register.php">Register</a>
		</p>
	</form>
 </div>
 <?php include 'include/general-footer.php'; ?>