<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="registration-patient">
    <title>Registration - PATIENT</title>
</head>

<body>
    <h1>Patient Resigtration</h1>
    <div style="max-width: 600px;  margin: 0 auto;">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <fieldset>
                <legend align="center">Basic Information</legend>
                <table align="center">
                    <style>
                        td {
                            padding: 10px 30px 10px 30px;
                        }
                    </style>
                    <tr>
                        <td><label for="input_firstname">First Name</label></td>
                        <td><input type="text" id="input_firstname" name="firstName" placeholder="Enter your First Name"></td>
                    </tr>
                    <tr>
                        <td><label for="input_lastname">Last Name</label></td>
                        <td><input type="text" id="input_lastname" name="lastName" placeholder="Enter your Last Name"></td>
                    </tr>
                    <tr>
                        <td><label for="input_gender">Gender</label></td>
                        <td>
                            <input type="radio" id="input_gender" name="gender" value="Male">Male</input>
                            <input type="radio" id="input_gender" name="gender" value="Female">Female</input>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="input_religion">Religion</label></td>
                        <td>
                            <select name="religion" id="input_religion" value="">
                                <option value="default">Select a Value</option>
                                <option value="muslim">Muslim</option>
                                <option value="hindu">Hindu</option>
                                <option value="christian">Christian</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="input_dob">Date of Birth</label></td>
                        <td><input type="date" id="input_dob" name="dob"></td>
                    </tr>

                </table>
            </fieldset>

        </form>
    </div>
</body>

</html>