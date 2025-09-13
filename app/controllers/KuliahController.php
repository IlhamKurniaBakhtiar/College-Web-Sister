<?php

require_once '../models/Kuliah.php';
require_once '../models/Mhs.php';
require_once '../models/Dosen.php';
require_once '../models/MataKuliah.php';
require_once '../config/database.php';

class KuliahController
{
    private $db;
    private $kuliah;
    private $mahasiswa;
    private $dosen;
    private $matkul;

    public function __construct()
    {
        $this->db = (new database())->getConnection();
        $this->kuliah = new Kuliah($this->db);
        $this->mahasiswa = new Mhs($this->db);
        $this->dosen = new Dosen($this->db);
        $this->matkul = new MataKuliah($this->db);
    }

    public function index()
    {
        $stmt = $this->kuliah->readAll();
        $kuliah_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '../views/kuliah/index.php';
    }

    public function create()
    {
        $mahasiswas = $this->mahasiswa->readAll();
        $dosens = $this->dosen->readAll();
        $matkuls = $this->matkul->readAll();

        require_once __DIR__ . '../views/kuliah/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->kuliah->NIM = $_POST['nim'];
            $this->kuliah->NIP = $_POST['nip'];
            $this->kuliah->KodeMatkul = $_POST['kode_matkul'];
            $this->kuliah->Nilai = $_POST['nilai'];

            if ($this->kuliah->create()) {
                header("Location: /proyek_kuliah/public/kuliah");
                exit();
            } else {
                echo "Gagal menambahkan data.";
            }
        }
    }

    public function edit($params)
    {
        $mahasiswas = $this->mahasiswa->readAll();
        $dosens = $this->dosen->readAll();
        $matkuls = $this->matkul->readAll();

        if (count($params) >= 3) {
            $this->kuliah->NIM = $params[0];
            $this->kuliah->NIP = $params[1];
            $this->kuliah->KodeMatkul = $params[2];
            $kuliah_data = $this->kuliah->readOne();

            include '../views/kuliah/edit.php';
        } else {
            echo "ID tidak ditemukan.";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $oldNIM = $_POST['old_nim'];
            $oldNIP = $_POST['old_nip'];
            $oldKodeMatkul = $_POST['old_kode_matkul'];

            $this->kuliah->NIM = $_POST['nim'];
            $this->kuliah->NIP = $_POST['nip'];
            $this->kuliah->KodeMatkul = $_POST['kode_matkul'];
            $this->kuliah->Nilai = $_POST['nilai'];

            if ($this->kuliah->update($oldNIM, $oldNIP, $oldKodeMatkul)) {
                header("Location: /proyek_kuliah/public/kuliah");
                exit();
            } else {
                echo "Gagal memperbarui data.";
            }
        }
    }

    public function delete($params)
    {
        if (count($params) >= 3) {
            $this->kuliah->NIM = $params[0];
            $this->kuliah->NIP = $params[1];
            $this->kuliah->KodeMatkul = $params[2];

            if ($this->kuliah->delete()) {
                header("Location: /proyek_kuliah/public/kuliah");
                exit();
            } else {
                echo "Gagal menghapus data.";
            }
        } else {
            echo "ID tidak ditemukan.";
        }
    }
}
