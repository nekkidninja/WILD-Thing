<?php
/*License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.*/
	$id = $_REQUEST['id'];
	error_reporting(E_ALL);

	//**********************Database connection Gumpf************************
	//***********************************************************************
	$host = "*****";
	$user = "*****";
	$pass = "*****";
	$db  = "*****";
	
	//connection
	$connectionString = "host=$host dbname=$db user=$user password=$pass";
	$connection = pg_connect($connectionString);	
	//if to check the connection
	if (!$connection)
	{
		die("could not open connection to database server");
	}
	else
	{
	    $query2 = "SELECT title, activitytype, description FROM activity WHERE activityid = '$id'";
	    $result2 = pg_exec($query2) or die ("could not execute query");
	    $data = pg_fetch_array($result2);
	    
	    if ( pg_num_rows($result2) != 1 )
	    {
	    	echo "Oops. something VERY weird happened there";
	    }
	    else
	    {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Wild - Question Display</title>
		<link rel="stylesheet" type="text/css" media="screen,handheld" href="cstyle/main.css"/>
	</head>
	<body>
		<div id ="container">
			<div class="header">
				<ul>
					<li Id="head">
						<h2>
						<img src="images/cHead.png" alt="Wild thing Tutor interface" title="WILD" /> 
						</h2>
					</li>
				</ul>
			</div>
			<div id="subcon">
			<div class="curved-box3">
        			<h2>Acttivity <?= $id ?> : <?= $data['title']?></h2>
        			<div id="cont">
        				</br>
        				<p>
        					<?= $data['description'] ?>
						</p>
        			</div>
					<h3>This is a <?= $data['$activitytype'] ?> activity</h3>
      			</div> 
				<div class="curved-box2">
       				<h2 id="top">Response Box</h2>
       				<?php /*This where the completed options should be*/?>
      				<h3>This is a written responce</h3>
      			</div>
       		</div>
		</div> 
	</body>
</html>
<?
		}
	}	
?>
