<?php
    if(isset($_POST['nama'])) {
        $kode = $_POST['kode_produk'];   
        $produk = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $query = mysqli_query($koneksi, "INSERT INTO produk(kode_produk, nama, harga, stok) VALUES('$kode','$produk', '$harga','$stok')");
        if($query) {
            echo '<script>alert("Tambah data BERHASIL")</script>'; 
        } else {
            echo '<script>alert("Tambah data GAGAL")</script>';
            // echo var_dump($query);                             
        }
    }
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah data produk</li>
    </ol>
    <a href="?page=produk" class="btn btn-danger">Kembali</a>
    <hr>

        <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Produk</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="nama"></td> 
            </tr>
            <tr>
                <td width="200">Kode Produk</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="kode_produk"></td> 
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input class="form-control" type="decimal" step="0" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0" name="stok"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>
        </table>
        </form>
</div>