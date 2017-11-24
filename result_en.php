<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<title>Result</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/layout.css"  />
<link rel="stylesheet" type="text/css" href="css/menu.css"  />
<link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Leckerli+One'  />
<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Viga'  />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/responsive.css"  />
<link rel="stylesheet" type="text/css" href="css/table.css"  />

</head>
<body>
<!--Fullscreen Image Start-->
<img id="full-screen-background-image" src="images/abstract-black-white-line-creative-creative-background-wallpaper.jpg" alt="img" />
<!--Fullscreen Image End-->

<!--Logo Start-->
<section id="logo">
	<a href="home.php"><h1>Let's Travel</h1></a>
    <h4>Make memories</h4>
</section>
<!--Logo End-->

<!--Menu Start-->
<nav class="menu nav_wrapper" id="myslidemenu">
    <ul class="menu" id="jqueryslidemenu">
        <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="aboutus.php">About Us</a>
        	<!--<ul class="sub-menu">
            	<li><a href="cpt.html">Team</a></li>
				<li><a href="cpt.html">mission</a></li>
                <li><a href="tabularfoodmenu.html">Vission</a></li>
            </ul>-->
        </li>
        <li><a href="contact.php"><i class="fa fa-phone-square"></i>Contact</a></li>
		<li><a href="Signin.php">Account</a>
        	<ul class="sub-menu">
				<li><a href="signin.php">sign in</a></li>
            	<li><a href="signup.php">Sign up</a></li>
            </ul>
        </li>
		<li><a href="../urdu/home.php"><i class="fa fa-home"></i>اردو</a></li>
    </ul>
</nav>
<!--Menu End-->

<!--Container Start-->
   <section  id="container-fluid">
 <!--form start..-->
  <div  id="container" class="contact">
   <div  class="fullwidth">
   	<h1>COMBINATION</h1>;
   <table>
  <tr>
						<th>
							<font size="3"><strong>
							S.No &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
							</strong>
						</th>
						<th>
						<font size="3"><strong>
							Source &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						
						</strong>
						</th>
						<th>
						<font size="3"><strong>
							Destination &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							Ride Type &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							Start_Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							End_Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							Start_Date &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							End_Date &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						
					</tr>					
					
					<tbody>
			








<?php


				
				//	$res1;
				//	$res2;
				//	$res3;
					include("../includes/connect.php");
					if( isset($_POST['submit']) ){
						// Check connection
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}
						else{
							$selectedSource = $_POST['sourceCity'];
							$selectedDestination = $_POST['destinationCity'];
							$selectedDate = $_POST['journey'];
							$selectedRide = "";
							if(!empty($_POST['ride'])){
								$selectedRide = $_POST['ride'];
							}
							if($selectedRide == "all"){
								
								getFlightsf( $selectedSource,$selectedDestination ,$selectedDate, "Flight");//
									 
								
							}
														
						}
						
					}







//Algorithm for shortest time

