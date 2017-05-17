<html>
<head>
<script src="jquery.min.js"></script>
<script>
$(document).ready(function(){
 $i = 1;
    $("#pesan").click(function(){
     var nama_Menu = $("#menu_Pesanan").val();
     var jumlah_Menu = $("#jumlah_Pesanan").val();
     var harga_Menu  = $("#menu_Pesanan").find("option:selected").data('harga');
     var total_Item = (harga_Menu * jumlah_Menu);
     var input_Menu   = "<input type='hidden' name='menu["+$i+"][nama]' value='"+nama_Menu+"'>";
     var input_Harga  = "<input type='hidden' name='menu["+$i+"][jumlah_Pesanan]' value='"+jumlah_Menu+"'>";
        $("#keranjang").append("<li>"+jumlah_Menu+" "+nama_Menu+" = Rp. "+harga_Menu+" => "+"Total PerItem = "+"Rp. "+total_Item+input_Menu+input_Harga+"</li>");
        $i++;
    });
});
</script>
</head>
<body>

<?php 
include('daftar_menu.php');

foreach($daftar_Menu as $data) {
echo "<table border=5 >";
echo "<tr>";
echo "<td>".$data['nama'];
echo "<td>"."Rp. ". $data['harga']."</td>";

echo "</tr>";
echo "</table>";
}

?>

Nama Menu :
<select name="combobox1" id="menu_Pesanan">
  <option selected="selected">Pilih Satu</option>
  <?php
   foreach($daftar_Menu as $data) {
   echo ("<option value='{$data['nama']}' data-harga='{$data['harga']}' >{$data['nama']}</option>");
    } ?>
    
</select><br> 

 Jumlah: <input type="text" value="" id = "jumlah_Pesanan">
 
<button id="pesan">Pesan</button>

<form action="cetak.php" method="post">
<ol id = "keranjang"></ol>
<input type="submit" name="ok" value="Cetak Struk"> 
</form>
 </body>
 </html>