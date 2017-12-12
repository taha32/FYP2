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
<img id="full-screen-background-image" src="images/slidea.jpg" alt="img" />
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
//data coming from User end
							$selectedSource = $_POST['sourceCity'];
							$selectedDestination = $_POST['destinationCity'];
							$selectedDate = $_POST['journey'];
							$selectedRide = "";
  

	





							
//City name to Airportcode for sending with API for Source city
/*
						$sql = " SELECT Airport_code from city where City_Name = '$selectedSource ' " ;;
						$result = mysqli_query($conn, $sql);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result))
							    $sd= $row["Airport_code"];//sd(SourceDeparture) variabe is to save Airport code for API
							} 
							else
							{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}

//City name to Airportcode for sending with API for Destination city

						$sql1 = " SELECT Airport_code from city where City_Name = '$selectedDestination ' " ;;	
						$result1 = mysqli_query($conn, $sql1);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result1))
							    $da= $row["Airport_code"];//da(destinationArrival) variabe is to save Airport code for API
							} 
							else{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}


//outputx is used to save date which is coming from user end and then break it as per API reqiurement year save in yyyy month save in mm and day save in dd
							
							$outputx = $selectedDate;
							list($yyyy,$mm,$dd) = explode('-', $outputx);


//API CALL 
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_URL, 'https://api.flightstats.com/flex/schedules/rest/v1/json/from/'.$sd.'/to/'.$da.'/departing/'.$yyyy.'/'.$mm.'/'.$dd.'?appId=7977b71c&appKey=13c6ceae928050905a47b9917aa5f3d4');
						$result = curl_exec($ch);
						curl_close($ch);
						
						if(is_callable('curl_init'))
						{
						}
						else
						{
						   echo "Not enabled";
						}


//API JSON result save on file
						$myfile = fopen("newfileapps.json", "w") or die("Unable to open file!");
						fwrite($myfile, $result);
						fclose($myfile);
//deleting flights Records from database if any
						$query = " delete from trip_advisor where Journey_type = 'Flight' ";
						if(mysqli_query($conn, $query))
						{
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//Read Json data from file 
					$jsondata = file_get_contents("newfileapps.json");
					$json= json_decode($jsondata,true);
					
					$i=1;

//for each flight data / record from file 
					foreach ($json['scheduledFlights'] as $date1 ) 
					{
						
						$output  = $date1['carrierFsCode'];
						$output1  = $date1['flightNumber'];
						$output2  = $date1['departureAirportFsCode'];
						$output3  = $date1['arrivalAirportFsCode'];
						$output4  = $date1['departureTime'];
						$output5  = $date1['arrivalTime'];
	
//Airport code to cityname to save in DB for source
						$sql = " SELECT City_Name from city where Airport_code = '$output2' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $source_name= $row["City_Name"];
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}



//Airport code to cityname to save in DB for destination
						$sql = " SELECT City_Name from city where Airport_code = '$output3' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $destination_name= $row["City_Name"];
						} 
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//for flight no + carrier name
						$resultf = $output . $output1;


//for format start datetime  as per db requirement 
						list($number1, $number2) = explode('T', $output4);
						list($number3, $number4) = explode('.', $number2);
						$number5 = $number1 .' '. $number3;


//converting String to date
						$datefor1=date('d-m-Y H:i:s', strtotime($number5));


//for format end datetime as per db requirement 
						list($a, $b) = explode('T', $output5);
						list($c, $d) = explode('.', $b);
						$l = $a .' '. $c;

//converting String to date
						$datefor2=date('d-m-Y H:i:s', strtotime($l));

//finding duration of flight
						$to_time = strtotime($datefor2);
						$from_time = strtotime($datefor1);
						$finaldur=round(abs($to_time - $from_time) / 60,2);


						include("../includes/connect.php");
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						$i=$i+1;
//inserting data in db from file which we get from  live API
						$query = " INSERT INTO trip_advisor (route_id, Source, Destination, Seats, F_no, T_No, B_No, Start_Time, End_Time, Journey_type, Duration,Source_Zone,Destination_Zone) VALUES ('$i', '$source_name', '$destination_name', '1', '$resultf', NULL, NULL, '$number3', '$c', 'Flight','$finaldur','A','A')";
						 if(mysqli_query($conn, $query))
						 {
						 } 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


						}*/
//end of foreach


							
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

$sql = " SELECT Zone from city where City_Name = '$selectedSource' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $Source_Zone= $row["Zone"];
					//	echo $Source_Zone;
						} 
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}

//echo $sqlQueryx;

