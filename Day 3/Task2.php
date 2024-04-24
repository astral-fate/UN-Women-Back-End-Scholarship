
<?php
    $grade = 10;
    if ($grade >= 90) {
        echo '<p>Excellence</p>';
    } elseif ($grade <= 90 and $grade >= 76) {
        echo '<p>Very Good</p>';
    } elseif ($grade <= 75 and $grade >= 66) {
        echo '<p>Good</p>';
    }  elseif ($grade <= 65 and $grade >= 51) {
        echo '<p>Pass</p>';
    }  elseif ($grade <= 50) {
        echo '<p>Fail</p>';
    } 
        else {
        echo '<p>Fail</p>';
    }

?>