function getFlightsf( $selectedSource,$selectedDestination ,$selectedDate, $selectedRide){
				$selectedRide = " AND Journey_type = '" . $selectedRide . "'";


	include("../includes/connect.php");
	$mainSource = $selectedSource;
	$mainDestination = $selectedDestination;
	$sqlQuery1 = " select Destination , End_Date_Time  from transport_type where Source = '". $mainSource ."' AND Start_Date_Time >= '". $selectedDate ."'";
	$BSource;
	$CSource;
	$AtoBEndTime;
	$BtoCEndTime;
	$CtoDEndTime;
//AND Start_Date_Time >= current_date()";
	$result = mysqli_query($conn, $sqlQuery1);
	if(mysqli_num_rows($result) > 0){
		//echo "data found for first";
		$desTime = array("xxxxxxxxxxxxxxxxxxxx" => "xx");
		while($row = mysqli_fetch_assoc($result)) {
			array_push($desTime, $row['Destination'], $row['End_Date_Time']);
		}
		$ind = findMin($desTime);
		$BSource = $desTime[$ind];
		//echo $BSource;
		//echo "<br />";
		$AtoBEndTime = $desTime[$ind+1];
		//echo $AtoBEndTime;
		//echo min($desTime);
		findMin($desTime);
		//echo $desTime[min($desTime)];
	}
	else{
		//echo "no data found for first";
	}

	//echo "<br />";

	$sqlQuery2 = "Select Trans_id from transport_type where Source = ( '" . $BSource . "' ) AND Destination = '".$mainDestination."'";
	$result = mysqli_query($conn, $sqlQuery2);
	if(mysqli_num_rows($result) > 0){
	}
	else{
		//echo "Not Found <br />";
		$sqlQuery3 = "select Source, TIMESTAMPDIFF(minute, Start_Date_time , End_Date_time) as timediff   from transport_type where Destination = 'Sialkot' ";
		$result = mysqli_query($conn, $sqlQuery3);
		if(mysqli_num_rows($result) > 0){
			$desTime = array("xxxxxxxxxxxxxxxxxxxx" => "xx");
			while($row = mysqli_fetch_assoc($result)) {
				array_push($desTime, $row['Source'], $row['timediff']);
			}
			$ind = findMin($desTime);
			$CSource = $desTime[$ind];
		//	echo $CSource;
		}
	}

//	echo "<br /> Running SQL Query 4 <br />";
//	echo "BSource : " . $BSource;
//	echo "CSource : " . $CSource;
//	echo "AtoBEndTime: " . $AtoBEndTime;


	$sqlQuery4 = "Select End_Date_Time , TIMESTAMPDIFF(minute, Start_Date_time , End_Date_time) as timediff from transport_type where Source = '". $BSource ."' And Destination = '". $CSource ."' AND Start_Date_time >= '" . $AtoBEndTime . "' ";
	$result = mysqli_query($conn, $sqlQuery4);
	if(mysqli_num_rows($result) > 0){
		//echo "found";
		$desTime = array("xxxxxxxxxxxxxxxxxxxx" => "xx");
		while($row = mysqli_fetch_assoc($result)) {
				array_push($desTime, $row['End_Date_Time'], $row['timediff']);
			}

			$ind = findMin($desTime);
			$BtoCEndTime = $desTime[$ind];
			//echo $desTime[$ind];
	}


	//echo "<br /> <br />Running SQL Query 5 <br /><br />";

	$sqlQuery5 = "Select End_Date_Time , TIMESTAMPDIFF(minute, Start_Date_time , End_Date_time) as timediff from transport_type where Source = '". $CSource ."' And Destination = 'Sialkot' AND Start_Date_time >= '" . $BtoCEndTime . "' ";
	$result = mysqli_query($conn, $sqlQuery5);
	if(mysqli_num_rows($result) > 0){
	//	echo "found";
		$desTime = array("xxxxxxxxxxxxxxxxxxxx" => "xx");
		while($row = mysqli_fetch_assoc($result)) {
				array_push($desTime, $row['End_Date_Time'], $row['timediff']);
			}

			$ind = findMin($desTime);
			$CtoDEndTime = $desTime[$ind];
		//	echo $CtoDEndTime;
	}


	//echo "<br /><br /><br /><br /> <b>Printing All at once </b>";
/*	echo "<table border='1'>
	<tr>
		<td>	Serial	</td>
		<td>	Source</td>
		<td>	Destination	</td>
		<td>	Type 	</td>
		<td>	Start Time</td>
		<td>	End Time</td>
		<td>	Start Date</td>
		<td>	End Date</td>
	</tr>";
*/
	//AND Start_Date_Time >= current_date()


	$sqlQuery6 = "select * from transport_type where Source = '". $mainSource ."'  AND Destination = '".$BSource."' AND End_Date_Time = '".$AtoBEndTime."' ";
	$result = mysqli_query($conn, $sqlQuery6);

	if(mysqli_num_rows($result) > 0){
		//echo "data found for 6";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr class='active'> <td> " . " </td> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td><td> ". $row["Start_Date"]." </td><td> ". $row["End_Date"]." </td></tr> ";
		}		
	}

	$sqlQuery7 = "Select * from transport_type where Source = '". $BSource ."' And Destination = '". $CSource ."' AND Start_Date_time >= '" . $AtoBEndTime . "' AND End_Date_Time = '". $BtoCEndTime. "'" ;
	$result = mysqli_query($conn, $sqlQuery7);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr class='active'> <td> " . " </td> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td><td> ". $row["Start_Date"]." </td><td> ". $row["End_Date"]." </td></tr> ";
		}		
	}

	$sqlQuery8 = "Select * from transport_type where Source = '". $CSource ."' And Destination = '".$mainDestination."' AND Start_Date_time >= '" . $BtoCEndTime . "' AND End_Date_Time = '".$CtoDEndTime."'";
	$result = mysqli_query($conn, $sqlQuery8);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr class='active'> <td> " . " </td> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td><td> ". $row["Start_Date"]." </td><td> ". $row["End_Date"]." </td></tr> ";
		}		
	}

	echo "</table>";

	
}
function findMin(array $arr){
		$min = min($arr);
		$index = array_search($min, $arr);
		return $index - 1;
	}
