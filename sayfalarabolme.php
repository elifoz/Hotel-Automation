<?php
require_once('veritabanibaglantisi.php');
?>


<?php
// Değişkenleri tanımlayalım
$page = $_SERVER['PHP_SELF'];
$limit = "5"; // Kaç kayıtta bir sayfalama yapılacak ?
$girdi = "SELECT satis_id from satislar";
$girdiler=$baglanti->query($girdi);
$sayi =$girdiler->rowcount();
echo $sayi; 
$kac_tane = $sayi / $limit; 
 

if($kac_tane%$limit!="0") 
	{ $kac_tane++; }

$veri ="SELECT * FROM satislar order by satis_id desc limit $limit ";
$veriler=$baglanti->query($veri);
 foreach ($veriler as $key => $value) {
 	# code...
 
$id = $value['satis_id'];
$isim = $value['satis_tutari'];
$mesaj = $value['odeme'];
echo $id ,$isim, $mesaj."<br>";
}
 
// Sayfalama linklerini ekrana yazdıralım
for($i=1; $i < $kac_tane; $i++)
 { echo("<button><a href=$page?paged=$i>$i</a></button>"); }


?> 
