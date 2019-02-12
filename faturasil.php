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
        <td><label><?php echo $value['firma_adi'];?></label></td>
    </tr>
    <tr>
    	<td><label >VERGİ NUMARASI: </label></td>
        <td><label><?php echo $value['vergi_no'];?></label></td>
    </tr>
    <tr>
        <td><label >VERGİ DAİRESİ: </label></td>
        <td><label><?php echo $value['vergi_dairesi'];?></label></td>
    </tr>
    <tr>
    	<td><label>FATURA ADRESİ: </label></td>
        <td><label><?php echo $value['fatura_adresi'];?></label></td></td>
    </tr>
</table>
        <input  class="yazikalinligi" type="submit" name="sil" value="SİL">
</form>
<?php
}
    if(isset($_REQUEST['sil']))
  {
     $sorgu="DELETE FROM fatura_bilgileri WHERE fatura_id='$firmabilgileri'";
     $sorgula=$baglanti->query( $sorgu);
        if($sorgula) 
     {
     	echo "<h4>Silme İşlemi Başarıyla Gerçekleştirildi</h4>".'<img src="img/if_ok_61805.png">';
     }
     else{
         echo "Silme İşlemi Gerçekleştirilemedi".'<img src="img/if_DeleteRed_34218.png">';
         }
  }
            ?>