$sql1 = " SELECT Zone from city where City_Name = '$selectedDestination' " ;
						$result1 = mysqli_query($conn, $sql1);
						if(mysqli_query($conn, $sql1))
						{
						 	while($row = mysqli_fetch_assoc($result1))
						    $Destination_Zone= $row["Zone"];
						//echo $Destination_Zone;
						} 
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}
//for A zone to A zone 
	
	if($Source_Zone== 'A' && $Destination_Zone == 'A')
	{


		echo "<h2>Shortest Time To Reach Your Destination :) </h2><table><tr><th><font size='3'><strong>Source &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Destination &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Ride Type &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Ride No. &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Departure Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Arrival Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th></tr><tbody>";
//City name to Airportcode for sending with API for Source city

						$sql = " SELECT Airport_code from city where City_Name = '$selectedSource ' " ;;
						$result = mysqli_query($conn, $sql);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result))
							    $sd= $row["Airport_code"];//sd(SourceDeparture) variabe is to save Airport code for API
							} 
							else
							{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}

//City name to Airportcode for sending with API for Destination city

						$sql1 = " SELECT Airport_code from city where City_Name = '$selectedDestination ' " ;;	
						$result1 = mysqli_query($conn, $sql1);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result1))
							    $da= $row["Airport_code"];//da(destinationArrival) variabe is to save Airport code for API
							} 
							else{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}


//outputx is used to save date which is coming from user end and then break it as per API reqiurement year save in yyyy month save in mm and day save in dd
							
							$outputx = $selectedDate;
							list($yyyy,$mm,$dd) = explode('-', $outputx);


//API CALL 
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_URL, 'https://api.flightstats.com/flex/schedules/rest/v1/json/from/'.$sd.'/to/'.$da.'/departing/'.$yyyy.'/'.$mm.'/'.$dd.'?appId=7977b71c&appKey=13c6ceae928050905a47b9917aa5f3d4');
						$result = curl_exec($ch);
						curl_close($ch);
						
						if(is_callable('curl_init'))
						{
						}
						else
						{
						   echo "Not enabled";
						}


//API JSON result save on file
						$myfile = fopen("newfileapps.json", "w") or die("Unable to open file!");
						fwrite($myfile, $result);
						fclose($myfile);
//deleting flights Records from database if any
						$query = " delete from trip_advisor where Journey_type = 'Flight' ";
						if(mysqli_query($conn, $query))
						{
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//Read Json data from file 
					$jsondata = file_get_contents("newfileapps.json");
					$json= json_decode($jsondata,true);
					
					$i=1;

//for each flight data / record from file 
					foreach ($json['scheduledFlights'] as $date1 ) 
					{
						
						$output  = $date1['carrierFsCode'];
						$output1  = $date1['flightNumber'];
						$output2  = $date1['departureAirportFsCode'];
						$output3  = $date1['arrivalAirportFsCode'];
						$output4  = $date1['departureTime'];
						$output5  = $date1['arrivalTime'];
	
//Airport code to cityname to save in DB for source
						$sql = " SELECT City_Name from city where Airport_code = '$output2' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $source_name= $row["City_Name"];
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}



//Airport code to cityname to save in DB for destination
						$sql = " SELECT City_Name from city where Airport_code = '$output3' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $destination_name= $row["City_Name"];
						} 
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//for flight no + carrier name
						$resultf = $output . $output1;


//for format start datetime  as per db requirement 
						list($number1, $number2) = explode('T', $output4);
						list($number3, $number4) = explode('.', $number2);
						$number5 = $number1 .' '. $number3;


//converting String to date
						$datefor1=date('d-m-Y H:i:s', strtotime($number5));


//for format end datetime as per db requirement 
						list($a, $b) = explode('T', $output5);
						list($c, $d) = explode('.', $b);
						$l = $a .' '. $c;

//converting String to date
						$datefor2=date('d-m-Y H:i:s', strtotime($l));

//finding duration of flight
						$to_time = strtotime($datefor2);
						$from_time = strtotime($datefor1);
						$finaldur=round(abs($to_time - $from_time) / 60,2);


						include("../includes/connect.php");
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						$i=$i+1;
//inserting data in db from file which we get from  live API
						$query = " INSERT INTO trip_advisor (route_id, Source, Destination, Seats, F_no, T_No, B_No, Start_Time, End_Time, Journey_type, Duration,Source_Zone,Destination_Zone) VALUES ('$i', '$source_name', '$destination_name', '1', '$resultf', NULL, NULL, '$number3', '$c', 'Flight','$finaldur','A','A')";
						 if(mysqli_query($conn, $query))
						 {
						 } 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


						}
