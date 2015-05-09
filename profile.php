<?php 
require 'core/init.php';
if(isset($_GET['username']) && empty($_GET['username']) === false) { // Putting everything in this if block.

 	$username = htmlentities($_GET['username']); // sanitizing the user input data (in the Url)
	if ($users->user_exists($username) === false) { // If the user doesn't exist
		header('Location:index.php'); // redirect to index page. Alternatively you can show a message or 404 error
		die();
	}else{
		$profile_data = array();
		$user_id = $users->fetch_info('id', 'username', $username); // Getting the user's id from the username in the Url.
		$profile_data = $users->userdata($user_id);
	}
?>

<head>
	<title>Profile</title>
	<link href="/css/general-page.css" rel="stylesheet">
	<link href="/css/profile.css" rel="stylesheet">
</head>

<body>

<?php include 'include/general-header.php'; ?>

	<div class="container" id="profile">
	  <div class="content">
		<h1><?php echo $profile_data['username']; ?>'s Profile</h1>

		<div id="profile_picture">

			<?php 
				$image = $profile_data['image_location'];
				echo "<img src='$image'>";
			?>
		</div>
		<div id="personal_info">
			

			<?php if(!empty($profile_data['first_name']) || !empty($profile_data['last_name'])){?>

				<span><strong>Name</strong>: </span>
				<span><?php if(!empty($profile_data['first_name'])) echo $profile_data['first_name'], ' '; ?></span>
				<span><?php if(!empty($profile_data['last_name'])) echo $profile_data['last_name']; ?></span>

				<br>	
			<?php 
			} 
			
			if($profile_data['gender'] != 'undisclosed'){
			?>
				<span><strong>Gender</strong>: </span>
				<span><?php echo $profile_data['gender']; ?></span>
		
				<br>
			<?php } 

			if(!empty($profile_data['bio'])){
				?>
				<span><strong>Bio</strong>: </span>
				<span><?php echo $profile_data['bio']; ?></span>
				<?php 
			}
			?>
			<form action="/settings.php">
				<input class="btn btn-primary btn-block" id="update" type="submit" value="Update Profile">
			</form>
		</div>
		<div class="clear"></div>
	  </div>
    </div>
	<?php include 'include/general-footer.php'; ?>
</body>

<?php  
}else{
	header('Location: index.php'); // redirect to index if there is no username in the Url
}