<?php

class ReadPDF {
    public function __construct($file_name) {
        $file_path = "./uploads/" . $file_name;
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($file_path) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($file_path);
        exit();    
    }
}
?>
