<?php 
/*License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.*/
	$id = $_REQUEST['id'];
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
		/*this query Fetchs the responces and activity details related to the instance ID*/
		$query = "SELECT activityInstance.activity, activity.activityID, activity.activitytype,";
		$query .= "activity.title, activity.description, activitytype.activitytypeid, activitytype.typename ";
		$query .= "FROM activityinstance, activity, activitytype WHERE  activityinstance.instanceID = $id ";
		$query .= "AND activity.activityID = activityinstance.activity And activitytype.activitytypeid = activity.activitytype";
		
	    $result = pg_exec($query) or die ("could not execute query");
	    $data = pg_fetch_array($result);
	    
	    /*checks the  rows are correct*/
	    if ( pg_num_rows($result) != 1 )
	    {
	    	echo "Oops. something VERY weird happened there";
	    }
	    else
	    {
	    	echo "<!-- $result -->"
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
                   		Answers!
        				<?
        					/*creates the display for the results*/
							$query = "SELECT * FROM response WHERE activityinstance ='$id'"; 

        					$result = pg_query($query); 
        					if (!$result) 
        						{ 
            						echo "Problem with query " . $query . "<br/>"; 
            						echo pg_last_error(); 
            						exit(); 
       		 					} 

        					while($myrow = pg_fetch_array($result)) 
        						{ 
            							echo "<p>";
        								echo $myrow['responsecontent'];
            							echo "</br>";
            							echo "</p>";
        						} 
        					?> 
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