<?php

function addMedicalRecord($filename, $file, $udate, $type, $pid)
{
    require_once 'dbConnect.php';

    $connection = Connect();
    if (!$connection) {
        die("Could not connect to the database!" . mysqli_connect_error());
    }
    $udate = date("Y-m-d h:i");
    $query = "INSERT INTO patient_medicalRecords (medicalRecords_fileName, medicalRecords_file, medicalRecords_uploadDateTime, medicalRecords_fileType, medicalRecords_patientId)
                VALUES (?, ?, ?, ?, ?)";
    $sql = $connection->prepare($query);
    $sql->bind_param('sssss', $filename, $file, $udate, $type, $pid);
    return $sql->execute();
}

function getMedicalRecords($id)
{
    require_once 'dbConnect.php';
    $connection = Connect();
    if (!$connection) {
        die("Could not connect to the database!" . mysqli_connect_error());
    }
    $query = "SELECT * FROM patient_medicalRecords WHERE medicalRecords_patientId = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param('s', $id);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}
