<?php

// STUDI KASUS PERTEMUAN 5:
// Menggunakan PHP Looping & Decision untuk membuat HTML

// DATA: Kita simpan data dalam bentuk array
// Ini adalah array multidimensi
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
        // Jika harga di atas 20jt, beri class premium
        $css_class = "premium";
        $keterangan = "Produk Premium";
    } else if ($produk['harga'] < 1000000) {
        // Jika harga di bawah 1jt, beri class diskon
        $css_class = "diskon";
        $keterangan = "Diskon!";
    }

    // --- OUTPUT PADA WEB PAGE ---
    // Kita echo (cetak) baris tabel HTML
    // Perhatikan bagaimana variable ($css_class, $nomor, dll)
    // disisipkan langsung ke dalam string HTML.

    echo "<tr class='{$css_class}'>";
    echo "<td>" . $nomor . "</td>";
    echo "<td>" . $produk['nama'] . "</td>";
    echo "<td>Rp " . number_format($produk['harga'], 0, ',', '.') . "</td>";
    echo "<td>" . $keterangan . "</td>";
    echo "</tr>";

    // Jangan lupa naikkan nomor urut
    $nomor++;
}   // Akhir dari foreach loop

?>
</tbody>
</table>

</body>
</html>