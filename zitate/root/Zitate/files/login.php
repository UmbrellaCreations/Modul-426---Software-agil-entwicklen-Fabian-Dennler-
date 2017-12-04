<?php
header("Content-Type: text/html; charset=utf-8");
$a = session_id();
if(empty($a)) session_start();

   include('../inc/connect.php');
    $error = "";

   if(isset($_POST['username']) && isset($_POST['passwort'])) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['passwort']);
      
      $sql = "SELECT id FROM login WHERE username = '$myusername' and passwort = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location:liste.php");
      }else {
         $error = "Der Benutzername oder das Passwort ist nicht korrekt";
      }
   }
?>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="../css/login.css">
	</head>

	<body>
		<div id="login">
			<div class="bg"></div>
			<div align = "center">
				<div style = "width:300px; border: solid 1px #333333; " align = "left">
					<div class="loginTitle"><b>Login</b></div>
					<div class="loginBox">
						<form action = "" method = "post">
							<label>UserName  :</label><input type = "text" name = "username" class = "box" autofocus/><br /><br/>
							<label>Password  :</label><input type = "password" name = "passwort" class = "box"/><br/><br/>
							<input class="loginBtn" type = "submit" value = " Submit "/><br/>
						</form>
						<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
						<a class="backToPage" href ="../index.php">Back to Page</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>