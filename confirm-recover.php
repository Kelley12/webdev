<?php
require 'core/init.php';
$general->logged_in_protect();
?>
<head>
	<title>Register Account</title>
	<link href="/css/general-page.css" rel="stylesheet">
</head>
<body>
	<div id="container">
		<?php include 'include/general-header.php';
		if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
			?>	
			<h3>Thanks, please check your email to confirm your request for a password.</h3>
			<?php
		} else {
			?>
		    <h2>Recover Username / Password</h2>
		    <p>Enter your email below so we can confirm your request.</p>
		    <?php
			if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
				if ($users->email_exists($_POST['email']) === true){
					$users->confirm_recover($_POST['email']);

					header('Location:confirm-recover.php?success');
					exit();
					
				} else {
					echo 'Sorry, that email doesn\'t exist.';
				}
			}
			?>
			<form action="" method="post">
				<input type="text" required name="email">
				<input type="submit" value="Recover">
			</form>
		<?php	
		}
		?>
	</div>
</body>