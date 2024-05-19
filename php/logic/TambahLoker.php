<?php
    require_once('Database.php');

    class TambahLoker extends Database {
        public function __construct() {
            parent::__construct();
        }

        public function insertDataLoker($profesi, $posisi, $gaji, $syaratpendidikan, $lokasi, $usiamin, $usiamax, $prioritasgender, $id_perusahaan) {
            $profesi = mysqli_real_escape_string($this->get_connection(), $profesi);
            $posisi = mysqli_real_escape_string($this->get_connection(), $posisi);
            $gaji = mysqli_real_escape_string($this->get_connection(), $gaji);
            $syaratpendidikan = mysqli_real_escape_string($this->get_connection(), $syaratpendidikan);
            $lokasi = mysqli_real_escape_string($this->get_connection(), $lokasi);
            $usiamin = mysqli_real_escape_string($this->get_connection(), $usiamin);
            $usiamax = mysqli_real_escape_string($this->get_connection(), $usiamax);
            $prioritasgender = mysqli_real_escape_string($this->get_connection(), $prioritasgender);
            $id_perusahaan = mysqli_real_escape_string($this->get_connection(), $id_perusahaan);
            $sql = "INSERT INTO loker (profesi, posisi, gaji, syaratpendidikan, lokasi, usiamin, usiamax, prioritasgender, id_perusahaan) 
                    VALUES ('$profesi', '$posisi', '$gaji', '$syaratpendidikan', '$lokasi', '$usiamin', '$usiamax', '$prioritasgender', '$id_perusahaan')";
            if (mysqli_query($this->get_connection(), $sql)) {
                header("Location: list_loker_perusahaan.php");
                exit();
            } else {
                return 'Error : Mysqli error';
            }
        }
    }
?>
