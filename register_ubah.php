<?php
    $id = $_GET['id'];

    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $level = $_POST['level'];
        $password = $_POST['password']; 

        $query = mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$username', level='$level', password='$password' WHERE id_user=$id");
        if($query) {
            echo '<script>alert("Ubah Data User BERHASIL")</script>'; 
        } else {
            echo '<script>alert("Ubah Data User GAGAL")</script>';         
        }
    }

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user=$id");
    $data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Ubah User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ubah data User</li>
    </ol>
    <a href="?page=register" class="btn btn-danger">Kembali</a>
    <hr>

    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Username</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="username" value="<?php echo $data['username'] ?>"></td>
            </tr>
            <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="nama" value="<?php echo $data['nama'] ?>"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td>
                    <select class="form-control" name="level">
                        <option value="admin" <?php echo ($data['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="kasir" <?php echo ($data['level'] == 'kasir') ? 'selected' : ''; ?>>Kasir</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="password" value="<?php echo $data['password']; ?>"></td>
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
