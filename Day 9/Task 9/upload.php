<?php

$image_file = $_FILES["image"];

if (!isset($image_file)) {
    die('No file uploaded.');
}

if (filesize($image_file['tmp_name']) <= 0) {
    die('File is empty.');
}

$image_type = exif_imagetype($image_file['tmp_name']);
if ($image_type === false) {
    die('File is not a valid image.');
}

$image_extension = image_type_to_extension($image_type, true);
$image_name = bin2hex(random_bytes(16)) . $image_extension;

if (!move_uploaded_file($image_file['tmp_name'], __DIR__ . '/images/' . $image_name)) {
    die('Failed to move uploaded file.');
}

?>
