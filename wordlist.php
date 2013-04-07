<?php
session_start();
$ssid = session_id();
//echo $ssid;
	//Check whether the session variable SESS_MEMBER_ID is present or not
	$login = 0;
	if(isset($_SESSION['SESS_USERNAME'])) {
		
		$username = $_SESSION['SESS_USERNAME'];
		$login = 1;
	}

?>





<html>
	<head>
		<title>worldlist </title>
	</head>
	
<body>
	<h3>Wordlist</h3>
 
	 <?php
			//Include database connection details
		require_once('config.php');
		$db=Connect_To_Server();
		$db_found=Connect_To_DB();
		$T = 'location:wordlist.php';

		$qry = "SELECT * FROM word order by word ";
		$result = mysql_query($qry);
	 ?>
	 <?php
		 $word1;
		if($result)
		{	/*if($login==1)
				{
					echo "<form action='deleteprocess2.php' method='post'>";
					echo "<input type='hidden' name='lallan' value='top'>";
				}*/
			echo "<table border='1'>";
			while($post = mysql_fetch_array($result))
			{
				 echo "<tr class='row1'>";
				echo "<td class='1'>".$post['word']."</td>";
				echo "<td class='2'>".$post['meaning']."</td>";
				echo "<td class='3'>".$post['eg']."</td>";
				if($login==1)
				{	 $word1 = $post['word'];
				//echo $username;
					//select count(*) as count  FROM stared where username = 'parthshah' and word = 'hello'
					$qry1 = "select *  FROM stared where username = '$username' and word ='$word1' ";
					$result1 = mysql_query($qry1);
					 $rows = mysql_num_rows($result1);
				//	 echo $rows;
					// $row= mysql_fetch_array($result);
					// print_r ($row);
					if($rows>=1){
						echo "<td> <a style='color: #ff0000; text-decoration: none;'
										 href = 'star.php?PHPSESSID=$ssid & star=1 & word=$word1 & url=$T'> &#9733</a></td>";
					}
					else{
						echo "<td><a style='color: #ff0000; text-decoration: none;' href = 'star.php?PHPSESSID=$ssid & star=0 & word=$word1 & url=$T'>&#9734</a></td>";
					}
				}
				echo "</tr>";
				
			}
			echo "</table>";
		}
		else
		{
			die("database selection failed:".mysql_error());
		}

	 ?>
</body>
</html>
<?php
Close_To_Server($db);
?>
