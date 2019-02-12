<?php
require_once('veritabanibaglantisi.php');
$musterikayit=$_REQUEST['kno'];
$musteriyibul="SELECT * FROM fatura_islemleri where musteri_id='$musterikayit'";
$musterisorgucalistir=$baglanti->query($musteriyibul);
foreach ($musterisorgucalistir as $key => $value) {
	$fatura_id=$value['fatura_id'];
}
?>
<?php
$zaman=date('Y/m/d');
$tcrmusteriler="SELECT musteriler.musteri_id,musteriler.adi,musteriler.soyadi,fatura_bilgileri.firma_adi,fatura_bilgileri.vergi_no,fatura_bilgileri.vergi_dairesi,fatura_bilgileri.fatura_adresi,fatura_islemleri.islem_tarihi,fatura_islemleri.fatura_tutari FROM musteriler inner join fatura_islemleri on(musteriler.musteri_id=fatura_islemleri.musteri_id) inner join fatura_bilgileri on(fatura_islemleri.fatura_id=fatura_bilgileri.fatura_id) where fatura_islemleri.musteri_id='$musterikayit'";

$ticarimusteri=$baglanti->query($tcrmusteriler);
?>
<body>
	<?php 
     foreach ($ticarimusteri as $key => $value) {
	?>
<form id="guncelleme" name="guncelleme" method="POST" >
	
	<table border="0">
    <tr>
    	<td><label >AD: </label></td>
 <td> <input type="text" name="adi" value="<?php echo $value['adi'];?>"></td>
    </tr>
    <tr>
      <td><label>SOYADI: </label></td>
 <td> <input type="text" name="soyadi" value="<?php echo $value['soyadi'];?>"></td>
    </tr>
    <tr>
      <td><label>FİRMA ADI: </label></td>
 <td> <input type="text" name="firma_adi" value="<?php echo $value['firma_adi'];?>"></td>
    </tr>
    <tr>
    	<td><label>VERGİ NO: </label></td>
<td> <input type="text" name="vergi_no" value="<?php echo $value['vergi_no'];?>"></td>
    </tr>
    <tr>
      <td><label >VERGİ DAİRESİ: </label></td>
 <td> <input type="text" name="vergi_dairesi" value="<?php echo $value['vergi_dairesi'];?>"></td>
    </tr>
    <tr>
        <td><label >FATURA ADRESİ: </label></td>
<td> <input type="text" name="fatura_adresi" value="<?php echo $value['fatura_adresi'];?>"></td>
    </tr>
    <tr>
        <td><label >İŞLEM TARİHİ: </label></td>
<td> <input type="text" name="islem_tarihi" value="<?php echo $value['islem_tarihi'];?>"></td>
    </tr>
    <tr>
        <td><label >FATURA TUTARI: </label></td>
<td> <input type="text" name="fatura_tutari" value="<?php echo $value['fatura_tutari'];?>"></td>
    </tr>
    <?php
}
    ?>
</table>
<p>
	  <input type="submit" name="duzenle" value="DÜZENLE">
</p>
</form>
<?php

if(isset($_REQUEST['duzenle']))
{
 $ad=$_REQUEST['adi'];
 $soyad=$_REQUEST['soyadi'];
 $firma_adi=$_REQUEST['firma_adi'];
 $vergi_no=$_REQUEST['vergi_no'];
 $vergi_dairesi=$_REQUEST['vergi_dairesi'];
 $fatura_adresi=$_REQUEST['fatura_adresi'];
 $islem_tarihi=$_REQUEST['islem_tarihi'];
 $fatura_tutari=$_REQUEST['fatura_tutari'];
	$sorgu1="UPDATE musteriler SET adi='$ad',soyadi='$soyad' where musteri_id='$musterikayit'";
	$sorgucalistir1=$baglanti->query($sorgu1);
	$sorgu2="UPDATE fatura_bilgileri SET firma_adi='$firma_adi',vergi_no='$vergi_no',vergi_dairesi='$vergi_dairesi',fatura_adresi='$fatura_adresi' where fatura_id='$fatura_id'";
	$sorgucalistir2=$baglanti->query($sorgu2);
	$sorgu3="UPDATE fatura_islemleri SET islem_tarihi='$islem_tarihi',fatura_tutari='$fatura_tutari' where musteri_id='$musterikayit'";
	$sorgucalistir3=$baglanti->query($sorgu3);
if($sorgucalistir1 and $sorgucalistir2 and $sorgucalistir3)
{
	echo "<h6>GÜNCELLEME İŞLEMİ BAŞARIYLA GERÇEKLEŞTİRİLDİ</h6>".'<img src="img/if_ok_61805.png" align="center">';
}
else
{
    echo "GÜNCELLEME İŞLEMİ GERÇEKLEŞTİRİLEMEDİ.".'<img src="img/if_DeleteRed_34218.png">';
}
}
?>
</body>