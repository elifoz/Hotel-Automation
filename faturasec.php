<?php
if(!isset($_SESSION)) {
     session_start();
}
require_once('veritabanibaglantisi.php');
require_once('sorgular.php');
	$fatura="SELECT * FROM fatura_bilgileri";
	$faturasec=$baglanti->query($fatura);
//-------------------------------------------
$musteri_id=$_REQUEST['kno'];
$islem_tarihi=$_REQUEST['islemtarihi'];
$fatura_tutar=$_REQUEST['faturatutar'];
//-------------------------------------------
$_SESSION['musteri_id']=$musteri_id;
$_SESSION['islemtarihi']=$islem_tarihi;
$_SESSION['fatura_tutar']=$fatura_tutar;
?>
<body>
<form>
  	<table>
    <tr>
	   	<p><b>Firma Seçiniz:</b></p>
		<td>
		<select name="firmasec" onchange="firmagoruntule(this.value);">
	    <option value="-1">Seçim Yapınız</option>
	    <?php
          foreach ($faturasec as $key => $value) {
         	?>
     	<option  value="<?php echo $value['fatura_id'];?>"><?php echo $value['firma_adi']; ?></option>
<?php
 }
?>
		</select>
		<p id="firmayigetir"></p>
		</td>
	</tr>
		 <button> <a href="main.php?link=17">YENİ FİRMA (FATURA BİLGİSİ) EKLE</a></button> 
	</table>
</form>	
</body>

