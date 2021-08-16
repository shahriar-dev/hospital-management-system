<?php

require 'dbConnect.php';

function addAppointment($cn, $at, $adate, $ad, $pid)
{
    $connection = Connect();

    $query = "INSERT INTO patient_appointmentInfo (appointment_consultantName, appointment_time, appointment_date, appointment_department, patient_id) VALUES (?, ?, ?, ?, ?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("sssss", $cn, $at, $adate, $ad, $pid);
    return $sql->execute();
}

function getAppointment($id)
{
    $connection = Connect();

    $query = "SELECT appointment_id,appointment_consultantName, appointment_time, appointment_date, appointment_department FROM patient_appointmentInfo WHERE patient_id = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param('s', $id);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}
