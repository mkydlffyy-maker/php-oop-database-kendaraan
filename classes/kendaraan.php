<?php

class Kendaraan
{
    private $conn;
    private $table = "kendaraan";

    public $id;
    public $nomor_polisi;
    public $merk;
    public $tipe;
    public $tahun;
    public $warna;
    public $harga_sewa;
    public $status;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // READ
    public function tampilkanSemua()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // READ berdasarkan ID
    public function tampilkanSatu()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        return $stmt;
    }

    // CREATE
    public function tambah()
    {
        $query = "INSERT INTO " . $this->table . "
                (nomor_polisi, merk, tipe, tahun, warna, harga_sewa, status)
                VALUES
                (:nomor_polisi, :merk, :tipe, :tahun, :warna, :harga_sewa, :status)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nomor_polisi", $this->nomor_polisi);
        $stmt->bindParam(":merk", $this->merk);
        $stmt->bindParam(":tipe", $this->tipe);
        $stmt->bindParam(":tahun", $this->tahun);
        $stmt->bindParam(":warna", $this->warna);
        $stmt->bindParam(":harga_sewa", $this->harga_sewa);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    // UPDATE
    public function ubah()
    {
        $query = "UPDATE " . $this->table . "
                SET
                    nomor_polisi = :nomor_polisi,
                    merk = :merk,
                    tipe = :tipe,
                    tahun = :tahun,
                    warna = :warna,
                    harga_sewa = :harga_sewa,
                    status = :status
                WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nomor_polisi", $this->nomor_polisi);
        $stmt->bindParam(":merk", $this->merk);
        $stmt->bindParam(":tipe", $this->tipe);
        $stmt->bindParam(":tahun", $this->tahun);
        $stmt->bindParam(":warna", $this->warna);
        $stmt->bindParam(":harga_sewa", $this->harga_sewa);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    // DELETE
    public function hapus()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
}
?>