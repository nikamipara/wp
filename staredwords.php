<?php
require_once('auth.php');
$ssid = session_id();
$username = $_SESSION['SESS_USERNAME'];
//echo $ssid;
	//Check whether the session variable SESS_MEMBER_ID is present or not
	$login = 1;
	

?>
<?php
			//Include database connection details
		require_once('config.php');
		$db=Connect_To_Server();
		$db_found=Connect_To_DB();
		$T = 'location:staredwords.php';

		$qry = "SELECT t2.*   FROM (select * from stared where username='$username') as  t1 INNER JOIN word t2 ON t1.word = t2.word;
				";
		$result = mysql_query($qry);
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
    
    
    <div id="left menu" style="float:left; width:25%; border-right:solid; border-color:purple">
    <h1> Word List </h1>
    <br><br>
  	<div style="font-family:Verdana, Geneva, sans-serif; font-size:24px;">
    <ul>
  	<li><a href="top100.php">Top 100</a></li>
    <li><br></li>
    <li><a href="wordlist.php">A to Z</a></li>
    <li><br></li>
    <li><a href="staredwords.php">Starred Words</a></li>
    <li><br></li>
    <li><br></li>
	</ul>        
    </div>
  	</div>
    
    <div align="center" id="right table" style="font-family:'Lucida Console', Monaco, monospace">
    <h1>Starred Words</h1>
    
    <?php
		 $word1;
		if($result)
		{	
			echo "<table border='2' bgcolor='#CCFF33'>";
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
						echo "<td> <a style='color: #ff0000; text-decoration: none;' href = 'star.php?PHPSESSID=$ssid & star=1 & word=$word1 & url=$T'> &#9733</a></td>";
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
<?php
Close_To_Server($db);
?>