//end of foreach


						$queryAA = " SELECT Source,Destination,Start_Time,End_Time,F_no,Journey_type from trip_advisor where Duration = (select Min(Duration) from trip_advisor where Source= '$selectedSource' And Destination = '$selectedDestination') And Source='$selectedSource' And Destination = '$selectedDestination' " ;	


						$result1 = mysqli_query($conn, $queryAA);


						if(mysqli_num_rows($result1) > 0)
						{
							while($row = mysqli_fetch_assoc($result1))
							{
								echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["F_no"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";
							}		
						}
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}
						
	}
	elseif($Source_Zone== 'B' && $Destination_Zone== 'B')
	{


		echo "<h2>Shortest Time To Reach Your Destination :) </h2><table><tr><th><font size='3'><strong>Source &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Destination &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Ride Type &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Ride No. &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Departure Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Arrival Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th></tr><tbody>";
		//hyd-->gujranwala

		//hyd--->khi
						$queryBA1 = " SELECT Source,Destination,Start_Time,End_Time,T_no,Journey_type,duration from trip_advisor where Duration = (select Min(Duration) from trip_advisor where Source= '$selectedSource' And Destination_Zone = 'A') And Source='$selectedSource' And Destination_Zone = 'A' " ;	


						$resultBA1 = mysqli_query($conn, $queryBA1);
						if(mysqli_num_rows($resultBA1) > 0)
						{
							while($row = mysqli_fetch_assoc($resultBA1))
							{
								$Source2= $row["Destination"];
								$timeend1=$row["End_Time"];
								$timeadd='02:00:00';

								$dirct_durationBA = $row["duration"];
								$secs = strtotime($timeadd)-strtotime("00:00:00");
								$time2 = date("H:i:s",strtotime($timeend1)+$secs);
							}		
						}
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}




//lhe-->gujranwala
						$queryAB1 = " SELECT Source,Destination,Start_Time,End_Time,B_no,Journey_type,duration from trip_advisor where Duration = (select Min(Duration) from trip_advisor where Destination= '$selectedDestination' And Source_Zone = 'A') And Destination='$selectedDestination' And Source_Zone = 'A' " ;	


						$resultAB1 = mysqli_query($conn, $queryAB1);
						if(mysqli_num_rows($resultAB1) > 0)
						{
							while($row = mysqli_fetch_assoc($resultAB1))
							{
								$Destination2= $row["Source"];
								$dirct_durationAB = $row["duration"];
							}		
						}
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}

						

						$sql = " SELECT Airport_code from city where City_Name = '$Source2'";
						$result = mysqli_query($conn, $sql);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result))
							    $sd= $row["Airport_code"];//sd(SourceDeparture) variabe is to save Airport code for API
							} 
							else
							{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}


//City name to Airportcode for sending with API for Destination city

						$sql1 = " SELECT Airport_code from city where City_Name = '$Destination2 ' " ;;	
						$result1 = mysqli_query($conn, $sql1);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result1))
							    $da= $row["Airport_code"];//da(destinationArrival) variabe is to save Airport code for API
							} 
							else{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}


//outputx is used to save date which is coming from user end and then break it as per API reqiurement year save in yyyy month save in mm and day save in dd
							
							$outputx = $selectedDate;
							list($yyyy,$mm,$dd) = explode('-', $outputx);


//API CALL 
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_URL, 'https://api.flightstats.com/flex/schedules/rest/v1/json/from/'.$sd.'/to/'.$da.'/departing/'.$yyyy.'/'.$mm.'/'.$dd.'?appId=7977b71c&appKey=13c6ceae928050905a47b9917aa5f3d4');
						$result = curl_exec($ch);
						curl_close($ch);
						
						if(is_callable('curl_init'))
						{
						}
						else
						{
						   echo "Not enabled";
						}


//API JSON result save on file
						$myfile = fopen("newfileapps.json", "w") or die("Unable to open file!");
						fwrite($myfile, $result);
						fclose($myfile);
//deleting flights Records from database if any
						$query = " delete from trip_advisor where Journey_type = 'Flight' ";
						if(mysqli_query($conn, $query))
						{
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//Read Json data from file 
					$jsondata = file_get_contents("newfileapps.json");
					$json= json_decode($jsondata,true);
					
					$i=1;

//for each flight data / record from file 
					foreach ($json['scheduledFlights'] as $date1 ) 
					{
						
						$output  = $date1['carrierFsCode'];
						$output1  = $date1['flightNumber'];
						$output2  = $date1['departureAirportFsCode'];
						$output3  = $date1['arrivalAirportFsCode'];
						$output4  = $date1['departureTime'];
						$output5  = $date1['arrivalTime'];
	
//Airport code to cityname to save in DB for source
						$sql = " SELECT City_Name from city where Airport_code = '$output2' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $source_name= $row["City_Name"];
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}



//Airport code to cityname to save in DB for destination
						$sql = " SELECT City_Name from city where Airport_code = '$output3' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $destination_name= $row["City_Name"];
						} 
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//for flight no + carrier name
						$resultf = $output . $output1;


//for format start datetime  as per db requirement 
						list($number1, $number2) = explode('T', $output4);
						list($number3, $number4) = explode('.', $number2);
						$number5 = $number1 .' '. $number3;


//converting String to date
						$datefor1=date('d-m-Y H:i:s', strtotime($number5));


