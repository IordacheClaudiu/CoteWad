<div id="login_form">
	<?php
	echo form_open('index.php/login/validate_credentials');
	$attributes = array('name' => 'username','value'=>'Username', 'id' => 'login_username');
	echo form_input($attributes);
	echo '<div id="exists"></div>';
	echo form_password('password', 'Password');
	
	$attributes = array('name' => 'submit', 'value' => 'LOGIN', 'id' => 'button_lock');
	echo form_submit($attributes);
	?>
</div>