?>









				<?php
				/*
					$res1;
					$res2;
					$res3;
					include("../includes/connect.php");
					if( isset($_POST['submit']) ){
						// Check connection
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}
						else{
							$selectedSource = $_POST['sourceCity'];
							$selectedDestination = $_POST['destinationCity'];
							$selectedDate = $_POST['journey'];
							$selectedRide = "";
							if(!empty($_POST['ride'])){
								$selectedRide = $_POST['ride'];
							}
							if($selectedRide == "all"){
								
								$flight=getFlightsn( $selectedSource,$selectedDestination ,$selectedDate, "Flight");//
									
								
								if($flight!=$selectedDestination)
								{
								$destination2=getFlights2( $selectedSource, $selectedDate, "Flight");//Hyderabad--->Karachi
								
								If($destination2!=$selectedDestination){
								$Source2 = getFlights1( $selectedDestination, $selectedDate, "Flight",$destination2);}
								//Lahore--->sialkot
								
								 $end_date2=getFlights3( $destination2,$Source2, $selectedDate, "Flight");//Karachi---->Lahore
								}
								 echo $res3;
								 echo $res2;
								 echo $res1;
								 
								
							}
														
						}
						
					}
					


			function getFlightsn( $selectedSource,$selectedDestination ,$selectedDate, $selectedRide){
				$selectedRide = " AND Journey_type = '" . $selectedRide . "'";
						
						include("../includes/connect.php");
						$selectedRide='Flight';
						$sql = "SELECT Trans_id ,Source ,Destination, Journey_type,Start_Date, End_Date,Start_Time,End_Time, TIMESTAMPDIFF(minute, Start_Date_time , End_Date_time) as durTime 
							FROM transport_type 
							where source = '" . $selectedSource  . "' AND destination = '" . $selectedDestination  . "' AND Start_Date = '" . $selectedDate ."'AND Journey_type = '" . $selectedRide ."'";
							
						$result = mysqli_query($conn, $sql);
						
						//$end_date1;
						//$destination2;
						$flight;
						if (mysqli_num_rows($result) > 0) 
						{
								// output data of each row
							$i = 1;
							$min = 1000;
							$res;
							while($row = mysqli_fetch_assoc($result)) {
								if($min > $row['durTime']){
									$min = $row['durTime'];
									$res = $row;
								}
								//$i++;
							}
							echo $res['durTime'];
							$GLOBALS['res3'] =  "<tr class='active'> <td> " . $i . "  </td> <td> " . $res["Source"]. " </td> <td> " . $res["Destination"]. " </td><td> ". $res["Journey_type"]." </td> <td> ". $res["Start_Time"]." </td><td> ". $res["End_Time"]." </td><td> ". $res["Start_Date"]." </td><td> ". $res["End_Date"]." </td></tr> ";
								
							//	$destination2 =   $res["Destination"] ;
							$flight=$res["Destination"];
							return $flight;
							//	$end_date1 = $res["End_Date"];
							//	return array($destination2,$end_date1);
								
						} 
						else 
						{
							$GLOBALS['res3'] = "<tr><td> No flight Available </td></tr>";
						} 
						mysqli_close($conn);
						
					}
					








				//Hyderabad--->Karachi
					
				function getFlights2( $selectedSource, $selectedDate, $selectedRide){
						$selectedRide = " AND Journey_type = '" . $selectedRide . "'";
						
						include("../includes/connect.php");
						
						$sql = "SELECT Trans_id ,Source ,Destination, Journey_type,Start_Date, End_Date,Start_Time,End_Time, TIMESTAMPDIFF(minute, Start_Date_time , End_Date_time) as durTime 
							FROM transport_type 
							where source = '" . $selectedSource  . "' AND Start_Date = '" . $selectedDate ."'";
							
						$result = mysqli_query($conn, $sql);
						
						$end_date1;
						$destination2;
						if (mysqli_num_rows($result) > 0) 
						{
								// output data of each row
							$i = 1;
							$min = 1000;
							$res;
							while($row = mysqli_fetch_assoc($result)) {
								if($min > $row['durTime']){
									$min = $row['durTime'];
									$res = $row;
								}
								//$i++;
							}
							echo $res['durTime'];
							$GLOBALS['res3'] =  "<tr class='active'> <td> " . $i . "  </td> <td> " . $res["Source"]. " </td> <td> " . $res["Destination"]. " </td><td> ". $res["Journey_type"]." </td> <td> ". $res["Start_Time"]." </td><td> ". $res["End_Time"]." </td><td> ". $res["Start_Date"]." </td><td> ". $res["End_Date"]." </td></tr> ";
								
								$destination2 =   $res["Destination"] ;
								$end_date1 = $res["End_Date"];
								return array($destination2,$end_date1);
								
						} 
						else 
						{
							$GLOBALS['res3'] = "<tr><td> No flight Available </td></tr>";
						} 
						mysqli_close($conn);
						
					}
					
				
				//Karachi---->Lahore
				
					function getFlights3( $destination2,$Source2, $selectedDate, $selectedRide){
						$selectedRide = " AND Journey_type = '" . $selectedRide . "'";
						include("../includes/connect.php");
						
						$sql = "SELECT Trans_id ,Source ,Destination, Journey_type,Start_Date, End_Date,Start_Time,End_Time, TIMESTAMPDIFF(minute, Start_Date_time , End_Date_time) as durTime 
							FROM transport_type 
					where Source = '". $destination2[0]. "' And destination = '" . $Source2  . "' AND Start_Date = '" .$destination2[1] ."'";
							
						$result = mysqli_query($conn, $sql);
						
						$end_date2;
						if (mysqli_num_rows($result) > 0) 
						{
								// output data of each row
							$i = 2;
							$min = 1000;
							$res;
							while($row = mysqli_fetch_assoc($result)) {
								if($min > $row['durTime']){
									$min = $row['durTime'];
									$res = $row;
								}
							}
							echo $res['durTime'];
							$GLOBALS['res2'] =  "<tr class='active'> <td> " . $i . "  </td> <td> " . $res["Source"]. " </td> <td> " . $res["Destination"]. " </td><td> ". $res["Journey_type"]." </td> <td> ". $res["Start_Time"]." </td><td> ". $res["End_Time"]." </td><td> ". $res["Start_Date"]." </td><td> ". $res["End_Date"]." </td></tr> ";
							$end_date2 = $res["End_Date"];
								
							return $end_date2;
						} 

						else 
						{
							$GLOBALS['res2'] =  "<tr><td> No flight Available </td></tr>";
						} 
						mysqli_close($conn);
							
						//return $end_date;
					}
					
					
					//Lahore--->Sialkot
					
					function getFlights1( $selectedDestination, $selectedDate, $selectedRide,$destination2){
						$selectedRide = " AND Journey_type = '" . $selectedRide . "'";
						include("../includes/connect.php");
					
						$sql = "SELECT Trans_id ,Source ,Destination, Journey_type,Start_Date, End_Date,Start_Time,End_Time, TIMESTAMPDIFF(minute, Start_Date_time , End_Date_time) as durTime 
							FROM transport_type 
							where destination = '" . $selectedDestination  . "'";
							
						$result = mysqli_query($conn, $sql);
						
						
						$Source2;
						if (mysqli_num_rows($result) > 0) 
						{
								// output data of each row
							$i = 3;
							$min = 1000;
							$res;
							while($row = mysqli_fetch_assoc($result)) {
								if($min > $row['durTime']){
									$min = $row['durTime'];
									$res = $row;
								}
								//$i++;
							}
							echo $res['durTime'];
							$GLOBALS['res1'] =  "<tr class='active'> <td> " . $i . "  </td> <td> " . $res["Source"]. " </td> <td> " . $res["Destination"]. " </td><td> ". $res["Journey_type"]." </td> <td> ". $res["Start_Time"]." </td><td> ". $res["End_Time"]." </td><td> ". $res["Start_Date"]." </td><td> ". $res["End_Date"]." </td></tr> ";

								$Source2 =   $res["Source"] ;
								
							return $Source2;
						} 
						else {
							$GLOBALS['res1'] = "<tr><td> No flight Available </td></tr>";
						} 
						mysqli_close($conn);	
						
					}
					*/
				?>
				<!--end PHP code for combinations-->
				</tbody>
					
					
