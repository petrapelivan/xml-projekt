<?php 
session_start();
$username = $_SESSION['username'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
}

function ispisi($username) {
    $xml=simplexml_load_file("info.xml");

    foreach($xml->info as $inf) {
        $usr = $inf->username;
        $ime = $inf->ime;
        $prezime = $inf->prezime;
        $slika = $inf->img['src'];

        if($usr == $username){
            echo '<img src="' .$slika. '" height="100"; "width="100" ;> <br><br>';
            echo "Ime: $ime <br>";
            echo "Prezime: $prezime <br><br>";
            echo "Predmeti: <br>";
            foreach ($inf->children() as $predmeti)
            {
                foreach ($predmeti->children() as $naz) {
                    echo " - " . $naz . ' <br>';
                }
            }
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Studomat</h1>
    <h2>Dobrodošao, <?php echo  $username ?></h2>

    <p><?php ispisi($username)?></p>

    <a href="logout.php">Odjavi se</a>
</body>
</html>