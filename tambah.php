<?php

require_once "config/database.php";
require_once "classes/kendaraan.php";

$database = new Database();
$db = $database->getConnection();

$kendaraan = new Kendaraan($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $kendaraan->nomor_polisi = $_POST['nomor_polisi'];
    $kendaraan->merk = $_POST['merk'];
    $kendaraan->tipe = $_POST['tipe'];
    $kendaraan->tahun = $_POST['tahun'];
    $kendaraan->warna = $_POST['warna'];
    $kendaraan->harga_sewa = $_POST['harga_sewa'];
    $kendaraan->status = $_POST['status'];

    if ($kendaraan->tambah()) {
        header("Location: index.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Kendaraan</title>
</head>

<body>

<h1>Tambah Data Kendaraan</h1>

<form method="POST">

    <label>Nomor Polisi</label><br>
    <input type="text" name="nomor_polisi" required>
    <br><br>

    <label>Merk</label><br>
    <input type="text" name="merk" required>
    <br><br>

    <label>Tipe</label><br>
    <input type="text" name="tipe" required>
    <br><br>

    <label>Tahun</label><br>
    <input type="number" name="tahun" required>
    <br><br>

    <label>Warna</label><br>
    <input type="text" name="warna" required>
    <br><br>

    <label>Harga Sewa / Hari</label><br>
    <input type="number" name="harga_sewa" required>
    <br><br>

    <label>Status</label><br>

    <select name="status">
        <option value="Tersedia">Tersedia</option>
        <option value="Disewa">Disewa</option>
    </select>

    <br><br>

    <button type="submit">
        Simpan
    </button>

    <a href="index.php">
        Kembali
    </a>

</form>

</body>
</html>