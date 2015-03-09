<?php 
	/*License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.*/
	$id = $_REQUEST['id'];
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
		/*select the details of the Activity instance*/
		$query = "SELECT activityInstance.activity, activity.activityID, activity.activitytype,";
		$query .= "activity.title, activity.description, activitytype.activitytypeid, activitytype.typename ";
		$query .= "FROM activityinstance, activity, activitytype WHERE  activityinstance.instanceID = $id ";
		$query .= "AND activity.activityID = activityinstance.activity And activitytype.activitytypeid = activity.activitytype";
	
	    $result = pg_exec($query) or die ("could not execute query");
	    $data = pg_fetch_array($result);
	    
	    if ( pg_num_rows($result) != 1 )
	    {
	    	echo "Oops. something VERY weird happened there";
	    }
	    else
	    {
	    	echo "<!-- var_dump($result) -->"
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Wild</title>
		<link rel="stylesheet" type="text/css" href="../styles/dstyle/main.css"/>
	</head>
	<body>
		<div id ="container">
			<div id="subcon">
				<div class="curved-box-long">
        			<h2>Activity <?= $id ?> : <?= $data['title']?></h2>
        			<div id="cont">
        				</br>
        				<p>
        					<?= $data['description'] ?>
						</p>
						<p>
        				<form action="fetch.php" method="Post">
							<p><label>Show the responses</label></p>
							<p><input type="image" src="../img/fetch.png" Value="Next stage"></p>
							<? 
								$id = $_GET['id'];
								Echo "<input type='hidden' name='id' value='$id'>";
							?>
        				</form>
        				
        				</p>
        			</div>
					<h3>This is a <?= $data['typename'] ?> activity</h3>
        		</div>
       		</div>
		</div> 
	</body>
</html>
<?
		}
	}	
?>