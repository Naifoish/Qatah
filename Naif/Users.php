<?php

class Users {

    public $userInfo;
    public $userAddress;
    public $error;
    public $newUser;
    private $userEmail;

    public function addUser($attributes) {
        $list = array();
        $list[] = $attributes['fname'];
        $list[] = $attributes['lname'];
        $list[] = $attributes['userEmail'];
        $list[] = $attributes['phone'];
        $list[] = md5($attributes['userPassword'] . LOGIN_KEY);
        $list[] = $attributes['countries'];
        $list[] = $attributes['level'];
        $list[] = serialize($attributes['feature']);
        $list[] = $attributes['company'];
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $con->executeNonQuery('STP_' . __FUNCTION__, $list);
        return $data[0];
    }

    public function editUser($attributes) {
        $list[] = $attributes['userId'];
        $list[] = $attributes['fname'];
        $list[] = $attributes['lname'];
        $list[] = $attributes['emailAdress'];
        $list[] = $attributes['phone'];
        $list[] = $attributes['facenookId'];
        $list[] = $attributes['facenook'];
        $list[] = $attributes['level'];
        if (!empty($attributes['password'])) {
            $list[] = md5($attributes['password'] . LOGIN_KEY);
        } else {
            $list[] = "";
        }
        $list[] = serialize($attributes['feature']);
        $list[] = $attributes['company'];
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }

    public function editUserMyAccount($attributes) {
        $list[] = $attributes['userId'];
        $list[] = $attributes['fname'];
        $list[] = $attributes['lname'];
        $list[] = $attributes['country'];
        $list[] = $attributes['birthYear'] . "-" . $attributes['month'] . "-" . $attributes['birthDate'];
        $list[] = $attributes['gender'];
        $list[] = $attributes['work'];
        $list[] = $attributes['posetion'];
        $list[] = $attributes['education'];
        $list[] = $attributes['degree'];
        $list[] = $attributes['study'];
        $list[] = $attributes['phone'];
        $list[] = $attributes['address'];
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }

    public function editUserName($attributes) {
        $list[] = $attributes['userId'];
        $list[] = $attributes['fname'];
        $list[] = $attributes['lname'];
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }

    public function loginUser($userName, $userPassword) {
        $list = array();
        $list[] = $userName;
        $list[] = md5($userPassword . LOGIN_KEY);
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $result = $con->executeQuery("STP_" . __FUNCTION__, $list);
        if ($result[0]['userCount'] >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function deactivateUser($userId) {
        $list = array();
        $list[] = $userId;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }

    public function activateUser($userId) {
        $list = array();
        $list[] = $userId;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }

    public function updateUserStatus($userId, $status) {
        $list = array();
        $list[] = $userId;
        $list[] = $status;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }

    public function getUserInfo($userId) {
        $list = array();
        $list[] = $userId;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $result = $con->executeQuery("STP_" . __FUNCTION__, $list);
        return $result[0];
    }

    public function getUsersByDeleted() {
        $list = array();
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $result = $con->executeQuery("STP_" . __FUNCTION__, $list);
        return $result;
    }

    public function isUserExsits($userName) {
        $list = array();
        $list[] = $userName;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $data = $con->executeQuery('STP_' . __FUNCTION__, $list);
        if ($data[0]['counter'] >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUsersAccount($firstName, $lastName, $phone, $image, $password, $userId) {
        $list = array();
        $list[] = $userId;
        $list[] = $firstName;
        $list[] = $lastName;
        if (!empty($password)) {
            $list[] = md5($password . LOGIN_KEY);
        } else {
            $list[] = "";
        }
        $list[] = $phone;
        $list[] = $image;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }


    public function getUsersByEmail($emailAddress) {
        $list = array();
        $list[] = $emailAddress;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        return $this->addUserImage($con->executeQuery("STP_" . __FUNCTION__, $list));
    }

    public function addUserImage($data) {
        foreach ($data as $key => $value) {
            if (trim($value['imageUrl']) != '') {
                $data[$key]['userImage'] = HTTP_UPLOAD_Path . "userImages/" . trim($value['imageUrl']);
                //$value['imagePathWithoutExt'] = HTTP_UPLOAD_Path . trim(substr($value['postImg'], 0, strlen($value['postImg']) - 4));
            } else {
                $data[$key]['userImage'] = HTTP_EXE_Path . "images/front-end/images/user-img.png";
            }
        }
        return $data;
    }

    public function getUsersByStatus($status) {
        $list = array();
        $list[] = $status;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        return $con->executeQuery("STP_" . __FUNCTION__, $list);
    }

    public function getUsersByAdmin($admin) {
        $list = array();
        $list[] = $admin;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        return $con->executeQuery("STP_" . __FUNCTION__, $list);
    }

    public function getUsers() {
        $list = array();

        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        return $this->addUserInfo($con->executeQuery("STP_" . __FUNCTION__, $list));
    }

    public function getUsersBytype($type) {
        $list = array();
        if (empty($type)) {
            $type = 0;
        }
        $list[] = $type;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        return $this->addUserInfo($con->executeQuery("STP_" . __FUNCTION__, $list));
    }

    function addUserInfo($data) {
        foreach ($data as $id => &$value) {
            $entryDate = $value['entryDate'];

            if ((!empty($entryDate)) && $entryDate != '0000-00-00') {
                $value['entryDate'] = Functions::from_db_to_calendar_date($entryDate);
            } else {
                $value['entryDate'] = '';
            }
        }

        return $data;
    }

    public function updatePassword($userId, $password) {
        $pass = md5($password . LOGIN_KEY);
        $list = array();
        $list[] = $userId;
        $list[] = $pass;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        return $con->executeNonQuery('STP_' . __FUNCTION__, $list);
    }

    public function updateUserByStatusAndDeleted($userId, $status, $deleted) {
        $list = array();
        $list[] = $userId;
        $list[] = $status;
        $list[] = $deleted;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }

    public function deleteUser($userId) {
        $list[] = $userId;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        $con->executeNonQuery("STP_" . __FUNCTION__, $list);
    }

    public function checkUserLogin() {
        if ($this->loginUser($_POST['email'], $_POST['password'])) {
            Security::loginUser($_POST['email']);
            $this->userInfo = $this->getUsersByEmail($_POST['email']);
            $_SESSION['email'] = $_POST['email'];
            return 1; // login success
        } else {
            $this->error = "Sorry, incorrect email or password";
            return 0; // error in login;
        }
    }

    public function setUserEmail($email) {
        $this->userEmail = $email;
    }

    public function getUserEmail() {
        return $this->userEmail;
    }

    public function predictUser($needle) {
        $list[] = $needle;
        $con = DBConnection_AbstractConn::getFactory($dbSetting);
        return $con->executeQuery("STP_" . __FUNCTION__, $list);
    }

    public function generatePassword() {

        $length = 8;
        $password = "";
        $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ#$@%&";
        $maxlength = strlen($possible);
        // set up a counter for how many characters are in the password so far
        $i = 0;
        // add random characters to $password until $length is reached
        while ($i < $length) {
            $char = substr($possible, mt_rand(0, $maxlength - 1), 1);
            if (!strstr($password, $char)) {
                $password .= $char;
                $i++;
            }
        }
        return $password;
    }

   

    public function generatePasswordAddUser() {
        $result = '';

        for ($i = 0; $i < 8; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }
    

}

?>