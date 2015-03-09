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
	/*passes the ID from the welcome page*/
	$instanceID = escapeshellcmd($_POST['presid']);
	
	/*database query that selects the TYPE of activity*/
	$query =  "SELECT activityType.typeName ";
	$query .= "FROM ActivityInstance, ActivityType, Activity ";
	$query .= "WHERE ActivityInstance.instanceID = $instanceID ";
	$query .= "AND Activity.activityID = ActivityInstance.activity ";
	$query .= "AND Activity.activityType = ActivityType.activityTypeID"; 
		
	
	$result = pg_query($query) or die ("could not execute query: <br />$query");
	/*echo "$result"; check the Result*/
	$returned = pg_fetch_row($result);
	
	$activitytypename = $returned[0];

	/*Switch statment that selects the corret input template!*/ 	
	switch ($activitytypename) 
	{
    	case "Text":
    		/*echo ("Location: ../Lclient/clientactivityw.php?id=$instanceID"); uncomment to see the URL display*/
    		header("Location: ../Lclient/clientactivityw.php?id=$instanceID");
       	break;
       	
    	case "single":
        	 
        break;
        
    	case "multi":
            
        break;
        
        case "fileupload":
        	
       	break;
       	
        case "URL":
   			
        break;
        
	}
}	
?>