<?php

class user
{
    private $uid;
    private $name;
    private $password;
    private $logout;
    private $delete_account;
    private $isUserLoggedIn;
    private $getUserLevel;
    private $isUserAdmin;

    public function setuid($uid)
    {
        $this->uid = $uid;
    }

    public function setname($name)
    {
        $this->name = $name;
    }

    public function setpassword($password)
    {
        $this->password = $password;
    }

    public function getuid($uid)
    {
        return $this->uid;
    }

    public function getname($name)
    {
        return $this->name;
    }

    public function getpassword($password)
    {
        return $this->password;
    }

    public function logout()
    {
        unset ($_SESSION['uid']);
        unset ($_SESSION['user_agent']);
        session_destroy();
    }
    public function delete_account()
    {
        unset ($_SESSION['uid']);
        unset ($_SESSION['user_agent']);
        session_destroy();

    }

    public function isUserLoggedIn()
    {
        if (isset($_SESSION['uid'])) return true;
        return false;
    }

    public function getUserLevel()
    {
        global $dbh;
        $admin_sql = "SELECT userlevel from user where uid = :uid";
        $stmt = $dbh->prepare($admin_sql);
        $stmt->bindParam(':uid', $_SESSION['uid']);
        $stmt->execute();

        $userLevel = $stmt->fetchColumn();
        return $userLevel;
    }

    public function isUserAdmin()
    {
        if ($this->getUserLevel() === 2) return true;
        return false;
    }
}
$user = new user();

/*function isUserLoggedIn()
{
    if (isset($_SESSION['uid'])) return true;
    return false;
}
*/
