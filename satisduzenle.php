
<?php
header('Content-type: text/html; charset=utf-8');
require_once("veritabanibaglantisi.php");
$sorgumo="SELECT * from odalar where odadurumu='Boş'|| odadurumu='boş' || odadurumu='' ";
$sco=$baglanti->query($sorgumo); 
//require_once("satislistele.php");
$gelenkayit=$_GET['kno'];
$zaman=date('Y/m/d');
/*$cikisabak="SELECT * FROM satislar where ctarih<='$zaman'";
$cikis=$baglanti->query($cikisabak);

{
  echo "ÇIKIŞ TARİHİ GEÇEN SATIŞLAR ÜZERİNDE DÜZENLEME İŞLEMİ YAPAMAZSINIZ!".'<img src="img/if_101_Warning_183416.png" align="center">';
}
*/

$alinacak="SELECT musteriler.musteri_id,musteriler.adi,musteriler.soyadi,musteriler.tc,odalar.oda_no,satislar.kalacak_kisi,satislar.kalacak_gun,satislar.satis_tutari,satislar.odeme,satislar.gtarih,satislar.ctarih,satislar.satis_tipi from  musteriler inner join satislar  on (musteriler.musteri_id=satislar.musteri_id) inner join  odalar on ( satislar.oda_id=odalar.oda_id) where satislar.musteri_id='$gelenkayit' and satislar.ctarih>'$zaman'";
     $alinacakveri=$baglanti->query($alinacak);
	?>
<body>
	<?php 
     foreach ($alinacakveri as $key => $value) {
    
     
	?>
<form id="guncelleme" name="guncelleme" method="POST" >
	
	<table border="0">
    <tr>
    	<td><label for="oda_no">ODA-NO: </label></td>
 <td> <input type="text" name="oda_no" value="<?php echo $value['oda_no'];?>"></td>
    </tr>
    <tr>
      <td><label for="oda_no">KİŞİ SAYISI: </label></td>
 <td> <input type="text" name="kisi_sayisi" value="<?php echo $value['kalacak_kisi'];?>"></td>
    </tr>
    <tr>
      <td><label for="oda_no">GÜN SAYISI: </label></td>
 <td> <input type="text" name="gun_sayisi" value="<?php echo $value['kalacak_gun'];?>"></td>
    </tr>
    <tr>
    	<td><label for="satis_tutari">SATIŞ TUTARI: </label></td>
<td> <input type="text" name="satis_tutari" value="<?php echo $value['satis_tutari'];?>"></td>
    </tr>
    <tr>
      <td><label for="oda_no">ÖDEME: </label></td>
 <td> <input type="text" name="odeme" value="<?php echo $value['odeme'];?>"></td>
    </tr>
    <tr>
        <td><label for="satis_tipi">SATIŞ TİPİ: </label></td>
<td> <input type="text" name="satis_tipi" value="<?php echo $value['satis_tipi'];?>"></td>
    </tr>
    <tr>
       <form action="demo_form.php">
    	<td><label for="gtarih">GİRİŞ TARİHİ: </label></td>
<td> <input type="date" name="gtarih"  value="<?php echo $value['gtarih'];?>"></td>
    </tr>
    <tr>
       <form action="demo_form.php">
    	<td><label for="ctarih">ÇIKIŞ TARİHİ: </label></td>
<td> <input type="date" name="ctarih" value="<?php echo $value['ctarih'];?>"></td>
    </tr>
  </form>
</table>

<p>
	<input type="hidden" value="<?php echo $gelenkayit;  ?>" name="kontrol"/>
	  <input type="submit" name="duzenle" value="DÜZENLE">
</p>
</form>
<?php
$kontrol=$value['oda_no'];

}
?>
<?php
if(isset($_REQUEST["duzenle"]))
  {     $kno=$_REQUEST['kno'];
        $oda_no=$_REQUEST["oda_no"];
        $kisi_sayisi=$_REQUEST['kisi_sayisi'];
        $gun_sayisi=$_REQUEST['gun_sayisi'];
        $odeme=$_REQUEST['odeme'];
        $satis_tutari=$_REQUEST["satis_tutari"];
        $satis_tipi=$_REQUEST["satis_tipi"];
        $gtarih=$_REQUEST["gtarih"];
        $ctarih=$_REQUEST["ctarih"];
        $k=$_REQUEST["kontrol"];
        $sorguodalar="SELECT * FROM odalar where oda_no=$oda_no";
         $sorguoda=$baglanti->query($sorguodalar);
         foreach ($sorguoda as $key => $value) {
            $oda_id=$value['oda_id'];
         }
        $sorgu="UPDATE satislar SET kalacak_kisi='$kisi_sayisi',kalacak_gun='$gun_sayisi',satis_tutari='$satis_tutari',odeme='$odeme',satis_tipi='$satis_tipi',gtarih='$gtarih',ctarih='$ctarih',
        oda_id='$oda_id' WHERE 
       musteri_id='$k'"; 
        $sorgu_calistir=$baglanti->query($sorgu);

           $sorgu2="UPDATE odalar SET odadurumu='$satis_tipi' where oda_no='$oda_no'";
           $sorgu2calistir=$baglanti->query($sorgu2);
        

        if($kontrol!=$oda_no)
        {
          $sonuc1="UPDATE odalar set odadurumu='Boş' where oda_no='$kontrol'";
          $sonuc2="UPDATE odalar set odadurumu='$satis_tipi' where oda_no='$oda_no'";
          $sonuc1calistir=$baglanti->query($sonuc1);
          $sonuc2calistir=$baglanti->query($sonuc2);
        }
       
       
        if ($sorgu_calistir)
        {
           echo "<h6>GÜNCELLEME İŞLEMİ BAŞARIYLA GERÇEKLEŞTİRİLDİ</h6>".'<img src="img/if_ok_61805.png" align="center">';
          header("location:main.php?link=2");
        }
       
        else
        { 
           echo "GÜNCELLEME İŞLEMİ GERÇEKLEŞTİRİLEMEDİ.".'<img src="img/if_DeleteRed_34218.png">';
           
        }
  } 

?>
</body>