</table>
   
 </div>

</div>
 </section>
<!--Container End of combinations-->


<!--Container Start for direct -->
   <section  id="container-fluid">
 <!--form table..-->
  <div  id="container" class="contact">
  	<
   <div  class="fullwidth">
   	
   <table>
  <tr>
						<th>
							<font size="3"><strong>
							S.No &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
							</strong>
						</th>
						<th>
						<font size="3"><strong>
							Source &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						
						</strong>
						</th>
						<th>
						<font size="3"><strong>
							Destination &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							Ride Type &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							Start_Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							End_Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							Start_Date &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							End_Date &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

										</tr>					
					
					<tbody>
				<?php

					include("../includes/connect.php");
					if( isset($_POST['submit']) ){
						// Check connection
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}
						else{
							$selectedSource = $_POST['sourceCity'];
							$selectedDestination = $_POST['destinationCity'];
							$selectedDate = $_POST['journey'];
							$selectedRide = "";
							if(!empty($_POST['ride'])){
								$selectedRide = $_POST['ride'];
							}
							if($selectedRide == "all"){
								
								//$selectedRide = " AND Journey_type = '" . $selectedRide . "'";
								getFlights($selectedDestination, $selectedSource, $selectedDate, "Flight");
								getTrains($selectedDestination, $selectedSource, $selectedDate, "Train");
								getBus($selectedDestination, $selectedSource, $selectedDate, "Bus");
							}
							else{
								if(!empty($_POST['check_list'])){
								// Loop to store and display values of individual checked checkbox.
									foreach($_POST['check_list'] as $selected){
										if($selected == "Flight" ){
											getFlights($selectedDestination, $selectedSource, $selectedDate, "Flight");
										}
										else if($selected == "Train"){
											getTrains($selectedDestination, $selectedSource, $selectedDate, "Train");
										}
										else if($selected == "Bus" ){
											getBus($selectedDestination, $selectedSource, $selectedDate, "Bus");
										}
										//echo $selected."</br>";
									}
								}
							}
							
							
							
						}
						
					}
					
				?>

