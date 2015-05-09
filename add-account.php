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
		$social_sites = $users->fetch_social($user_id);
	}
?>

<head>
	<title>Add Account</title>
	<?php include 'include/general-header.php'; ?>
	<link href="/css/addAccount.css" rel="stylesheet">
	<link href="/css/general-page.css" rel="stylesheet">
</head>

<body>
	<div class="container">
	  <div class="content">
		<div id='socialLinks'>
		<ul>
			<li class="list" id="facebook">
				<span id="facebooktext">facebook</span>
				<?php
					$found = false;
					foreach($social_sites as $site){
						if($site['socialID'] == 1) {
							echo "http://facebook.com/";
							print_r($site['username']);
							$found = true;
						}
					} 
					if(!$found){ ?>
					<input class="sign btn btn-primary btn-block" id="facebookButton" type="submit" value="Add Account">
				<?php } ?>
			</li>
			
			<li class="list" id="twitter">
				<img src="/images/twitter/twittertext.png" title="Twitter" alt="Twitter Text" />
				<?php
					$found = false;
					foreach($social_sites as $site){
						if($site['socialID'] == 31) {
							echo "https://twitter.com/";
							print_r($site['username']);
							$found = true;
						}
					} 
					if(!$found){ ?>
				<input class="btn btn-primary btn-block sign" id="twitterButton" type="submit" value="Add Account">
				<?php } ?>
			</li>
			
			<li class="list" id="pinterest">
				<img src="/images/pinterest/pinteresttext.png" title="Pinterest" alt="Pinterest Text" />
				<?php
					$found = false;
					foreach($social_sites as $site){
						if($site['socialID'] == 21) {
							echo "http://pinterest.com/";
							print_r($site['username']);
							$found = true;
						}
					} 
					if(!$found){ ?>
				<input class="btn btn-primary btn-block sign" id="pinterestButton" type="submit" value="Add Account">
				<?php } ?>
			</li>
			
			<li class="list" id="instagram">
				<img src="/images/instagram/instagramtextblack.png" id="instagramtext" title="Instagram" alt="Instagram Text" />
				<?php
					$found = false;
					foreach($social_sites as $site){
						if($site['socialID'] == 11) {
							echo "http://http://instagram.com/";
							print_r($site['username']);
							$found = true;
						}
					} 
					if(!$found){ ?>
				<input class="btn btn-primary btn-block sign" id="instagramButton" type="submit" value="Add Account">
				<?php } ?>
			</li>
			
			<li class="list" id="youtube">
				<img src="/images/youtube/youtubetext.png" id="youtubetext" title="YouTube" alt="YouTube Text" />
				<?php
					$found = false;
					foreach($social_sites as $site){
						if($site['socialID'] == 41) {
							echo "http://youtube.com/user/";
							print_r($site['username']);
							$found = true;
						}
					} 
					if(!$found){ ?>
				<input class="btn btn-primary btn-block sign" id="youtubeButton" type="submit" value="Add Account">
				<?php } ?>
			</li>
			
			<li id="google" class='last'>
				<span id="googletext">Google +</span>
				<?php
					$found = false;
					foreach($social_sites as $site){
						if($site['socialID'] == 51) {
							echo "https://plus.google.com/+";
							print_r($site['username']);
							$found = true;
						}
					} 
					if(!$found){ ?>
				<input class="btn btn-primary btn-block sign" id="googleButton" type="submit" value="Add Account">
				<?php } ?>
			</li>
		</ul>
	</div>
	  </div>
    </div>
	<?php include 'include/general-footer.php'; ?>
</body>
<?php  
}else{
	header('Location: index.php'); // redirect to index if there is no username in the Url
} ?>