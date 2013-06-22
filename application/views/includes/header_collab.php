<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>

		<title>CoteWad</title>
		<meta http-equiv="X-UA-Compatible" content="IE=9">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://apis.google.com/js/api.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/realtime-client-utils.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/docviewer.js"></script>
		<script text="text/javascript" src="<?php echo base_url(); ?>js/chat.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/popup.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/editing_page_styles.css" type="text/css" media="screen"/>
		<script type="text/javascript">var base_url =   "<?php echo base_url(); ?>
			";
		</script>
		<script  type="text/javascript">
			$(document).ready(function() {
				$('.ball, .ball1').removeClass('stop');
				$('.trigger').click(function() {
					$('.ball, .ball1').toggleClass('stop');
				});
				
			});
		</script>
	</head>

