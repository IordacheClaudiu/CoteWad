<script type="text/javascript">
	var chat_id="<?php echo $chat_id;?>";
	var user_id="<?php echo $user_id;?>";	
</script>
<style type="text/css">
	div#chat_viewport{
		min-height: 500px;
		border:1px solid black;
	}
	input#chat_message{
		width: 90%;
	}
</style>

<h1>let's do some chatting</h1>
<div id="chat_viewport">
	
</div>

<div id="chat_input">
	<input id="chat_message" name="chat_message" type="text" value="" tabindex="1"/>
	<?php echo anchor('#', 'Say it', array('title' => 'Send this chat message', 'id' => 'submit_message'))?>
	<div class="clearer"></div>
</div>
