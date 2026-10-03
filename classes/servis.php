<?php
class Servis {
    private $conn;
    private $table = "servis";

    public $id_servis;
    public $nomor_polisi;
    public $tanggal_servis;
    public $jenis_servis;
    public $biaya_servis;
    public $keterangan;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tampilkanSemua() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id_servis DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function tampilkanSatu() {
        $query = "SELECT * FROM " . $this->table . " WHERE id_servis = :id_servis";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_servis", $this->id_servis);
        $stmt->execute();
        return $stmt;
    }

    public function tambah() {
        $query = "INSERT INTO " . $this->table . " 
                  (nomor_polisi, tanggal_servis, jenis_servis, biaya_servis, keterangan, status) 
                  VALUES 
                  (:nomor_polisi, :tanggal_servis, :jenis_servis, :biaya_servis, :keterangan, :status)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nomor_polisi", $this->nomor_polisi);
        $stmt->bindParam(":tanggal_servis", $this->tanggal_servis);
        $stmt->bindParam(":jenis_servis", $this->jenis_servis);
        $stmt->bindParam(":biaya_servis", $this->biaya_servis);
        $stmt->bindParam(":keterangan", $this->keterangan);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    public function ubah() {
        $query = "UPDATE " . $this->table . "
                  SET
                    nomor_polisi = :nomor_polisi,
                    tanggal_servis = :tanggal_servis,
                    jenis_servis = :jenis_servis,
                    biaya_servis = :biaya_servis,
                    keterangan = :keterangan,
                    status = :status
                  WHERE id_servis = :id_servis";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_servis", $this->id_servis);
        $stmt->bindParam(":nomor_polisi", $this->nomor_polisi);
        $stmt->bindParam(":tanggal_servis", $this->tanggal_servis);
        $stmt->bindParam(":jenis_servis", $this->jenis_servis);
        $stmt->bindParam(":biaya_servis", $this->biaya_servis);
        $stmt->bindParam(":keterangan", $this->keterangan);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    public function hapus() {
        $query = "DELETE FROM " . $this->table . " WHERE id_servis = :id_servis";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_servis", $this->id_servis);

        return $stmt->execute();
    }
}
?>