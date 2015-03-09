<?php
/*License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.*/	
$id = $_REQUEST['id'];
	
		if (empty($_REQUEST ['id']))
		{
			echo "no ID stored, please try again";
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Wild - Tutor Interface</title>
		<link rel="stylesheet" type="text/css" href="../styles/tstyle/main.css"/>
	</head>
	<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
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
       				<h2 id="top">Success!!</h2>
       					<div id="cont">
							<p>What ever you did the database has logged it</p>
							<br />
							<p><i>Just dont leave the country... if you broke it we'll find you...</i></p>
							<p>The URL for your activity is </p>
							<br />
							<p><?php $wildURL = str_replace("showembed","displayresponse",curPageURL());$wildURL = str_replace("Tutor","Display",$wildURL);echo $wildURL;?></p>
							<br />
							<p><i>Copy this URL</i></p>
						</div>
      				<h3>Wild!</h3>
      			</div>
       		</div>
		</div> 
	</body>
</html>