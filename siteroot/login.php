<?php

if ($_POST) {
	if (preg_match("[^@\s]@[^@\s]+\.[^@\s]{2}", trim($_POST["email"]))) {
		echo "good";
	}
	else {
		echo "bad";
	}
}
else {
echo <<<EOT
<h1>Log in / sign up page</h1>
<div style="float: left; width: 50%;">
	<h2>Log in</h2>
	<form method="post">
		<input name="email" type="email" placeholder="Email address"><br>
		<input name="password" type="password" placeholder="Password"><br>
		<input type="submit" value="Log in">
	</form>
	<a href="#">Forgot password</a>
	
	<div><a href="#">Log in with Bath Single Sign-On</a></div>
</div>

<div style="float: left; width: 50%;">
	<h2>Sign up</h2>
	<input type="text" placeholder="Name"><br>
	<input type="email" placeholder="Email address"><br>
	<input type="password" placeholder="Password"><br>
	<input type="password" placeholder="Password (retype)"><br>
	<input type="submit" value="Sign up">
</div>
EOT;
}

?>
