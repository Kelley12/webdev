<link href="/css/form-control.css" rel="stylesheet">
<link href="/css/general-header.css" rel="stylesheet">
<link rel="icon" type="image/png" href="http://bksocial.herokuapp.com/images/favicon.ico">

<header class="l-wrapper main-header" id="header">
	<div class="dashboard-logo">
		<a href="/"><img href="index.php" id="logo" border="0" src="images/logoBB.png"></a>
	</div>
	<nav class="main-navigation">
	<ul>
	<?php if($general->logged_in()){?>
		<li class="nav-item">
			<a href="/">Dashboard</a>
		</li>
		<li class="nav-item">
			<a href="/profile.php?username=<?php echo $user['username'];?>">Profile</a>
		</li>
		<li class="nav-item">
			<a href="/logout.php">Logout</a>
		</li>
	<?php } else{ ?>
		<li class="nav-item" id="register">
			<a href="/register.php">Register</a>
		</li>
		<li class="nav-item" id="login">
			<a href="/login.php">Login</a>
		</li>
	<?php } ?>
	</ul>
	</nav>
</header>