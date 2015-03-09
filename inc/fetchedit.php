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
    /*Selects all the titles from the activity*/
	$query = "SELECT activityid, title, description FROM activity";
	$result = pg_exec($query) or die ("could not execute query");
    
	/*create a Drop down*/

	?>
	<form action="../Tutor/upwritop.php" method="post">
	        <!-- Fetches activity ser list -->
	        <label for="id">Activity</label>
	        <select name="id" style="width:460px; display:block;">
	
	        <?
	        $rows = pg_num_rows($result);
	        echo "<!-- $rows returned -->";

			for ( $i=0; $i<$rows; $i++ )
	        {
	                list($id, $title, $description) = pg_fetch_row($result, $i);
	                echo "<option value=\"$id\">$title ($description)</option>";
	        }
	        ?>
	        </select>
	        </br>
	        <input type="image" src="../img/go.png" value="Next stage">
	</form>
	<?
	/*close Connect*/
}
pg_close($connection);
?>