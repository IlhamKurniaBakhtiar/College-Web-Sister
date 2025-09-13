DROP DATABASE IF EXISTS Perkuliahan;

CREATE DATABASE Perkuliahan;

USE Perkuliahan;

CREATE TABLE Mhs (
    NIM CHAR(12) PRIMARY KEY,
    Nama VARCHAR(50),
    Alamat VARCHAR(200)
);

CREATE TABLE MataKuliah (
    KodeMatkul CHAR(13) PRIMARY KEY,
    NamaMatkul VARCHAR(30),
    SKS INT,
    Semester INT
);

CREATE TABLE Dosen (
    NIP CHAR(10) PRIMARY KEY,
    Nama VARCHAR(50),
    Alamat VARCHAR(200)
);

CREATE TABLE Kuliah (
    NIM CHAR(12),
    NIP CHAR(10),
    KodeMatkul CHAR(13),
    Nilai CHAR(2),
    PRIMARY KEY (NIM, NIP, KodeMatkul),
    FOREIGN KEY (NIM) REFERENCES Mhs(NIM) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (NIP) REFERENCES Dosen(NIP) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (KodeMatkul) REFERENCES MataKuliah(KodeMatkul) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO Mhs (NIM, Nama, Alamat) VALUES
('L0123148', 'Ilham Kurnia Bakhtiar', 'Karawang'),
('L0123146', 'Raka Aleandra', 'Bekasi'),
('L0123137', 'Tito Rizqy Putra Wiyana', 'Kudus'),
('L0123122', 'Rifqi Makarim', 'Pekalongan'),
('L0123118', 'Ravelin Luthfan Syach Putra', 'Jakarta');

INSERT INTO MataKuliah (KodeMatkul, NamaMatkul, SKS, Semester) VALUES
('12013120420', 'Basis Data', 4, 3),
('12013120323', 'Design Analisis Algoritma', 3, 3),
('12013120218', 'Matematika Diskrit II', 3, 3),
('12023120320', 'Jaringan Komputer', 4, 4),
('12013120321', 'Sistem Operasi', 3, 3);

INSERT INTO Dosen (NIP, Nama, Alamat) VALUES
('D0001', 'Dr. Bambang', 'Jakarta'),
('D0002', 'Dr. Siti Aminah', 'Bandung'),
('D0003', 'Prof. Sugeng', 'Surabaya'),
('D0004', 'Ir. Ratna Dewi', 'Yogyakarta'),
('D0005', 'Dr. Ahmad', 'Medan');

INSERT INTO Kuliah (NIM, NIP, KodeMatkul, Nilai) VALUES
('L0123148', 'D0001', '12013120420', 'A'),
('L0123146', 'D0002', '12013120323', 'B'),
('L0123137', 'D0003', '12013120218', 'A'),
('L0123122', 'D0004', '12023120320', 'C'),
('L0123118', 'D0005', '12013120321', 'B'),
('L0123148', 'D0002', '12013120323', 'A'),
('L0123146', 'D0003', '12013120218', 'B'),
('L0123137', 'D0004', '12023120320', 'A'),
('L0123122', 'D0005', '12013120321', 'B'),
('L0123118', 'D0001', '12013120420', 'C');
