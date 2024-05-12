<?php
include_once('conn.php');
$sql = "SELECT * FROM university order by StudentName";
$stmt = $conn->prepare($sql);
$stmt->execute();

foreach($stmt->fetchAll() as $row){
    echo $row['StudentName'];
    echo "<br>";
}
?>