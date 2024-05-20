<?php
if(isset($_FILES['image']) && isset($_FILES['audio'])) {
    $image = $_FILES['image'];
    $audio = $_FILES['audio'];
    
    $imagePath = "uploads/" . $image['name'];
    $audioPath = "uploads/" . $audio['name'];
    
    move_uploaded_file($image['tmp_name'], $imagePath);
    move_uploaded_file($audio['tmp_name'], $audioPath);
    
    echo "فایل ها با موفقیت آپلود شدند.";
} else {
    echo "لطفا عکس و اهنگ را انتخاب کنید.";
}
?>