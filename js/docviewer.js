
$(document).ready(function(data) {
	$("#refreshButton").click(function() {
		$(".docviewer").html('<div class="content"><div class="ball"></div><div class="ball1"></div></div>');
		$.post(base_url + "index.php/collab/ajax_get_documents", {}, function(data) {
			if (data != '0') {
				$(".docviewer").html(data);
			}
		});
	});
	$("#refreshButton").click();
});
