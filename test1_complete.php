
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

		

<div class="content" style="font-family:snap ITC;">
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
    <br><br>
    
    
    <div id="left menu">
    <h1> Test 101 Results </h1>
    <br>
  	<div style="font-family:Verdana, Geneva, sans-serif; font-size:20px;">
        <?php
require_once('auth.php');
$ssid = session_id();
if(!isset($_POST['test'])){
echo 'come via proper path it is not allowed.';
}
$result = $_POST;
//print_r( $result);

$username = $_SESSION['SESS_USERNAME'];
$fname = $_SESSION['SESS_FIRST_NAME'];
$lname = $_SESSION['SESS_LAST_NAME'];
$testno = $_POST['test'];
$marks = 0;

$ans[1] = "examining one's own thoughts and feelings";
$ans[2] = "one who loves mankind";
$ans[3] = "medicine used against poon or a diesease";
$ans[4] = "able to use the left hand or the right equally well";
$ans[5] = "to make great effort";
$ans[6] = "looking back upon past";
$ans[7] = "one who turn towards himself";
$ans[8] = "boastful";
$ans[9] = "doubtful uncertain";
$ans[10] = "attract";

//echo strtoupper($result['1']);
//echo strtoupper($ans1);
//echo "this is reuslrt".strcmp(strtoupper($result['1']),strtoupper($ans1));
$i=1;
echo 'True answers <br><br>';
while($i<11){
	//echo "ans key".$ans[$i];
	//echo "ans given ".$result[$i];
	if(isset($result[$i]) and (strcmp(strtoupper($result[$i]),strtoupper($ans[$i]))==0)){
		$marks = $marks+ 10;
		echo "Ans ".$i.' <br>';
	
	}
	$i++;
}
	

		//Include database connection details
		require_once('config.php');
		$db=Connect_To_Server();
		$db_found=Connect_To_DB();
		
		$qry = "select * from test where username = '$username' and test_id = '$testno'";
		$result = mysql_query($qry);
		//print_r($result);
		 $num_rows = mysql_num_rows($result);
		
		if($num_rows != 0){
			$qry = "UPDATE `test` SET `marks`='$marks' where username = '$username' and test_id = '$testno'";
			$result1 = mysql_query($qry);
			if(!isset($result1)){ echo mysql_error;}
		
		}
		else{
			$qry = "INSERT INTO `test`(`username`, `test_id`, `marks`) VALUES ('$username','$testno','$marks') ";
			$result = mysql_query($qry);
			if(!isset($result)){ echo mysql_error;}
		}
		echo '<p>Congratulations '.$fname." ".$lname ." you have completed test ".$testno." successfully<br/>";
		echo "You got ".$marks." out of 100<br/>";
		echo "You can always try again to improve your reults. To see your progress report go to your profile</p>";





?>


    </div>
  	</div>
    
   
    <footer>  
  <br><br>
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
