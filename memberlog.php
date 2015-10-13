<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>memberslog</title>
<LINK href="membersform.css" rel="stylesheet" type="text/css">
<style>
		* { margin: 0; padding: 0; }
		
		html { 
			background: url(memberlogging.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			
		}
		
		#page-wrap { width: 400px; margin: 40px auto; padding: 20px; background: white; -moz-box-shadow: 0 0 20px black; -webkit-box-shadow: 0 0 20px black; box-shadow: 0 0 20px black; }
		p { font: 15px/2 Georgia, Serif; margin: 0 0 30px 0; text-indent: 40px; }
		body {color:black;}
	</style>

</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<div align="center">
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <form name="form1" method="post" action="memberlogin.php">
        <td>
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td colspan="3"><strong>Member Login </strong></td>
            </tr>
            <tr>
              <td width="78">Username</td>
              <td width="6">:</td>
              <td width="294"><input name="myusername" type="text" id="myusername"></td>
            </tr>
            <tr>
              <td>Password</td>
              <td>:</td>
              <td><input name="mypassword" type="text" id="mypassword"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="Login"></td>
            </tr>
          </table>
        </td>
      </form>
    </tr>
  </table>
</div>
</body>






</html>