//for format end datetime as per db requirement 
						list($a, $b) = explode('T', $output5);
						list($c, $d) = explode('.', $b);
						$l = $a .' '. $c;

//converting String to date
						$datefor2=date('d-m-Y H:i:s', strtotime($l));

//finding duration of flight
						$to_time = strtotime($datefor2);
						$from_time = strtotime($datefor1);
						$finaldur=round(abs($to_time - $from_time) / 60,2);


						include("../includes/connect.php");
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						$i=$i+1;
//inserting data in db from file which we get from  live API
						$query = " INSERT INTO trip_advisor (route_id, Source, Destination, Seats, F_no, T_No, B_No, Start_Time, End_Time, Journey_type, Duration,Source_Zone,Destination_Zone) VALUES ('$i', '$source_name', '$destination_name', '1', '$resultf', NULL, NULL, '$number3', '$c', 'Flight','$finaldur','A','A')";
						 if(mysqli_query($conn, $query))
						 {
						 } 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


						}
//end of foreach

						$queryAA = " SELECT Source,Destination,Start_Time,End_Time,F_no,Journey_type,duration from trip_advisor where Journey_type = 'Flight' And Source='$Source2' And Destination = '$Destination2'And Start_Time > '$time2'" ;	


						$resultAA = mysqli_query($conn, $queryAA);
							if(mysqli_num_rows($resultAA) > 0)
							{
								while($row = mysqli_fetch_assoc($resultAA))
								{								
									$dirct_durationAA = $row["duration"];
								}		
							}
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}

//direct B TO B
						$queryBB = " SELECT Source,Destination,Start_Time,End_Time,B_no,Journey_type,duration from trip_advisor where Duration = (select Min(Duration) from trip_advisor where Destination= '$selectedDestination' And Source = '$selectedSource') And Destination='$selectedDestination' And Source = '$selectedSource' " ;	


						$resultBB = mysqli_query($conn, $queryBB);
						if(mysqli_num_rows($resultBB) > 0)
						{
							while($row = mysqli_fetch_assoc($resultBB))
							{
								$direct_duration = $row["duration"];
							}		
						}
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}

//camparing the duration of BA+AB+AA and BB
 $total_duration = $dirct_durationBA + $dirct_durationAB + $dirct_durationAA ;

						if($total_duration > $direct_duration)
						{
							$resultBB = mysqli_query($conn, $queryBB);
							if(mysqli_num_rows($resultBB) > 0)
							{
								while($row = mysqli_fetch_assoc($resultBB))
								{
									echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["T_no"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";
								}		
							}
							else
							{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}


						}
						elseif($Source2==$Destination2)
						{
							$resultBB = mysqli_query($conn, $queryBB);
							if(mysqli_num_rows($resultBB) > 0)
							{
								while($row = mysqli_fetch_assoc($resultBB))
								{
									echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["T_no"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";
								}		
							}
							else
							{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}
						}
						else
						{
							$resultBA1 = mysqli_query($conn, $queryBA1);
							if(mysqli_num_rows($resultBA1) > 0)
							{
								while($row = mysqli_fetch_assoc($resultBA1))
								{
									echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["T_no"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";
								}		
							}
							else
							{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}
	
							$resultAA = mysqli_query($conn, $queryAA);
							if(mysqli_num_rows($resultAA) > 0)
							{
								while($row = mysqli_fetch_assoc($resultAA))
								{
									echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["F_no"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";			
								}		
							}
							else
							{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}

							$resultAB1 = mysqli_query($conn, $queryAB1);
							if(mysqli_num_rows($resultAB1) > 0)
							{
								while($row = mysqli_fetch_assoc($resultAB1))
								{
									echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["B_no"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";
								}		
							}
							else
							{
								    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}
							
						}
	}
	
	elseif($Source_Zone == 'B' && $Destination_Zone == 'A')
	{
		echo "<h2>Shortest Time To Reach Your Destination :) </h2><table><tr><th><font size='3'><strong>Source &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Destination &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Ride Type &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Ride No. &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Departure Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Arrival Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th></tr><tbody>";


						$queryBA1 = " SELECT Source,Destination,Start_Time,End_Time,T_no,Journey_type from trip_advisor where Duration = (select Min(Duration) from trip_advisor where Source= '$selectedSource' And Destination_Zone = 'A') And Source='$selectedSource' And Destination_Zone = 'A' " ;	


						$resultBA1 = mysqli_query($conn, $queryBA1);
						if(mysqli_num_rows($resultBA1) > 0)
						{
							while($row = mysqli_fetch_assoc($resultBA1))
							{
								echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["T_no"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";
								$Source2= $row["Destination"];
								echo $Source2;
								$timeend1=$row["End_Time"];
								$timeadd='02:00:00';


								$secs = strtotime($timeadd)-strtotime("00:00:00");
								$time2 = date("H:i:s",strtotime($timeend1)+$secs);
								//echo $result;
							}		
						}
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}




//City name to Airportcode for sending with API for Source2 city

						$sql = " SELECT Airport_code from city where City_Name = '$Source2'";
						$result = mysqli_query($conn, $sql);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result))
							    $sd= $row["Airport_code"];//sd(SourceDeparture) variabe is to save Airport code for API
							} 
							else
							{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}

//City name to Airportcode for sending with API for Destination city

						$sql1 = " SELECT Airport_code from city where City_Name = '$selectedDestination ' " ;;	
						$result1 = mysqli_query($conn, $sql1);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result1))
							    $da= $row["Airport_code"];//da(destinationArrival) variabe is to save Airport code for API
							} 
							else{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}


