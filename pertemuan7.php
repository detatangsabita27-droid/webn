<?php
include 'koneksi.php'; // your file dari mana database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }
        
        h1 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            display: inline-block;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        th {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }
        
        th {
            background-color: #3498db;
            color: white;
        }

        td {
            color: white;
        }
        
        tr:hover {
            background-color: #f1f1f1;
        }
        
        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.9em;
            font-weight: bold;
        }
        
        .cumlaude {
            background-color: #27ae60;
            color: white;
        }
        
        .standar {
            background-color: #95a5a6;
            color: white;
        }
        
        .warning {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa Aktif</h1>
    <p>Status Koneksi: <span style="color:green; font-weight:bold;">Terhubung ke <?php echo $db_name; ?></span></p>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Jurusan</th>
                <th>IPK</th>
                <th>Predikat</th>
            </tr>    
        </thead>
        <tbody>
            <?php
            $query_sql = "SELECT * FROM tb_mahasiswa ORDER BY nim ASC";
            $hasil_data = mysqli_query($koneksi, $query_sql);

            $nomor = 1;
            while ($row = mysqli_fetch_assoc($hasil_data)) {

                $ipk = $row['ipk'];
                $predikat = "Memuaskan";
                $css_class = "standar";

                // Menentukan predikat berdasarkan IPK
                if ($ipk > 3.75) {
                    $predikat = "Cum Laude 🌟";
                    $css_class = "cumlaude";
                } elseif ($ipk < 3.00) {
                    $predikat = "Perlu Perbaikan ⚠";
                    $css_class = "warning";
                }

                echo "<tr>";
                echo "<td>" . $nomor . "</td>";
                echo "<td>" . $row['nim'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['jurusan'] . "</td>";
                echo "<td><strong>" . $ipk . "</strong></td>";
                echo "<td><span class='badge {$css_class}'>" . $predikat . "</span></td>";
                echo "</tr>";

                $nomor++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>