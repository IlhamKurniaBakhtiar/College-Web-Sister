<?php

require_once __DIR__ . '/../models/Kuliah.php';
require_once __DIR__ . '/../models/Mahasiswa.php';
require_once __DIR__ . '/../models/Matkul.php';
require_once __DIR__ . '/../models/Dosen.php';
require_once __DIR__ . '/../../config/database.php';

class KuliahController
{
    private $db;
    private $kuliah;
    private $mahasiswa;
    private $dosen;
    private $matkul;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->kuliah = new Kuliah($this->db);
        $this->mahasiswa = new Mhs($this->db);
        $this->dosen = new Dosen($this->db);
        $this->matkul = new MataKuliah($this->db);
    }

    public function index()
    {
        $stmt = $this->kuliah->readAll();
        $kuliah_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/kuliah/index.php';
    }

    public function create()
    {
        $mahasiswa = $this->mahasiswa->readAll();
        $dosen = $this->dosen->readAll();
        $matkul = $this->matkul->readAll();

        require_once __DIR__ . '/../views/kuliah/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->kuliah->NIM = $_POST['nim'];
            $this->kuliah->NIP = $_POST['nip'];
            $this->kuliah->KodeMatkul = $_POST['kode_matkul'];
            $this->kuliah->Nilai = $_POST['nilai'];

            if ($this->kuliah->create()) {
                header("Location: /College-Web-Sister/public/kuliah");
                exit();
            } else {
                echo "Gagal menambahkan data.";
            }
        }
    }

    public function edit($nim, $nip, $kodeMatkul)
    {
        $mahasiswa = $this->mahasiswa->readAll();
        $dosen = $this->dosen->readAll();
        $matkul = $this->matkul->readAll();

        $this->kuliah->NIM = $nim;
        $this->kuliah->NIP = $nip;
        $this->kuliah->KodeMatkul = $kodeMatkul;
        $kuliah_data = $this->kuliah->readOne();

        require_once __DIR__ . '/../views/kuliah/edit.php';
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
                header("Location: /College-Web-Sister/public/kuliah");
                exit();
            } else {
                echo "Gagal memperbarui data.";
            }
        }
    }

    public function delete($nim, $nip, $kodeMatkul)
    {
        $this->kuliah->NIM = $nim;
        $this->kuliah->NIP = $nip;
        $this->kuliah->KodeMatkul = $kodeMatkul;

        if ($this->kuliah->delete()) {
            header("Location: /College-Web-Sister/public/kuliah");
            exit();
        } else {
            echo "Gagal menghapus data.";
        }
    }
}
