

<?php
    $grade = 10;
    if ($grade >= 90) {
        echo 'Excellence';
    } elseif ($grade <= 90 and $grade >= 76) {
        echo 'Very Good';
    } elseif ($grade <= 75 and $grade >= 66) {
        echo 'Good';
    }  elseif ($grade <= 65 and $grade >= 51) {
        echo 'Pass';
    }  elseif ($grade <= 50) {
        echo 'Fail';
    } 
        else {
        echo 'Fail';
    }

?>

