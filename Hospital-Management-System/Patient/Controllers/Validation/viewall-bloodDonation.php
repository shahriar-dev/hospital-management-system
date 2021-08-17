<?php
session_start();
require './../../model/dbBlood.php';

$patientId = empty($_SESSION['id']) ? "" : $_SESSION['id'];

$DonationHistoryArray = array();
if (empty($patientId)) {
    exit();
} else {

    $DonationHistoryList = getDonationHistory($patientId);

    if (count($DonationHistoryList) < 1) {
        echo json_encode($DonationHistoryArray);
        exit();
    }
}

for ($i = 0; $i < count($DonationHistoryList); $i++) {
    array_push($DonationHistoryArray, array(
        'id' => $DonationHistoryList[$i]['bloodDonationBooking_id'],
        'bloodgroup' => $DonationHistoryList[$i]['bloodDonationBooking_bloodGroup'],
        'date' => $DonationHistoryList[$i]['bloodDonationBooking_date'],
        'timeslot' => $DonationHistoryList[$i]['bloodDonationBooking_timeSlot'],
        'remarks' =>  $DonationHistoryList[$i]['bloodDonationBooking_remarks']
    ));
}

echo json_encode($DonationHistoryArray);
