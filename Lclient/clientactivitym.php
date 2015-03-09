<?php
/*License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.*/
$id = $_REQUEST['id'];
$option = $_REQUEST['activityoption'];
/*this pulls the act set and then the act for the embed*/
error_reporting(E_ALL);

/**********************Database connection Gumpf********************************/
	$host = "*****";
	$user = "*****";
	$pass = "*****";
	$db  = "*****";
	
	/*connection*/
	$connectionString = "host=$host dbname=$db user=$user password=$pass";
	$connection = pg_connect($connectionString);

	/*echo "<!-- $connectionString -->";  look in the page source to see what is the connection string*/

	/*if to check the connection*/
	if (!$connection)
	{
		die("could not open connection to database server");
	}
	else
	{
	    /*database query that selects the activity and assoicated detais*/
		$query2  = "SELECT title, activitytype, description FROM activity, activityInstance ";
	    $query2 .= "WHERE activityInstance.instanceid = '$id' AND activityInstance.activity=activity.activityID";
	    
	    $result2 = pg_exec($query2) or die ("could not execute query2");
	    $data = pg_fetch_array($result2);
	    
	    if ( pg_num_rows($result2) != 1 )
	    {
	    	echo "Oops. something VERY weird happened there (there were ".pg_num_rows($result2)." rows returned).";
	    }
	    else
	    {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Wild - Question Display</title>
		<link rel="stylesheet" type="text/css" media="screen,handheld" href="../styles/cstyle/main.css"/>
	</head>
	<body>
		<div id ="container">
			<div class="header">
				<ul>
					<li Id="head">
						<h2>
						<img src="../img/cHead.png" alt="Wild thing Tutor interface" title="WILD" /> 
						</h2>
					</li>
				</ul>
			</div>
			<div id="subcon">
			<div class="curved-box3">
        			<h2>Activity <?= $id ?> : <?= $data['title']?></h2>
        			<div id="cont">
        				</br>
        				<p>
        					<?= $data['description'] ?>
						</p>
        			</div>
					<h3>This is a written activity</h3>
      			</div> 
				<div class="curved-box2">
       				<h2 id="top">Response Box</h2>
						<form action="../Tutor/upwritop.php" method="post">
						        <!-- Fetches activity ser list -->
						        <label for="id">Activity</label>
						       <?
						        $rows = pg_num_rows($result);
						        echo "<!-- $rows returned -->";
					
								for ( $i=0; $i<$rows; $i++ )
						        {
						                list($id, $type, $label) = pg_fetch_row($result, $i);
						                echo "<input type=\"$type\" name=\"$label\" value=\"$id\">$label";
						        }
						        ?>
						        </select>
						        </br>
						        <input type="image" src="../img/go.png" value="Next stage">
						</form>
      				<h3>This is a Multiple Choice response</h3>
      			</div>
       		</div>
		</div> 
	</body>
</html>
<?
		}
	}	
?>
