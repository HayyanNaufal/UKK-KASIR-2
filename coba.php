<!DOCTYPE html>
<html>
<head>
    <title>Cetak ke Kertas</title>
</head>
<body>

<h2>Contoh Cetak ke Kertas dengan PHP</h2>

<?php
// Mendefinisikan fungsi cetak
function cetak($teks) {
    echo $teks;
}
?>

<!-- Tombol untuk memanggil fungsi cetak -->
<button onclick="cetak()">Cetak ke Kertas</button>

<script>
// Fungsi JavaScript untuk mencetak ke kertas
function cetak() {
    window.print();
}
</script>

</body>
</html>
