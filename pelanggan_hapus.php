<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan='$id'");
if($query) {
    echo '<script>alert("Hapus data BERHASIL"); location.href="?page=pelanggan"</script>'; 
} else {
    echo '<script>alert("Hapus data GAGAL");</script>';                            
}