<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv=content-type content="text/html; charset=UTF-8">
<meta content="text/html; charset=utf-8" http-equiv=Content-Type>



<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<title>Let's Travel</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"  />
<link rel="stylesheet" type="text/css" href="css/layout.css"  />
<link rel="stylesheet" type="text/css" href="css/supersized.css"  />
<link rel="stylesheet" type="text/css" href="css/supersized.shutter.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css"  />
<link rel="stylesheet" type="text/css" href="css/signup.css"  />
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"  />
<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Leckerli+One'  />	
<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Viga' />
<link rel="stylesheet" type="text/css" href="style.css"  />
<link rel="stylesheet" type="text/css" href="css/responsive.css"  />
</head>
<body>

<!--Control Bar Start-->
<div id="controls-wrapper" class="load-item">
<div id="controls">			
    <ul id="slide-list"></ul>			
</div>
</div>
<!--Control Bar End-->

<!--Logo Start-->
<section id="logo">
	<a href="home.php"><h1>Let's Travel</h1></a>
    <h4>Make memories</h4>
</section>
<!--Logo End-->

<!--Menu Start-->
<nav class="menu nav_wrapper" id="myslidemenu">
    <ul class="menu" id="jqueryslidemenu">
        <li class="current"><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="aboutus.php">About Us</a>
<!--<ul class="sub-menu">
				<li><a href="cpt.html">Team</a></li>
            	<li><a href="cpt.html">Mission</a></li>
                <li><a href="tabularfoodmenu.html">Vission</a></li>
            </ul>
    -->
    </li>
        <li><a href="contact.php"><i class="fa fa-phone-square"></i>Contact</a></li>
		<li><a href="signin.php">Account</a>
        	<ul class="sub-menu">
				<li><a href="signin.php">Sign in</a></li>
            	<li><a href="signup.php">sign up</a></li>
            </ul>
        </li>














		<li><a href="../urdu/home.php"><i class="fa fa-home"></i>اردو</a></li>
    </ul>
</nav>
<!--Menu End-->






























<!--Intro Text Start-->
<section class="intro-text">
	<h2>We Offer you The </h2>
    <h1>Best travelling plan</h1>
</section>
<!--Intro Text End-->

<!--Container Start-->
<section id="container"> 
<div class="boxed">
  

<!--Drop Cap Start-->
<div class="dropcap">
	<div class="one-fourth">
    	<a href="#"><i class="fa fa-plane" aria-hidden="false"></i></a>
      	<h4>FLIGHTS</h4>
    </div>
    <div class="one-fourth">
    	<a href="#"><i class="fa fa-train" aria-hidden="false"></i></a>
      	<h4>TRAINS</h4>
    </div>
    <div class="one-fourth">
    	<a href="#"><i class="fa fa-bus custom"></i></a>
      	<h4>BUSES</h4>
    </div>
	<div class="one-fourth-last">
    	<a href="#"><i class="fa fa-ticket" aria-hidden="true"></i></a>
      	<h4>COMBINATION</h4>
    </div>



















	<div>
						 
							<form role="form" class="AVAST_PAM_loginform" method="POST" action="result_en.php" >
				
			<div class="form-group">
						</input>
<div id="checkboxlist">		
						<!--<label><input type="checkbox" name="ride" class="All" value="all" />All</label>-->
							
						
							<h1><strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<label><input type="checkbox" style="zoom:2" name="check_list[]" value = "Flight"/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>
							<label><input type="checkbox" style="zoom:2" name="check_list[]" value = "Train"/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>
							<label><input type="checkbox" style="zoom:2" name="check_list[]" value = "Bus"/> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
							<label><input type="checkbox" style="zoom:2" name="ride" value = "all"/></label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							</strong></h1>
							</div>
						</div>
					
				
				
						 <div>
						 
							<br><label for="journey"><font size="4"><strong>DATE :&nbsp&nbsp  </font></strong><input name="journey" type="date" value='<?php echo date("Y-m-d") ?>' />
						</label>
				</div>

