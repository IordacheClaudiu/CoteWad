function openOffersDialog() {
	$('#overlay').fadeIn('fast', function() {
		$('#boxpopup').css('display','block');
        $('#boxpopup').animate({'left':'70%'},500);
    });
}

function closeOffersDialog(prospectElementID) {
	$(function($) {
		$(document).ready(function() {
			$('#' + prospectElementID).css('position','absolute');
			$('#' + prospectElementID).animate({'left':'98%'}, 500, function() {
				$('#' + prospectElementID).css('position','absolute');
				$('#' + prospectElementID).css('left','98%');
				$('#overlay').fadeOut('fast');
			});
		});
	});
}