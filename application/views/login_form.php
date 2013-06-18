<div id="login_form">
	<?php
	echo form_open('index.php/login/validate_credentials');
	echo form_input('username', 'Username');
	echo form_password('password', 'Password');
	echo form_submit('submit', 'Login');
	?>
</div>
