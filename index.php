<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="jquery-3.5.1.min.js"></script>
<title>Form</title>
</head>
<body>
    <?php
        include 'konak.php';
        $sql_brg = "select * from barang";
        $data_brg = mysqli_query($koneksi,$sql_brg);
        $tgl = date("Y-m-d");
        $no_nota= random_int(0,1000);
    ?>

    <form method="post" id="form">
    Tanggal : <?php echo $tgl; ?> <br />
    <input type="hidden" value="<?php echo $tgl; ?>" name="tgl">
    No nota : <?php echo $no_nota; ?> <br />
    <input type="hidden" value="<?php echo $no_nota; ?>" name="nota">

    Nama Barang :
    <select name="namabrg" id="namabrg">
    <option value=""> Plih Barang </option>
    <?php
     while($d_brg=mysqli_fetch_array($data_brg)){
    ?>
     <option value="<?php echo $d_brg['kd_brg']; ?>"><?php echo $d_brg['nama_brg']; ?></option>
    <?php
     }
    ?>

    </select>

    <div id="harga" name="harga">Harga : </div>
    Jumlah beli : <input type="text" name="jumlah">

    </form>

    <button id="simpan" >Simpan</button>
    <hr>
    <div id="transaksi">
        <?php
            include 'cetak.php';
        ?>
    </div>

    <script>
                $("#namabrg").change(function() {
                    var kd_brg = $("#namabrg").val();

                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: "data.php",
                        data: "kode_brg=" + kd_brg,
                        success: function(data) {
                            $("#harga").html(data);
                        }
                    });
                });

                $("#simpan").click(function() {
                    var data_form = $("#form").serialize();
                    
                    $.ajax({
                        type: "POST",
                        url: "p_transaksi.php",
                        data: data_form,
                        success: function(data) {
                            $("#transaksi").html(data);
                        }
                    });
                });
    </script>
    
</body>
</html>