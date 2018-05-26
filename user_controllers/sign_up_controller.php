<?php


//var_dump($_POST);
if(isset($_POST['submit'])) {
    //echo "Registered successfully";
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
    if(!is_numeric($phone)) {
        $error = true;
        $errorFN = 'Phone number should be a number';
        echo $errorFN;
        header("Location: ?controller=sign_up");
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
    if(!$error){
        $sql = "SELECT * FROM user WHERE Email='$email'";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $resultCheck = $stmt->rowCount();
        if ($resultCheck > 0) {
            $userExists = "User name already, exist please choose other username!";
            header("Location: ?controller=sign_up");
            exit();
        }
    }
    //has and secure the password
    // $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

    $password = password_hash($password, PASSWORD_DEFAULT);

//Stor user info in database
    $sql = "INSERT INTO user (name, email, phone, password) VALUES ('$name','$email','$phone','$password');";
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":name", $_POST['name']); //bindParam will only be called when execute(); */
    $stmt->bindParam(":email", $_POST['email']);
    $stmt->bindParam(":phone", $_POST['phone']);
    $stmt->bindParam(":password", $_POST['password']);
// // använder exec då inga result returneras
    $dbh->exec($sql);
    $successMsg = 'Registered successfully';
}
$signup = '';

loadTemplate("sign_up","$signup");


?>