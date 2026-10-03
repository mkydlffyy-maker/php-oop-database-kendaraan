<?php

require_once "config/database.php";
require_once "classes/servis.php";

$database = new Database();
$db = $database->getConnection();

$servis = new Servis($db);

if (!isset($_GET['id'])) {
    die("ID servis tidak ditemukan.");
}

$servis->id_servis = $_GET['id'];
$stmt = $servis->tampilkanSatu();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Data servis tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servis->nomor_polisi = $_POST['nomor_polisi'];
    $servis->tanggal_servis = $_POST['tanggal_servis'];
    $servis->jenis_servis = $_POST['jenis_servis'];
    $servis->biaya_servis = $_POST['biaya_servis'];
    $servis->keterangan = $_POST['keterangan'];
    $servis->status = $_POST['status'];

    if ($servis->ubah()) {
        header("Location: servis.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Servis</title>
</head>
<body>

<h1>Edit Data Servis</h1>

<form method="POST">
    <label>Nomor Polisi</label><br>
    <input type="text" name="nomor_polisi" value="<?= htmlspecialchars($data['nomor_polisi']); ?>" required>
    <br><br>

    <label>Tanggal Servis</label><br>
    <input type="date" name="tanggal_servis" value="<?= htmlspecialchars($data['tanggal_servis']); ?>" required>
    <br><br>

    <label>Jenis Servis</label><br>
    <input type="text" name="jenis_servis" value="<?= htmlspecialchars($data['jenis_servis']); ?>" required>
    <br><br>

    <label>Biaya Servis</label><br>
    <input type="number" name="biaya_servis" value="<?= $data['biaya_servis']; ?>" required>
    <br><br>

    <label>Keterangan</label><br>
    <textarea name="keterangan" required><?= htmlspecialchars($data['keterangan']); ?></textarea>
    <br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="Dalam Proses" <?= $data['status'] == 'Dalam Proses' ? 'selected' : ''; ?>>Dalam Proses</option>
        <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
    </select>
    <br><br>

    <button type="submit">Update</button>
    <a href="index.php">Kembali</a>
</form>

</body>
</html>
