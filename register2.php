<?php
require_once("config.php");
$db=Connect_To_Server();
$db_found=Connect_To_DB();

if(isset($_POST['FirstName']))
{
	$fname = $_POST['FirstName'];
	$lname = $_POST['LastName'];
	$username = $_POST['UserName'];
	$password = $_POST['password'];
	$bday = $_POST['birthday'];
	$gender = $_POST['gender'];
	$country = $_POST['country'];
	$email = $_POST['email'];
	$dat = new DateTime($bday);
$birthday = $dat->format('Y-m-d');
//echo $birthday;
	
	
	$sql_quary = "INSERT INTO `user`(`username`, `Gender`, `birth_date`, `first_name`, `last_name`, `password`, `email`, `country`)
					 VALUES ('$username','$gender','$birthday','$fname','$lname','$password','$email','$country')";
	
	$result = mysql_query($sql_quary);
					if($result==false)
					{
							//echo  mysql_error();
							echo " Username not available please try different one";
					}
					else
					{	
						echo $fname.$lname. " You have registered successfully";
						//echo "<br/> <input name='' type='button'  value='GoTo Home' onClick='parent.location='index.php''/>";
					}

}

?>
<!DOCTYPE HTML5>
<html>
<HEAD>
<TITLE>Registration</TITLE>
<SCRIPT type="text/javascript">
    function validateReqFields(thisform) {
        var FName = thisform.FirstName.value;
        var lname = thisform.LastName.value;
        var uname = thisform.UserName.value;
        var pass = thisform.password.value;
        var cpass = thisform.confirmpass.value;
        var cntry = thisform.country.value;
        var eml = thisform.email.value;
        if (FName == null || FName == "") {
            alert("Enter the First name");
            thisform.FirstName.focus();
            return false;
        }
        if (lname == null || lname == "") {
            alert("Enter the Last name");
            thisform.LastName.focus();
            return false;
        }
         if (uname == null || uname == "") {
            alert("Enter the Username");
            thisform.UserName.focus();
            return false;
        }
         if (pass == null || pass == "") {
            alert("Password field cant not be empty!");
            thisform.password.focus();
            return false;
        }
        if (pass.length < 6){
            alert("Password length must be greater than 6");
            thisform.password.focus();
            return false;
          
        }
         if (cpass != pass) {
            alert("Password Do not match please enter again");
            thisform.confirmpass.focus();
            return false;
        }
        if(cntry == null || cntry== ""){
          alert("country field is required");
          thisform.country.focus();
            return false;
          
        }
        if(eml == null || eml== ""){
          alert("eMAIL is required");
          thisform.email.focus();
            return false;
          
        }
       
       
        return true;
    }
</SCRIPT>
</HEAD>
<BODY bgcolor="#999f8e" align="center">
<img src="images/vocabulary-logo.png">
<div id="form" style="float:right;">
<h1> Registration form </h1>
<FORM action="form2.validate.php" onsubmit=" return validateReqFields(this) " method="Post">
    <fieldset>
            <legend><strong>Name*</strong></legend>
            <label id="firstname-label" class="firstname">
               <input type="text" placeholder="First" name="FirstName" id="FirstName"  spellcheck="false"/>
                <input type="text" placeholder="last" name="LastName" id="LastName"  spellcheck="false"/>
            </label>
            </fieldset>
     <label id="username-label" >
            <strong>Choose your userame*</strong><br />
            <input type="text"  name="UserName" id="UserName"  spellcheck="false"/><br />
     </label>
    <label id="Password-label" >
                <strong>Create a password*</strong><br />
                <input type="password" name="password" id="password" /><br />

    </label>
    <strong>Confirm Your password*</strong>
     <label id="confirmpass-label" ><br />
                 <input type="password" name="confirmpass" id="confirmpass" /><br />
      </label>
    <label id="bday-label" >
                <strong>Birthday</strong><br />
                <input type="date" name="birthday" id="birthday"/><br />   
    </label>
     <label id="gender-label" >
                <strong>Gender*</strong><br />
                    <select id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                      <br/>
                    </select>

     </label>
     <label id="Country-label" >
               <br/> <strong>Country*</strong><br />
                <input type="text" id="country" name="country" /><br />

      </label>
      <label id="email-label" >
                <strong>Your Email Address*</strong><br />
                <input type="email" name="email" placeholder="example@gmail.com" id="email" />
                <br />
      </label>
  
<INPUT type="submit" value="submit"/>
</div>
</FORM>
</BODY>

</html>

<?php 
Close_To_Server($db);
?>