<?php
    include($_SERVER['DOCUMENT_ROOT'].'/models/database.php');
    include($_SERVER['DOCUMENT_ROOT'].'/helpers/format.php');
    include($_SERVER['DOCUMENT_ROOT'].'/models/session.php');
    Session::checkLogin();
?>
<?php
    class adminlogin {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function admin_login($username, $password){
            $username = $this->fm->validation($username);
            $password = $this->fm->validation($password);

            //connect sql
            $username = mysqli_real_escape_string($this->db->link, $username);
            $password = mysqli_real_escape_string($this->db->link, $password);

            if (empty($username) or empty($password)) {
                $alert = "Username and password must be not empty";
                return $alert;
            } else {
                $query = "SELECT * FROM user WHERE UserAccount = '$username' AND Password = '$password'";
                $result = $this->db->select($query);
                if($result) {
                    $value = $result->fetch_assoc();
                    if ($value['RoleID'] != 2) {
                        return "You are not admin";
                    } else {
                        Session::set('adminlogin', true);
                        Session::set('UserID', $value['UserID']);
                        Session::set('UserAccount', $value['UserAccount']);
                        Session::set('PassWord', $value['PassWord']);
                        Session::set('UserName', $value['UserName']);
                        echo "<script> window.location.href='/view/index.php'</script>";
                    }
                } else {
                    $alert = "Username and password not match";
                    return $alert;
                }
            }
        }
    }
?>