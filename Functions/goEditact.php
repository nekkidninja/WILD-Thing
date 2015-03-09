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
	/*Check the post data is no empty*/
	if (empty($_POST ['actset']))
	{
		echo "the value is not being passed";
	}
	else
	{	
		/*selects the option ID from the type ID */
		$query  = "SELECT activityoption.optionid, activity.activitytype ";
		$query .= "FROM activityoption,activity ";
		$query .= "WHERE (activity=$actid AND activity.activityid=activityoption.activity)";
		
		$result = pg_query($query) or die ("could not execute query: $query");
		$results = pg_fetch_all($result);
		
		echo $results;
		/*switch case that select the correct page for editing from the ID pull from the query
		switch ($results['activitytype']) 
		{
    		case "1":
    			header("Location: ../Tutor/upwritop.php?id=$result");
       		break;
       		case "2":
        		header("Location: ../Tutor/nono.php?id=$result");
        	break;
    		case "3":
        		header("Location: ../Tutor/nono.php?id=$result");
        	break;
        	case "4":
       			header("Location: ../Tutor/nono.php?id=$result");
        	break;
        	case "5":
        		header("Location: ../Tutor/nono.php?id=$result");
        	break;
        	case "6":
        		header("Location: ../Tutor/nono.php?id=$result");
        	break;
        	case "7":
        		header("Location: ../Tutor/nono.php?id=$result");
        	break;
        	case "8":
        		header("Location: ../Tutor/nono.php?id=$result");
        	break;
				default:
					var_dump($results);
			}
		}*/

	}
?> 
