<?php
    $id = $_GET['id'];

    if(isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $kode = $_POST['kode_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $query = mysqli_query($koneksi, "UPDATE produk SET nama='$nama', kode_produk='$kode', harga='$harga',stok='$stok' WHERE id_produk=$id");
        if($query) {
            echo '<script>alert("Ubah Data Produk BERHASIL")</script>'; 
        } else {
            echo '<script>alert("Ubah Data Produk GAGAL")</script>';         
            // echo var_dump($query);                      
        }
    }

    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk=$id");
    $data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ubah data Produk</li>
    </ol>
    <a href="?page=produk" class="btn btn-danger">Kembali</a>
    <hr>

        <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Produk</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="nama" value="<?php echo $data['nama'] ?>"></td>
            </tr>
            <tr>
                <td width="200">kode Produk</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="kode_produk" value="<?php echo $data['kode_produk'] ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input class="form-control" type="decimal" name="harga" value="<?php echo $data['harga'] ?>"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0" name="stok" value="<?php echo $data['stok'] ?>"></td> 
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</div>