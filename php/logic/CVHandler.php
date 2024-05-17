<?php
class CVHandler {
    private $db;

    public function __construct() {
        // Assume $db is your database connection
        $this->db = new mysqli("localhost", "username", "password", "database");
    }

    public function getUploadedCVs() {
        $sql = "SELECT nama, email, posisi, filename FROM uploaded_cvs";
        $result = $this->db->query($sql);
        $cvs = [];

        while ($row = $result->fetch_assoc()) {
            $cvs[] = $row;
        }

        return $cvs;
    }
}
?>
