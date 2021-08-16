<?php
session_start();
require './../../model/dbAppointment.php';
$Header = "";
$AppointmentDateError = "";
$AppointmentDate = "";
$DepartmentError = "";
$Department = "";
$ConsultantNameError = "";
$ConsultantName = "";
$AppointmentTimeError = "";
$AppointmentTime = "";

$Message = "";
$emptyField = false;


// $id = $_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (empty($_POST['scheduleDate'])) {
        echo "Date can not be EMPTY!<br>";
        $emptyField = true;
    } else {
        $AppointmentDate = $_POST['scheduleDate'];
    }
    if (empty($_POST['scheduleDepartment']) || $_POST['scheduleDepartment'] == "default") {
        echo "Must select a DEPARTMENT!<br>";
        $emptyField = true;
    } else {
        $Department = $_POST['scheduleDepartment'];
    }
    if (empty($_POST['scheduleConsultant'])) {
        echo "Consultant is Required!<br>";
        $emptyField = true;
    } else {
        $ConsultantName = $_POST['scheduleConsultant'];
        if (!preg_match("/^[A-Za-z. ]*$/", $ConsultantName)) {
            echo "Only Letters and White Spaces are Allowed!<br>";
            $emptyField = true;
        }
    }
    if (empty($_POST['scheduleTime'])) {
        echo "Select a TIME!<br>";
        $emptyField = true;
    } else {
        $AppointmentTime = $_POST['scheduleTime'];
    }
    if (!empty($_POST['scheduleSymptoms'])) {
        $Symptoms = $_POST['scheduleSymptoms'];
        if (!preg_match("/^[A-Za-z0-9. ]*$/", $Symptoms)) {
            echo "Only Letters, numbers and White Spaces are Allowed!<br>";
            $emptyField = true;
        }
    }
    if (!$emptyField) {
        $response = addAppointment($ConsultantName, $AppointmentTime, $AppointmentDate, $Department, $_SESSION['id']);
        if ($response) {
            echo "Appointment Scheduled!! Thank you..<br>";
        }
    } else {
        echo "Please Complete the required fields!<br>";
    }
}
