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
//***********************post Vars and input ***************************/
	$option = escapeshellcmd($_POST ['option']);
	$id = escapeshellcmd($_POST ['id']);
	/*check the fields are not empty of data*/
	if (empty($_POST ['id'])&&empty($_POST ['option']))
		{
			echo "no data entered, please try again";
		}
		else if (empty($_POST ['id']))
		{
			echo "No ID Passed";
		}
			else if (empty($_POST ['option']))
		{
			echo "You did not assign an option value!";
		}
		else
		{
			/*Update Database with new option*/
			pg_query ("UPDATE activityoption SET optionlabel='$option' WHERE activity = '$id'");
			header("Location: ../Tutor/success.php");
		}		
			
	}
?>