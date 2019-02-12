
<?php
header('Content-type: text/html; charset=utf-8');
require_once("veritabanibaglantisi.php");
?>
<form method="POST" action="">
    <table border="0">
    <tr>
    	<td><label>FİRMA ADI: </label></td>
        <td> <input type="text" name="firma_adi" class="ilkharf"></td>
    </tr>
    <tr>
    	<td><label >VERGİ NUMARASI: </label></td>
        <td> <input type="text" name="vergi_no"></td>
    </tr>
    <tr>
        <td><label >VERGİ DAİRESİ: </label></td>
        <td> <input type="text" name="vergi_dairesi" class="ilkharf"></td>
    </tr>
    <tr>
    	<td><label>FATURA ADRESİ: </label></td>
        <td><input name="fatura_adresi" class="ilkharf"></td>
    </tr>
    </table>
    <input  class="yazikalinligi" type="submit" name="ekle" value=EKLE >
</form>
<?php
    if(isset($_REQUEST['ekle']))
  {

    $firma_adi=$_REQUEST['firma_adi'];
    $vergi_no=$_REQUEST['vergi_no'];
    $vergi_dairesi=$_REQUEST['vergi_dairesi'];
    $fatura_adresi=$_REQUEST['fatura_adresi'];
      $sorgu="INSERT INTO fatura_bilgileri (firma_adi,vergi_no,vergi_dairesi,fatura_adresi)
                        values('$firma_adi','$vergi_no','$vergi_dairesi','$fatura_adresi')";
      $sorgula=$baglanti->query( $sorgu);
    if($sorgula) 
     {
     	echo "<h4>Ekleme İşlemi Başarıyla Gerçekleştirildi</h4>".'<img src="img/if_ok_61805.png">';
     }
     /*else
     {
         echo "Ekleme İşlemi Gerçekleştirilemedi".'<img src="img/if_DeleteRed_34218.png">';
     }
     */
  }
            ?>