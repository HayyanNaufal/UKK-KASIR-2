<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk='$id'");
if($query) {
    echo '<script>alert("Hapus Data Produk BERHASIL"); location.href="?page=produk"</script>'; 
} else {
    echo '<script>alert("Hapus Data Produk GAGAL");</script>';                            
}