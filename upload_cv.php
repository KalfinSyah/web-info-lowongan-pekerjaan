<?php
require_once('./php/logic/SessionChecker.php');
$sessionChecker = new SessionChecker();

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["cv_submit_button"])) {
    if (isset($_POST["id_loker"]) && isset($_POST["id_perusahaan"])) {
        require_once('./php/logic/UploadCV.php');
        $uploadCV = new UploadCV($_POST['id_loker'], $_POST['id_perusahaan']);
        echo $uploadCV->get_message();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CV</title>
    <link rel="stylesheet" href="css/upload_cv.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Upload CV</h2>
            <input type="file" name="cv" accept=".pdf" required>
            <br><br>
            <input type="hidden" name="id_loker" value="<?php echo htmlspecialchars($_POST['id_loker']); ?>">
            <input type="hidden" name="id_perusahaan" value="<?php echo htmlspecialchars($_POST['id_perusahaan']); ?>">
            <button type="submit" name="cv_submit_button" value="1">Upload</button>
        </form>

        <a href="list_loker.php" class="cancel">Batal</a>
    </div>
</body>
</html>