<!--Algorithm for Direct route -->

				<?php
					function getFlights($selectedDestination, $selectedSource, $selectedDate, $selectedRide){
						$selectedRide = " AND Journey_type = '" . $selectedRide . "'";
						include("../includes/connect.php");
						$sql = "SELECT Trans_id , Source, Destination, Journey_type,Start_Date, End_Date, Start_Time, End_Time FROM transport_type where destination = '" . $selectedDestination .  "' AND source = '" . $selectedSource .  "' AND Start_Date = '" . $selectedDate ."'" . $selectedRide ;
							
						$result = mysqli_query($conn, $sql);
								
						if (mysqli_num_rows($result) > 0) {
								// output data of each row
								$i = 1;
							while($row = mysqli_fetch_assoc($result)) {
								
								echo "<tr class='active'> <td> " . $i . " </td> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td><td> ". $row["Start_Date"]." </td><td> ". $row["End_Date"]." </td></tr> ";
								$i++;
							}
						} else {
							echo "<tr><td> No Direct flight Available </td></tr>";
						} 
						mysqli_close($conn);	
					}
					
					function getTrains($selectedDestination, $selectedSource, $selectedDate, $selectedRide){
						$selectedRide = " AND Journey_type = '" . $selectedRide . "'";
						include("../includes/connect.php");
						$sql = "SELECT Trans_id , Source, Destination, Journey_type,Start_Date, End_Date, Start_Time, End_Time FROM transport_type where destination = '" . $selectedDestination .  "' AND source = '" . $selectedSource .  "' AND Start_Date = '" . $selectedDate ."'" . $selectedRide ;
							
						$result = mysqli_query($conn, $sql);
								
						if (mysqli_num_rows($result) > 0) {
								// output data of each row
								$i = 1;
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr class='success'> <td> " . $i . " </td> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td><td> ". $row["Start_Date"]." </td><td> ". $row["End_Date"]." </td></tr> ";
								$i++;
							}
						} else {
							echo "<tr><td> No Direct Ride Available for train</td></tr>";
						} 
						mysqli_close($conn);	
					}
					
					function getBus($selectedDestination, $selectedSource, $selectedDate, $selectedRide){
						$selectedRide = " AND Journey_type = '" . $selectedRide . "'";
						include("../includes/connect.php");
						$sql = "SELECT Trans_id , Source, Destination, Journey_type ,Start_Date, End_Date, Start_Time, End_Time FROM transport_type where destination = '" . $selectedDestination .  "' AND source = '" . $selectedSource .  "' AND Start_Date = '" . $selectedDate ."'" . $selectedRide ;
							
						$result = mysqli_query($conn, $sql);
								
						if (mysqli_num_rows($result) > 0) {
								// output data of each row
								$i = 1;
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr class='warning'> <td> " . $i. " </td> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td><td> ". $row["Start_Date"]." </td><td> ". $row["End_Date"]." </td></tr> ";
								$i++;
							}
						} else {
							echo "<tr><td> No Direct Ride Available for bus</td></tr>";
						} 
						mysqli_close($conn);	
					}
				?>
					
				</tbody>
					
					
