<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- License Copyright [2009] [University of Hull � Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.-->
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
						<a href="index.php"><img src="../img/Head.png" alt="Wild thing Tutor interface" title="WILD" /></a> 
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
       				<h2 id="top">Embed An Activity</h2>
       					<div id="cont">
       						<?php include '../inc/fetchembed.php';?>
						</div>
      				<h3>Click "Go" to embed!</h3>
      			</div>
       		</div>
		</div> 
	</body>
</html>