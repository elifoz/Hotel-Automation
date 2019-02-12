
<?php
	header('Content-type: text/html; charset=utf-8');
	require_once("veritabanibaglantisi.php");
?>
<?php 
	$ad=$_REQUEST['q'];
		//$listele_sorgu="SELECT * from musteriler where tc like('%$tc%')";
	$listele_sorgu="SELECT * from musteriler where adi like('%$ad%') or soyadi like('%$ad%')";
	$listele=$baglanti->query($listele_sorgu);
	$toplam =$listele->rowCount();
		if($listele==true){
			echo "<table border='0'>";
			echo "<tr>";
			echo "<td><label>AD</label></td><td><label>SOYAD</label></td><td><label>E-POSTA</label></td><td><label>
			TC-NO</label></td><td><label>TEL-NO
			</label></td><td><label>İL</label></td><td><label>MESLEK</label></td>";
			echo"</tr>";
		foreach ($listele as $key => $value){
				$odasec="<a href='main.php?link=7&kno=".$value['musteri_id']."'>Oda Satışı</a>";
				$oncekisatis="<a href='main.php?link=13&kno=".$value['musteri_id']."'>Önceki Satışlar</a>";
				echo "<tr>";
				echo "<td>".$value['adi']."</td><td>".$value['soyadi']."</td><td>".$value['e_posta']."</td><td>".$value['tc']."
				</td><td>"
				.$value['tel_no']."</td><td>".$value['adres']."</td><td>".$value['meslegi']."</td><td><button>".$odasec."
				</button></td><td><button>".$oncekisatis."</button></td>";
			    echo "</tr>";
											}
				echo "</table>";
		}
		else
		{
			 $islem="<b><a href='main.php?link=10'>MÜŞTERİYİ EKLE</a></b>";
		 	 echo "<td><label>".$islem."</td></label>";
		}
?>
