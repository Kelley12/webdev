<link href="/css/style.css" rel="stylesheet">

<div id="header">
  <div class="container" id="sign">
	<form class="home-signin" method="post" action="login.php"> <!-- signin.php" -->
	  <input type="text" name="username" class="login-form" placeholder="UserName" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" autofocus="">
      <input type="password" name="password" class="login-form" placeholder="Password">
	  <button class="btn" type="submit">Sign in</button>
	  <span> or </span>
	  <a href="register.php">Register</a>
  </div>
</div>