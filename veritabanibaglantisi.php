<?php
header('Content-type: text/html; charset=utf-8');
$servername = "localhost";
$username = "elif";
$password = "123456";
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
<?php
/*if(!isset($_REQUEST['dil']))

        {
        $dil="tr";
        $dosya=$dil.".php";
        $_SESSION['dil']=$dosya;
        include($dosya);
        }

      else{
            $dil=$_REQUEST['dil'];
           $dosya=$dil.".php";
           $_SESSION['dil']=$dosya;
          include($dosya);
      }*/
    ?>