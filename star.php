<?PHP
	
	require_once('auth.php');
	$sid = session_id();
	//Include database connection details
	require_once('config.php');
	$db=Connect_To_Server();
	$db_found=Connect_To_DB();

	$username = $_SESSION['SESS_USERNAME'];
	$star = $_GET['star'];
	//echo $star;
	$word = $_GET['word'];
	$url = $_GET['url'];
	//echo $word;
	if($star == 1 ){
	$qry = "DELETE FROM stared where username='$username' and word ='$word' ";
		$result = mysql_query($qry);
		if(!$result)
			echo"jjjjjjjjjjjj". mysql_error;
		else
			header("$url?PHPSESSID='$sid'" );
	}
	else if($star ==0){
	$qry = "INSERT INTO `stared`(`username`, `word`) VALUES ('$username', '$word') ";
		$result = mysql_query($qry);
		if(!$result)
			echo ".........".$mysql_error;
		else
		header("$url?PHPSESSID='$sid'" );
		
	}
	else{
		echo "u are kidding right?.";
	}



?>
<?PHP 
Close_To_Server($db);
?>