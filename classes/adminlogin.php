<?php
    include 'lib/session.php';
    //Session::checkLogin();
    include 'lib/database.php';
    include 'helpers/format.php';
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
                $alert = "User and Pass must be not empty";
                return $alert;
            } else {
                $table = 'user';
                $acc = 'UserAccount';
                $pass = 'Password';
                $query = "SELECT * FROM user
                    WHERE UserAccount = '$username' AND Password = '$password'";
                $result = $this->db->select($query);
                if($result) {
                    //$value = $result->fetch_asssoc();
                    // Session::set('userLogin', true);
                    // Session::set('UserID', $value['UserID']);
                    // Session::set('UserAccount', $value['UserAccount']);
                    // Session::set('PassWord', $value['PassWord']);
                    echo "<script> window.location.href='index.php'</script>";
                } else {
                    $alert = "Username and password not match";
                    return $alert;
                }
            }
        }
    }
?>