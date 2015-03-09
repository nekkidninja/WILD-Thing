<?php
/*License Copyright [2009] [University of Hull – Dr. Darren Mundy] Licensed under the Educational Community License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may	obtain a copy of the License at http://www.osedu.org/licenses/ECL-2.0 Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.*/
	$instanceid = $_REQUEST['id'];
	error_reporting(E_ALL);

	//**********************Database connection Gumpf************************
	//***********************************************************************
	$host = "*****";
	$user = "*****";
	$pass = "*****";
	$db  = "*****";
	
	//connection
	$connectionString = "host=$host dbname=$db user=$user password=$pass";
	$connection = pg_connect($connectionString);	
	//if to check the connection
	if (!$connection)
	{
		die("could not open connection to database server");
	}
	else
	{
	    /*database query that selects the activity and assoicated detais*/
		$query =  "SELECT activityType.typeName, activity.title, activity.description ";
		$query .= "FROM ActivityInstance, ActivityType, Activity ";
		$query .= "WHERE ActivityInstance.instanceID = $instanceID ";
		$query .= "AND Activity.activityID = ActivityInstance.activity ";
		$query .= "AND Activity.activityType = ActivityType.activityTypeID"; 
		
	    
	    $result = pg_exec($query) or die ("could not execute query2");
	    $data = pg_fetch_array($result);
	    
	    if ( pg_num_rows($result) != 1 )
	    {
	    	echo "Oops. something VERY weird happened there";
	    }
	    else
	    {
	    	?>
	       		<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
				<html>
				<head>
						<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
						<title>Wild - Question Display</title>
					<link rel="stylesheet" type="text/css" media="screen,handheld" href="../styles/cstyle/main.css"/>
				</head>
			<body>
	    	<?
			switch($data['typename'])
							{
						    	case "Text":
						    	?>

									<div id ="container">
										<div class="header">
											<ul>
												<li Id="head">
													<h2>
														<img src="../img/cHead.png" alt="Wild thing Tutor interface" title="WILD" /> 
													</h2>
												</li>
											</ul>
										</div>
													<div id="subcon">
												<div class="curved-box3">
									        			<h2>Activity <?= $id ?> : <?= $data['title']?></h2>
									        			<div id="cont">
									        				</br>
									        				<p>
									        					<?= $data['description'] ?>
															</p>
									        			</div>
														<h3>This is a <?$data['typename']?> activity</h3>
									      			</div> 
													<div class="curved-box2">
									       				<h2 id="top">Response Box</h2>
									       					<form action="../Functions/resprow.php" method="post">
															        <p>
															        <label for="res">Please input your answer</label>
															        <input type="text" name="res" />
															        <input type="hidden" name="aid" value="<?= $id ?>" />
															        </p>
															       	<p>
															        <input type="image" src="../img/go.png" value="Next stage" />
																	</p>
															</form>
									      				<h3>This is a <?$data['typename']?> response</h3>
									      			</div>
									       		</div>
											</div> 
							<?
						       	break;
						       	
						    	case "single":
						    ?>
											<div id ="container">
												<div class="header">
													<ul>
														<li Id="head">
															<h2>
															<img src="../img/cHead.png" alt="Wild thing Tutor interface" title="WILD" /> 
															</h2>
														</li>
													</ul>
												</div>
												<div id="subcon">
												<div class="curved-box3">
									        			<h2>Activity <?= $id ?> : <?= $data['title']?></h2>
									        			<div id="cont">
									        				</br>
									        				<p>
									        					<?= $data['description'] ?>
															</p>
									        			</div>
														<h3>This is a <?$data['typename']?> activity</h3>
									      			</div> 
													<div class="curved-box2">
									       				<h2 id="top">Response Box</h2>
															<form action="../Tutor/upwritop.php" method="post">
															        <!-- Fetches activity ser list -->
															        <label for="id">Activity</label>
															       <?
															        $rows = pg_num_rows($result);
															        echo "<!-- $rows returned -->";
														
																	for ( $i=0; $i<$rows; $i++ )
															        {
															                list($id, $type, $label) = pg_fetch_row($result, $i);
															                echo "<input type=\"$type\" name=\"$label\" value=\"$id\">$label";
															        }
															        ?>
															        </select>
															        </br>
															        <input type="image" src="../img/go.png" value="Next stage">
															</form>
									      				<h3>This is a <?$data['typename']?> Choice response</h3>
									      			</div>
									       		</div>
											</div> 
							<?
						        break;
						        
						    	case "multi":
						    ?>
										<div id ="container">
											<div class="header">
												<ul>
													<li Id="head">
														<h2>
														<img src="../img/cHead.png" alt="Wild thing Tutor interface" title="WILD" /> 
														</h2>
													</li>
												</ul>
											</div>
											<div id="subcon">
											<div class="curved-box3">
								        			<h2>Activity <?= $id ?> : <?= $data['title']?></h2>
								        			<div id="cont">
								        				</br>
								        				<p>
								        					<?= $data['description'] ?>
														</p>
								        			</div>
													<h3>This is a <?$data['typename']?> choice activity</h3>
								      			</div> 
												<div class="curved-box2">
								       				<h2 id="top">Response Box</h2>
														<form action="../Tutor/upwritop.php" method="post">
														        <!-- Fetches activity ser list -->
														        <label for="id">Activity</label>
														       <?
														        $rows = pg_num_rows($result);
														        echo "<!-- $rows returned -->";
													
																for ( $i=0; $i<$rows; $i++ )
														        {
														                list($id, $type, $label) = pg_fetch_row($result, $i);
														                echo "<input type=\"$type\" name=\"$label\" value=\"$id\">$label";
														        }
														        ?>
														        </select>
														        </br>
														        <input type="image" src="../img/go.png" value="Next stage">
														</form>
								      				<h3>This is a <?$data['typename']?> Choice response</h3>
								      			</div>
								       		</div>
										</div> 
						    <?   
						        break;
						        
						        case "Video":
						     ?>
											<div id ="container">
												<div class="header">
													<ul>
														<li Id="head">
															<h2>
															<img src="../img/cHead.png" alt="Wild thing Tutor interface" title="WILD" /> 
															</h2>
														</li>
													</ul>
												</div>
												<div id="subcon">
												<div class="curved-box3">
									        			<h2>Activity <?= $id ?> : <?= $data['title']?></h2>
									        			<div id="cont">
									        				</br>
									        				<p>
									        					<?= $data['description'] ?>
															</p>
									        			</div>
														<h3>This is a <?$data['typename']?> activity</h3>
									      			</div>
									      			<div class="curved-box2">
								       				<h2 id="top">Response Box</h2>
														<form action="../Functions/resprop.php" method="post" enctype="multipart/form-data">
															<label for="file">Filename:</label>
															<input type="file" name="file" id="file" /> 
															<br />
															<input type="submit" name="submit" value="Submit" />
														</form>
											      				<h3>This is a <?$data['typename']?> response</h3>
								      			</div>
								       		</div>
										</div> 
							<?
						       	break;
						       	
						        case "Audio":
						      ?>
											<div id ="container">
												<div class="header">
													<ul>
														<li Id="head">
															<h2>
															<img src="../img/cHead.png" alt="Wild thing Tutor interface" title="WILD" /> 
															</h2>
														</li>
													</ul>
												</div>
												<div id="subcon">
												<div class="curved-box3">
									        			<h2>Activity <?= $id ?> : <?= $data['title']?></h2>
									        			<div id="cont">
									        				</br>
									        				<p>
									        					<?= $data['description'] ?>
															</p>
									        			</div>
														<h3>This is a <?$data['typename']?> activity</h3>
									      			</div>
									      			<div class="curved-box2">
								       				<h2 id="top">Response Box</h2>
														<form action="../Functions/resprop.php" method="post" enctype="multipart/form-data">
															<label for="file">Filename:</label>
															<input type="file" name="file" id="file" /> 
															<br />
															<input type="submit" name="submit" value="Submit" />
														</form>
											      				<h3>This is a <?$data['typename']?> response</h3>
								      			</div>
								       		</div>
										</div> 
							<?
						        break;
				
						        case "Image":
						     ?>
											<div id ="container">
												<div class="header">
													<ul>
														<li Id="head">
															<h2>
															<img src="../img/cHead.png" alt="Wild thing Tutor interface" title="WILD" /> 
															</h2>
														</li>
													</ul>
												</div>
												<div id="subcon">
												<div class="curved-box3">
									        			<h2>Activity <?= $id ?> : <?= $data['title']?></h2>
									        			<div id="cont">
<!--									        				</br>-->
									        				<p>
									        					<?= $data['description'] ?>
															</p>
									        			</div>
														<h3>This is a <?$data['typename']?> activity</h3>
									      			</div>
									      			<div class="curved-box2">
								       				<h2 id="top">Response Box</h2>
														<form action="../Functions/resprop.php" method="post" enctype="multipart/form-data">
															<label for="file">Filename:</label>
															<input type="file" name="file" id="file" /> 
															<br />
															<input type="submit" name="submit" value="Submit" />
														</form>
											      				<h3>This is a <?$data['typename']?> response</h3>
								      			</div>
								       		</div>
										</div> 
							<?
						        break;
						        
						        case "URL":
						 
						        break;
						    
							}
						?>
				</body>
			</html>
			<?
			
		}
	}	
?>
