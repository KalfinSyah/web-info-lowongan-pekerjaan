<?php
    require_once('Database.php');

    class TambahLoker extends Database {
        public function __construct() {
            parent::__construct();
        }

        public function insertDataLoker($profesi, $posisi, $gaji, $syaratpendidikan, $lokasi, $usiamin, $usiamax, $prioritasgender) {
            $profesi = mysqli_real_escape_string($this->getConnection(), $profesi);
            $posisi = mysqli_real_escape_string($this->getConnection(), $posisi);
            $gaji = mysqli_real_escape_string($this->getConnection(), $gaji);
            $syaratpendidikan = mysqli_real_escape_string($this->getConnection(), $syaratpendidikan);
            $lokasi = mysqli_real_escape_string($this->getConnection(), $lokasi);
            $usiamin = mysqli_real_escape_string($this->getConnection(), $usiamin);
            $usiamax = mysqli_real_escape_string($this->getConnection(), $usiamax);
            $prioritasgender = mysqli_real_escape_string($this->getConnection(), $prioritasgender);
            $id_user = $_SESSION['id'];
            $sql = "INSERT INTO loker (profesi, posisi, gaji, syaratpendidikan, lokasi, usiamin, usiamax, prioritasgender, id_perusahaan) 
                    VALUES ('$profesi', '$posisi', '$gaji', '$syaratpendidikan', '$lokasi', '$usiamin', '$usiamax', '$prioritasgender', '$id_user')";
            if (mysqli_query($this->getConnection(), $sql)) {
                echo '<script>alert("LOWONGAN PEKERJAAN BERHASIL DI TAMBAHKAN!");</script>';
            } else {
                echo '<script>alert("TERJADI ERROR");</script>';
            }
        }
    }
?>
