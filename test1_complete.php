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
		echo '<p>Congratulations'.$fname." ".$lname ." you have completed test ".$testno."successfully<br/>";
		echo "You got ".$marks."out of 100<br/>";
		echo "You can always try again to improve your reults. To see your progress report go to your profile.</p>";





?>

