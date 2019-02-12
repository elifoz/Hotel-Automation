<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Müşteri güncelleme Tablosu</title>
</head>
<?php
header('Content-type: text/html; charset=utf-8');
require_once("veritabanibaglantisi.php");
//require_once("satislistele.php");
$gelenkayit=$_GET['kno'];
$zaman=date('Y/m/d');
$alinacak="SELECT musteriler.musteri_id,musteriler.adi,musteriler.soyadi,musteriler.tc,odalar.oda_no,satislar.satis_tutari,satislar.gtarih,satislar.ctarih,satislar.satis_tipi from  musteriler inner join satislar  on (musteriler.musteri_id=satislar.musteri_id) inner join  odalar on ( satislar.oda_id=odalar.oda_id) where satislar.musteri_id='$gelenkayit'and satislar.ctarih>'$zaman'";
     $alinacakveri=$baglanti->query($alinacak);
	?>
<body>
	<?php 
     foreach ($alinacakveri as $key => $value) {
    
     
	?>
<form id="guncelleme" name="guncelleme" method="POST" >
	
	<table border="0">
    <tr>
      <td><label for="oda_no">AD: </label></td>
 <td> <label><?php echo $value['adi'];?></label></td>
    </tr>
    <tr>
      <td><label for="oda_no">SOYAD: </label></td>
 <td> <label><?php echo $value['soyadi'];?></label></td>
    </tr>
    <tr>
      <td><label for="oda_no">TC: </label></td>
 <td> <label><?php echo $value['tc'];?></label></td>
    </tr>
    <tr>
    	<td><label for="oda_no">ODA-NO: </label></td>
 <td> <label><?php echo $value['oda_no'];?></label></td>
    </tr>
    <tr>
    	<td><label for="satis_tutari">SATIŞ TUTARI: </label></td>
<td> <label><?php echo $value['satis_tutari'];?></label></td>
    </tr>
    <tr>
        <td><label for="satis_tipi">SATIŞ TİPİ: </label></td>
<td><label><?php echo $value['satis_tipi'];?></label></td>
    </tr>
    <tr>
    	<td><label for="gtarih">GİRİŞ TARİHİ: </label></td>
<td> <label><?php echo $value['gtarih'];?></label></td>
    </tr>
    <tr>
    	<td><label for="ctarih">ÇIKIŞ TARİHİ: </label></td>
<td> <label><?php echo $value['ctarih'];?></label></td>
    </tr>
</table>

<p>
	<input type="hidden" value="<?php echo $gelenkayit;  ?>" name="kontrol"/>
	  <input type="submit" name="sil" value="SİL">
</p>
</form>

<?php
}
?>
<?php
if(isset($_REQUEST["sil"]))
  {     $kno=$_REQUEST['kno'];
        $k=$_REQUEST["kontrol"];
        $sorgu= "DELETE FROM satislar where musteri_id='$k'";
        $sorgu_calistir=$baglanti->query($sorgu);
       
        if ($sorgu_calistir)
        {       
          $oda=$value['oda_no'];
          $odadurumuguncelle="UPDATE odalar SET odadurumu='Boş' where oda_no='$oda'";
          $baglanti->query( $odadurumuguncelle);
         header("location:main.php?link=2");
         echo "<h6>SİLME İŞLEMİ BAŞARIYLA GERÇEKLEŞTİRİLDİ</h6>".'<img src="img/if_ok_61805.png" align="center">';
        }
        else
        { 
            echo "SİLME İŞLEMİ GERÇEKLEŞTİRİLEMEDİ.".'<img src="img/if_DeleteRed_34218.png">';
        }
  } 

?>
</body>
</html>