<?php
/*License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.*/
//This one Pulls act set, Act type and allows the input of a act
//title
error_reporting(E_ALL);

//**********************Database connection Gumpf************************
//***********************************************************************
$host = "*****";
$user = "*****";
$pass = "*****";
$db  = "*****";
//connection
/*$connection = pg_connect("host=$host dbname=$db user=$user password=$pass");
*///connection
$connectionString = "host=$host dbname=$db user=$user password=$pass";
$connection = pg_connect($connectionString);

echo "<!-- $connectionString -->";  // look in the page source to see what^Ã’s being used as the connection string

//if to check the connection
if (!$connection)
{
	die("could not open connection to database server");
}
else
{
	//create a Drop down

	?>
	<form action="../Functions/respro.php" method="post">
	        <p>
	        <label for="res">Please input your answer</label>
	        <input type="text" name="res">
	        </p>
	       	<p>
	        <input type="image" src="../img/go.png" value="Next stage">
			</p>
	</form>
	<?
	//close Connect
}
pg_close($connection);
?>