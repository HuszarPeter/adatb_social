<html><head></head><body>
    <?php
        var_dump($_FILES);
        $fn = $_FILES["filename"]["tmp_name"];
        if (file_exists($fn))
        {
            echo("move to asd.jpg");
            move_uploaded_file($fn, "c:\Temp\asd.jpg");
        }
    ?>
<form enctype="multipart/form-data" action="proba.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
    Your file: <input name="filename" type="file">
    <input name="submit" type="submit" value="Upload">
</form>
</body></html>
