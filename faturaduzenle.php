<?php
header('Content-type: text/html; charset=utf-8');
require_once("veritabanibaglantisi.php");
?>
<?php
$firmabilgileri=$_REQUEST['kno'];
$firmagetir="SELECT * FROM fatura_bilgileri where fatura_id='$firmabilgileri'";
$firmayi_getir=$baglanti->query($firmagetir);
foreach ($firmayi_getir as $key => $value) {
?>
<form method="POST" action="">
	<table border="0">
    <tr>
        <td><label>FİRMA ADI: </label></td>
        <td><input type="text" name="firma_adi" class="ilkharf" value="<?php echo $value['firma_adi'];?>"></td>
    </tr>
    <tr>
    	<td><label >VERGİ NUMARASI: </label></td>
        <td> <input type="text" name="vergi_no" value="<?php echo $value['vergi_no'];?>"></td>
    </tr>
    <tr>
        <td><label >VERGİ DAİRESİ: </label></td>
        <td> <input type="text" name="vergi_dairesi" class="ilkharf" value="<?php echo $value['vergi_dairesi'];?>"></td>
    </tr>
    <tr>
    	<td><label>FATURA ADRESİ: </label></td>
        <td><input name="fatura_adresi" class="ilkharf" value="<?php echo $value['fatura_adresi'];?>" width="50px"></td>
    </tr>
    </table>
        <input  class="yazikalinligi" type="submit" name="guncelle" value=GÜNCELLE >
</form>
<?php
}
     if(isset($_REQUEST['guncelle']))
       {                        
    $firma_adi=$_REQUEST['firma_adi'];
    $vergi_no=$_REQUEST['vergi_no'];
    $vergi_dairesi=$_REQUEST['vergi_dairesi'];
    $fatura_adresi=$_REQUEST['fatura_adresi'];
    //-----------------------------------------------------
      $sorgu="UPDATE fatura_bilgileri SET firma_adi='$firma_adi',vergi_no='$vergi_no',vergi_dairesi='$vergi_dairesi',fatura_adresi=
       '$fatura_adresi' where fatura_id='$firmabilgileri'";
      $sorgula=$baglanti->query( $sorgu);
     if($sorgula) 
       {
     	echo "<h4>Güncelleme İşlemi Başarıyla Gerçekleştirildi</h4>".'<img src="img/if_ok_61805.png">';
       }
       else
       {
         echo "Güncelleme İşlemi Gerçekleştirilemedi".'<img src="img/if_DeleteRed_34218.png">';
       }
  }
            ?>