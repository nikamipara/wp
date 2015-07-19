<?php
require_once('auth.php');
$ssid = session_id();
//echo $ssid;
	//Check whether the session variable SESS_MEMBER_ID is present or not
	$login = 0;
	if(isset($_SESSION['SESS_USERNAME'])) {
		
		$username = $_SESSION['SESS_USERNAME'];
		$login = 1;
	}

?>

<?php

$dateFormat = "d F Y -- g:i a";
$targetDate = time() + ((1)*60);//Change the 25 to however many minutes you want to countdown
$actualDate = time();
$secondsDiff = $targetDate - $actualDate;
$remainingDay     = floor($secondsDiff/60/60/24);
$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($remainingMinutes*60));
$actualDateDisplay = date($dateFormat,$actualDate);
$targetDateDisplay = date($dateFormat,$targetDate);
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
 
<script type="text/javascript">
  var days = <?php echo $remainingDay; ?>  
  var hours = <?php echo $remainingHour; ?>  
  var minutes = <?php echo $remainingMinutes; ?>  
  var seconds = <?php echo $remainingSeconds; ?> 
function setCountDown ()
{
  seconds--;
  if (seconds < 0){
      minutes--;
      seconds = 59
  }
  if (minutes < 0){
      hours--;
      minutes = 59
  }
  if (hours < 0){
      days--;
      hours = 23
  }
  document.getElementById("remain").innerHTML = minutes+" minutes, "+seconds+" seconds";
  SD=window.setTimeout( "setCountDown()", 1000 );
  if (minutes == '00' && seconds == '00') { seconds = "00"; window.clearTimeout(SD);
   		//window.alert("Time is up. Press OK to continue."); // change timeout message as required
  		

        var targButton  = document.getElementById ('submit1');
        var clickEvent  = document.createEvent ('MouseEvents');

        clickEvent.initEvent ('click', true, true);
        targButton.dispatchEvent (clickEvent);
 		//document.evaluate("//input[@value='new' and @type='submit']", document, null, 9, null).singleNodeValue.click();
		//window.location = "profile.php" // Redirected url after finish test.
	} 

}

</script>
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
  
<body onload="setCountDown();">
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
    <h1> Test 101 </h1>
    <br>
    
  <div id="remain">
 Start Time: <?php echo $actualDateDisplay; ?><br />
 End Time:<?php echo $targetDateDisplay; ?><br />
  <?php 
 echo "$remainingMinutes minutes, $remainingSeconds seconds"
 //echo "$remainingDay days, $remainingHour hours, $remainingMinutes minutes, $remainingSeconds seconds";?></div>
  	<div style="font-family:Verdana, Geneva, sans-serif; font-size:20px;">
        <form name="loginform" action="test1_complete.php?PHPSESSID=<?php echo $ssid ?>" method="post">
    <input type="hidden" name="test" value="101"/>    Check the answer to each multiple-coice question
    
             <P>1. The word which means "Introspection" :<BR>
            <input type="radio" name="1" value="maon">maon<BR>
            <input type="radio" name="1" value="examining one's own thoughts and feelings">examining one's own thoughts and feelings
            <BR>
            <input type="radio" name="1" value="hotel">hotel<BR>
            <input type="radio" name="1" value="cool down">cool down<BR>
            </p>
            
            <P>2. The word which means "Philanthropy" :<BR>
            <input type="radio" name="2" value="one who loves mankind">one who loves mankind<BR>
            <input type="radio" name="2" value="philosophy">philosophy<BR>
            <input type="radio" name="2" value="soleil">soleil<BR>
            <input type="radio" name="2" value="poson">poson<BR>
            </p>
            
            <P>3. The word which means "antidote" :<BR>
            <input type="radio" name="3" value="renard">renard<BR>
            <input type="radio" name="3" value="quark">quark<BR>
            <input type="radio" name="3" value="antibiotics">antibiotics<BR>
            <input type="radio" name="3" value="medicine used against poon or a diesease">medicine used against poon or a diesease<BR>
            </p>
            <P>4. The word which means "ambidextrous" :<BR>
            <input type="radio" name="4" value="able to use the left hand or the right equally well
            ">able to use the left hand or the right equally well
            <BR>
            <input type="radio" name="4" value="vale">vale<BR>
            <input type="radio" name="4" value="dable">dable<BR>
            <input type="radio" name="4" value="homesick">homesick<BR>
            </p>
            
            <P>5. The word which means "strive" :<BR>
            <input type="radio" name="5" value="stripe">stripe<BR>
            <input type="radio" name="5" value="cut down">cut down<BR>
            <input type="radio" name="5" value="to make great effort">to make great effort<BR>
            <input type="radio" name="5" value="demolh">demolh<BR>
            </p>
            <P>6. The word which means "Retrospective" :<BR>
            <input type="radio" name="6" value="looking back upon past">Looking back upon past<BR>
            <input type="radio" name="6" value="to show character">to show character<BR>
            <input type="radio" name="6" value="easily understood">easily understood<BR>
            <input type="radio" name="6" value="poson">poson<BR>
            </p>
            <P>7. The word which means "Introvert" :<BR>
            <input type="radio" name="7" value="renard">renard<BR>
            <input type="radio" name="7" value="vale">vale<BR>
            <input type="radio" name="7" value="soleil">soleil<BR>
            <input type="radio" name="7" value="one who turn towards himself">one who turn towards himself<BR>
            </p>
            <P>8. The word which means "braggart" :<BR>
            <input type="radio" name="8" value="revenge">revenge<BR>
            <input type="radio" name="8" value="boastful">boastful<BR>
            <input type="radio" name="8" value="introvert">introvert<BR>
            <input type="radio" name="8" value="polygon">polygon<BR>
            </p>
            <P>9. The word which means "ambiguous" :<BR>
            <input type="radio" name="9" value="cautious">cautious<BR>
            <input type="radio" name="9" value="doubtful uncertain">doubtful uncertain<BR>
            <input type="radio" name="9" value="soleil">soleil<BR>
            <input type="radio" name="9" value="solely">solely<BR>
            </p>
            <P>10. The word which means "entice" :<BR>
            <input type="radio" name="10" value="attract">attract<BR>
            <input type="radio" name="10" value="vale">vale<BR>
            <input type="radio" name="10" value="calm">calm<BR>
            <input type="radio" name="10" value="lust">lust<BR>
            </p>
            <br>
            <br>
    <br>
    <br>
    <br>
    
    <input id="submit1" class="abc" type="submit" name="submit" value="Submit Test" style="height:50px; width:500px;">
    </form>
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
