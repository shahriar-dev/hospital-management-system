<?php
session_start();

require './../../model/dbMedicalRecords.php';

$patientId = empty($_SESSION['id']) ? "" : $_SESSION['id'];
$MedicalRecordsArray = array();
if (empty($patientId)) {
    exit();
} else {
    $MedicalRecordsList = getMedicalRecords($patientId);

    if (count($MedicalRecordsList) < 1) {
        echo json_encode($MedicalRecordsArray);
        exit();
    }
}

for ($i = 0; $i < count($MedicalRecordsList); $i++) {
    array_push($MedicalRecordsArray, array(
        'id' => $MedicalRecordsList[$i]['medicalRecords_id'],
        'fileName' => $MedicalRecordsList[$i]['medicalRecords_fileName'],
        'path' => $MedicalRecordsList[$i]['medicalRecords_file'],
        'date' => $MedicalRecordsList[$i]['medicalRecords_uploadDateTime'],
        'fileType' => $MedicalRecordsList[$i]['medicalRecords_fileType']
    ));
}

echo json_encode($MedicalRecordsArray);
