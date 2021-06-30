<?php
session_start();
$Header = $MedicineType = $MedicineTypeError = $MedicineName = $MedicineNameError = $PerPieceCostError = $CostError = $Remarks = $RemarksError = $Quantity =  $QuantityError = "";
$PerPieceCost = 10;
$Cost = $PerPieceCost * 1;
$emptyField = false;
$BagDetails = "";
$Message = "";
define("filepath1", "../../data/patient-details.json");
define("filepath2", "../../data/medicine-order-details.json");
if (!isset($_SESSION['id'])) {
    header("location: ../login-patient.php");
    exit();
} else {
    $id = Test_User_Input($_SESSION['id']);
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['submit'])) {
            if (empty($_POST['medicinetype']) || Test_User_Input($_POST['medicinetype']) == "default") {
                $MedicineTypeError = "Select Type!";
                $emptyField = true;
            } else {
                $MedicineType = $_POST['medicinetype'];
            }

            if (empty($_POST['medicinename'])) {
                $MedicineNameError = "Enter Name";
                $emptyField = true;
            } else {
                $MedicineName = $_POST['medicinename'];
            }
            if (empty($_POST['quantity'])) {
                $QuantityError = "Give QUANTITY!";
                $emptyField = true;
            } else {
                $Quantity = Test_User_Input($_POST['quantity']);
                if ($Quantity == 0) {
                    $QuantityError = "Value must be > 0";
                    $emptyField = true;
                }
            }
            if (!empty($Quantity)) {
                $Cost = $Quantity * $PerPieceCost;
            }

            if (!$emptyField) {
                $retrievedData = json_decode(file_get_contents(filepath1));
                if ($retrievedData != null) {
                    foreach ($retrievedData as $user) {
                        if ($user->userName == $id) {
                            $Header = "Bag Details";
                            $BagDetails .= "\nMedicine Type: " . $MedicineType .
                                "\nMedicine Name: " . $MedicineName .
                                "\nQuantity: " . $Quantity .
                                "\nTotal Cost: " . $Quantity . "*" . $PerPieceCost . " = " . $Cost;


                            $data = array(
                                "patientName" => $user->firstName . " " . $user->lastName,
                                "gender" => $user->gender, "medicineType" => $MedicineType,
                                "medicineName" => $MedicineName,
                                "quantity" => $Quantity, "totalCost" => $Cost,
                                "dateofOrder" => date("d-m-Y h:i:sa"), "userName" => $id
                            );
                            if (file_get_contents(filepath2) != null) {
                                $retrievedData2 = json_decode(file_get_contents(filepath2));
                                $retrievedData2[] = $data;
                                $result = file_put_contents(filepath2, json_encode($retrievedData2, JSON_PRETTY_PRINT));
                                if (!$result) {
                                    $Message = "Error generating booking request!";
                                    $color = "red";
                                } else {
                                    $Message = "Successfully Generated!";
                                    $color = "green";
                                }
                            } else {
                                $retrievedData2[] = $data;
                                $result = file_put_contents(filepath2, json_encode($retrievedData2, JSON_PRETTY_PRINT));
                                if (!$result) {
                                    $Message = "Error generating booking request!";
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
                $BagDetails = "Please Complete the Required FIELDS!";
            }
        }
    }
}
function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
