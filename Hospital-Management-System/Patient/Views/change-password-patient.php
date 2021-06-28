<?php
$Username = $UsernameError = $Password = $PasswordError = $ConfirmPassword = $ConfirmPasswordError = $Message = $Email = $EmailError = "";
define("filepath", "../data/patient-details.json");
$emptyField = true;
$changeStatus = false;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['username'])) {
            $Username = Test_User_Input($_POST['username']);
            $emptyField = false;
        } else {
            $UsernameError = "You must give your username!";
            $emptyField = true;
        }
        if (!empty($_POST['email'])) {
            $Email = Test_User_Input($_POST['email']);
            $emptyField = false;
        } else {
            $EmailError = "You must provide email associated with your account!";
            $emptyField = true;
        }
        if (!empty($_POST['password'])) {
            $Password = Test_User_Input($_POST['password']);
            $emptyField = false;
        } else {
            $PasswordError = "Give a new Password!";
            $emptyField = true;
        }
        if (!empty($_POST['confirmpassword'])) {
            $ConfirmPassword = Test_User_Input($_POST['confirmpassword']);
            $emptyField = false;
        } else {
            $ConfirmPasswordError = "Give a new Password again!";
            $emptyField = true;
        }

        if (!$emptyField) {
            $retrievedData = file_get_contents(filepath);
            if ($retrievedData != null) {
                $retrievedData = json_decode($retrievedData);
                $count = count($retrievedData) - 1;
                for ($i = 0; $i < count($retrievedData); $i++) {
                    $user = $retrievedData[$i];
                    if ($user->userName == $Username) {
                        if ($user->email == $Email) {
                            if ($Password == $ConfirmPassword) {
                                $user->password = $ConfirmPassword;
                                $changeStatus = true;
                                break;
                            } else {
                                $Message = "Password & Confirmed Password does not MATCH! Try Again...";
                                $color = "red";
                                $changeStatus = false;
                                break;
                            }
                        } else {
                            $Message = "Email does not match";
                            $color = "red";
                            $changeStatus = false;
                            break;
                        }
                    }
                    if ($i == $count) {
                        $Message = "User not found!";
                        $color = "red";
                        $changeStatus = false;
                        break;
                    }
                }
                if ($changeStatus) {
                    $data_en = json_encode($retrievedData, JSON_PRETTY_PRINT);
                    file_put_contents(filepath, $data_en);
                    $Message = "Password Changed Successfully!";
                    $color = "green";
                }
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
    <title>Change Password</title>
</head>

<body>
    <div>
        <?php
        include "../Controllers/Include/header.php";
        ?>
    </div>
    <div style="position: absolute; top: 50%; left:50%; transform:translate(-50%, -50%); width:1000px;">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <fieldset>
                <legend>Change Password</legend>
                <div>
                    <label for="username">Username</label>
                    <input style="display: block; width: 90%; margin:15px; padding: 15px;" type="text" name="username" value="<?php echo $Username ?>" placeholder="Give Username">
                    <label for="usernameerror" style="color:red"><?php echo $UsernameError; ?></label>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input style="display: block; width: 90%; margin:15px; padding: 15px;" type="email" name="email" value="<?php echo $Email; ?>" placeholder="Give associated email address">
                    <label for="emailerror" style="color:red"><?php echo $EmailError; ?></label>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input style="display: block; width: 90%; margin:15px; padding: 15px;" type="password" name="password" value="<?php echo $Password; ?>">
                    <label for="passworderror" style="color:red"><?php echo $PasswordError; ?></label>
                </div>
                <div>
                    <label for="confirmPassword">Confirm Password</label>
                    <input style="display: block; width: 90%; margin:15px; padding: 15px;" type="password" name="confirmpassword" value="<?php echo $ConfirmPassword; ?>">
                    <label for="confirmpassworderror" style="color:red"><?php echo $ConfirmPasswordError; ?></label>
                </div>

                <div style="margin: 10px 0px 10px 0px;">
                    <!-- <button type="submit" value="submit" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px;">Edit Profile</button> -->
                    <input type="submit" name="submit" value="Change Passowrd" style="display: block; margin:3px; padding: 10px; font-size: 14px; background-color: #67BDD2; color: white; border:none; border-radius: 6px; max-width: 25%; text-decoration:none; text-align:center;">
                    <input for="message" style="color: <?php echo $color; ?>; width: 60%; border:none;" value="<?php echo $Message; ?>">
                </div>
            </fieldset>
        </form>
    </div>

</body>

</html>