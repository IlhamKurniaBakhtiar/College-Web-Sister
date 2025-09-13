<?php

require_once __DIR__ . '/../models/Dosen.php';
require_once __DIR__ . '/../../config/database.php';

class DosenController
{

    private $db;
    private $dosen;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->dosen = new Dosen($db);
    }

    public function index()
    {
        $stmt = $this->dosen->readAll();
        $dosen_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once '../app/views/dosen/index.php';
    }


    public function create()
    {
        require_once '../app/views/dosen/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['nip']) || empty($_POST['nama'])) {
                echo "NIP dan Nama tidak boleh kosong.";
                return;
            }

            $this->dosen->NIP = $_POST['nip'];
            $this->dosen->Nama = $_POST['nama'];
            $this->dosen->Alamat = $_POST['alamat'];

            if ($this->dosen->create()) {  
                header('Location: /College-Web-Sister/public/dosen');
            } else {
                echo "Gagal menyimpan data dosen.";
            }
        }
    }

    public function edit($nip)
    {
        $this->dosen->NIP = $nip;
        $dosen = $this->dosen->readOne();

        require_once '../app/views/dosen/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->dosen->NIP = $_POST['nip'];
            $this->dosen->Nama = $_POST['nama'];
            $this->dosen->Alamat = $_POST['alamat'];

            if ($this->dosen->update()) {
                header('Location: /proyek_kuliah/public/dosen');
            } else {
                echo "Gagal mengupdate data dosen.";
            }
        }
    }

    public function delete($nip)
    {
        $this->dosen->NIP = $nip;

        if ($this->dosen->delete()) {
            header('Location: /proyek_kuliah/public/dosen');
        } else {
            echo "Gagal menghapus data dosen.";
        }
    }
}
