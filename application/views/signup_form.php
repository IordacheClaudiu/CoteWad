<div id="register_form">
	<legend>Personal Information</legend>
	<?php
		echo form_open('index.php/login/create_member');
		echo form_input('first_name',set_value('first_name','First Name'));
		echo form_input('last_name',set_value('last_name','Last Name'));
		echo form_input('email_adress',set_value('email_adress','Email Address'));
	?>

	<legend>Login Info</legend>
	<?php
	echo form_input('username',set_value('username','Username'));
	echo form_password('password',set_value('password','Password'));
	echo form_password('password2',set_value('password2','Password'));
	echo form_submit('submit','Create Account');
	?>
	<?php echo validation_errors('<p class="error">'); ?>
</div>