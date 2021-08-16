<?php
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
if (!isset($_SESSION['id'])) {
    // header("Location: ./../../../../Hospital-Management-System/Patient/");
} else {
    $id = Test_User_Input($_SESSION['id']);
    if (isset($_SESSION['eid'])) {
        $eid = Test_User_Input($_SESSION['eid']);
    }
    $LoginSuccess = false;
    define("filepath", "../data/patient-details.json");

    $retrievedData = file_get_contents(filepath);
    $retrievedData = json_decode($retrievedData);
    if ($retrievedData != null) {
        foreach ($retrievedData as $user) {
            if ($user->userName == $id) {
                $FirstName = $user->firstName;
                $LastName = $user->lastName;
                $Gender = $user->gender;
                $Religion = $user->religion;
                $Email = $user->email;
                $Username = $user->userName;
                $Password = $user->password;
                $DoB = $user->dob;
                $PhoneNumber = $user->phoneNumber;
                $BloodGroup = $user->bloodGroup;
                $PresentAddress = $user->presentAddress;
                $PermanentAddress = $user->permanentAddress;
                $LoginSuccess = true;
                $Message = "Welcome " . $FirstName . " " . $LastName;
                break;
            }
        }
    } else {
        $Message = "The Database is Empty!";
    }

    if (!$LoginSuccess) {
        $Message = "User not found!";
    }
}

