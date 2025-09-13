<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/MataKuliah.php';

class MataKuliahController
{
  private $matkul;

  public function __construct()
  {
    $database = new Database();
    $db = $database->getConnection();
    $this->matkul = new MataKuliah($db);
  }

  public function index()
  {
    $stmt = $this->matkul->readAll();
    $matkul_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require_once __DIR__ . '/../views/matkul/index.php';
  }

  public function create()
  {
    require_once __DIR__ . '/../views/matkul/create.php';
  }

  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->matkul->KodeMatkul = $_POST['kode_matkul'];
      $this->matkul->NamaMatkul = $_POST['nama_matkul'];
      $this->matkul->SKS = $_POST['sks'];
      $this->matkul->Semester = $_POST['semester'];

      if ($this->matkul->create()) {
        header('Location: /proyek_kuliah/public/matkul');
      } else {
        echo "Gagal menyimpan data mata kuliah.";
      }
    }
  }

  public function edit($kode_matkul)
  {
    $this->matkul->KodeMatkul = $kode_matkul;
    $matkul = $this->matkul->readOne();

    require_once __DIR__ . '/../views/matkul/edit.php';
  }

  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->matkul->KodeMatkul = $_POST['kode_matkul'];
      $this->matkul->NamaMatkul = $_POST['nama_matkul'];
      $this->matkul->SKS = $_POST['sks'];
      $this->matkul->Semester = $_POST['semester'];

      if ($this->matkul->update()) {
        header('Location: /College-Web-Sister/public/matakulia');
      } else {
        echo "Gagal mengupdate data mata kuliah.";
      }
    }
  }

  public function delete($kode_matkul)
  {
    $this->matkul->KodeMatkul = $kode_matkul;

    if ($this->matkul->delete()) {
      header('Location: /proyek_kuliah/public/matkul');
    } else {
      echo "Gagal menghapus data mata kuliah.";
    }
  }
}
