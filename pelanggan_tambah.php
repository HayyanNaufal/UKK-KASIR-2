<?php
    if(isset($_POST['nama'])) {   
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['telp'];

        $query = mysqli_query($koneksi, "INSERT INTO pelanggan(nama, alamat, telp) VALUES('$nama', '$alamat','$no_telepon')");
        if($query) {
            echo '<script>alert("Tambah data BERHASIL")</script>'; 
        } else {
            echo '<script>alert("Tambah data GAGAL")</script>';                            
        }
    }
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah data pelanggan</li>
    </ol>
    <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
    <hr>

        <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="nama"></td> <!-- Perbaikan disini -->
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <textarea name="alamat" rows="5" cols="110" class="form-control"></textarea> <!-- Perbaikan disini -->
                </td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0" name="telp"></td> <!-- Perbaikan disini -->
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