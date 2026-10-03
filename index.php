<?php

require_once "config/database.php";
require_once "classes/kendaraan.php";

$database = new Database();
$db = $database->getConnection();

$kendaraan = new Kendaraan($db);
$data = $kendaraan->tampilkanSemua();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Kendaraan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        .tambah {
            display: inline-block;
            padding: 10px 15px;
            background: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .servis-link {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #333;
            color: white;
        }

        .edit {
            background: orange;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .hapus {
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>

<h1>Data Kendaraan</h1>

<div>
    <a href="tambah.php" class="tambah">+ Tambah Kendaraan</a>
    <a href="servis.php" class="servis-link">Lihat Data Servis</a>
</div>

<table>
    <tr>
        <th>No</th>
        <th>Nomor Polisi</th>
        <th>Merk</th>
        <th>Tipe</th>
        <th>Tahun</th>
        <th>Warna</th>
        <th>Harga Sewa</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($row['nomor_polisi']); ?></td>
        <td><?= htmlspecialchars($row['merk']); ?></td>
        <td><?= htmlspecialchars($row['tipe']); ?></td>
        <td><?= $row['tahun']; ?></td>
        <td><?= htmlspecialchars($row['warna']); ?></td>
        <td>Rp <?= number_format($row['harga_sewa'], 0, ',', '.'); ?></td>
        <td><?= htmlspecialchars($row['status']); ?></td>
        <td>
            <a class="edit" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
            <a class="hapus" href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>