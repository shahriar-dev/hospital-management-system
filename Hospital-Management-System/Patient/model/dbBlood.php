<?php
require 'dbConnect.php';

function addDonationRequest($ddate, $dbg, $dts, $s, $pid)
{
    $connection = Connect();
    $query = "INSERT INTO patient_bloodDonationBookingDetails (bloodDonationBooking_bloodGroup, bloodDonationBooking_date, bloodDonationBooking_timeSlot, bloodDonationBooking_remarks, bloodDonationBooking_patientId) VALUES (?, ?, ?, ?, ?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("sssss", $dbg, $ddate, $dts, $s, $pid);
    return $sql->execute();
}

function getDonationHistory($id)
{
    $connection = Connect();

    $query = "SELECT bloodDonationBooking_id, bloodDonationBooking_bloodGroup, bloodDonationBooking_date, bloodDonationBooking_timeSlot, bloodDonationBooking_remarks FROM patient_bloodDonationBookingDetails WHERE bloodDonationBooking_patientId = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param('s', $id);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}
