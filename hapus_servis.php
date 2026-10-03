<?php

require_once "config/database.php";
require_once "classes/servis.php";

$database = new Database();
$db = $database->getConnection();

$servis = new Servis($db);

if (isset($_GET['id'])) {
    $servis->id_servis = $_GET['id'];

    if ($servis->hapus()) {
        header("Location: servis.php");
        exit;
    }

    echo "Data servis gagal dihapus.";
}
?>
