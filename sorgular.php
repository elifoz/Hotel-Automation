<body>
	<head>
		<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="mainstyle2.css" />
		</head>
		<?php
require_once("veritabanibaglantisi.php");
?>
<?php
function listele($tabloadi){
$musteri_sorgu="select * from ".$tabloadi;
return $musteri_sorgu;
}

/*function duzenle()
{
foreach ($firmayi_getir as $key => $value) {
 		# code...	
?>
<div class="faturahizasi">
<form method="POST" action="main.php?link=14">
	
	<table border="0">
    <tr>
    	<td><label>FİRMA ADI: </label></td>
 <td> <input type="text" name="firma_adi" class="ilkharf" value="<?php echo $value['firma_Adi'];?>"></td>
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
<td> <textarea name="fatura_adresi" class="ilkharf"  cols="50" rows="5"></textarea></td></td>
    </tr>
</table>
</form>
</div>
<?php
}
}
           */ ?>
            </body>