<?php
class Kuliah
{
  private $conn;
  private $table = "Kuliah";

  public $NIM;
  public $NIP;
  public $KodeMatkul;
  public $Nilai;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Ambil semua data kuliah dengan join (biar dapat nama mahasiswa, dosen, matkul)
  public function readAll()
  {
    $query = "SELECT k.NIM, m.Nama AS Mahasiswa, k.NIP, d.Nama AS Dosen, k.KodeMatkul, mk.NamaMatkul, k.Nilai FROM Kuliah k
              JOIN Mhs m ON k.NIM = m.NIM
              JOIN Dosen d ON k.NIP = d.NIP
              JOIN MataKuliah mk ON k.KodeMatkul = mk.KodeMatkul
              ORDER BY m.Nama, mk.NamaMatkul";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  // Tambah data kuliah
  public function create()
  {
    $query = "INSERT INTO " . $this->table . " (NIM, NIP, KodeMatkul, Nilai) VALUES (:NIM, :NIP, :KodeMatkul, :Nilai)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIM", $this->NIM);
    $stmt->bindParam(":NIP", $this->NIP);
    $stmt->bindParam(":KodeMatkul", $this->KodeMatkul);
    $stmt->bindParam(":Nilai", $this->Nilai);
    return $stmt->execute();
  }

  public function readOne()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE NIM=:NIM AND NIP=:NIP AND KodeMatkul=:KodeMatkul LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIM", $this->NIM);
    $stmt->bindParam(":NIP", $this->NIP);
    $stmt->bindParam(":KodeMatkul", $this->KodeMatkul);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update()
  {
    $query = "UPDATE " . $this->table . " SET Nilai=:Nilai WHERE NIM=:NIM AND NIP=:NIP AND KodeMatkul=:KodeMatkul";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIM", $this->NIM);
    $stmt->bindParam(":NIP", $this->NIP);
    $stmt->bindParam(":KodeMatkul", $this->KodeMatkul);
    $stmt->bindParam(":Nilai", $this->Nilai);
    return $stmt->execute();
  }

  public function delete()
  {
    $query = "DELETE FROM " . $this->table . " 
                  WHERE NIM=:NIM AND NIP=:NIP AND KodeMatkul=:KodeMatkul";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIM", $this->NIM);
    $stmt->bindParam(":NIP", $this->NIP);
    $stmt->bindParam(":KodeMatkul", $this->KodeMatkul);
    return $stmt->execute();
  }
}
