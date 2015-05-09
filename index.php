<?php
require 'core/init.php';
include 'include/head.php';
?>
<body>
	<?php
		if($general->logged_in() === true){
			include 'include/active/menu.php';
			include 'include/active/header.php';
		}else{
			include 'include/inactive/menu.php';
			include 'include/inactive/signin_header.php';
			include 'include/inactive/signup.php';
		}
	?>
	<div id="container">
		<div id="content">
			<?php
			if($general->logged_in() === true){
				include 'include/active/body.php';
			} ?>
		</div>
	</div>
	<?php include 'include/main-footer.php'; ?>
</body>