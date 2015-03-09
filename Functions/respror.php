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
	$title = escapeshellcmd($_POST ['res']);
	$ip = $_SERVER ['REMOTE_ADDR'];
	$date = date('Y-m-d H:i:s');
	/*check the the fields are empty*/
	if (empty($_POST ['res']))
		{
			echo "You didnt Put in an answer!!";
		}
		else
		{	
			/*insert data into response table*/
			$gogogo = "INSERT INTO response (source,responsetype,receivedat,responsecontent,activityinstance)
					   VALUES ('$ip','1','$date','$title','313');";
			pg_query($gogogo) ;
			
			header("Location: ../Lclient/act3.php");
		}
	}
?>



