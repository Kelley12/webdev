<?php
require 'core/init.php';
?>

<html>
<head>
	<title>Contact</title>
	<link href="/css/form-control.css" rel="stylesheet">
	<link href="/css/contact.css" rel="stylesheet">
</head>

<body>
<?php include 'include/general-header.php'; ?>
	<div class="container">
      <form class="form-contact"> <!--onSubmit="formContact();"-->
		<input type="text" class="form-control" id="first" placeholder="Name" autofocus="">
			<span id="uerror">* Name can only contain alphabet characters</span>
		<input type="text" class="form-control" id="middle" placeholder="Email">
			<span id="eerror">* Email address invalid</span>
        <input type="text" class="form-control" id="last" placeholder="Your Message">
        <button class="btn btn-lg btn-primary btn-block" type="submit" Value"Submit">Send Message</button>
      </form>
    </div>
	<?php include 'include/general-footer.php'; ?>
</body>

</html>
