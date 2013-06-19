
$(document).ready(function(data) {
	$("#refreshButton").click(function() {
		$.post(base_url + "index.php/collab/ajax_get_documents", {}, function(data) {
			if (data != '0') {
				$(".docviewer").html(data);
			}
		});
	});
	$("#refreshButton").click();
});
