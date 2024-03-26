<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar User</li>
    </ol>

    <table class="table table-bordered">
        <a href="?page=register_tambah" class="btn btn-primary">Tambah Data</a>
        <hr>
        <tr>
            <th>Username</th>
            <th>nama</th>
            <th>level</th>
            <th>password</th>
        </tr>

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM user");
        while($data = mysqli_fetch_array($query)) {
        ?>

        <tr>
            <td><?php echo $data['username'];?></td>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['level'];?></td>
            <td><?php echo $data['password'];?></td>
            <td>
                <a href="?page=register_ubah&id=<?php echo $data['id_user']; ?>" class="btn btn-secondary">Ubah</a>   
                <a href="?page=register_hapus&id=<?php echo $data['id_user']; ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>