//outputx is used to save date which is coming from user end and then break it as per API reqiurement year save in yyyy month save in mm and day save in dd
							
							$outputx = $selectedDate;
							list($yyyy,$mm,$dd) = explode('-', $outputx);


//API CALL 
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_URL, 'https://api.flightstats.com/flex/schedules/rest/v1/json/from/'.$sd.'/to/'.$da.'/departing/'.$yyyy.'/'.$mm.'/'.$dd.'?appId=7977b71c&appKey=13c6ceae928050905a47b9917aa5f3d4');
						$result = curl_exec($ch);
						curl_close($ch);
						
						if(is_callable('curl_init'))
						{
						}
						else
						{
						   echo "Not enabled";
						}


//API JSON result save on file
						$myfile = fopen("newfileapps.json", "w") or die("Unable to open file!");
						fwrite($myfile, $result);
						fclose($myfile);
//deleting flights Records from database if any
						$query = " delete from trip_advisor where Journey_type = 'Flight' ";
						if(mysqli_query($conn, $query))
						{
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//Read Json data from file 
					$jsondata = file_get_contents("newfileapps.json");
					$json= json_decode($jsondata,true);
					
					$i=1;

//for each flight data / record from file 
					foreach ($json['scheduledFlights'] as $date1 ) 
					{
						
						$output  = $date1['carrierFsCode'];
						$output1  = $date1['flightNumber'];
						$output2  = $date1['departureAirportFsCode'];
						$output3  = $date1['arrivalAirportFsCode'];
						$output4  = $date1['departureTime'];
						$output5  = $date1['arrivalTime'];
	
//Airport code to cityname to save in DB for source
						$sql = " SELECT City_Name from city where Airport_code = '$output2' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $source_name= $row["City_Name"];
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}



//Airport code to cityname to save in DB for destination
						$sql = " SELECT City_Name from city where Airport_code = '$output3' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $destination_name= $row["City_Name"];
						} 
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//for flight no + carrier name
						$resultf = $output . $output1;


//for format start datetime  as per db requirement 
						list($number1, $number2) = explode('T', $output4);
						list($number3, $number4) = explode('.', $number2);
						$number5 = $number1 .' '. $number3;


//converting String to date
						$datefor1=date('d-m-Y H:i:s', strtotime($number5));


//for format end datetime as per db requirement 
						list($a, $b) = explode('T', $output5);
						list($c, $d) = explode('.', $b);
						$l = $a .' '. $c;

//converting String to date
						$datefor2=date('d-m-Y H:i:s', strtotime($l));

//finding duration of flight
						$to_time = strtotime($datefor2);
						$from_time = strtotime($datefor1);
						$finaldur=round(abs($to_time - $from_time) / 60,2);


						include("../includes/connect.php");
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						$i=$i+1;
//inserting data in db from file which we get from  live API
						$query = " INSERT INTO trip_advisor (route_id, Source, Destination, Seats, F_no, T_No, B_No, Start_Time, End_Time, Journey_type, Duration,Source_Zone,Destination_Zone) VALUES ('$i', '$source_name', '$destination_name', '1', '$resultf', NULL, NULL, '$number3', '$c', 'Flight','$finaldur','A','A')";
						 if(mysqli_query($conn, $query))
						 {
						 } 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


						}