</table>
   
 </div>
<!--table end..-->

  
</div>





<div style="padding:0px; margin:0px; font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">


    <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <script src="js/jssor.slider-26.5.2.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 0,
              $SlideDuration: 5000,
              $SlideEasing: $Jease$.$Linear,
              $PauseOnHover: 4,
              $SlideWidth: 200,
              $Cols: 7,
              $Align: 0
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1100;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 2.0s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:-40px;width:1000px;height:200px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:120%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-10px;position:relative;top:100%;width:100px;height:100px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1100px;height:200px;overflow:hidden;">
        	<?php
        		include("../includes/connect.php");
        		$selectedDestination = $_POST['destinationCity'];
					$sql = "SELECT visiting FROM visiting_places where city = '" . $selectedDestination . "' ";
							
					$result = mysqli_query($conn, $sql);
								
						if (mysqli_num_rows($result) > 0) {
								// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								echo "<div> <img data-u='image' src='" . $row["visiting"]  . "' /> </div>";
								echo "<div><br> </div>";
							}
						} else {
							echo "No Image";
						} 
						mysqli_close($conn);	
        	?>
    </div>

    
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->
</div>
    <br>

 </section>
<!--Container End direct-->

<section>
	



</section>


<!--Footer Start-->
<footer>
	<div class="one-third">
    	<p>	</p>
    </div>
    <div class="one-third">
    	<p class="copy-right"> All Rights Reserved by CS@DSU</p>
    </div>
    <div class="one-third-last">
    	<ul>
        	<li><i class="fa fa-twitter"></i></li>
            <li><i class="fa fa-facebook"></i></li>
            <li><i class="fa fa-rss"></i></li>
            <li><i class="fa fa-youtube"></i></li>
            <li><i class="fa fa-linkedin"></i></li>
        </ul>
    </div>   
</footer>
<!--Footer End-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
