<?php
require_once('auth.php');
$SID = session_id();
//echo "ssid".$SID;
//$SID = $_GET['PHPSESSID']; 
//?PHPSESSID='$SID'";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Homw</title>
</head>
<body>
    hello there home swt home

     <a href="logout.php?PHPSESSID='<?php echo $SID ?>'"> logout</a>
     <a href="profile.php?PHPSESSID='<?php echo $SID?>'">Profile</a>

</body>
</html>