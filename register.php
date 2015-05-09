<?php
require 'core/init.php';
$general->logged_in_protect();

if (isset($_POST['submit'])) {

	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['first_name']) || empty($_POST['last_name'])){

		$errors[] = 'All fields are required.';

	}else{
        
        if ($users->user_exists($_POST['username']) === true) {
            $errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken';
        }
        if(!ctype_alnum($_POST['username'])){
            $errors[] = 'Please enter a username with only alphabets and numbers';	
        }
		if (preg_match("/\\s/", $_POST['username']) == true) {
			$errors[] = 'Your username must not contain any spaces.';
		}
        if (strlen($_POST['password']) < 6) {
			$errors[] = 'Your password must be at least 6 characters';
		} else if (strlen($_POST['password']) >18){
            $errors[] = 'Your password cannot be more than 18 characters long';
        }
		if ($_POST['password'] !== $_POST['password_again']) {
			$errors[] = 'Your passwords do not match';
		}
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Please enter a valid email address';
        }else if ($users->email_exists($_POST['email']) === true) {
            $errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use';
        }
	}
	
	if(empty($errors) === true){
		
		$username 	= htmlentities($_POST['username']);
		$firstname	= htmlentities($_POST['first_name']);
		$lastname	= htmlentities($_POST['last_name']);
		$password 	= $_POST['password'];
		$email 		= htmlentities($_POST['email']);

		$users->register($username, $firstname, $lastname, $password, $email);
		header('Location: register.php?success');
		exit();
	}
}
?>

<head>
	<title>Register Account</title>
	<link href="/css/form-control.css" rel="stylesheet">
	<link href="/css/register.css" rel="stylesheet">
	<script src="/js/sample-registration.js"></script>
</head>

	<div class="container">
      <form class="form-register" method="post" action="" onSubmit="formValidation();"> <!-- "registration.php" onSubmit="formValidation();"> -->
        <?php include 'include/general-header.php'; ?>
		
		<?php
			if (isset($_GET['success']) && empty($_GET['success'])) {
				  echo '<p>Thank you for registering.<br>Please check your email.</p>';
			}
		?>

		<input type="text" name="username" class="form-control" id="first" placeholder="UserName" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" autofocus="">
			<span id="uerror">* Username unavailable</span>
        
		<input type="text" name="first_name" class="form-control" id="middle" placeholder="First Name" value="<?php if(isset($_POST['first_name'])) echo htmlentities($_POST['first_name']); ?>" >
			<span id="ferror">* Name can only contain alphabet characters</span>
		
		<input type="text" name="last_name" class="form-control" id="middle" placeholder="Last Name" value="<?php if(isset($_POST['last_name'])) echo htmlentities($_POST['last_name']); ?>" >
			<span id="lerror">* Name can only contain alphabet characters</span>
		
		<input type="text" name="email" class="form-control" id="middle" placeholder="Email" value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email']); ?>">
			<span id="eerror">* Email address invalid</span>
        
		<input type="password" name="password" class="form-control" id="middle" placeholder="Password">
		
		<input type="password" name="password_again" class="form-control" id="reenter" placeholder="Re-enter Password">
			<span id="perror">* Passwords do not match</span>
        
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" Value"Register">Create My Account</button>
      </form>
    </div>
	
<?php 
	if(empty($errors) === false){
		echo '<p>' . implode('</p><p>', $errors) . '</p>';	
	}

include 'include/general-footer.php';?>