<?php
/*License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.*/
error_reporting(E_ALL);

/**********************Database connection Gumpf********************************/
$host = "*****";
$user = "*****";
$pass = "*****";
$db  = "*****";;
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
		$keep1 = escapeshellcmd($_POST ['keep1']);
		$keep2 = escapeshellcmd($_POST ['keep2']);
		$lb1 =	escapeshellcmd($_POST ['def1']);
		$lb2 = escapeshellcmd($_POST ['def2']);
		$rb3 = escapeshellcmd($_POST ['def3']);
		$rb4 = escapeshellcmd($_POST ['def4']);
		$fb5 = escapeshellcmd($_POST ['def5']);
		$fb6 = escapeshellcmd($_POST ['def6']);
		$fb7 = escapeshellcmd($_POST ['def7']);
		$rw1 = escapeshellcmd($_POST ['mid1']);
		$rw2 = escapeshellcmd($_POST ['mid2']);
		$lw3 = escapeshellcmd($_POST ['mid3']);
		$lw4 = escapeshellcmd($_POST ['mid4']);
		$cm5 = escapeshellcmd($_POST ['mid5']);
		$cm6 = escapeshellcmd($_POST ['mid6']);
		$cm7 = escapeshellcmd($_POST ['mid7']);
		$cm8 = escapeshellcmd($_POST ['mid8']);
		$fwd1 = escapeshellcmd($_POST ['fwd1']);
		$fwd2 = escapeshellcmd($_POST ['fwd2']);
		$fwd3 = escapeshellcmd($_POST ['fwd3']);
		$fwd4 = escapeshellcmd($_POST ['fwd4']);
		$ip = $_SERVER ['REMOTE_ADDR'];
		$date = date('Y-m-d H:i:s');

		if ($keep1 && $keep2 == 'checked')
		{
			echo "You cannot field 2 keepers!";
		}
		if ($keep1 == 'checked')
		{
			$keeper = 'Foster';
		}
		If	($keep2 == 'checked')
		{
			$keeper = 'Green';
		}
		if ($lb1 && $lb2 == 'checked')
		{
			echo "You can only field 1 left back";
		}
		if($lb1 == 'checked')
		{
			$leftback = 'A.Cole';
		}
		if ($lb2 == 'checked')
		{
			$leftback = 'Bridge';
		}
		if ($rb3 && $rb4 == 'checked')
		{
			echo "You can only field 1 right back back";
		}
		if($rb3 == 'checked')
		{
			$rightback = 'Neville';
		}
		if ($rb4 == 'checked')
		{
			$leftback = 'Johnson';
		}
		If ($fb5 && $fb6 && $fb7 == 'checked')
		{
			echo "You can only field 2 Full backs";
		}
		if($fb5 && $fb6 == 'checked')
		{
			$fullback1 = 'Terry';
			$fullback2 = 'Ferdinand';
		}
		if ($fb6 && $fb7 == 'checked')
		{
			$fullback2 = 'Upson';
			$fullback1 = 'Ferdinand';
		}
		if ($fb5 && $fb7 == 'checked')
		{
			$fullback2 = 'Upson';
			$fullback1 = 'Terry';
		}
		if ($rw1 && $rw2 == 'checked')
		{
			echo "You can only field 1 right winger";
		}
		if($rw1 == 'checked')
		{
			$rightwing = 'Lennon';
		}
		if ($rw2 == 'checked')
		{
			$rightwing = 'Beckham';
		}
		if ($lw3 && $lw4 == 'checked')
		{
			echo "You can only field 1 left winger";
		}
		if($lw3 == 'checked')
		{
			$leftwing = 'Young';
		}
		if ($lw4 == 'checked')
		{
			$leftwing = 'Milner';
		}
		if ($cm5 && $cm6 && $cm7 && $cm7 == 'checked')
		{
			echo "You can only field 2 central midfields";
		}
		if($cm5 && $cm6 && $cm7 == 'checked')
		{
			echo "You can only field 2 central midfields";
		}
		if ($cm5 && $cm6 && $cm8 == 'checked')
		{
			echo "You can only field 2 central midfields";
		}
		If ($cm8 && $cm6 && $cm7 == 'checked')
		{
			echo "You can only field 2 central midfields";
		}
		if($cm5 && $cm8 && $cm7 == 'checked')
		{
			echo "You can only field 2 central midfields";
		}
		if ($cm5 && $cm6 == 'checked')
		{
			$centralm2 = 'Lampard';
			$centralm1 = 'Gerrard';
		}
		if ($cm5 && $cm7 == 'checked')
		{
			$centralm2 = 'Barry';
			$centralm1 = 'Gerrard';
		}
		if ($cm5 && $cm8 == 'checked')
		{
			$centralm2 = 'Carrick';
			$centralm1 = 'Gerrard';
		}
		if ($cm6 && $cm7 == 'checked')
		{
			$centralm2 = 'Barry';
			$centralm1 = 'Lampard';
		}
		if ($cm6 && $cm8 == 'checked')
		{
			$centralm2 = 'Carrick';
			$centralm1 = 'Lampard';
		}
		if ($cm7 && $cm8 == 'checked')
		{
			$centralm2 = 'Carrick';
			$centralm1 = 'Barry';
		}	
		if ($fwd1 && $fwd2 && $fwd3 && $fwd4 == 'checked')
		{
			echo "You can only field 2 attackers";
		}
		if($fwd1 && $fwd2 && $fwd3 == 'checked')
		{
			echo "You can only field 2 attackers";
		}
		if ($fwd1 && $fwd2 && $fwd4 == 'checked')
		{
			echo "You can only field 2 attackers";
		}
		If ($fwd1 && $fwd4 && $fwd3 == 'checked')
		{
			echo "You can only field 2 attackers";
		}
		if($fwd4 && $fwd2 && $fwd3 == 'checked')
		{
			echo "You can only field 2 attackers";
		}
		if ($fwd1 && $fwd2 == 'checked')
		{
			$forward2 = 'Defoe';
			$forward1 = 'Rooney';
		}
		if ($fwd1 && $fwd3 == 'checked')
		{
			$forward2 = 'Crouch';
			$forward1 = 'Rooney';
		}
		if ($fwd1 && $fwd4 == 'checked')
		{
			$forward2 = 'Bent';
			$forward1 = 'Rooney';
		}
		if ($fwd2 && $fwd3 == 'checked')
		{
			$forward2 = 'Crouch';
			$forward1 = 'Defoe';
		}
		if ($fwd2 && $fwd4 == 'checked')
		{
			$forward2 = 'Bent';
			$forward1 = 'Defoe';
		}
		if ($fwd3 && $fwd4 == 'checked')
		{
			$forward2 = 'Bent';
			$forward1 = 'Crouch';
		}

		$gogogo = "INSERT INTO response (source,responsetype,receivedat,responsecontent,activityinstance)
				   VALUES ('$ip','1','$date','GK: $keeper DF: $rightback $leftback $fullback1 $fullback2 MID: $rightwing $leftwing $centralm1 $centralm2 FWD: $forward1 $forward2','314');";
		pg_query($gogogo) ;
		
		header("Location: ../Lclient/success.html");
	}	
?>