//end of foreach


						$queryBA2 = " SELECT Source,Destination,Start_Time,End_Time,F_no,Journey_type,duration from trip_advisor where Duration = (select Min(Duration) from trip_advisor where Source= '$Source2' And Destination = '$selectedDestination' And Start_Time > '$time2' ) And Source='$Source2' And Destination = '$selectedDestination'And Start_Time > '$time2';
						" ;	


						$resultBA2 = mysqli_query($conn, $queryBA2);
							if(mysqli_num_rows($resultBA2) > 0)
							{
								while($row = mysqli_fetch_assoc($resultBA2))
								{
									echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["F_no"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";
								}		
							}
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}

	}

	elseif($Source_Zone == 'A' && $Destination_Zone == 'B')
	{


			echo "<div id='map'></div><div id='right-panel'><div><b>Start:</b><select id='start'><option value='Halifax, NS'>Halifax, NS</option><option value='Boston, MA'>Boston, MA</option><option value='New York, NY'>New York, NY</option><option value='Miami, FL'>Miami, FL</option></select><br><b>Waypoints:</b><br><i>(Ctrl+Click or Cmd+Click for multiple selection)</i> <br><select multiple id='waypoints'><option value='montreal, quebec'>Montreal, QBC</option><option value='toronto, ont'>Toronto, ONT</option><option value='chicago, il'>Chicago</option><option value='winnipeg, mb'>Winnipeg</option><option value='fargo, nd'>Fargo</option><option value='calgary, ab'>Calgary</option><option value='spokane, wa'>Spokane</option></select><br><b>End:</b><select id='end'><option value='Vancouver, BC'>Vancouver, BC</option><option value='Seattle, WA'>Seattle, WA</option><option value='San Francisco, CA'>San Francisco, CA</option><option value='Los Angeles, CA'>Los Angeles, CA</option></select><br><input type='submit' id='submit'></div><div id='directions-panel'></div></div>";
echo "<script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCJAjZdEl00fXr35YLn1-8DmIJ39eCtfCI&callback=initMap'></script>";


		echo "<h2>Shortest Time To Reach Your Destination :) </h2><table><tr><th><font size='3'><strong>Source &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Destination &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Ride Type &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Ride No. &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Departure Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th><th><font size='3'><strong>Arrival Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</strong></th></tr><tbody>";







						$queryAB1 = " SELECT Source,Destination,Start_Time,End_Time,B_no,Journey_type from trip_advisor where Duration = (select Min(Duration) from trip_advisor where Destination= '$selectedDestination' And Source_Zone = 'A') And Destination='$selectedDestination' And Source_Zone = 'A' " ;	


						$resultAB1 = mysqli_query($conn, $queryAB1);
						if(mysqli_num_rows($resultAB1) > 0)
						{
							while($row = mysqli_fetch_assoc($resultAB1))
							{

								$Destination2= $row["Source"];
								$timeend1=$row["End_Time"];
								$timeadd='02:00:00';


								$secs = strtotime($timeadd)-strtotime("00:00:00");
								$time2 = date("H:i:s",strtotime($timeend1)+$secs);
							}		
						}
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}




//City name to Airportcode for sending with API for Source2 city

						$sql = " SELECT Airport_code from city where City_Name = '$selectedSource'";
						$result = mysqli_query($conn, $sql);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result))
							    $sd= $row["Airport_code"];//sd(SourceDeparture) variabe is to save Airport code for API
							} 
							else
							{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}

//City name to Airportcode for sending with API for Destination city

						$sql1 = " SELECT Airport_code from city where City_Name = '$Destination2' " ;
						$result1 = mysqli_query($conn, $sql1);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result1))
							    $da= $row["Airport_code"];//da(destinationArrival) variabe is to save Airport code for API
							} 
							else{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}


//outputx is used to save date which is coming from user end and then break it as per API reqiurement year save in yyyy month save in mm and day save in dd
							
							$outputx = $selectedDate;
							list($yyyy,$mm,$dd) = explode('-', $outputx);


//API CALL 
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_URL, 'https://api.flightstats.com/flex/schedules/rest/v1/json/from/'.$sd.'/to/'.$da.'/departing/'.$yyyy.'/'.$mm.'/'.$dd.'?appId=7977b71c&appKey=13c6ceae928050905a47b9917aa5f3d4');
						$result = curl_exec($ch);
						curl_close($ch);
						
						if(is_callable('curl_init'))
						{
						}
						else
						{
						   echo "Not enabled";
						}


//API JSON result save on file
						$myfile = fopen("newfileapps.json", "w") or die("Unable to open file!");
						fwrite($myfile, $result);
						fclose($myfile);
//deleting flights Records from database if any
						$query = " delete from trip_advisor where Journey_type = 'Flight' ";
						if(mysqli_query($conn, $query))
						{
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//Read Json data from file 
					$jsondata = file_get_contents("newfileapps.json");
					$json= json_decode($jsondata,true);
					
					$i=1;

//for each flight data / record from file 
					foreach ($json['scheduledFlights'] as $date1 ) 
					{
						
						$output  = $date1['carrierFsCode'];
						$output1  = $date1['flightNumber'];
						$output2  = $date1['departureAirportFsCode'];
						$output3  = $date1['arrivalAirportFsCode'];
						$output4  = $date1['departureTime'];
						$output5  = $date1['arrivalTime'];
	
//Airport code to cityname to save in DB for source
						$sql = " SELECT City_Name from city where Airport_code = '$output2' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $source_name= $row["City_Name"];
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}



//Airport code to cityname to save in DB for destination
						$sql = " SELECT City_Name from city where Airport_code = '$output3' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $destination_name= $row["City_Name"];
						} 
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//for flight no + carrier name
						$resultf = $output . $output1;


