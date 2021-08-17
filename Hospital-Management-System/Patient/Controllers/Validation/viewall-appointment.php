<?php
session_start();
require "./../../model/dbAppointment.php";

$patientId = empty($_SESSION['id']) ? "" : $_SESSION['id'];
$appointmentArray = array();
if (empty($patientId)) {
    exit();
} else {
    $appointmentList = getAppointment($patientId);
    if (count($appointmentList) < 1) {
        echo json_encode($appointmentArray);
        exit();
    }
}
for ($i = 0; $i < count($appointmentList); $i++) {
    array_push($appointmentArray, array(
        'id' => $appointmentList[$i]['appointment_id'],
        'consultant' => $appointmentList[$i]['appointment_consultantName'],
        'time' => $appointmentList[$i]['appointment_time'],
        'date' => $appointmentList[$i]['appointment_date'],
        'department' => $appointmentList[$i]['appointment_department']
    ));
}

echo json_encode($appointmentArray);
