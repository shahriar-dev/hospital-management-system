<?php
session_start();
require './../../model/dbBlood.php';
$BloodGroup = $BloodGroupError = $DonationDate = $DonationDateError = $DonationTimeSlotError = $DonationTimeSlot = $Remarks = $Message = $BookingDetails = "";
$Header = "";
$emptyField = false;
if (!isset($_SESSION['id'])) {
    // header("location: ../login-patient.php");
    exit();
} else {
    $id = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (empty($_POST['donationBloodgroup']) || $_POST['donationBloodgroup'] == "default") {
            echo "Must select a BLOOD GROUP!<br>";
            $emptyField = true;
        } else {
            $BloodGroup = $_POST['donationBloodgroup'];
        }
        if (empty($_POST['donationTimeslot']) || $_POST['donationTimeslot'] == "default") {
            echo "Please SELECT a TIME SLOT!<br>";
            $emptyField = true;
        } else {
            $DonationTimeSlot = $_POST['donationTimeslot'];
        }
        if (empty($_POST['donationDate'])) {
            echo "Please SELECT a DATE!<br>";
            $emptyField = true;
        } else {
            $DonationDate = $_POST['donationDate'];
        }


        if (!$emptyField) {
            $response = addDonationRequest($DonationDate, $BloodGroup, $DonationTimeSlot, $Remarks, $id);
            if ($response) {
                echo "Booking Request Done! Thank you...<br>";
            } else {
                echo "Please Complete the required fields!<br>";
            }

            //     $retrievedData = json_decode(file_get_contents(filepath2));
            //     if ($retrievedData != null) {
            //         foreach ($retrievedData as $user) {
            //             if ($user->userName == $id) {
            //                 $Header = "Booking Details";
            //                 if (!empty($BookingDetails)) {
            //                     $BookingDetails .= "\nBlood Group: " . $BloodGroup .
            //                         "\nDate: " . $DonationDate .
            //                         "\nTime Slot: " . $DonationTimeSlot;

            //                     if (!empty($Remarks)) {
            //                         $BookingDetails .= "\nRemarks: " . $Remarks;
            //                     }
            //                 } else {
            //                     $BookingDetails = "\nBlood Group: " . $BloodGroup .
            //                         "\nDate: " . $DonationDate .
            //                         "\nTime Slot: " . $DonationTimeSlot;
            //                     if (!empty($Remarks)) {
            //                         $BookingDetails .= "\nRemarks: " . $Remarks;
            //                     }
            //                 }
            //                 if (!empty($Remarks)) {

            //                     $data = array(
            //                         "patientName" => $user->firstName . " " . $user->lastName,
            //                         "gender" => $user->gender, "bloodGroup" => $BloodGroup,
            //                         "donation" => $DonationDate, "timeslot" => $DonationTimeSlot,
            //                         "dateofBooking" => date("d-m-Y h:i:sa"), "remarks" => $Remarks, "userName" => $id
            //                     );
            //                 } else {
            //                     $data = array(
            //                         "patientName" => $user->firstName . " " . $user->lastName,
            //                         "gender" => $user->gender, "bloodGroup" => $BloodGroup,
            //                         "donation" => $DonationDate, "timeslot" => $DonationTimeSlot,
            //                         "dateofBooking" => date("d-m-Y h:i:sa"), "userName" => $id
            //                     );
            //                 }
            //                 if (file_get_contents(filepath1) != null) {
            //                     $retrievedData2 = json_decode(file_get_contents(filepath1));
            //                     $retrievedData2[] = $data;
            //                     $result = file_put_contents(filepath1, json_encode($retrievedData2, JSON_PRETTY_PRINT));
            //                     if (!$result) {
            //                         $Message = "Error generating booking request!";
            //                         $color = "red";
            //                     } else {
            //                         $Message = "Successfully Generated!";
            //                         $color = "green";
            //                     }
            //                 } else {
            //                     $retrievedData2[] = $data;
            //                     $result = file_put_contents(filepath1, json_encode($retrievedData2, JSON_PRETTY_PRINT));
            //                     if (!$result) {
            //                         $Message = "Error generating booking Request!";
            //                         $color = "red";
            //                     } else {
            //                         $Message = "Successfully Generated!";
            //                         $color = "green";
            //                     }
            //                 }
            //                 break;
            //             }
            //         }
            //     }
            // } else {
            //     $BookingDetails = "Please Complete the Required FIELDS!";
            // }
        }
    }
}