//for format start datetime  as per db requirement 
						list($number1, $number2) = explode('T', $output4);
						list($number3, $number4) = explode('.', $number2);
						$number5 = $number1 .' '. $number3;


//converting String to date
						$datefor1=date('d-m-Y H:i:s', strtotime($number5));


//for format end datetime as per db requirement 
						list($a, $b) = explode('T', $output5);
						list($c, $d) = explode('.', $b);
						$l = $a .' '. $c;

//converting String to date
						$datefor2=date('d-m-Y H:i:s', strtotime($l));

//finding duration of flight
						$to_time = strtotime($datefor2);
						$from_time = strtotime($datefor1);
						$finaldur=round(abs($to_time - $from_time) / 60,2);


						include("../includes/connect.php");
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						$i=$i+1;
//inserting data in db from file which we get from  live API
						$query = " INSERT INTO trip_advisor (route_id, Source, Destination, Seats, F_no, T_No, B_No, Start_Time, End_Time, Journey_type, Duration,Source_Zone,Destination_Zone) VALUES ('$i', '$source_name', '$destination_name', '1', '$resultf', NULL, NULL, '$number3', '$c', 'Flight','$finaldur','A','A')";
						 if(mysqli_query($conn, $query))
						 {
						 } 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


						}
//end of foreach


						$queryAB2 = " SELECT Source,Destination,Start_Time,End_Time,F_no,Journey_type,duration from trip_advisor where Duration = (select Min(Duration) from trip_advisor where Source= '$selectedSource' And Destination = '$Destination2') And Source='$selectedSource' And Destination = '$Destination2'";	


						$resultAB2 = mysqli_query($conn, $queryAB2);
							if(mysqli_num_rows($resultAB2) > 0)
							{
								while($row1 = mysqli_fetch_assoc($resultAB2))
								{
									echo "<tr class='active'><td> " . $row1["Source"]. " </td> <td> " . $row1["Destination"]. " </td><td> ". $row1["Journey_type"]."</td><td> ". $row1["F_no"]." </td> <td> ". $row1["Start_Time"]." </td><td> ". $row1["End_Time"]." </td></tr> ";
								}		
							}
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}

						$resultAB1 = mysqli_query($conn, $queryAB1);
						if(mysqli_num_rows($resultAB1) > 0)
						{
							while($row = mysqli_fetch_assoc($resultAB1))
							{
								echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["B_no"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";

							}		
						}
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}

	}
	
}

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
  	<h2>Direct Ride </h2>
   <div  class="fullwidth">
   	
   <table>
  <tr>
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
							Ride Number &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							Departure Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						<th>
						<font size="3"><strong>
							Arrival Time &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
						</strong>

						</th>
						
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
						


						$sql = " SELECT Airport_code from city where City_Name = '$selectedSource ' " ;
						$result = mysqli_query($conn, $sql);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result))
							    $sd= $row["Airport_code"];//sd(SourceDeparture) variabe is to save Airport code for API
							} 
							else
							{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}

//City name to Airportcode for sending with API for Destination city

						$sql1 = " SELECT Airport_code from city where City_Name = '$selectedDestination ' " ;;	
						$result1 = mysqli_query($conn, $sql1);
							if(mysqli_query($conn, $sql))
							 {
							 	while($row = mysqli_fetch_assoc($result1))
							    $da= $row["Airport_code"];//da(destinationArrival) variabe is to save Airport code for API
							} 
							else{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
							}


//outputx is used to save date which is coming from user end and then break it as per API reqiurement year save in yyyy month save in mm and day save in dd
							
							$outputx = $selectedDate;
							list($yyyy,$mm,$dd) = explode('-', $outputx);


//API CALL 
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_URL, 'https://api.flightstats.com/flex/schedules/rest/v1/json/from/'.$sd.'/to/'.$da.'/departing/'.$yyyy.'/'.$mm.'/'.$dd.'?appId=7977b71c&appKey=13c6ceae928050905a47b9917aa5f3d4');
						$result = curl_exec($ch);
						curl_close($ch);
						
						if(is_callable('curl_init'))
						{
						}
						else
						{
						   echo "Not enabled";
						}


//API JSON result save on file
						$myfile = fopen("newfileapps.json", "w") or die("Unable to open file!");
						fwrite($myfile, $result);
						fclose($myfile);
//deleting flights Records from database if any
						$query = " delete from trip_advisor where Journey_type = 'Flight' ";
						if(mysqli_query($conn, $query))
						{
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//Read Json data from file 
					$jsondata = file_get_contents("newfileapps.json");
					$json= json_decode($jsondata,true);
					
					$i=1;

//for each flight data / record from file 
					foreach ($json['scheduledFlights'] as $date1 ) 
					{
						
						$output  = $date1['carrierFsCode'];
						$output1  = $date1['flightNumber'];
						$output2  = $date1['departureAirportFsCode'];
						$output3  = $date1['arrivalAirportFsCode'];
						$output4  = $date1['departureTime'];
						$output5  = $date1['arrivalTime'];
	
//Airport code to cityname to save in DB for source
						$sql = " SELECT City_Name from city where Airport_code = '$output2' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $source_name= $row["City_Name"];
						} 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}



