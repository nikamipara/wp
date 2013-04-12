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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quiz System</title>

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
</head>
<body onload="setCountDown();">
  <div id="remain">
 Start Time: <?php echo $actualDateDisplay; ?><br />
 End Time:<?php echo $targetDateDisplay; ?><br />
  <?php 
 echo "$remainingMinutes minutes, $remainingSeconds seconds"
 //echo "$remainingDay days, $remainingHour hours, $remainingMinutes minutes, $remainingSeconds seconds";?></div>
 
     <h3>Vocabulary Quiz 101</h3>
    
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
    <input id="submit1" type="submit" name="submit" value="Submit Test">
    </form>


   
</body>
</html>