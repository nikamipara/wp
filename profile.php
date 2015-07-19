<?php
require_once('auth.php');
//Include database connection details
	require_once('config.php');
	$db=Connect_To_Server();
	$db_found=Connect_To_DB();

$username = $_SESSION['SESS_USERNAME'];
$fname = $_SESSION['SESS_FIRST_NAME'];
$lname = $_SESSION['SESS_LAST_NAME'];
 
 // drowing graph.............................................................................

	include "libchart/classes/libchart.php";
	// preparing data..................
	
	$qry= "SELECT * FROM test WHERE username='$username'";
	$result=mysql_query($qry);
	if(!$result){
		die("database selection failed:".mysql_error());
	}

	$chart = new VerticalBarChart();

	$dataSet = new XYDataSet();
	
	while($row = mysql_fetch_array($result)){
		
		$tid = 'test '.$row['test_id'];
		$dataSet->addPoint(new Point($tid, $row['marks']));

	}
	
	$chart->setDataSet($dataSet);

	$chart->setTitle("Test Results of ".$fname);
	$chart->render("images/graphs/".$username.".png");


//.....................................................................................................
//echo "username is ".$username;


	$qry= "SELECT * FROM user WHERE username='$username'";
	$result=mysql_query($qry);
	if(!$result){
		die("database selection failed:".mysql_error());
	}
	$row = mysql_fetch_assoc($result);

$bday = $row['birth_date'];
$country = $row['country'];
$email = $row['email'];
$gender = $row['Gender'];


?>
<!DOCTYPE html>
  <head>
    <title>Vocabulary</title>
 <style type="text/css">
<!--
body {
	background-image: url(images/bg.png);
	
}
-->
 </style>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" type="text/css" href="css/style9.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />    
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
        <style type="text/css">
<!--
.Stile1 {color: #333333}
-->
        </style>
 </head>
  
<body>
<!--start container -->
<div id="container">
<div id="header" style="height:160px"><header>
    <nav>   
      <div id="logo"><a href="#"><img src="images/logo.png" alt="Logo here" /></a>      </div>
      
      <div id="search-top">
   <form method="post" action="#">
  <input type="text" onFocus="if(this.value=='Search')this.value='';" onBlur="if(this.value=='')this.value='Search';" value="Search"  id="search-field"/>
  <input type="submit" value="" id="search-btn"/>
  </form> 
      </div>  
      <div id="nav_social"><a href="#"><img src="images/facebook_32.png" alt="Become a fan" width="32" height="32" /></a><a href="#"><img src="images/twitter_32.png" alt="Follows on Twitter" /></a><a href="#"><img src="images/email_32.png" alt="Contact" width="32" height="32" /></a> </div>
      <div id="menu">
		
	  </div>
  </nav>


    </header>
</div>

		

<div class="content">
	<div id="menu" style="display:block;background-image:url(images/blackbg.png); margin-left:auto; font-family:snap ITC; color:white; height:35px;">
    	<ul style="list-style: none; padding: 0px; margin-left:auto; width:960px;">
            <li style="list-style: none;
	padding: 50px;	
	display: inline; font-size:24px;"><a style="text-decoration:none;" href="home.php">Home</a></li>
            <li style="list-style: none;
	padding: 50px;	
	display: inline; font-size:24px;"><a style="text-decoration:none;"href="about.php">About</a></li>
            <li style="list-style: none;
	padding: 50px;	
	display: inline; font-size:24px;"><a href="contact.php" style="text-decoration:none;">Contact us</a></li>
            <li style="list-style: none;
	padding: 50px;	
	display: inline; font-size:24px;"><a href="logout.php" style="text-decoration:none">Log Out</a></li>
        </ul>
    </div>
	<div id="left menu" style="float:left; font-family:snap ITC; font-size:large; height:40%; width:60%;">
    <h1> Profile </h1>
  		
        <p style="font-family:Papyrus; font-size:40px;"><b><?php echo $fname. " ".$lname?></b></p>
        <div style="font-family:Papyrus; font-size:25px;">
        <ul>
        	<li><br></li>
			<li><b>Born on:</b> <?php echo $bday?></li>
            <li><b>Country:</b> <?php echo $country ?></li>
            <li><b>E-mail:</b> <?php echo $email ?></li>
         </ul>
         </div>
  	</div>
    <br><br>
    <div id="image space" style="height:40%;">
	<img src="dp.jpg" alt"image" width="200px">
    </div>
    
    <div id="chart" align="center" style="height:50%">
    <img alt="Progress graph " 
		<?php $temp = "images/graphs/".$username.".png" ;echo "src='".$temp."'" ?>
        style="border: 1px solid gray;"
    />
    
    </div>
<!--start footer -->
<footer>  
  
  <div align="center"  id="copyright" style="display:block;background-image:url(images/blackbg.png); font-size:24px;   font-family:snap ITC; color:white; height:35px;">
    	Copyright Group30
    </div>
</footer>
</div>
</div>
<!--end container -->
<!-- Free template distributed by http://freehtml5templates.com -->
  </body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</html>
