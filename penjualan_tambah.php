<?php
if(isset($_POST['id_pelanggan'])) {

    $id_pelanggan = $_POST['id_pelanggan'];
    $produk = $_POST['produk'];
    $total = 0;
    $tanggal = date('Y/m/d');


    $query = mysqli_query($koneksi, "INSERT INTO penjualan (tanggal_penjualan, id_pelanggan) VALUES ('$tanggal', '$id_pelanggan')");

    $idTerakhir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM penjualan ORDER BY id_penjualan DESC"));
    $id_penjualan = $idTerakhir['id_penjualan'];
    
    foreach($produk as $key => $val) {
        $pr = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk=$key"));

        if($val > 0){
            $sub = $val * $pr['harga'];
            $total += $sub;
            $query = mysqli_query($koneksi, "INSERT INTO detail_penjualan(id_penjualan, id_produk, jumlah_produk, sub_total) VALUES ('$id_penjualan', '$key','$val','$sub')");

            $updateProduk = mysqli_query($koneksi, "UPDATE produk SET stok=stok-$val WHERE id_produk=$key");
        }
    }
    
    $query = mysqli_query($koneksi, "UPDATE penjualan SET total_harga=$total WHERE id_penjualan=$id_penjualan");
    
    if($query) {
        echo '<script>alert("Tambah data berhasil")</script>';
    } else {
        echo '<script>alert("Tambah data gagal")</script>';
    }
}
?>


<div class="container-fluid px-4">
                        <h1 class="mt-4">penjualan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">penjualan</li>
                        </ol>
                        <a href="?page=penjualan" class="btn btn-danger">Kembali</a>
                        <hr>

                        <form method="post">
    <table class="table table-bordered">
        <tr>
            <td width="200">Nama Pelanggan</td>
            <td width="1">:</td>
            <td>
                <select class="form-control form-select" name="id_pelanggan">
                    <?php 
                        $p = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        while ($pel = mysqli_fetch_array($p)) {
                    ?>
                    <option value="<?php echo $pel['id_pelanggan']; ?>"><?php echo $pel['nama']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Pilih Produk</td>
            <td>:</td>
            <td>
                <select class="form-control form-select" id="produkSelect">
                    <?php 
                        $pro = mysqli_query($koneksi, "SELECT * FROM produk");
                        while ($produk = mysqli_fetch_array($pro)) {
                    ?>
                    <option value="<?php echo $produk['id_produk']; ?>"><?php echo $produk['nama'] . ' (Stok : '.$produk['stok'].')'; ?></option>
                    <?php } ?>
                </select>
                <button type="button" id="addProductBtn" class="btn btn-primary">Tambah Produk</button>
            </td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>:</td>
            <td>
                <div id="selectedProducts"></div>
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

<script>
    var selectedProductIds = []; 

    document.getElementById('addProductBtn').addEventListener('click', function() {
        var select = document.getElementById('produkSelect');
        var selectedOption = select.options[select.selectedIndex];
        if (selectedOption && selectedProductIds.indexOf(selectedOption.value) === -1) {
            var selectedProductId = selectedOption.value;
            var selectedProductName = selectedOption.text.split(' (')[0];
            var maxStock = parseInt(selectedOption.text.match(/\(Stok : (\d+)\)/)[1]);

            var selectedProductsContainer = document.getElementById('selectedProducts');

            var quantityInput = document.createElement('input');
            quantityInput.setAttribute('type', 'number');
            quantityInput.setAttribute('class', 'form-control');
            quantityInput.setAttribute('name', 'produk[' + selectedProductId + ']');
            quantityInput.setAttribute('placeholder', 'Masukkan jumlah');
            quantityInput.setAttribute('max', maxStock);

            var productNameSpan = document.createElement('span');
            productNameSpan.innerHTML = selectedProductName + ' (Stok: ' + maxStock + ')';

            selectedProductsContainer.appendChild(productNameSpan);
            selectedProductsContainer.appendChild(quantityInput);

            selectedProductIds.push(selectedProductId);

            select.selectedIndex = -1;
        }
    });
</script>
</div>