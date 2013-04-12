<?php
//require_once('auth.admin.php');
$SID = session_id();
require_once('config.php');

$db=Connect_To_Server();
$db_found=Connect_To_DB();

$qry = "SELECT * 
		FROM word
		WHERE  `top100` =1 order by word ";
$result = mysql_query($qry);

$qry2 = "SELECT * 
		FROM word
		WHERE  `top100` =0 order by word ";
$result2 = mysql_query($qry2);


if(isset($_POST['old']))
{
	//write a querry ,...





}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<FORM action="update_top100.php"  method="Post">
	Replase 
    <select id="old" name="old">
    			<?php
					while($post = mysql_fetch_array($result))
					{
						echo "<option value='".$post['word']."'>"  . $post['word'] ."</option>";
					}
				?>
                 
	</select><br />
    WITH
    <select id="old" name="old">
    			<?php
					while($post2 = mysql_fetch_array($result2))
					{
						echo "<option value='".$post2['word']."'>"  . $post2['word'] ."</option>";
					}
				?>
                 
	</select><br />
    
    <input type="submit" value="REPLACE" />
    










</FORM>





</body>
</html>