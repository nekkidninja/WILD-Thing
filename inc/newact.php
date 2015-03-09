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
    /*Selects all the titles IDs and Descriptions from the Activity Category (formally activity sets)*/
    $query = "SELECT setid, title, description FROM activityset";
    $result = pg_exec($query) or die ("could not execute query");
    
    /*Selects all the Types IDs and Descriptions from the Activity type*/
    $query2 = "SELECT activitytypeid, typename, description FROM activitytype";
    $result2 = pg_exec($query2) or die ("could not execute query");
	

	?>
	<form action="../Functions/goAddact.php" method="post">
	        <p>
	        <label for="title">Name of Activity</label>
	        <input type="text" name="title">
	        </p>
	        <p>
	        <label for="description">Activity (What do you want the students to do?)</label>
	        <input type="text" name="description">
	        </p>
	        <p>
	        <label for="setid">Add to Activity Group</label>
	        <select name="setid">
	        <?
	        /*builds the drop down for activity category selection */
	        $rows = pg_num_rows($result);
	        echo "<!-- $rows returned -->";

			for ( $i=0; $i<$rows; $i++ )
	        {
	                list($id, $title, $description) = pg_fetch_row($result, $i);
	                echo "<option value=\"$id\">$title ($description)</option>";
	        }
	        ?>
	        </select>
	        </p>
	        <p>
	        <label for="typeid">Select Activity Type</label>
	        <select name="typeid">
	        <?
	        
	        /*builds the drop dwon for activity type selection*/
	        $rows = pg_num_rows($result2);
	        echo "<!-- $rows returned -->";

			for ( $i=0; $i<$rows; $i++ )
	        {
	                list($id, $title, $description) = pg_fetch_row($result2, $i);
	                echo "<option value=\"$id\">$title ($description)</option>";
	        }
	        ?>
	        </select>
	        </p>
	       	<p>
	        <input type="image" src="../img/go.png" value="Next stage">
			</p>
	</form>
	<?
	/*close Connect*/
}
pg_close($connection);
?>