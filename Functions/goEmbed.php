<?php
/*License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.*/
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
	/*take the posted data*/	
	$id = escapeshellcmd($_POST ['id']);
	/*check that the data aint empty*/
	if	(empty($_POST ['id']))
	{
		echo "No ID Passed";
	}
	else
	{
		/*adds an instance of the activity in to the intance table*/
		$f = pg_query("INSERT INTO activityinstance (activity) VALUES ('$id')");
		$affected2 = pg_affected_rows($f);	
			
		if	($affected2 == 1)
		{
			/*select that last id for embed*/
			$f = pg_query("SELECT MAX(instanceid) FROM activityinstance");
			/* there should only be one row, with one item in it as the response */
			list($urlid) = pg_fetch_row($f,0);
		}
		header("Location: ../Tutor/showembed.php?id=$urlid");
	}	
}	
?>