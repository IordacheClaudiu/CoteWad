<div id="register_form">
	<legend>
		Login Information
	</legend>
	<?php
	echo form_open('index.php/register/create_member');
	$attributes = array('name' => 'username', 'value' => 'Username', 'id' => 'register_username');
	echo form_input($attributes);
	echo '<div id="exists"></div>';
	$attributes = array('name' => 'email_adress', 'value' => 'Email Adress', 'id' => 'register_email');
	echo form_input($attributes);
	echo '<div id="exists_email"></div>';
	echo form_password('password', set_value('password', 'Password'));
	echo form_password('password2', set_value('password2', 'Password'));

	$attributes = array('name' => 'submit', 'value' => 'Create Account', 'id' => 'button_lock');
	echo form_submit($attributes);
	echo validation_errors('<p class="error">');
	?>
</div>