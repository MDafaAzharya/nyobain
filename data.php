<?php

include 'konak.php';

if (isset($_POST['kode_brg'])) {
    $kode = $_POST['kode_brg'];

    $sql = "select * from barang where kd_brg=$kode";
    $hasil = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_array($hasil)) {
        
        echo  "Harga : ".$data['hrg_brg']; 
        
    }
}

?>