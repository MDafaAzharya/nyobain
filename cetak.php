<?php

include 'konak.php';
$sql = "select b.nama_brg , s.jumlah_beli s.harga_sat from semua s left join barang b on s.kode_brg = b.kd_brg";
$hasil = mysqli_query ($koneksi, "SELECT * FROM semua, barang WHERE semua.kode_brg = barang.kd_brg")
or die (mysqli_error($koneksi));
$rows = [];
while ($row = mysqli_fetch_array ($hasil)){
    $rows[] = $row;
 }
 if(isset($_POST['reset'])){
     $kode = mysqli_query($koneksi,"TRUNCATE TABLE `kasir`.`semua`");
 }
$no = 1;
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <table>
        <tr>
            <td> Nama Toko  </td>
            <td> :</td>
            <td> Mebeul cahaya</td>
        </tr>

        <tr>
            <td> Tanggal  </td>
            <td> :</td>
            <td> 
                <?php
                echo date('Y-m-d');
                ?>
            </td>
        </tr>
    </table>

    <table border="1" cellspacing="0" cellpadding="4" align="center">
        <tr>
            <td> No </td>
            <td> No nota</td>
            <td> Nama Barang </td>
            <td> Jumlah </td>
            <td> Harga </td>
            <td> Total </td>
        </tr>

        <?php foreach ($hasil as $rows): ?>
            <?php $total = $total + ($rows["jumlah_beli"] * $rows["hrg_brg"]); ?>
        <tr>
            <td> <?= $no++?></td>
            <td> <?php echo $rows['no_nota']; ?></td>
            <td> <?php echo $rows['nama_brg']; ?></td>
            <td> <?php echo $rows['jumlah_beli']; ?> </td>
            <td> <?php echo $rows['hrg_brg']; ?> </td>
            <td> <?php echo $rows['jumlah_beli'] * $rows['hrg_brg']; ?> </td>
        </tr>

        <?php endforeach ?>

        <tr>
            <td colspan ="5" align="right"> Total : </td>
            <td> <?php echo $total ?></td>
        </tr>
    </table>
    <button id='reset' name='reset'> Reset</button>
    </form>
</body>
</html>