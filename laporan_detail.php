<?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT*FROM penjualan LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan=$id");
    $data = mysqli_fetch_array($query);
?>


<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Penjualan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <a href="?page=laporan" class="btn btn-danger">Kembali</a>
    <hr>

    <form method="post">
        <table class="table table-bordered" id="table">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td>
                    <?php echo $data['nama']; ?>
                </td>
            </tr>
            <?php
                $pro = mysqli_query($koneksi, "SELECT*FROM detail_penjualan LEFT JOIN produk ON produk.id_produk = detail_penjualan.id_produk WHERE id_penjualan = $id");
                while ($produk = mysqli_fetch_array($pro)) {
            ?>
            <tr>
                <td><?php echo $produk['nama']; ?></php></td>
                <td>:</td>
                <td>
                        Harga Satuan : <?php echo $produk['harga']; ?></php><br>
                        Jumlah : <?php echo $produk['jumlah_produk']; ?></php><br>
                        Sub Total : <?php echo $produk['sub_total']; ?></php>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td>Total</td>
                <td>:</td>
                <td><?php echo $data['total_harga']; ?></td>
            </tr>
        </table>
    </form>


</div>