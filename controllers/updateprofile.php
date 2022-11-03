<?php
    include($_SERVER['DOCUMENT_ROOT'].'/models/database.php');
    include($_SERVER['DOCUMENT_ROOT'].'/helpers/format.php');
?>
<?php
    class updateprofile {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function admin_update_profile($username, $name, $address, $email, $number){ 

            if (empty($name) or empty($address) or empty($email) or empty($number)) {
                $alert = "All must be not empty";
                return $alert;
            } else if (!$this->fm->validationName($name)){
                $alert = "Name cannot contain numbers and special characters";
                return $alert;
            } else if (!$this->fm->validationEmail($email)) {
                $alert = "Email wrong fomat";
                return $alert;
            } else if (!$this->fm->validationNumber($number)) {
                $alert = "Phone number must be number";
                return $alert;
            } else {
                $query = "UPDATE user
                SET UserName = '$name',Address = '$address', Email = '$email', PhoneNumber = '$number'
                WHERE UserAccount = '$username' ";
                $result = $this->db->update($query);
                if($result) {
                    $query_info = "SELECT * FROM user WHERE UserAccount = '$username'";
                    $result_info = $this->db->select($query_info);
                    $value = $result_info->fetch_assoc();
                    Session::set('UserID', $value['UserID']);
                    Session::set('UserAccount', $value['UserAccount']);
                    Session::set('Password', $value['Password']);
                    Session::set('UserName', $value['UserName']);
                    Session::set('Address', $value['Address']);
                    Session::set('Email', $value['Email']);
                    Session::set('PhoneNumber', $value['PhoneNumber']);
                    return 1;             
                } else {
                    $alert = "Update fail";
                    return $alert;
                }
            }
        }
    }
?>