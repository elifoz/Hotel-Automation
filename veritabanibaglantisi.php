<?php
header('Content-type: text/html; charset=utf-8');
$servername = "localhost";
$username = "";
$password = "";
$dbadi="hotel";
 try{
    $baglanti = new PDO("mysql:host=$servername;dbname=$dbadi;charset=utf8", $username, $password);

    //set the PDO error mode to exception
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

?>
