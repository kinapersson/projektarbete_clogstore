<?php


if (isset($user)) {

    $user = $_SESSION['u_email'];

    if (isset($_POST['uid'])) {
        //check fields
        // $oldpassword = md5($_POST['oldpassword']);
        $pw = $_POST['newpassword'];
        $conPw = $_POST['confirmpassword'];
        $newpassword = password_hash($pw, PASSWORD_DEFAULT);
        // Hashar repeterar lösenord
        $repeatnewpassword = password_hash($conPw, PASSWORD_DEFAULT);

        // Check to see if a user exists with this e-mail
        $stmt = $dbh->prepare("SELECT * FROM user WHERE email = :email ");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $userExists = $stmt->fetch(PDO::FETCH_ASSOC);

        // $conn = null;


        // $oldpassword->$stmt['password'];

        //check pass
        // if ($oldpassword == $oldpassword) {
        //check twonew pass
        if ($pw == $conPw) {
            //success
            //change pass in dbh
            //has and secure the password
            // $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

            // $oldpassword = hash('sha512', $salt . $oldpassword);
            if (strlen($pw) > 25 || strlen($conPw) < 6) {
                echo "Password must be between 6 & 25";
            } else {
                $sql = $dbh->prepare('UPDATE user SET password = :password WHERE email = :email');
                $sql->bindParam(':password', $newpassword);
                $sql->bindParam(':email', $user);
                $sql->execute();
                // $conn = null;
                session_unset();
                session_destroy();
                echo "Your password has been successfully reset.";
            }
        } else
            echo "Your password's do not match.";

        // echo "Your password reset key is invalid.";
    }
}

$password = '';

loadTemplate('change_password', $password);

?>

