<?php


if (isset($_POST['update'])) {
    $user = $_SESSION['u_id'];
    $error = false;

//clean user input to prevent sql injection
    $name = $_POST['name'];
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $email = $_POST['email'];
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $phone = $_POST['phone'];
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);

    $password = $_POST['password'];
    $password = strip_tags($password);
    $password = htmlspecialchars($password);


    //validate
    if (empty($name)) {
        $error = true;
        $errorFN = 'Fill in your name';
    }
    if (!is_numeric($phone)) {
        $error = true;
        $errorFN = 'Phone number should be a number';
        echo $errorFN;

    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $errorEmail = 'Fill in your email address!';
    }

    if (empty($password)) {
        $error = true;
        $errorPassword = 'Fill in your password';
    } elseif (strlen($password) < 6) {
        $error = true;
        $errorPassword = 'Password must contain min 6 alphabets.';
    }
    //check if user exist
    /*
    if(!$error){
        $sql = "SELECT * FROM user WHERE Email='$email'";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $resultCheck = $stmt->rowCount();
        if ($resultCheck > 0) {
            $userExists = "User name already!";
             header("Location: ?controller=sign_up");
            exit();
        }
    }*/
    //has and secure the password
    // $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

    $password = password_hash($password, PASSWORD_DEFAULT);


    $sql = "UPDATE user SET name='$name', email='$email', phone='$phone', password='$password' WHERE uid='$user'";

    // Prepare statement
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':password', $password);

    // execute the query
    $dbh->exec($sql);
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashedPw = $row['password'];
        $deHashPw = password_verify($password, $row['password']);
        $_SESSION['u_id'] = $row['uid'];
        $_SESSION['u_name'] = $row['name'];
        $_SESSION['u_phone'] = $row['phone'];
        $_SESSION['u_email'] = $row['email'];

    } else {
        // echo a message to say the UPDATE succeeded
        echo " records UPDATED successfully";
    }
}
$edit = '';
loadTemplate('user_edit', $edit);
?>
