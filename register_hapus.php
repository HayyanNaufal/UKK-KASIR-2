<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'");
if($query) {
    echo '<script>alert("Hapus Data Produk BERHASIL"); location.href="?page=register"</script>'; 
} else {
    echo '<script>alert("Hapus Data Produk GAGAL");</script>';                            
}