//Airport code to cityname to save in DB for destination
						$sql = " SELECT City_Name from city where Airport_code = '$output3' " ;
						$result = mysqli_query($conn, $sql);
						if(mysqli_query($conn, $sql))
						{
						 	while($row = mysqli_fetch_assoc($result))
						    $destination_name= $row["City_Name"];
						} 
						else
						{
							    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


//for flight no + carrier name
						$resultf = $output . $output1;


//for format start datetime  as per db requirement 
						list($number1, $number2) = explode('T', $output4);
						list($number3, $number4) = explode('.', $number2);
						$number5 = $number1 .' '. $number3;


//converting String to date
						$datefor1=date('d-m-Y H:i:s', strtotime($number5));


//for format end datetime as per db requirement 
						list($a, $b) = explode('T', $output5);
						list($c, $d) = explode('.', $b);
						$l = $a .' '. $c;

//converting String to date
						$datefor2=date('d-m-Y H:i:s', strtotime($l));

//finding duration of flight
						$to_time = strtotime($datefor2);
						$from_time = strtotime($datefor1);
						$finaldur=round(abs($to_time - $from_time) / 60,2);


						include("../includes/connect.php");
						if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
						}

						$i=$i+1;
//inserting data in db from file which we get from  live API
						$query = " INSERT INTO trip_advisor (route_id, Source, Destination, Seats, F_no, T_No, B_No, Start_Time, End_Time, Journey_type, Duration,Source_Zone,Destination_Zone) VALUES ('$i', '$source_name', '$destination_name', '1', '$resultf', NULL, NULL, '$number3', '$c', 'Flight','$finaldur','A','A')";
						 if(mysqli_query($conn, $query))
						 {
						 } 
						else
						{
						    echo "ERROR: Could not able to execute sql. " . mysqli_error($conn);
						}


						}
//end of foreach


						$sql = " SELECT  Source, Destination, Journey_type,F_No ,Start_Time, End_Time FROM trip_advisor where destination = '" . $selectedDestination .  "' AND source = '" . $selectedSource .  "'". $selectedRide;
							
						$result = mysqli_query($conn, $sql);
						

						if(mysqli_num_rows($result) > 0)
						{
							while($row = mysqli_fetch_assoc($result))
							{
								echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["F_No"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";
							}		
						}
						 else {
							echo "<tr><td><td><td><td><td> No Direct flight Available </td></tr>";
						}
						mysqli_close($conn);

}


/*
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
					}*/
					
					function getTrains($selectedDestination, $selectedSource, $selectedDate, $selectedRide){
						$selectedRide = " AND Journey_type = '" . $selectedRide . "'";
						include("../includes/connect.php");
						$sql = " SELECT  Source, Destination, Journey_type,T_No ,Start_Time, End_Time FROM trip_advisor where destination = '" . $selectedDestination .  "' AND source = '" . $selectedSource .  "'". $selectedRide;
							
						$result = mysqli_query($conn, $sql);
								
						if (mysqli_num_rows($result) > 0) {
								// output data of each row
							//	$i = 1;
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["T_No"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";
							//	$i++;
							}
						} else {
							echo "<tr><td> No Direct Ride Available for train</td></tr>";
						} 
						mysqli_close($conn);	
					}
					
					function getBus($selectedDestination, $selectedSource, $selectedDate, $selectedRide){
						$selectedRide = " AND Journey_type = '" . $selectedRide . "'";
						include("../includes/connect.php");
						$sql = " SELECT  Source, Destination, Journey_type,B_No ,Start_Time, End_Time FROM trip_advisor where destination = '" . $selectedDestination .  "' AND source = '" . $selectedSource .  "'". $selectedRide;

						$result = mysqli_query($conn, $sql);
								
						if (mysqli_num_rows($result) > 0) {
								// output data of each row
								$i = 1;
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr class='active'> <td> " . $row["Source"]. " </td> <td> " . $row["Destination"]. " </td><td> ". $row["Journey_type"]."</td><td> ". $row["B_No"]." </td> <td> ". $row["Start_Time"]." </td><td> ". $row["End_Time"]." </td></tr> ";
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






<section>
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
        <div data-u="loading" class="jssorl-009-spin" style="position:;top:0px;left:0px;width:100%;height:120%;text-align:center;background-color:rgba(0,0,0,0.7);">
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

 </div>
<!--Container End direct-->

<br />
<br />
<br />

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
<script type="text/javascript" src="js/map.js"></script>

</body>
</html>
