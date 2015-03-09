<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Wild - Tutor Interface</title>
		<link rel="stylesheet" type="text/css" href="../styles/tstyle/main.css"/>
	</head>
	<script type="text/javascript" src="../lib/jquery.js"></script>
	<!-- <script type="text/javascript" src="../lib/jquery.highlightFade.js"></script> -->
	<script type="text/javascript"> 
	function addFormField()
	 {
		var id = document.getElementById("id").value;
		$("#divTxt").append("<p id='row" + id + "'><label for='txt" + id + "'>option " + id + "&nbsp;&nbsp;<input type='text' size='20' name='txt[]' id='txt" + id + "'>&nbsp;&nbsp<a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;'>Remove</a><p>");
		
		
		/** $('#row' + id).highlightFade({
			speed:1000
		});*/
		
		id = (id - 1) + 2;
		document.getElementById("id").value = id;
	}
	 
	function removeFormField(id) 
	{
		$(id).remove();
	}
	</script>
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
      		 		<h3>Selected options will display in action box</h3>
      			</div> 
				<div class="curved-box2">
       				<h2 id="top">Add A New Activity</h2>
       					<div id="cont">
       						<form action="../Functions/finishMact.php" method="post">
       							<p>
       								<?php 
										$actid = $_GET['id'];
										Echo "<input type='hidden' name='id' value='$actid'>";
									?>
       							</p>
								<p>
		       						<?php 
										$url = $_GET['url'];
										Echo "<input type='hidden' name='url' value='$url'>";
									?>
	       						</p>
								<p>
									<label for="Input">
										Choose input
									</label>
									<select name="Input">
										<option value="radio">One answer
										<option value="check">More than one answer
									</select>
								</p>
								</br>
								<p>
									<label for="options">list you options</label>
									<p>
										<a href="#" onClick="addFormField(); return false;">Add</a>
									</p>
									<input type="hidden" id="id" value="1">
									<div id="divTxt"></div>
									<p>
										<input type="submit" value="Submit" name="submit">
									</p>
							</form>
						</div>
      				<h3>Click "Go" to embed!</h3>
      			</div>
       		</div>
		</div> 
	</body>
</html>