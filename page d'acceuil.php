<?php
  session_start();

  if(!isset($_SESSION['compt'])){
     $_SESSION['compt'] = 1;
  }else{
  	 $_SESSION['compt']++; 
  }
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		html, body{
			margin: 0px;
		}
		img{
			margin: auto;
		}
		form{
			width : 50%;
			text-align: center;
			margin: auto;
			margin-left: 30%;
		}
		#input input{
			width: 120%;
		}
		#text{
			margin-right: 30px;
			float: left;
		}
	</style>
	<!--bootstrap css-->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Login Page Using PHP</title>
</head>
<body>

	<div >
	<img src="undraw_secure_login_pdn4.png" width="40%" height="40%">
	<form method="get">
		<table>
			<tr>
				<td id="text">
					<label>Le nom : </label>
				</td>
				<td id="input">
					<input type="text" name="nom" >
				</td>
			</tr>
			<tr>
				<td id="text">
					<label>L'email : </label>
				</td>
				<td id="input">
					<input type="text" name="email">
				</td>
			</tr>
			<tr>
				<td id="text">
					<label>La ville :</label>
				</td>
				<td id="input">
					<input type="text" name="ville">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
					<input type="submit" value="Connecter">
				</td>
			</tr>
		</table>      
	</form>
	<?php
        $arr = array();
        $arr[0] = isset($_SESSION['compt']) ? $_SESSION['compt']:NULL;
        $arr[1] = isset($_GET['email']) ? $_GET['email']:NULL;
        $arr[2] = isset($_GET['nom']) ? $_GET['nom']:NULL;
        $arr[3] = isset($_GET['ville']) ? $_GET['ville']:NULL;

        $data = "le nbr de reload : ".$arr[0]."\r\nle nom : ".$arr[2]."\r\nla ville : ".$arr[3]."\r\nl'email : ".$arr[1];
        $fp = fopen('file.txt', 'w');
        flock($fp, LOCK_EX);
        fwrite($fp, $data);
        flock($fp, LOCK_UN);
        fclose($fp);
   	?>
	</div>
   
</body>
</html>