<?php

// print_r($_FILES);
// print_r($_REQUEST);
// print_r($_REQUEST["id_experience"]);

$target_dir = "uploads/";

$fileName = $_FILES['file']['name'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$target_file = $target_dir . basename($_REQUEST["id_experience"] . "." . $fileExtension);
$uploadOk = 1;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    // if (file_exists($target_file)) {
    //     // echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        // echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo json_encode("Error conocido");

        // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
            echo json_encode($target_file);
        } else {
            // echo "Sorry, there was an error uploading your file.";
            echo json_encode("Error desconocio. Problema con el labs");
        }
    }
}
