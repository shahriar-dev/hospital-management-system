<?php require "../../../../Hospital-Management-System/Patient/Controllers/Validation/blood-purchase.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div style="margin: 20px 0 20px 0;">
        <?php
        include "../../Controllers/Include/header.php";
        ?>
    </div>
    <div style="margin: 0 10px 0 10px;">
        <?php
        include "../../Controllers/Include/navigation.php";
        ?>
    </div>
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
    <div style="top: 90%; left:45%; position:fixed;">
        <hr>
        <?php
        include "../../Controllers/Include/footer.php";
        ?>
    </div>
</body>

</html>