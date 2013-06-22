function openOffersDialog() {
	$('#overlay').fadeIn('fast', function() {
		$('#boxpopup').css('display','block');
        $('#boxpopup').animate({'left':'75%'},500);
    });
}

function closeOffersDialog(prospectElementID) {
	$(function($) {
		$(document).ready(function() {
			$('#' + prospectElementID).css('position','absolute');
			$('#' + prospectElementID).animate({'left':'99%'}, 500, function() {
				$('#' + prospectElementID).css('position','absolute');
				$('#' + prospectElementID).css('left','99%');
				$('#overlay').fadeOut('fast');
			});
		});
	});
}