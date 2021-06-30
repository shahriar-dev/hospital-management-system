<?php
session_start();
$Header = $BloodGroup = $BloodGroupError = $BloodBagQuantity = $BloodBagQuantityError = $PerBagCostError = $CostError = $Remarks = $RemarksError = "";
$PerBagCost = 1000;
$Cost = $PerBagCost * 1;
$emptyField = false;
$BagDetails = "";
define("filepath1", "../../data/patient-details.json");
define("filepath2", "../../data/blood-order-details.json");


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

            if (empty($_POST['bloodquantity'])) {
                $BloodBagQuantityError = "Give QUANTITY!";
                $emptyField = true;
            } else {
                $BloodBagQuantity = Test_User_Input($_POST['bloodquantity']);
                if ($BloodBagQuantity == 0) {
                    $BloodBagQuantityError = "Value must be > 0";
                    $emptyField = true;
                }
            }

            if (!empty($BloodBagQuantity)) {
                $Cost = $BloodBagQuantity * $PerBagCost;
            }

            if (!empty($_POST['remarks'])) {
                $Remarks = Test_User_Input($_POST['remarks']);
                if (!preg_match("/^[A-Za-z0-9. ]*$/", $Remarks)) {
                    $RemarksError = "Only Letters, numbers and White Spaces are Allowed!";
                    $emptyField = true;
                }
            }

            if (!$emptyField) {
                $retrievedData = json_decode(file_get_contents(filepath1));
                if ($retrievedData != null) {
                    foreach ($retrievedData as $user) {
                        if ($user->userName == $id) {
                            $Header = "Bag Details";
                            if (!empty($BagDetails)) {
                                $BagDetails .= "\nBlood Group: " . $BloodGroup .
                                    "\nQuantity: " . $BloodBagQuantity .
                                    "\nTotal Cost: " . $BloodBagQuantity . "*" . $PerBagCost . " = " . $Cost;

                                if (!empty($Remarks)) {
                                    $BagDetails .= "\nRemarks: " . $Remarks;
                                }
                            } else {
                                $BagDetails .= "\nBlood Group: " . $BloodGroup .
                                    "\nQuantity: " . $BloodBagQuantity .
                                    "\nTotal Cost: " . $BloodBagQuantity . "*" . $PerBagCost . " = " . $Cost;

                                if (!empty($Remarks)) {
                                    $BagDetails .= "\nRemarks: " . $Remarks;
                                }
                            }
                            if (!empty($Remarks)) {

                                $data = array(
                                    "patientName" => $user->firstName . " " . $user->lastName,
                                    "gender" => $user->gender, "bloodGroup" => $BloodGroup,
                                    "quantity" => $BloodBagQuantity, "totalCost" => $Cost,
                                    "dateofOrder" => date("d-m-Y h:i:sa"), "remarks" => $Remarks, "userName" => $id
                                );
                            } else {
                                $data = array(
                                    "patientName" => $user->firstName . " " . $user->lastName,
                                    "gender" => $user->gender, "bloodGroup" => $BloodGroup,
                                    "quantity" => $BloodBagQuantity, "totalCost" => $Cost,
                                    "dateofOrder" => date("d-m-Y h:i:sa"), "userName" => $id
                                );
                            }
                            if (file_get_contents(filepath2) != null) {
                                $retrievedData2 = json_decode(file_get_contents(filepath2));
                                $retrievedData2[] = $data;
                                $result = file_put_contents(filepath2, json_encode($retrievedData2, JSON_PRETTY_PRINT));
                                if (!$result) {
                                    $ErrorMessage = "Error saving Purchase Request!";
                                }
                            } else {
                                $retrievedData2[] = $data;
                                $result = file_put_contents(filepath2, json_encode($retrievedData2, JSON_PRETTY_PRINT));
                                if (!$result) {
                                    $ErrorMessage = "Error saving Purchase Request!";
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
