<?php
function formattedNumber($strArr) {
    // Extract the string from the array
    $str = $strArr[0];

    // Define the regular expression pattern for the valid format
    $pattern = '/^\d{1,3}(,\d{3})*(\.\d{2})?$/';

    // Check if the string matches the pattern
    if (preg_match($pattern, $str)) {
        return "true";
    } else {
        return "false";
    }
}

echo formattedNumber(["1,093,222.04"]);
echo formattedNumber(["1,093,22.04"]);