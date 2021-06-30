<?php
session_start();
$Header = "";
$AppointmentDateError = "";
$AppointmentDate = "";
$DepartmentError = "";
$Department = "";
$ConsultantNameError = "";
$ConsultantName = "";
$AppointmentTimeError = "";
$AppointmentTime = "";

$AppointmentDetails = "";
$emptyField = false;

define("filepath1", "../data/patient-details.json");
define("filepath2", "../data/appointment-details.json");

if (!isset($_SESSION['id'])) {
    header("Location: login-patient.php");
    exit();
} else {
    $id = Test_User_Input($_SESSION['id']);
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['submit'])) {
            if (empty($_POST['appointmentdate'])) {
                $AppointmentDateError = "Date can not be EMPTY!";
                $emptyField = true;
            } else {
                $AppointmentDate = Test_User_Input($_POST['appointmentdate']);
            }
            if (empty($_POST['department']) || Test_User_Input($_POST['department']) == "default") {
                $DepartmentError = "Must select a DEPARTMENT!";
                $emptyField = true;
            } else {
                $Department = Test_User_Input($_POST['department']);
            }
            if (empty($_POST['consultant'])) {
                $ConsultantNameError = "Consultant is Required!";
                $emptyField = true;
            } else {
                $ConsultantName = Test_User_Input($_POST['consultant']);
                if (!preg_match("/^[A-Za-z. ]*$/", $ConsultantName)) {
                    $ConsultantNameError = "Only Letters and White Spaces are Allowed!";
                    $emptyField = true;
                }
            }
            if (empty($_POST['appointmenttime'])) {
                $AppointmentTimeError = "Select a TIME!";
                $emptyField = true;
            } else {
                $AppointmentTime = Test_User_Input($_POST['appointmenttime']);
            }
            if (!empty($_POST['symptoms'])) {
                $Symptoms = Test_User_Input($_POST['symptoms']);
                if (!preg_match("/^[A-Za-z0-9. ]*$/", $Symptoms)) {
                    $SymptomsError = "Only Letters, numbers and White Spaces are Allowed!";
                    $emptyField = true;
                }
            }
            if (!$emptyField) {
                $retrievedData = json_decode(file_get_contents(filepath1));
                if ($retrievedData != null) {
                    foreach ($retrievedData as $user) {
                        if ($user->userName == $id) {
                            $Header = "Appointment Details";
                            $AppointmentDetails = "Patient Name: " . $user->firstName . " " . $user->lastName .
                                "\nGender: " . $user->gender .
                                "\nConsultant Name: " . $ConsultantName .
                                "\nDepartment: " . $Department .
                                "\nDate: " . $AppointmentDate .
                                "\nTime: " . $AppointmentTime;

                            if (!empty($Symptoms)) {
                                $AppointmentDetails .= "\nSymptoms: " . $Symptoms;
                                $data = array(
                                    "patientName" => $user->firstName . " " . $user->lastName,
                                    "gender" => $user->gender, "consultantName" => $ConsultantName,
                                    "department" => $Department, "date" => $AppointmentDate, "time" => $AppointmentTime,
                                    "dob" => $user->dob, "symptoms" => $Symptoms, "userName" => $id
                                );
                            } else {
                                $data = array(
                                    "patientName" => $user->firstName . " " . $user->lastName,
                                    "gender" => $user->gender, "consultantName" => $ConsultantName,
                                    "department" => $Department, "date" => $AppointmentDate, "time" => $AppointmentTime,
                                    "dob" => $user->dob, "userName" => $user->userName
                                );
                            }
                            if (file_get_contents(filepath2) != null) {
                                $retrievedData2 = json_decode(file_get_contents(filepath2));
                                $retrievedData2[] = $data;
                                $result = file_put_contents(filepath2, json_encode($retrievedData2, JSON_PRETTY_PRINT));
                                if (!$result) {
                                    $ErrorMessage = "Error saving apointment DETAILS!";
                                }
                            } else {
                                $retrievedData2[] = $data;
                                $result = file_put_contents(filepath2, json_encode($retrievedData2, JSON_PRETTY_PRINT));
                                if (!$result) {
                                    $ErrorMessage = "Error saving apointment DETAILS!";
                                }
                            }
                            break;
                        }
                    }
                }
            } else {
                $AppointmentDetails = "Please Complete the required fields!";
            }
        }
    }
}


function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
