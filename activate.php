<?php 
require 'core/init.php';
$general->logged_in_protect();
?>

<head>
	<title>Activate</title>
	<link href="/css/general-page.css" rel="stylesheet">
</head>

<?php include 'include/general-header.php'; ?>

	<div class="container">
	  <div class="content">
		<h1>Activate your account</h1>

    	<?php
        if (isset($_GET['success']) === true && empty ($_GET['success']) === true) {
	        ?>
	        <h3>Thank you, we've activated your account. You're free to log in!</h3>
	        <?php
	            
        } else if (isset ($_GET['email'], $_GET['email_code']) === true) {
            
            $email		=trim($_GET['email']);
            $email_code	=trim($_GET['email_code']);	
            
            if ($users->email_exists($email) === false) {
                $errors[] = 'Sorry, we couldn\'t find that email address';
            } else if ($users->activate($email, $email_code) === false) {
                $errors[] = 'Sorry, we have failed to activate your account';
            }
            
			if(empty($errors) === false){
			
				echo '<p>' . implode('</p><p>', $errors) . '</p>';	
		
			} else {
                header('Location: activate.php?success');
                exit();
            }
        
        } else {
            header('Location: index.php');
            exit();
        }
		?>
	  </div>
    </div>
	<?php include 'include/general-footer.php'; ?>