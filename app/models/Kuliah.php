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

  // Melakukan JOIN untuk mendapatkan nama mahasiswa, dosen, dan mata kuliah
  public function readAll()
  {
    $query = "SELECT k.*, m.Nama AS Mahasiswa, d.Nama AS Dosen, mk.NamaMatkul 
            FROM Kuliah k
            LEFT JOIN Mhs m ON k.NIM = m.NIM
            LEFT JOIN Dosen d ON k.NIP = d.NIP
            LEFT JOIN MataKuliah mk ON k.KodeMatkul = mk.KodeMatkul
            ORDER BY m.Nama, mk.NamaMatkul";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

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

  public function update($oldNIM, $oldNIP, $oldKodeMatkul)
  {
    $query = "UPDATE " . $this->table . " 
                  SET NIM=:newNIM, NIP=:newNIP, KodeMatkul=:newKodeMatkul, Nilai=:Nilai 
                  WHERE NIM=:oldNIM AND NIP=:oldNIP AND KodeMatkul=:oldKodeMatkul";

    $stmt = $this->conn->prepare($query);

    // Data baru
    $stmt->bindParam(":newNIM", $this->NIM);
    $stmt->bindParam(":newNIP", $this->NIP);
    $stmt->bindParam(":newKodeMatkul", $this->KodeMatkul);
    $stmt->bindParam(":Nilai", $this->Nilai);

    // Data lama
    $stmt->bindParam(":oldNIM", $oldNIM);
    $stmt->bindParam(":oldNIP", $oldNIP);
    $stmt->bindParam(":oldKodeMatkul", $oldKodeMatkul);

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
