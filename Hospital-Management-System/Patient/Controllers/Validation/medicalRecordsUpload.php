<?php
session_start();
require './../../model/dbMedicalRecords.php';

$file_name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$file_up_name = time() . "--" . $file_name;
$file_type = pathinfo($file_up_name, PATHINFO_EXTENSION);
$target = "./../../assets/files/" . $file_up_name;
$upload = move_uploaded_file($tmp_name, $target);

if ($upload) {
    $response = addMedicalRecord(substr($file_name, 0, 15), $target, date("Y-m-d"), $file_type, $_SESSION['id']);
    if (!$response) {
        echo "Failed to upload in the database!";
    } else {
        echo 'Successfully Uploaded in the database!';
    }
} else {
    echo "Couldnt move the file!";
}
