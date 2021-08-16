<?php
function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripslashes($Data)));
}
