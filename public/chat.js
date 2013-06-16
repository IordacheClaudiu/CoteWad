$(document).ready(function() {

	$("a#submit_message").click(function() {
		var chat_message_content = $("input#chat_message").val();

		if(chat_message_content == "") {
			return false;
		}

		$.post(base_url + "index.php/chat/ajax_add_chat_message", {chat_message_content : chat_message_content, chat_id : chat_id, user_id : user_id}, function(data) {
			alert(data);
		}, "json");

		return false;
	});

});
