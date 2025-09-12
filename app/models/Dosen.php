<?php
class Dosen
{
  private $conn;
  private $table = "Dosen";

  public $NIP;
  public $Nama;
  public $Alamat;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function readAll()
  {
    $query = "SELECT * FROM " . $this->table . " ORDER BY NIP";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function create()
  {
    $query = "INSERT INTO " . $this->table . " (NIP, Nama, Alamat) VALUES (:NIP, :Nama, :Alamat)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIP", $this->NIP);
    $stmt->bindParam(":Nama", $this->Nama);
    $stmt->bindParam(":Alamat", $this->Alamat);
    return $stmt->execute();
  }

  public function readOne()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE NIP = :NIP LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIP", $this->NIP);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update()
  {
    $query = "UPDATE " . $this->table . " SET Nama=:Nama, Alamat=:Alamat WHERE NIP=:NIP";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIP", $this->NIP);
    $stmt->bindParam(":Nama", $this->Nama);
    $stmt->bindParam(":Alamat", $this->Alamat);
    return $stmt->execute();
  }

  public function delete()
  {
    $query = "DELETE FROM " . $this->table . " WHERE NIP=:NIP";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":NIP", $this->NIP);
    return $stmt->execute();
  }
}
