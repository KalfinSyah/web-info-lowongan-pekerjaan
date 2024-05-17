<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["cv"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = mime_content_type($_FILES["cv"]["tmp_name"]);
        if ($check == "application/pdf" ||
            $check == "application/msword" ||
            $check == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                echo "Dokumen valid: " . $check . "<br>";
                $uploadOk = 1;
            } else {
                echo "Dokumen tidak valid.<br>";
                $uploadOk = 0;
            }

        if (file_exists($target_file)) {
            echo "Maaf, sudah terdapat file yang sama.<br>";
            $uploadOk = 0;
        }

        if ($_FILES["cv"]["size"] > 5000000) {
            echo "File yang Anda upload terlalu besar.<br>";
            $uploadOk = 0;
        }

        if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
            echo "Silahkan upload file dengan format PDF, DOC, atau DOCX.<br>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Maaf, file tidak terupload.<br>";
        } else {
            if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
                echo "File " . htmlspecialchars(basename($_FILES["cv"]["name"])) . " telah diupload.<br>";
            } else {
                echo "Maaf, terdapat kesalahan saat mengupload file.<br>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CV</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="cv">Upload CV:</label>
            <input type="file" name="cv" id="cv" accept=".pdf, .doc, .docx">
            <label for="cv">Choose file</label>
            <input type="submit" value="Upload">
        </form>
    </div>
</body>
</html>
