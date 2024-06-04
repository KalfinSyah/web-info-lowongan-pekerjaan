<?php
class ReadJPG {
    public function __construct($file_path) {
        header('Content-Type: image/jpeg');
        header('Content-Disposition: inline; filename="' . basename($file_path) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($file_path);
        exit();    
    }
}
?>
