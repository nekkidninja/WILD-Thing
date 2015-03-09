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
		/***********************post Vars and input ***************************/
		
		$id = $_REQUEST['id'];
		$ip = $_SERVER ['REMOTE_ADDR'];
		$date = date('Y-m-d H:i:s');
		$fileUploadBase = '../uploads';
		/*checks the file type is allowed*/
		
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/pjpeg"))
		&& ($_FILES["file"]["size"] < 800000))
		{
		  	if ($_FILES["file"]["error"] > 0)
		    {
		    	/*no file return errot*/
		    	echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		    }
		    else
		    {
		    	/*records and Echos file data*/
		    	list($major,$minor) = explode( '/', $_FILES["file"]["type"] );
		    	
		    	echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		    	echo "Type: " . $_FILES["file"]["type"] . "(Major: $major Minor: $minor)<br />";
		    	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		    	echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
		
			if ( file_exists("$fileUploadBase/uploads/$major/" . $_FILES["file"]["name"]) )
		      {
				/*checks to see if the file is allready there*/
			  	echo $_FILES["file"]["name"] . " already exists. ";
		      }
		    else
		      {
		      	/*uploads File to the temp DIR and then  moves it to a Set place Stores as a url for the Response page*/
		    	move_uploaded_file($_FILES["file"]["tmp_name"],
		    	"$fileUploadBase/uploads/$major/" . $_FILES["file"]["name"]);
		    	echo "Stored in: " . "$fileUploadBase/uploads/$major/" . $_FILES["file"]["name"];
				
		    	$gogogo  = 'INSERT INTO response ';
		    	$gogogo .= '(source,responsetype,receivedat,responsecontent,activityinstance)';
				$gogogo .= "VALUES ('$ip','1','$date','$major/".$_FILES["file"]["name"]."','317')";
				
				echo "\n$gogogo";
				
				$res = pg_query($gogogo);
				
				if ( pg_affected_rows($res) == 1 )
				{
					echo "Success";
				}
				else
				{
					echo "Er, sorry. Something weird happened.";	
				}
		      }
		  	}
		 }
		else
		  {
		  echo "Invalid file";
		  }
	
	}
?>