<br>
<br>
	
				<div class="form-group">
					<font size="4"><strong>SOURCE CITY :&nbsp&nbsp</strong> </font> <select name="sourceCity" id="sourceCity">
							<option>select</option>
							<option value="Karachi">KHI ,Karachi</option><!--Have Airport -->
							<option value="Lahore">LHE ,Lahore</option><!--Have Airport -->
							<option value="Islamabad">ISB ,Islamabad</option><!--Have Airport -->
							<option value="Faislabad">LYP ,Faisalabad</option><!--Have Airport -->
							<option value="Peshawar">PEW ,Peshawar</option><!--Have Airport -->
							<option value="Quetta">UET ,Quetta</option><!--Have Airport -->
							<option value="Multan">MUX ,Multan</option><!--Have Airport -->
							<option value="Gujranwala">SKT ,Gujranwala</option>
							<option value="Hyderabad">HYD ,Hyderabad</option>
							<option value="Sialkot">SKT ,Sialkot</option><!--Have Airport -->
							<option value="Sarghoda">LYP ,Sarghoda</option>
							<option value="Bhawalpur">BHV ,Bahawalpur</option><!--Have Airport -->
							<option value="Sukkur">SKZ ,Sukkur</option><!--Have Airport -->
							<option value="Sheikhupura">LHE ,Sheikhupura</option>
							<option value="Larkana">SKZ ,Larkana</option>
							<option value="Abbottabad">ISB ,Abbottabad</option>
							<option value="Nawabshah">SAWAN ,Nawabshah</option>
							<option value="Mardan">PEW ,Mardan</option>
							<option value="Kohat">PEW ,Kohat</option>
							<option value="Bhurewala">bhurewala ,BHUREWALA</option>
							<option value="Jhung">LYP ,Jhung</option>
							<option value="Jhelum">SKT Jhelum,sialkot</option>
							<option value="Jacobabad">SKZ Jacobabad</option>
							<option value="Dera Ismail Khan">PZH Dera Ismail Khan,(Zohb)</option><!--Have Airport -->
							<option value="Gwadar">GWD Gwadar</option><!--Have Airport -->
							<option value="Dera ghazi khan">DEA Dera ghazi khan</option><!--Have Airport -->
							<option value="Mirpur khas">RZS Mirpur khas,SAWAN</option>
							<option value="Rahim yar khan">RYK ,Rahim yar khan</option><!--Have Airport -->
							<option value="chakwal">ISB ,chakwal</option>
							<option value="Khanpur">RYK ,Khanpur</option>
							<option value="Khuzdar">MJD ,Khuzdar(MOENJODARO)</option><!--Have Airport -->
							<option value="khairpur">SKZ khairpur</option>
							<option value="Sadiqabad">RYK ,Sadiqabad</option>
							<option value="Haripur">ISB ,Haripur</option>
							<option value="Mansehra">ISB ,Mansehra</option>
							<option value="Gilgit">GIL ,Gilgit</option><!--Have Airport -->
							<option value="Nowshehra">PEW ,Nowshehra</option>
							<option value="mingora">ISB ,mingora</option>
							<option value="Chitral">CJL ,Chitral</option><!--Have Airport -->
							<option value="Dalbandin">DBA ,Dalbandin</option><!--Have Airport -->
							<option value="muzaffagarh">MUX ,muzaffagarh</option>
							<option value="sahiwal">LYP ,sahiwal</option>
							<option value="wazirabad">SKT ,wazirabad</option>
							<option value="Swabi">PEW Swabi</option>
							<option value="Thatta">KHI ,Thatta</option>
							<option value="Kasur">LHE ,Kasur</option>
							<option value="Mianwali">PEW ,mianwali</option>
							<option value="Attock">ISB ,Attock</option>
							<option value="Skardu">KDU ,Skardu</option><!--Have Airport -->
							<option value="Turbat">TUK ,Turbat</option><!--Have Airport -->
							<option value="Hafizabad">LHE ,Hafizabad</option>
							
							</select>
							
				 
				</div>
				<br>
				<br>
				<div class="form-group">
					<font size="4"><Strong>DESTINATION :&nbsp&nbsp</font></strong><select name="destinationCity" id="destinationCity">
							<option>select</option>
							<option value="Islamabad">ISB ,Islamabad</option><!--Have Airport-->
							<option value="Lahore">LHE ,Lahore</option><!--Have Airport -->
							<option value="Karachi">KHI ,Karachi</option><!--Have Airport --> 
							<option value="Faislabad">LYP ,Faisalabad</option><!--Have Airport -->
							<option value="Peshawar">PEW ,Peshawar</option><!--Have Airport -->
							<option value="Quetta">UET ,Quetta</option><!--Have Airport -->
							<option value="Multan">MUX ,Multan</option><!--Have Airport -->
							<option value="Gujranwala">SKT ,Gujranwala</option>
							<option value="Hyderabad">HYD ,Hyderabad</option>
							<option value="Sialkot">SKT ,Sialkot</option><!--Have Airport -->
							<option value="Sarghoda">LYP ,Sarghoda</option>
							<option value="Bhawalpur">BHV ,Bahawalpur</option><!--Have Airport -->
							<option value="Sukkur">SKZ ,Sukkur</option><!--Have Airport -->
							<option value="Sheikhupura">LHE ,Sheikhupura</option>
							<option value="Larkana">SKZ ,Larkana</option>
							<option value="Abbottabad">ISB ,Abbottabad</option>
							<option value="Nawabshah">SAWAN ,Nawabshah</option>
							<option value="Mardan">PEW ,Mardan</option>
							<option value="Kohat">PEW ,Kohat</option>
							<option value="Bhurewala">bhurewala ,BHUREWALA</option>
							<option value="Jhung">LYP ,Jhung</option>
							<option value="Jhelum">SKT Jhelum,sialkot</option>
							<option value="Jacobabad">SKZ Jacobabad</option>
							<option value="Dera Ismail Khan">PZH Dera Ismail Khan,(Zohb)</option><!--Have Airport -->
							<option value="Gwadar">GWD Gwadar</option><!--Have Airport -->
							<option value="Dera ghazi khan">DEA Dera ghazi khan</option><!--Have Airport -->
							<option value="Mirpur khas">RZS Mirpur khas,SAWAN</option>
							<option value="Rahim yar khan">RYK ,Rahim yar khan</option><!--Have Airport -->
							<option value="chakwal">ISB ,chakwal</option>
							<option value="Khanpur">RYK ,Khanpur</option>
							<option value="Khuzdar">MJD ,Khuzdar(MOENJODARO)</option><!--Have Airport -->
							<option value="khairpur">SKZ khairpur</option>
							<option value="Sadiqabad">RYK ,Sadiqabad</option>
							<option value="Haripur">ISB ,Haripur</option>
							<option value="Mansehra">ISB ,Mansehra</option>
							<option value="Gilgit">GIL ,Gilgit</option><!--Have Airport -->
							<option value="Nowshehra">PEW ,Nowshehra</option>
							<option value="mingora">ISB ,mingora</option>
							<option value="Chitral">CJL ,Chitral</option><!--Have Airport -->
							<option value="Dalbandin">DBA ,Dalbandin</option><!--Have Airport -->
							<option value="muzaffagarh">MUX ,muzaffagarh</option>
							<option value="sahiwal">LYP ,sahiwal</option>
							<option value="wazirabad">SKT ,wazirabad</option>
							<option value="Swabi">PEW Swabi</option>
							<option value="Thatta">KHI ,Thatta</option>
							<option value="Kasur">LHE ,Kasur</option>
							<option value="Mianwali">PEW ,mianwali</option>
							<option value="Attock">ISB ,Attock</option>
							<option value="Skardu">KDU ,Skardu</option><!--Have Airport -->
							<option value="Turbat">TUK ,Turbat</option><!--Have Airport -->
							<option value="Hafizabad">LHE ,Hafizabad</option>
						</select>
				</div>
				<br>
				<br>
				<div class="form-group">
				<!--<a href="#" class="myButton">Submit</a>-->


				
					<input type="submit" class="myButton" value="Submit" name="submit" />
				
			</form>
		</div>
		</br>
		</br>
	</div>

	</div>
</div>
<!--Drop Cap End-->

</section>
<!--Container End-->

<!--Ending Selection of source and destination-->

<!--
<section id="container"> 


<div id="map"></div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0SWrMuB2dv72VeqpptyQXWQz76Zyja6c&callback=initMap">
    </script>
	
	</section>


-->
























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
<script type="text/javascript" src="js/supersized.3.2.7.js"></script>
<script type="text/javascript" src="js/supersized.shutter.js"></script>
<script type="text/javascript" src="js/superized-custom.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/signup.js"></script>

</body>
</html>
