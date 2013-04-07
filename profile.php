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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Profile</title>
</head>
<body>
    <h1> Profile </h1>
    
    <h2> 
		<?php echo $fname. " ".$lname?><br/>
    	<br/>
        <br />
        Born On :  <?php echo $bday?><br />
        Country :  <?php echo $country ?> <br />
        E-mail :  <?php echo $email ?> <br />         
    
    </h2>



	<img alt="Progress graph " 
		<?php $temp = "images/graphs/".$username.".png" ;echo "src='".$temp."'" ?>
        style="border: 1px solid gray;"
    />
</body>
</html>
<?php Close_To_Server($db); ?>
