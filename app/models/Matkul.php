<?php
class MataKuliah
{
  private $conn;
  private $table = "MataKuliah";

  public $KodeMatkul;
  public $NamaMatkul;
  public $SKS;
  public $Semester;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function readAll()
  {
    $query = "SELECT * FROM " . $this->table . " ORDER BY KodeMatkul";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function create()
  {
    $query = "INSERT INTO " . $this->table . " (KodeMatkul, NamaMatkul, SKS, Semester) VALUES (:KodeMatkul, :NamaMatkul, :SKS, :Semester)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":KodeMatkul", $this->KodeMatkul);
    $stmt->bindParam(":NamaMatkul", $this->NamaMatkul);
    $stmt->bindParam(":SKS", $this->SKS);
    $stmt->bindParam(":Semester", $this->Semester);
    return $stmt->execute();
  }

  public function readOne()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE KodeMatkul = :KodeMatkul LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":KodeMatkul", $this->KodeMatkul);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update()
  {
    $query = "UPDATE " . $this->table . " SET NamaMatkul=:NamaMatkul, SKS=:SKS, Semester=:Semester WHERE KodeMatkul=:KodeMatkul";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":KodeMatkul", $this->KodeMatkul);
    $stmt->bindParam(":NamaMatkul", $this->NamaMatkul);
    $stmt->bindParam(":SKS", $this->SKS);
    $stmt->bindParam(":Semester", $this->Semester);
    return $stmt->execute();
  }

  public function delete()
  {
    $query = "DELETE FROM " . $this->table . " WHERE KodeMatkul=:KodeMatkul";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":KodeMatkul", $this->KodeMatkul);
    return $stmt->execute();
  }
}
