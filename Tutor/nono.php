<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Wild - Tutor Interface</title>
		<link rel="stylesheet" type="text/css" href="../styles/tstyle/main.css"/>
	</head>
	<body>
		<div id ="container">
			<div class="header">
				<ul>
					<li Id="head">
						<h2>
						<img src="../img/Head.png" alt="Wild thing Tutor interface" title="WILD" /> 
						</h2>
					</li>
				</ul>
			</div>
			<div id="subcon">
			<div class="curved-box3">
       				<h2>Main Menu</h2>
          	 		<?php include '../inc/nav.php'?>
      		 		<h3>Selected Options will Display in action box</h3>
      			</div> 
				<div class="curved-box2">
       				<h2 id="top">Sucess!!</h2>
       					<div id="cont">
							<p>This feature is not implemented yet</p>
							</br>
							<p><i>Watch this space!.</i></p>
							<?
								$id = $_GET['id'];
								Echo "<!-- the return is: $id-->";
							?>
							</br>
							<p><i>Cause its coming!</i></p>
						</div>
      				<h3>Wild!</h3>
      			</div>
       		</div>
		</div> 
	</body>
</html>