<?php

require_once '../app/models/Mahasiswa.php';
require_once '../config/database.php';

class MahasiswaController
{

    private $db;
    private $mahasiswa;

    public function __construct()
    {
        $database = new PDO("mysql:host=localhost;dbname=Perkuliahan", "root", "");
        $this->mahasiswa = new Mhs($database);
    }

    public function index()
    {
        $stmt = $this->mahasiswa->readAll();
        $mahasiswa_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once '../app/views/mahasiswa/index.php';
    }

    public function create()
    {
        require_once '../app/views/mahasiswa/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $this->mahasiswa->NIM = $_POST['nim'];
            $this->mahasiswa->Nama = $_POST['nama'];
            $this->mahasiswa->Alamat = $_POST['alamat'];

            if ($this->mahasiswa->create()) {
                header('Location: /proyek_kuliah/public/mahasiswa');
            } else {
                echo "Gagal menyimpan data mahasiswa.";
            }
        }
    }


    public function edit($nim)
    {
        $this->mahasiswa->NIM = $nim;
        $mhs = $this->mahasiswa->readOne();

        require_once '../app/views/mahasiswa/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $this->mahasiswa->NIM = $_POST['nim'];
            $this->mahasiswa->Nama = $_POST['nama'];
            $this->mahasiswa->Alamat = $_POST['alamat'];

            if ($this->mahasiswa->update()) {
                header('Location: /proyek_kuliah/public/mahasiswa');
            } else {
                echo "Gagal mengupdate data mahasiswa.";
            }
        }
    }

    public function delete($nim)
    {
        $this->mahasiswa->NIM = $nim;

        if ($this->mahasiswa->delete()) {
            header('Location: /proyek_kuliah/public/mahasiswa');
        } else {
            echo "Gagal menghapus data mahasiswa.";
        }
    }
}
