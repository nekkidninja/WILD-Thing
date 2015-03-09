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
	//create a Drop down

	?>
	<div id="form">
	<form action="../Functions/respror.php" method="post">
				<p><label>Shia LaBouf</label> <input type="radio" name="res" Value="Shia LaBouf" /></p>
				<p><label>Kelly Brooke</label> <input type="radio" name="res" Value="Kely Brooke" /></p>
				<p><label>Sarah Palin</label> <input type="radio" name="res" Value="Sarah Palin" /></p>
				<p><label>Megan Fox</label> <input type="radio" name="res" Value="Megan Fox" /></p></br>
	        <input type="image" src="../img/go.png" value="Next stage">
		</form>
	</div>
	<?
	//close Connect
}
pg_close($connection);
?>