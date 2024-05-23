<?php 
class SessionValueGetter {
    function get_id() {
        return $_SESSION['id'];
    }
    
    public function get_nama() {
        return $_SESSION['nama'];
    }

    public function get_foto_profil() {
        return $_SESSION['foto_profil'];
    }

    public function get_email() {
        return $_SESSION['email'];
    }

    public function get_role() {
        return $_SESSION['role'];
    }
}
?>