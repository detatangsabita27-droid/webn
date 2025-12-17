<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Studi Kasus - Pertemuan 5 (PHP)</title>

<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    table {
        width: 60%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    /* Kelas ini akan kita tambahkan menggunakan PHP */
    .premium {
        background-color: #fffeb6; /* Kuning muda */
        font-weight: bold;
    }
    .diskon {
        background-color: #e6f7ff; /* Biru muda */
        color: #0056b3;
        font-weight: bold;
    }
</style>
</head>
<body>

<h1>Daftar Produk Toko</h1>

<table>
<thead>
<tr>
    <th>No.</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Keterangan</th>
</tr>
</thead>
<tbody>

<?php

// STUDI KASUS PERTEMUAN 5:
// Menggunakan PHP Looping & Decision untuk membuat HTML

// 1. DATA: Kita siapkan data dalam bentuk PHP 'Array'
// Ini adalah 'array multidimensi'
$products = [
    ["nama" => "Laptop Super Cepat",   "harga" => 15000000],
    ["nama" => "Mouse Gaming",         "harga" => 850000],
    ["nama" => "Monitor 4K Ultrawide", "harga" => 21000000],
    ["nama" => "Keyboard Mekanikal",   "harga" => 1200000],
    ["nama" => "Headset Standar",      "harga" => 450000]
];

// Variabel untuk nomor urut
$nomor = 1;

// --- Looping Statement (foreach) ---
// Kita 'loop' setiap item di dalam array $products
// Setiap item akan disimpan sementara di $produk
foreach ($products as $produk) {

    // --- Decision Statement (if/else if) ---
    // Kita buat variabel kosong dulu
    $css_class = "";
    $keterangan = "";

    if ($produk['harga'] > 20000000) {
        // Jika harga di atas 20jt, beri 'class' premium
        $css_class = "premium";
        $keterangan = "Produk Premium";
    } else if ($produk['harga'] < 1000000) {
        // Jika harga di bawah 1jt, beri 'class' diskon
        $css_class = "diskon";
        $keterangan = "Diskon!";
    }

    // --- OUTPUT PADA WEB PAGE ---
    // Kita 'echo' (cetak) baris tabel HTML
    // Perhatikan bagaimana 'variable' ($css_class, $nomor, dll)
    // disisipkan langsung ke dalam string HTML.

    echo "<tr class='{$css_class}'>";
    echo "<td>" . $nomor . "</td>";
    echo "<td>" . $produk['nama'] . "</td>";
    echo "<td>Rp " . number_format($produk['harga'], 0, ',', '.') . "</td>";
    echo "<td>" . $keterangan . "</td>";
    echo "</tr>";

    // Jangan lupa naikkan nomor urut
    $nomor++;
}  // Akhir dari 'foreach' loop

?>
</tbody>
</table>

</body>
</html>