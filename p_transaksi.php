<?php
include "konak.php";

$tgl = $_POST['tgl'];
$no_fak = $_POST['nota'];
$kode_barang = $_POST['namabrg'];
$beli = $_POST['jumlah'];
$harga = $_POST['harga'];

$sql = "INSERT INTO `semua`(`no_nota`, `tgl`, `kode_brg`, `jumlah_beli`, `hrg_sat`) VALUES ('$no_fak','$tgl','$kode_barang','$beli','$harga')";
$hasil = mysqli_query($koneksi, $sql);

header('location:cetak.php');


?>