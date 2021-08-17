<?php
require '../../../Hospital-Management-System/Patient/model/dbGetPatient.php';


$FirstName = "";
$LastName = "";
$Gender = "";
$Religion = "";
$Email = "";
$Username = "";
$Password = "";
$DoB = "";
$PhoneNumber = "";
$BloodGroup = "";
$PresentAddress = "";
$PermanentAddress = "";
$Message = '';
if (!isset($_SESSION['id'])) {
    exit();
} else {
    $id = $_SESSION['id'];

    $response = dbGetPatientInfo($id);
    if (count($response) === 1) {
        foreach ($response as $user) {
            $FirstName = $user['patient_firstName'];
            $LastName = $user['patient_lastName'];
            $Gender = $user['patient_gender'];
            $BloodGroup = $user['patient_bloodGroup'];
            $PresentAddress = $user['patient_presentAddress'];
            $PermanentAddress = $user['patient_permanentAddress'];
            $Email = $user['patient_email'];
            $PhoneNumber = $user['patient_phoneNumber'];
            $Religion = $user['patient_religion'];
            $DoB = $user['patient_dob'];
            $Username = $user['patient_username'];
            $Password = $user['patient_password'];
            $Message = "Welcome " . $FirstName . " " . $LastName;
        }
    } else {
        $Message = "Information Extraction Failed!";
    }
}
