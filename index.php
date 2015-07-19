<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
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

		

<div class="content">
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
	display: inline; font-size:24px;"><a href="register.php" style="text-decoration:none">Register</a></li>
        </ul>
    </div>
          <ul class="ca-menu">
                    <li>
                        <a href="wordlist.php">
                            <span class="ca-icon">A</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Word List</h2>
                                <h3 class="ca-sub">Word List</h3>
                            </div>
                        </a>                    </li>
                    <li>
                        <a href="flash.php">
                            <span class="ca-icon">I</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Flash Cards</h2>
                                <h3 class="ca-sub">Flash Cards</h3>
                            </div>
                        </a>                    </li>
                    
           </ul>
		   <ul>
		   <li>
		   <div id="login" style="">
           <br><br><br>
						<form name="loginform" action="login_exec.php" method="post">
							<table width="304" border="0" align="center" cellpadding="2" cellspacing="5">
								
							  <tr>
									<td width="88"><div align="right">Username</div></td>
									<td width="198"><input name="username" type="text" /></td>
							  </tr>
							  <tr>
									<td><div align="right">Password</div></td>
									<td><input name="password" type="password" /></td>
							  </tr>
							  <tr>
									
									<td>	
                                    	<input name="" type="submit" value="login" />
                                    </td>
							  </tr>
                              <tr>
									<td colspan="2">
										<!--the code bellow is used to display the message of the input validation-->
										 <?php
											if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
											echo '<ul class="err">';
											foreach($_SESSION['ERRMSG_ARR'] as $msg) {
												echo '<li>',$msg,'</li>'; 
												}
											echo '</ul>';
											unset($_SESSION['ERRMSG_ARR']);
											}
										?>
									</td>
								</tr>
							</table>
						</form>
					 </div>
			</li>		 
			</ul>
  <!--star main --> 
    
    
    <!--start middle -->
    <middle>    
      <div class="enter"><P >vocabulary learning is a vital part of education. As part of the language arts, it is considered a CORE subject in formal education. Vocabulary can be built chiefly by two methods: reading and formal vocabulary drill and practice. Obviously, reading is an exercise that has its own rewards, and many students are motivated to enjoy it as a pastime. However, formal vocabulary building is usually not viewed as a “fun” task and is typically left in neglect.<br></P>
        <div class="imgteaser">
<a href="vocab.php"><img src="images/vocab.jpg" alt="Todo el Todo" width="413" height="220" /><span class="desc">
	<strong>More about Vocabulary</strong>
		</span></a></div>
      </div>	
      
    </middle>
    <main>    
      <div class="abox">
      <figure>
      <fcapion>
     <h1>GRE </h1>
      </fcaption><a href="gre.php"></a><a href="#"><img src="images/gre.jpg" alt="GRE" width="289" height="175" /></a></figure>
      </div>
    <div class="abox">
      <figure>
      <fcapion>
      <h1>GMAT </h1>
      </fcaption>
      <a href="gmat.php"><img src="images/gmat.jpg" alt="GMAT" width="287" height="176" /></a>      </figure>
    </div>
    <div class="abox">
      <figure>
      <fcapion>
     <h1>CAT</h1>
      </fcaption><a href="cat.php"></a><a href="#"><img src="images/cat.jpg" alt="CAT" width="289" height="178" /></a></figure>
      </div>   
    </main>
    <!--end main -->
    <footer>  
  <div class="section_slogan"><img src="images/quote-right.png" alt="images" /><span class="cursive"> A synonym is a word you use when you can't spell the other one. </span><img src="images/quote-left.png" alt="images" /></div>
  <div align="center"  id="copyright" style="display:block;background-image:url(images/blackbg.png); font-size:24px;   font-family:snap ITC; color:white; height:35px;">
    	Copyright Group30
    </div>
</footer>
</div>
</div>
<!--end middle -->
<!--start footer -->


<!--end container -->
<!-- Free template distributed by http://freehtml5templates.com -->
  </body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</html>
