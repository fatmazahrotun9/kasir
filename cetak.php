
<?php
include('daftar_menu.php');


function getHarga($daftar_Menu, $menu) {
   $nilai = 0;
 foreach ($daftar_Menu as $item) {
  if ($item["nama"] == $menu) {
  	$nilai = $item["harga"];
   break ;
  }
 }
 return $nilai; 
}

$keranjang = $_POST['menu'];

$hargaKeseluruhan = 0;

foreach ($keranjang as $pesanan) {
 $harga         = getHarga($daftar_Menu, $pesanan["nama"]);
 $jumlahPesanan = $pesanan["jumlah_Pesanan"];
 $subtotal      = $harga * $jumlahPesanan;
 $hargaKeseluruhan += $subtotal;
 echo "</br>". $jumlahPesanan. " ";
 echo $pesanan["nama"]. " ". $harga. " -> Total Peritem = Rp. ";
 echo $subtotal;
}

echo "</br> ";
echo "Total Seluruhnya : Rp. ". $hargaKeseluruhan;

?>