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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Purchase Medicine</title>
</head>

<body>
    <div>
        <?php
        include "../Patient/Controllers/Include/header.php"
        ?>
    </div>
    <div>
        <?php
        include "../../Controllers/Include/navigation.php";
        ?>
    </div>
    <h1>Medicine Shop - Patient</h1>
    <hr>
    <div style=" position:absolute; width: 100%; height: 100%; display:flex;">
        <div class="left" style="width:65%;">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="info" style="display: flex;">
                    <div style="margin-right: 30px;">
                        <h3>Type</h3>
                        <select name="medicinetype" id="input_medicinetype" value="">
                            <option disabled selected value="default">--Choose a Option--</option>
                            <option id="medicinetype" name="medicinetype" <?php if (isset($_POST['medicinetype']) && $_POST['medicinetype'] == "First AID") echo "selected"; ?> value="First AID">First AID</option>
                            <option id="medicinetype" name="medicinetype" <?php if (isset($_POST['medicinetype']) && $_POST['medicinetype'] == "Medicine") echo "selected"; ?> value="Medicine">Medicine</option>
                            <option id="medicinetype" name="medicinetype" <?php if (isset($_POST['medicinetype']) && $_POST['medicinetype'] == "Tablet") echo "selected"; ?> value="Tablet">Tablet</option>
                            <option id="medicinetype" name="medicinetype" <?php if (isset($_POST['medicinetype']) && $_POST['medicinetype'] == "Syrup") echo "selected"; ?> value="Syrup">Syrup</option>
                        </select>
                        <label for="medicinetypeError" style="color: red; display: block;"><?php echo $MedicineTypeError; ?></label>
                    </div>
                    <div style="margin-right: 30px;">
                        <h3>Name</h3>
                        <input type="text" name="medicinename" value="<?php echo $MedicineName; ?>" style="height: 18px;">
                        <label for="medicinenameError" style="color: red; display: block;"><?php echo $MedicineNameError; ?></label>
                    </div>
                    <div style="margin-right: 30px;">
                        <h3>Quantity</h3>
                        <input type="number" name="quantity" value="<?php echo $Quantity; ?>" value="1" min="0" style="height: 18px;">
                        <label for="quantityError" style="color: red; display: block;"><?php echo $QuantityError; ?></label>
                    </div>
                    <div style="margin-right: 30px;">
                        <h3>Per Piece (BDT)</h3>
                        <input type="text" name="perpiececost" value="<?php echo $PerPieceCost . " TK"; ?>" readonly style="height: 18px;">
                        <label for="perpriececostError" style="color: red; display: block;"><?php echo $PerPieceCostError; ?></label>
                    </div>
                    <div style="margin-right: 30px;">
                        <h3>Total Cost</h3>
                        <input type="text" name="cost" value="<?php echo $Cost; ?>" readonly style="height: 18px;">
                        <label for="costError" style="color: red; display: block;"><?php echo $CostError; ?></label>
                    </div>
                </div>
                <div>
                    <input type="submit" name="submit" value="Add to Bag" style="margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 20%; text-decoration:none; text-align:center;">
                    <input type="reset" name="reset" value="Try Again" style="margin:3px; padding: 10px; font-size: 14px; background-color: red; color: white; border:none; border-radius: 6px; max-width: 20%; text-decoration:none; text-align:center;">
                    <input type="text" for="" style="color: <?php echo $color; ?>; border:none;" value="<?php echo $Message; ?>" readonly>
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
    <div style="top: 90%; left:45%; position:fixed;">
        <hr>
        <?php
        include "../../Controllers/Include/footer.php";
        ?>
    </div>
</body>

</html>