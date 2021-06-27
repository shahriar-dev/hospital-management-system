<?php
session_start();
$Header = $BloodGroup = $BloodGroupError = $BloodBagQuantity = $BloodBagQuantityError = $PerBagCostError = $CostError = $Remarks = $RemarksError = "";
$PerBagCost = 1000;
$Cost = $PerBagCost * 1;
$emptyField = false;
$BagDetails = "";
define("filepath1", "data/patient-details.txt");
define("filepath2", "data/blood-order-details.txt");


if (!isset($_SESSION['id'])) {
    header("location: blood-purchase-error-patient.php");
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
                                    $data = array(
                                        "patientName" => $user->firstName . " " . $user->lastName,
                                        "gender" => $user->gender, "bloodGroup" => $BloodGroup,
                                        "quantity" => $BloodBagQuantity, "totalCost" => $Cost,
                                        "dob" => $user->dob, "remarks" => $Remarks, "userName" => $id
                                    );
                                } else {
                                    $data = array(
                                        "patientName" => $user->firstName . " " . $user->lastName,
                                        "gender" => $user->gender, "bloodGroup" => $BloodGroup,
                                        "quantity" => $BloodBagQuantity, "totalCost" => $Cost,
                                        "dob" => $user->dob, "userName" => $id
                                    );
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
                                    "dateofOrder" => date("dd-mmm-YYY h:i:sa"), "userName" => $id
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <style>
        * {
            font-family: Cambria;
        }
    </style>
</head>

<body>
    <h1>Blood Purchase - Patient</h1>
    <hr>
    <div style="position:absolute; width: 100%; height: 100%; display:flex;">
        <div class="left" style="width:65%;">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="info" style="display: flex;">
                    <div style="margin-right: 80px;">
                        <h3>Blood Group</h3>
                        <select name="bloodgroup" id="input_bloodgroup" value="">
                            <option disabled selected value="default">--Choose a Option--</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "A+") echo "selected"; ?> value="A+">A+</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "A-") echo "selected"; ?> value="A-">A-</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "B+") echo "selected"; ?> value="B+">B+</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "B-") echo "selected"; ?> value="B-">B-</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "O+") echo "selected"; ?> value="O+">O+</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "O-") echo "selected"; ?> value="O-">O-</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "AB+") echo "selected"; ?> value="AB+">AB+</option>
                            <option id="bloodgroup" name="bloodgroup" <?php if (isset($_POST['bloodgroup']) && $_POST['bloodgroup'] == "AB-") echo "selected"; ?> value="AB-">AB-</option>
                        </select>
                        <label for="bloodgroupError" style="color: red; display: block;"><?php echo $BloodGroupError; ?></label>
                    </div>
                    <div style="margin-right: 80px;">
                        <h3>Quantity</h3>
                        <input type="number" name="bloodquantity" value="<?php echo $BloodBagQuantity; ?>" value="1" min="0" max="3" style="height: 18px;">
                        <label for="bloodquantityError" style="color: red; display: block;"><?php echo $BloodBagQuantityError; ?></label>
                    </div>
                    <div style="margin-right: 80px;">
                        <h3>Per Bag(BDT)</h3>
                        <input type="text" name="perbagcost" value="<?php echo $PerBagCost . " TK"; ?>" readonly style="height: 18px;">
                        <label for="perbagcostError" style="color: red; display: block;"><?php echo $PerBagCostError; ?></label>
                    </div>
                    <div style="margin-right: 80px;">
                        <h3>Total Cost</h3>
                        <input type="text" name="cost" value="<?php echo $Cost; ?>" readonly style="height: 18px;">
                        <label for="costError" style="color: red; display: block;"><?php echo $CostError; ?></label>
                    </div>
                    <div style="margin-right: 80px;">
                        <h3>Remarks</h3>
                        <textarea type="textbox" name="remarks" value="<?php echo $Remarks; ?>" style="height: 18px;" rows="10" cols="30" placeholder="Reason of buying"></textarea>
                    </div>
                </div>
                <div>
                    <input type="submit" name="submit" value="Add to Bag" style="margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 20%; text-decoration:none; text-align:center;">
                    <input type="reset" name="reset" value="Try Again" style="margin:3px; padding: 10px; font-size: 14px; background-color: red; color: white; border:none; border-radius: 6px; max-width: 20%; text-decoration:none; text-align:center;">
                    <label for="" style="<?php echo $color; ?>"><?php $Message; ?></label>
                </div>
            </form>

        </div>
        <div class="right" style=" width:35%; height:auto;">
            <div class="bag">
                <!-- <embed src="" type="aplication/pdf"> -->
                <h1 align="center"><?php $Header; ?></h1>
                <p>
                    <textarea name="bagdetails" cols="30" rows="10"><?php echo $BagDetails; ?></textarea>
                </p>
            </div>
        </div>
    </div>

</body>

</html>