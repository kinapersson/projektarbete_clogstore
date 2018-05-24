<?php

if (isset($_SESSION)) {
    if (isset($_POST['submit'])) {
        if (!isset($_SESSION['u_id'])) {
            $errors = array();
            if (empty($_POST['email']) ||
                empty($_POST['password'])) {
                $errors[] = 'Fill in your email and password.';
            }
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($_POST['email'] != $email ||
                $_POST['password'] != $password) {
                $errors[] = 'Check your email and password.';
            }
            if (count($errors) == 0) {

                $_SESSION['uid'] = 1;

                // header('location: ?controller=log_in');
            }
            // function isUserLoggedIn($email, $password, $userlevel)
            // {
            $stmt = $dbh->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindParam(':email', $email);

            try {
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $hashedPw = $row['password'];
                    $deHashPw = password_verify($password, $row['password']);
                        $_SESSION['u_id'] = $row['uid'];
                        $_SESSION['u_name'] = $row['name'];
                        $_SESSION['u_phone'] = $row['phone'];
                        $_SESSION['u_email'] = $row['email'];
                        header("Location: ?controller=my_account");
                    }
                 else {
                    return false;
                }
            } catch (PDOException $e) {
                print $e->getMessage();
                die();
            }
        }
    }
}else {
    echo "You are already logged in!";
}

$row = '';

loadTemplate("log_in", "$row");

?>
