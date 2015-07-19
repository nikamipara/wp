<?php
	//Start session
	session_start();
 
	//Include database connection details
	require_once('config.php');
	$db=Connect_To_Server();
	$db_found=Connect_To_DB();
 
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	//Sanitize the POST values
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
 
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
 
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
 /*
	//Create query
	//CAST(Username as varbinary(100)) = CAST(@Username as varbinary))
	//AND CAST(Password as varbinary(100)) = CAST(@Password as varbinary(100))
	$qry="SELECT * FROM user WHERE CAST(Username as varbinary(100)) = CAST('$username' as varbinary)) AND AND CAST(password as varbinary(100)) = CAST('$password' as varbinary(100))";
	//$qry="SELECT * FROM user WHERE username='$username' AND password='$password'";
	
	$result=mysql_query($qry);
 
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			//$_SESSION['SESS_MEMBER_ID'] = $member['mem_id'];
			$_SESSION['SESS_USERNAME'] = $member['username'];
			$_SESSION['SESS_FIRST_NAME'] = $member['first_name'];
			$_SESSION['SESS_LAST_NAME'] = $member['last_name'];
			session_write_close();
			header("location: home.php");
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'user name and password not found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: index.php");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
	*/
	login($username,$password);
	Close_To_Server($db);
?>
<?php
function login($username,$password)
		{
			$SQL_Query="select * from user";
			$result_query=mysql_query($SQL_Query);
			
			
			$flag1=1;
			while($out=mysql_fetch_assoc($result_query))
			{
				if($username==$out['username'])
				{
					$flag1=0;
					if($password==$out['password'])
					{
						
							session_regenerate_id();
							//$_SESSION['SESS_MEMBER_ID'] = $member['mem_id'];
							$_SESSION['SESS_USERNAME'] = $out['username'];
							$_SESSION['SESS_FIRST_NAME'] = $out['first_name'];
							$_SESSION['SESS_LAST_NAME'] = $out['last_name'];
							session_write_close();
							$SID = session_id(); 
							header("location: home.php?PHPSESSID='$SID'" );
							exit();
					}
					else 
					{
						$errmsg_arr[] = ' password not correct please try again';
						$errflag = true;
						if($errflag) {
							$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
							session_write_close();
							header("location: index.php");
							exit();
						}
					}
				}
			}
			
			if($flag1==1)
			{
				$errmsg_arr[] = ' username not found please try again';
						$errflag = true;
						if($errflag) {
							$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
							session_write_close();
							header("location: index.php");
							exit();
						}
			}	
	}

?>