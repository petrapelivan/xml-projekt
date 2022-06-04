<?php

$username="";
$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$ans=$_POST;

	if (empty($ans["username"]))  {
        	echo "Korisnički račun nije unesen.";
		
    		}
	else if (empty($ans["password"]))  {
        	echo "Lozinka nije unesena.";
		
    		}
	else {
		$username= $ans["username"];
		$password= $ans["password"];
	
		provjera($username,$password);
	}
}

function provjera($username, $password) {
	
	$xml=simplexml_load_file("users.xml");
	
	foreach ($xml->user as $usr) {
  	 	$usrn = $usr->username;
		$usrp = $usr->password;
		$usrime = $usr->ime;
		$usrprezime = $usr->prezime;
		if($usrn == $username){
			if($usrp == $password){
                session_start();
                $_SESSION['username'] = $username;
				header("Location: index.php");
				die;
				}
			else{
				echo "Netočna lozinka";
				return;
				}
			}
		}
		
	echo "Korisnik ne postoji.";
	return;
}
?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG-IN</title>
</head>
<body>
    <form action="" method="post">
        <table>
        <tr>
            <td><label><br>Korisnički račun: </label></td>
            <td><br><input id="name" name="username" type="text"><td>
        </tr>

        <tr>
            <td><label>Lozinka: </label></td>
            <td><input id="password" name="password" type="password"><td>
        </tr>

        <tr>
            <td><br><input name="submit" type="submit" value="  Login  "></td>
        <td>
        </table>
    </form>
</body>
</html>
