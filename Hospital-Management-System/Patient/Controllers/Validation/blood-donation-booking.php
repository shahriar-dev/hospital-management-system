<?php
session_start();
$BloodGroup = $BloodGroupError = $DonationDate = $DonationDateError = $DonationTimeSlotError = $DonationTimeSlot = $Remarks = $Message = $BookingDetails = "";
$Header = "";
$emptyField = false;
define("filepath1", "../../data/blooddonationbooking.json");
define("filepath2", "../../data/patient-details.json");
if (!isset($_SESSION['id'])) {
    header("location: ../login-patient.php");
    exit();
} else {
    $id = Test_User_Input($_SESSION['id']);
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['submit'])) {
            if (empty($_POST['bloodgroup']) || Test_User_Input($_POST['bloodgroup']) == "default") {
                $BloodGroupError = "Must select a BLOOD GROUP!";
                $emptyField = true;
            } else {
                $BloodGroup = Test_User_Input($_POST['bloodgroup']);
            }
            if (empty($_POST['timeslot'])) {
                $DonationTimeSlotError = "Please SELECT a TIME SLOT!";
                $emptyField = true;
            } else {
                $DonationTimeSlot = $_POST['timeslot'];
            }
            if (empty($_POST['donationdate'])) {
                $DonationDateError = "Please SELECT a DATE!";
                $emptyField = true;
            } else {
                $DonationDate = $_POST['donationdate'];
            }


            if (!$emptyField) {
                $retrievedData = json_decode(file_get_contents(filepath2));
                if ($retrievedData != null) {
                    foreach ($retrievedData as $user) {
                        if ($user->userName == $id) {
                            $Header = "Booking Details";
                            if (!empty($BookingDetails)) {
                                $BookingDetails .= "\nBlood Group: " . $BloodGroup .
                                    "\nDate: " . $DonationDate .
                                    "\nTime Slot: " . $DonationTimeSlot;

                                if (!empty($Remarks)) {
                                    $BookingDetails .= "\nRemarks: " . $Remarks;
                                }
                            } else {
                                $BookingDetails = "\nBlood Group: " . $BloodGroup .
                                    "\nDate: " . $DonationDate .
                                    "\nTime Slot: " . $DonationTimeSlot;
                                if (!empty($Remarks)) {
                                    $BookingDetails .= "\nRemarks: " . $Remarks;
                                }
                            }
                            if (!empty($Remarks)) {

                                $data = array(
                                    "patientName" => $user->firstName . " " . $user->lastName,
                                    "gender" => $user->gender, "bloodGroup" => $BloodGroup,
                                    "donation" => $DonationDate, "timeslot" => $DonationTimeSlot,
                                    "dateofBooking" => date("d-m-Y h:i:sa"), "remarks" => $Remarks, "userName" => $id
                                );
                            } else {
                                $data = array(
                                    "patientName" => $user->firstName . " " . $user->lastName,
                                    "gender" => $user->gender, "bloodGroup" => $BloodGroup,
                                    "donation" => $DonationDate, "timeslot" => $DonationTimeSlot,
                                    "dateofBooking" => date("d-m-Y h:i:sa"), "userName" => $id
                                );
                            }
                            if (file_get_contents(filepath1) != null) {
                                $retrievedData2 = json_decode(file_get_contents(filepath1));
                                $retrievedData2[] = $data;
                                $result = file_put_contents(filepath1, json_encode($retrievedData2, JSON_PRETTY_PRINT));
                                if (!$result) {
                                    $Message = "Error generating booking request!";
                                    $color = "red";
                                } else {
                                    $Message = "Successfully Generated!";
                                    $color = "green";
                                }
                            } else {
                                $retrievedData2[] = $data;
                                $result = file_put_contents(filepath1, json_encode($retrievedData2, JSON_PRETTY_PRINT));
                                if (!$result) {
                                    $Message = "Error generating booking Request!";
                                    $color = "red";
                                } else {
                                    $Message = "Successfully Generated!";
                                    $color = "green";
                                }
                            }
                            break;
                        }
                    }
                }
            } else {
                $BookingDetails = "Please Complete the Required FIELDS!";
            }
        }
    }
}
function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
