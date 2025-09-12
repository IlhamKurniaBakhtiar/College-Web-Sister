<?php
class Mhs
{
  private $conn;
  private $table = "Mhs";

  public $NIM;
  public $Nama;
  public $Alamat;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function readAll()
  {
    $query = "SELECT * FROM " . $this->table . " ORDER BY NIM";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function create()
  {
    $query = "INSERT INTO " . $this->table . " (NIM, Nama, Alamat) VALUES (:NIM, :Nama, :Alamat)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIM", $this->NIM);
    $stmt->bindParam(":Nama", $this->Nama);
    $stmt->bindParam(":Alamat", $this->Alamat);
    return $stmt->execute();
  }

  public function readOne()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE NIM = :NIM LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIM", $this->NIM);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update()
  {
    $query = "UPDATE " . $this->table . " SET Nama=:Nama, Alamat=:Alamat WHERE NIM=:NIM";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIM", $this->NIM);
    $stmt->bindParam(":Nama", $this->Nama);
    $stmt->bindParam(":Alamat", $this->Alamat);
    return $stmt->execute();
  }

  public function delete()
  {
    $query = "DELETE FROM " . $this->table . " WHERE NIM=:NIM";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIM", $this->NIM);
    return $stmt->execute();
  }
}
