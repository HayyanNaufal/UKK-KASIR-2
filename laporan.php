<div class="container-fluid px-4">
    <h1 class="mt-4">Laporan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pembelian</li>
    </ol>

    <table class="table table-bordered">
        <hr>
        <tr>
            <th>Tanggal Pembelian</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan on pelanggan.id_pelanggan = penjualan.id_pelanggan");
        while($data = mysqli_fetch_array($query)){
        ?>

        <tr>
            <td><?php echo $data['tanggal_penjualan'];?></td>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['total_harga'];?></td>
            <td>
                <a href="?page=laporan_detail&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-secondary">Detail</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>