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
	<?php 
     foreach ($ticarimusteri as $key => $value) {
	?>
<form id="guncelleme" name="guncelleme" method="POST" >
	<table border="0">
    <tr>
    	<td><label >AD: </label></td>
 <td> <label><?php echo $value['adi'];?></label></td>
    </tr>
    <tr>
      <td><label>SOYADI: </label></td>
 <td><label><?php echo $value['soyadi'];?></label></td>
    </tr>
    <tr>
      <td><label>FİRMA ADI: </label></td>
 <td> <label><?php echo $value['firma_adi'];?></label></td>
    </tr>
    <tr>
    	<td><label>VERGİ NO: </label></td>
<td> <label><?php echo $value['vergi_no'];?></label></td>
    </tr>
    <tr>
      <td><label >VERGİ DAİRESİ: </label></td>
 <td> <label><?php echo $value['vergi_dairesi'];?></label></td>
    </tr>
    <tr>
        <td><label >FATURA ADRESİ: </label></td>
<td> <label><?php echo $value['fatura_adresi'];?></label></td>
    </tr>
    <tr>
        <td><label >İŞLEM TARİHİ: </label></td>
<td><label><?php echo $value['islem_tarihi'];?></label></td>
    </tr>
    <tr>
        <td><label >FATURA TUTARI: </label></td>
<td> <label><?php echo $value['fatura_tutari'];?></label></td>
    </tr>
    <?php
}
    ?>
</table>
<p>
	  <input type="submit" name="sil" value="SİL">
</p>
</form>
<?php
if(isset($_REQUEST['sil']))
{
    //$sorgu1="DELETE FROM musteriler where musteri_id='$musterikayit'";
    //$sorgucalistir1=$baglanti->query($sorgu1);
    //$sorgu2="DELETE FROM fatura_bilgileri where fatura_id='$fatura_id'";
    //$sorgucalistir2=$baglanti->query($sorgu2);
    $sorgu3="DELETE FROM fatura_islemleri where musteri_id='$musterikayit'";
    $sorgucalistir3=$baglanti->query($sorgu3);
if( $sorgucalistir3)
{
    echo "<h6>SİLME İŞLEMİ BAŞARIYLA GERÇEKLEŞTİRİLDİ</h6>".'<img src="img/if_ok_61805.png" align="center">';
}
else
{
    echo "SİLME İŞLEMİ GERÇEKLEŞTİRİLEMEDİ.".'<img src="img/if_DeleteRed_34218.png">';
}
}
    ?>
