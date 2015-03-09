<?php
/*License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.*/
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
		/***********************post Vars and input ***************************/
		$option = escapeshellcmd($_POST ['option']);
		$id = $_REQUEST ['id'];
		$urlid = $_REQUEST ['url'];
		/*checks the post data isnt empty*/
		if (empty($_REQUEST ['id'])&&empty(escapeshellcmd($_POST ['option'])))
		{
			echo "no data entered, please try again";
		}
		else if (empty($_REQUEST ['id']))
		{
			echo "No ID Passed";
		}
			else if (empty(escapeshellcmd($_POST ['option'])))
		{
			echo "You did not assign an option value!";
		}
			else if (empty($_REQUEST ['url']))
		{
			echo "No URL Passed";
		}
		else
		{
			/*adds the options to the database then passes the Instanceid to the next page*/
	        $rows = "array";
	        echo "<!-- $rows returned -->";

			for ( $i=0; $i<$rows; $i++ )
	        {
	                pg_query ("INSERT INTO activityoption (optionlabel, activity) VALUES ('$option','$id')");
	        }
			
			header("Location: http://wilddev.sanm.hull.ac.uk/keith/Tutor/showembed.php?id=$urlid");
		}		
			
	}
?>