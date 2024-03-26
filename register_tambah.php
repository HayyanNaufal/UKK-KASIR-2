<?php
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']); 
        $nama = $_POST['nama'];
        $level = $_POST['level'];

        $query = mysqli_query($koneksi, "INSERT INTO user(username, password, nama, level) VALUES('$username','$password', '$nama','$level')");
        if($query) {
            echo '<script>alert("Tambah data BERHASIL")</script>'; 
        } else {
            echo '<script>alert("Tambah data GAGAL")</script>';
            // echo var_dump($query);                             
        }
    }
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah data User</li>
    </ol>
    <a href="?page=register" class="btn btn-danger">Kembali</a>
    <hr>

        <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Username</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="username"></td> 
            </tr>
            <tr>
                <td >Password</td>
                <td >:</td>
                <td><input class="form-control" type="text" name="password"></td> 
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input class="form-control" type="text"  name="nama"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td>
                    <select class="form-control" name="level">
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                    </select>
                </td>
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