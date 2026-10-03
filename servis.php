<?php
require_once "config/database.php";
require_once "classes/servis.php";

$database = new Database();
$db = $database->getConnection();

$servis = new Servis($db);
$stmt = $servis->tampilkanSemua();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Servis Kendaraan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #333; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn { padding: 8px 12px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; }
        .btn-edit { background-color: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 3px; }
        .btn-hapus { background-color: #dc3545; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; }
        .back { display: inline-block; margin-bottom: 15px; text-decoration: none; color: #333; }
    </style>
</head>
<body>

    <a href="index.php" class="back">← Kembali ke kendaraan</a>
    <h2>Data Servis Kendaraan</h2>
    <a href="tambah_servis.php" class="btn">+ Tambah Servis</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Polisi</th>
                <th>Tanggal Servis</th>
                <th>Jenis Servis</th>
                <th>Biaya Servis</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : 
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nomor_polisi']); ?></td>
                <td><?= htmlspecialchars($row['tanggal_servis']); ?></td>
                <td><?= htmlspecialchars($row['jenis_servis']); ?></td>
                <td>Rp <?= number_format($row['biaya_servis'], 0, ',', '.'); ?></td>
                <td><?= htmlspecialchars($row['keterangan']); ?></td>
                <td><?= htmlspecialchars($row['status']); ?></td>
                <td>
                    <a href="edit_servis.php?id=<?= $row['id_servis']; ?>" class="btn-edit">Edit</a>
                    <a href="hapus_servis.php?id=<?= $row['id_servis']; ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>