<?php 
include_once 'core/init.php';
$general->logged_out_protect();
?>
<head>
	<title>Change Password</title>
	<link href="/css/form-control.css" rel="stylesheet">
	<link href="/css/register.css" rel="stylesheet">
</head>
<body>
    <div id="container">        
    	<?php
        if(empty($_POST) === false) {
           
            if(empty($_POST['current_password']) || empty($_POST['password']) || empty($_POST['password_again'])){

                $errors[] = 'All fields are required';

            }else if($bcrypt->verify($_POST['current_password'], $user['password']) === true) {

                if (trim($_POST['password']) != trim($_POST['password_again'])) {
                    $errors[] = 'Your new passwords do not match';
                } else if (strlen($_POST['password']) < 6) { 
                    $errors[] = 'Your password must be at least 6 characters';
                } else if (strlen($_POST['password']) >18){
                    $errors[] = 'Your password cannot be more than 18 characters long';
                } 

            } else {
                $errors[] = 'Your current password is incorrect';
            }
        }

        if (isset($_GET['success']) === true && empty ($_GET['success']) === true ) {
    		echo '<p>Your password has been changed!</p>';
        } else {?>
			<?php include 'include/general-header.php'; ?>
            
            <?php
            if (empty($_POST) === false && empty($errors) === true) {
                $users->change_password($user['id'], $_POST['password']);
                header('Location: change-password.php?success');
            } else if (empty ($errors) === false) {
                    
                echo '<p>' . implode('</p><p>', $errors) . '</p>';  
            
            }
            ?>
            <form class="form-register" method="post" action="">
                    <input class="form-control" type="password" id="first" name="current_password" placeholder="Current Password" autofocus="">
                    
					<input class="form-control" type="password" id="middle" name="password" placeholder="New Password">
                    
					<input class="form-control" type="password" id="reenter" name="password_again" placeholder="New Password Again">
						
                    <button class="btn btn-primary btn-block" type="submit">Change Password</button>
            </form>
    	<?php 
        }
        ?> 
    </div>
<?php include 'include/general-footer.php'; ?>
</body>