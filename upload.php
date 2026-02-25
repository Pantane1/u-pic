<?php
$targetDir = "uploads/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0755, true);
}

if (isset($_FILES["image"])) {

    $allowedTypes = ["jpg", "jpeg", "png", "webp"];
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $fileTmp = $_FILES["image"]["tmp_name"];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExt, $allowedTypes)) {
        die("Only JPG, JPEG, PNG, WEBP allowed.");
    }

    if ($fileSize > 10 * 1024 * 1024) {
        die("Max file size is 10MB.");
    }

    $newName = uniqid("img_", true) . "." . $fileExt;
    $targetFile = $targetDir . $newName;

    if (move_uploaded_file($fileTmp, $targetFile)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Upload failed.";
    }
}
?>
