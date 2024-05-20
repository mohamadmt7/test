<!DOCTYPE html>
<html>
<head>
    <title>File Generator</title>
</head>
<body>
    <h2>Generate File</h2>
    <form method="post" action="">
        <label>Artist:</label>
        <input type="text" name="artist" required><br><br>
        <label>Music Name:</label>
        <input type="text" name="musicname" required><br><br>
        <label>content:</label>
        <input type="text" name="content" required><br><br>
        <button type="submit" name="generate">Generate File</button>
    </form>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="image">انتخاب عکس:</label>
        <input type="file" name="image" id="image"><br><br>
        <label for="audio">انتخاب آهنگ:</label>
        <input type="file" name="audio" id="audio"><br><br>
        <input type="submit" value="آپلود">
    </form>
</body>
</html>

<?php
if(isset($_POST['generate'])){
    $artist = $_POST['artist'];
    $musicname = $_POST['musicname'];
    $content=$_POST['content'];
    $filename = $artist . "_" . $musicname . ".php";

    $fileContent = $content;

    file_put_contents($filename, $fileContent);

    echo "File generated successfully. File name: " . $filename;
}
$target_dir = "artist/ahang/";
$target_image = $target_dir . basename($_FILES["image"]["name"]);
$target_audio = $target_dir . basename($_FILES["audio"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_image) && move_uploaded_file($_FILES["audio"]["tmp_name"], $target_audio)) {
    echo "فایل‌ها با موفقیت آپلود شدند.";
} else {
    echo "خطا در آپلود فایل‌ها.";
}
?>