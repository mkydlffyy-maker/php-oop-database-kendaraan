<?php

require_once "config/Database.php";
require_once "classes/Kendaraan.php";

$database = new Database();
$db = $database->getConnection();

$kendaraan = new Kendaraan($db);

if (isset($_GET['id'])) {

    $kendaraan->id = $_GET['id'];

    if ($kendaraan->hapus()) {
        header("Location: index.php");
        exit;
    }

    echo "Data gagal dihapus.";
}

?>