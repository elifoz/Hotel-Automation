<?php
date_default_timezone_set('Europe/Istanbul');
session_start();
if(!isset($_SESSION['kullaniciadi']))
{
    header("location:girissayfasi.php");
}
require_once("veritabanibaglantisi.php");
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/mainstyle2.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>  
  <script type="text/javascript" src="js/musteri.js"></script>
  <script type="text/javascript" src="js/kullaniciadikontrol.js"></script>
  <script type="text/javascript" src="js/sifrekontrol.js"></script>
</head>
<body>
  <a href="main.php?dil=tr">Türkçe</a></br>
  <a href="main.php?dil=en">ENGLISH</a></br>
<?php
/*
session_start();
if(!isset($_REQUEST['dil']))

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
      }
*/
?>
<ul>
    <li><a href="main.php?link=1">Anasayfa</a></li>
    <li><a href="main.php?link=4">Kayıt Ve Rezervasyon</a></li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Müşteriler</a>
        <div class="dropdown-content">
      <a href="main.php?link=5">Tüm Müşteriler</a>
      <a href="main.php?link=19">Ticari Müşteriler</a>
    <li><a href="main.php?link=2">Satışlar</a></li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Odalar</a>
         <div class="dropdown-content">
      <a href="main.php?link=3">Oda Bilgileri</a>
<?php 
           if($_SESSION['kullaniciadi']=='admin') {
?>
       <a href="main.php?link=11">Oda İşlem</a>
    <li><a href="main.php?link=9">Kullanıcılar</a></li>
<?php
                                                   }
?>
    <li><a href="main.php?link=6">Çıkış Yap</a></li>
</ul>
      <div class="arkaplan">
<?php
        if(isset($_REQUEST['link'])){
           $link=$_REQUEST['link'];
 }
         else
         {
            $link=0;
              }
    switch($link){
    case 1 :
    include("ilk.php");
    break;
    case 2 :include("satislistele.php");
    break;
    case 3 :include("odalar.php");
    break;
    case 4 :include("musteriodakayit.php");
    break;
    case 5:include("musteriler.php");
    break;
    case 6:include("cikissayfasi.php");
    break;
    case 7:include("sadeceodasec.php");
    break;
    case 8:include("satisduzenle.php");
    break;
    case 9:include("kullanici.php");
    break;
    case 10:include("musteriodakayit.php");
    break;
    case 11:include("islem.php");
    break;
    case 12:include("satissil.php");
    break;
    case 13:include("oncekisatislar.php");
    break;
    case 14:include("faturasec.php");
    break;
    case 15:include("faturaduzenle.php");
    break;
    case 16:include("faturasil.php");
    break;
    case 17:include("faturaekle.php");
    break;
    case 18:include("firmasec.php");
    break;
    case 19:include("ticarimusteriler.php");
    break;
     case 20:include("ticarimusteriduzenle.php");
    break;
    case 21:include("ticarimusterisil.php");
    break;
     case 22:include("tablodenemesi.php");
    break;
    default:
    case 0: include("ilk.php");
                    }
    $zaman=date('Y/m/d');
      if($link==3)
      { 
    $sorgu="SELECT * from satislar where ctarih<='$zaman'";
    $sorgula=$baglanti->query($sorgu);
      if($sorgula)
      {
        foreach ($sorgula as $key => $value) {
        $guncellenecek_kayit=$value['oda_id'];
       $guncelle="UPDATE odalar set odadurumu='Boş' where oda_id=$guncellenecek_kayit";
       $guncelleniyor=$baglanti->query($guncelle);
      }
      }
      /*$odasorgu="SELECT oda_no FROM odalar where odadurumu='Kesin Kayıt' || odadurumu='Rezervasyon' ";
      $odalar=$baglanti->query($odasorgu);
     if($odalar and ctarih )*/
}                                                   ?>
    </div>
</body>
</html>

