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
?>
	<div id="form">
	<form action="../Functions/resproc.php" method="post">
				<p>
					<h5>Goal Keepers:</h5>
				</p>
				<p>
					<label>Ben Foster</label> <input type="checkbox" name="keep1" Value="checked" />
					<label>Robert Green</label> <input type="checkbox" name="keep2" Value="checked" />
				</p>
				<p>
					<h5>Left Back:</h5>
				</p>
				<p>
					<label>Ashley Cole</label> <input type="checkbox" name="def1" Value="checked" />
					<label>Wayne Bridge</label> <input type="checkbox" name="def2" Value="checked" />
				</p>
				<p>
					<h5>Right Back:</h5>
				</p>
				<p>
					<label>Gary Neville</label> <input type="checkbox" name="def3" Value="checked" />
					<label>Glen Johnson</label> <input type="checkbox" name="def4" Value="checked" />
				</p>
				<p>
					<h5>Center Back:</h5>
				</p>
				<p>
					<label>John Terry</label> <input type="checkbox" name="def5" Value="checked" />
					<label>Rio Ferdinand</label> <input type="checkbox" name="def6" Value="checked" />
					<label>Matthew Upson</label> <input type="checkbox" name="def7" Value="checked" />
				</p>
				<p>
					<h5>Right Wing:</h5>
				</p>
				<p>				
					<label>Aaron Lennon</label> <input type="checkbox" name="mid1" Value="checked" />
					<label>David Beckham</label> <input type="checkbox" name="mid2" Value="checked" />
				</p>
				<p>
					<h5>Left Wing:</h5>
				</p>
				<p>
					<label>Ashley Young</label> <input type="checkbox" name="mid3" Value="checked" />
					<label>James Milner</label> <input type="checkbox" name="mid4" Value="checked" />
				</p>
				<p>
					<h5>Central Midfield:</h5>
				</p>
				<p>				
					<label>Steven Gerrard</label> <input type="checkbox" name="mid5" Value="checked" />
					<label>Frank Lampard</label> <input type="checkbox" name="mid6" Value="checked" />
					<label>Gareth Barry</label> <input type="checkbox" name="mid7" Value="checked" />
					<label>Michael Carrick</label> <input type="checkbox" name="mid8" Value="checked" />
				</p>
				<p>
					<h5>Forwards</h5>
				</p>
				<p>
					<label>Wayne Rooney</label> <input type="checkbox" name="fwd1" Value="checked" />
					<label>Jermain Defoe</label> <input type="checkbox" name="fwd2" Value="checked" />
					<label>Peter Crouch</label> <input type="checkbox" name="fwd3" Value="checked" />
					<label>Darren Bent</label> <input type="checkbox" name="fwd4" Value="checked" />
				</p>
				</br>
	        <input type="image" src="../img/go.png" value="Next stage">
		</form>
	</div>
	<?
	//close Connect
}
pg_close($connection);
?>