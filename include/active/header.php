<!--
<div id="header">
	<ul id="nav">
		<li><a href="/profile.php?username=<?php echo $user['username'];?>">Profile</a></li>
		<li><a href="/settings.php">Settings</a></li>
		<li><a href="/logout.php">Logout</a></li>
	</ul>
</div>
-->

<div id="header">
	<nav id="ddmenu">
		<ul>
			<li><a href="#">Account</a>
				<div>
					<div class="column">
						<a href="/profile.php?username=<?php echo $user['username'];?>">Profile</a>
						<a href="/add-account.php?username=<?php echo $user['username'];?>">Add Account</a>
						<a href="/settings.php">Settings</a>
						<a href="/logout.php">Logout</a>
					</div>
				</div>
			</li>
		</ul>
	</nav>
</div>