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
/***********************post Vars and input ****************************/
	$title = escapeshellcmd($_POST ['title']);
	$description = escapeshellcmd($_POST ['description']);
	$setid = escapeshellcmd($_POST ['setid']);
	$typeid = escapeshellcmd($_POST ['typeid']);
	$nextid = '';
	$urlid = '';
	
	if (empty($_POST ['actset'])&&empty($_POST ['description'])&&empty($_POST ['typid'])&&empty($_POST ['setid']))
		{
			echo "no data entered, please try again";
		}
		else if (empty($_POST ['title']))
		{
			echo "no title entered, please try again (come on u need a title!)";
		}
		else if (empty($_POST ['description']))
		{
			echo "no description entered, please try again (come on u need a little description)";
		}
		else if (empty($_POST ['setid']))
		{
			echo "Its not passing the setid (Not good)";
		}
		else if (empty($_POST ['typeid']))
		{
			echo "Its not passing the typeid (Not good)";
		}
		else
		{
			$r = pg_query ("INSERT INTO activity (title, description, activitytype, activityset) VALUES ('$title','$description','$typeid','$setid')");
			$affected = pg_affected_rows($r);
			
			if ($affected == 1)
			{
				$r = pg_query("SELECT MAX(activityID) FROM Activity");
				/* there should only be one row, with one item in it as the response */
				list($nextid) = pg_fetch_row($r,0);
			}
			
			$f = pg_query("INSERT INTO activityinstance (activity) VALUES ('$nextid')");
			$affected2 = pg_affected_rows($f);	
			
			if	($affected2 == 1)
			{
				$f = pg_query("SELECT MAX(instanceid) FROM activityinstance");
				/* there should only be one row, with one item in it as the response */
				list($urlid) = pg_fetch_row($f,0);
			}

			$query = "SELECT typename FROM activitytype WHERE activitytypeid = $typeid";
			$result = pg_query ($query) or die ("could not execute query: <br />$query");
			
			/*echo "<!-- $result -->";check the Result*/
			$returned = pg_fetch_row($result);
	
			$activitytypename = $returned [0];
			
			switch($activitytypename)
			{
		    	case "Text":
		    		/*echo header("Location: http://wilddev.sanm.hull.ac.uk/keith/Tutor/writop.php?id=$nextid&url=$urlid");; uncomment to see the URL display*/
		    		header("Location: ../Tutor/writop.php?id=$nextid&url=$urlid");
		       	break;
		       	
		    	case "single":
		        	/*echo header("Location: http://wilddev.sanm.hull.ac.uk/keith/Tutor/mritop.php?id=$nextid&url=$urlid");; uncomment to see the URL display*/
		    		header("Location: ../Tutor/mritop.php?id=$nextid&url=$urlid");
		        break;
		        
		    	case "multi":
		            /*echo header("Location: http://wilddev.sanm.hull.ac.uk/keith/Tutor/mritop.php?id=$nextid&url=$urlid");; uncomment to see the URL display*/
		    		header("Location: ../Tutor/mritop.php?id=$nextid&url=$urlid");
		        break;
		        
		        case "Video":
		        	/*echo header("Location: http://wilddev.sanm.hull.ac.uk/keith/Tutor/uritop.php?id=$nextid&url=$urlid");; uncomment to see the URL display*/
		    		header("Location: ../Tutor/uritop.php?id=$nextid&url=$urlid");
		       	break;
		       	
		        case "Audio":
		   			/*echo header("Location: http://wilddev.sanm.hull.ac.uk/keith/Tutor/uritop.php?id=$nextid&url=$urlid");; uncomment to see the URL display*/
		    		header("Location: ../Tutor/uritop.php?id=$nextid&url=$urlid");
		        break;

		        case "Image":
		   			/*echo header("Location: http://wilddev.sanm.hull.ac.uk/keith/Tutor/uritop.php?id=$nextid&url=$urlid");; uncomment to see the URL display*/
		    		header("Location: ../Tutor/uritop.php?id=$nextid&url=$urlid");
		        break;
		        
		        case "URL":
		   			/*echo header("Location: http://wilddev.sanm.hull.ac.uk/keith/Tutor/urlritop.php?id=$nextid&url=$urlid");; uncomment to see the URL displa*/
		    		header("Location: ../Tutor/urlritop.php?id=$nextid&url=$urlid");
		        break;
			}		
			
		}
	}
?>