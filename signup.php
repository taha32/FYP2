<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv=content-type content="text/html; charset=UTF-8">
<meta content="text/html; charset=utf-8" http-equiv=Content-Type>



<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<title>SignUp</title>

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
		<li><a href="signin.php"></i>Account</a>
        	<ul class="sub-menu">
				<li><a href="signin.php">sign in</a></li>
            	<li><a href="signup.php">Sign up</a></li>
            </ul>
        </li>
		<li><a href="../urdu/home.php"><i class="fa fa-home"></i>اردو</a></li>
    </ul>
</nav>
<!--Menu End-->

<section  id="container-fluid">
 <!--form start..-->
  <div  id="container" class="contact">
  <div  class="two-third">
   <div class="google_map">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.4398725227597!2d67.07774001500184!3d24.81462658407559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4e41a2d7dd487cfc!2sDHA+Suffa+University!5e0!3m2!1sen!2s!4v1506646363114" width="600" height="450" frameborder="0" style="border:0"></iframe>
</div>
</div>
   <div  class="one-third-last">

<div class="container" id="wrap">
	  <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="r" method="post" accept-charset="utf-8" class="form" role="form">  <legend><font color="black">  Sign Up</font></legend>
                    <h4> It's free and always will be.</h4>
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="firstname" value="" class="form-control input-lg" placeholder="First Name"  />                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input type="text" name="lastname" value="" class="form-control input-lg" placeholder="Last Name"  />                        </div>
                    </div>
                    <input type="text" name="email" value="" class="form-control input-lg" placeholder="Your Email"  /><input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  /><input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"  />                    <label><font color="black">Birth Date</label>                    <div class="row">
                        <div class="col-xs-4 col-md-4">
                            <select name="month" class = "form-control input-lg">
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>    
               <select name="day" class = "form-control input-lg">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
                            <select name="year" class = "form-control input-lg">
<option value="1935">1935</option>
<option value="1936">1936</option>
<option value="1937">1937</option>
<option value="1938">1938</option>
<option value="1939">1939</option>
<option value="1940">1940</option>
<option value="1941">1941</option>
<option value="1942">1942</option>
<option value="1943">1943</option>
<option value="1944">1944</option>
<option value="1945">1945</option>
<option value="1946">1946</option>
<option value="1947">1947</option>
<option value="1948">1948</option>
<option value="1949">1949</option>
<option value="1950">1950</option>
<option value="1951">1951</option>
<option value="1952">1952</option>
<option value="1953">1953</option>
<option value="1954">1954</option>
<option value="1955">1955</option>
<option value="1956">1956</option>
<option value="1957">1957</option>
<option value="1958">1958</option>
<option value="1959">1959</option>
<option value="1960">1960</option>
<option value="1961">1961</option>
<option value="1962">1962</option>
<option value="1963">1963</option>
<option value="1964">1964</option>
<option value="1965">1965</option>
<option value="1966">1966</option>
<option value="1967">1967</option>
<option value="1968">1968</option>
<option value="1969">1969</option>
<option value="1970">1970</option>
<option value="1971">1971</option>
<option value="1972">1972</option>
<option value="1973">1973</option>
<option value="1974">1974</option>
<option value="1975">1975</option>
<option value="1976">1976</option>
<option value="1977">1977</option>
<option value="1978">1978</option>
<option value="1979">1979</option>
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
</select>                        </div>
				<br>
                    </div>
                     <label><font color="black">Gender : </font></label>                    <label class="radio-inline">
                        <input type="radio" name="gender" value="M" id=male /><font color="black">                        Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="F" id=female /> <font color="black">                       Female
                    </label>
                    <br />
					<br>
              <span class="help-block"><font color="black">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>
                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                        Create my account</button>
						
          </div>
</div>            
</div>
</div>
</div>
</div>




  

 </section>
<!--Container End-->
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