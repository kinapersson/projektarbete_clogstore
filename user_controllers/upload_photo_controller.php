<?php

$target_dir = "media/";
$target_file = $target_dir . basename($_FILES["banner"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {

    if ($target_file == "images/uploads/ ") {
        $msg = "cannot be empty";
        $uploadOk = 0;
    } // Check if file already exists
    else if (file_exists($target_file)) {
        $msg = "Sorry, file already exists.";
        $uploadOk = 0;
    } // Check file size
    else if ($_FILES["banner"]["size"] > 5000000) {
        $msg = "Sorry, your file is too large.";
        $uploadOk = 0;
    } // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["banner"]["name"]) . " has been uploaded.";
        }
    }
}

$uid = $_SESSION['u_id'];
$sql = "INSERT INTO images (filename, uid) VALUES (:filename, :uid) on duplicate key UPDATE filename =:filename";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':uid', $uid);
$stmt->bindParam(':filename', $target_file);
$stmt->execute();



/*
//Delete image
$uid = $_SESSION['u_id'];
if (isset($_POST["delete"])){
    $sql = "DELETE FROM images WHERE filename='uid'";
    $stmt = $dbh->exec($sql);
    session_unset();
    //session_destroy();
    echo "Image deleted";
    //header("Location: ?controller=default");
    //set allcolumn in a row

}
*/

$edit = '';
loadTemplate('user_edit', $edit);

?>
