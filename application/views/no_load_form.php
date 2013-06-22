<!-- Start Realtime when the body has loaded. -->
<body>
	<button id="authorizeButton" disabled style="display: none">
		You must authorize
	</button>

	<div id="header_background"></div>
	<div id="bg">

		<div id="overlay"></div>
		<div id="boxpopup" class="box">
			<a onclick="closeOffersDialog('boxpopup');" class="boxclose"></a>
			<a onclick="openOffersDialog('boxpopup');" class="boxopen"></a>
			<div id="chat_content">
				<?php $this->load->view($page_content)
				?>
			</div>
			<div id="chat_input">
				<input id="chat_message" name="chat_message" type="text" value="" tabindex="1"/>
				<div class="clearer"></div>
			</div>
			<?php echo anchor('#', 'Say it', array('title' => 'Send this chat message', 'id' => 'submit_message'))
			?>
		</div>

		<div id="outer">

			<div id="header">
				<div id="logo">
					<h1><a href="<?php echo base_url()?>index.php/welcome">CoteWad</a></h1>
				</div>
				<div id="nav">
					<ul>
						<li class="first active">
							<a href="<?php echo base_url()?>index.php/collab/signout">Logout</a>
						</li>
						<li>
							<a href="https://github.com/IordacheClaudiu/CoteWad">GitHub for this App</a>
						</li>
					</ul>
					<br class="clear" />
				</div>
			</div>

			<div id="main">
				<div id="maincontent">
					<div id="left_container">
						<div class="docviewer">
							<div class="content">
								<div class="ball"></div>
								<div class="ball1"></div>
							</div>
						</div>
						<br class="clear" />
						<div class="bottom-container-left">
							<form action="createNewDocument" method="post">
								<button id="createButton" type="submit">
									Create Document
								</button>
							</form>
							<button id="refreshButton" type="submit">
								Refresh
							</button>
						</div>
					</div>

					<div id="right_container">
						<!-- Text area that will be used as our collaborative controls. -->
						<textarea id="editor" rows="15" cols="50" disabled="true"></textarea>
						<div class="bottom-container-right">
							<!-- Undo and redo buttons. -->
							<button id="undoButton" disabled>
								Undo
							</button>
							<button id="redoButton" disabled>
								Redo
							</button>
						</div>
						<br class="clear" />
					</div>
			<script>
