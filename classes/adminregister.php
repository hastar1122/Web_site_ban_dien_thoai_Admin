<?php
    include 'lib/session.php';
    include 'lib/database.php';
    include 'helpers/format.php';
?>
<?php
    class adminregister {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function admin_register($username, $password, $repassword, $firstname, $lastname){
            $username = $this->fm->validation($username);
            $password = $this->fm->validation($password);

            //connect sql
            $username = mysqli_real_escape_string($this->db->link, $username);
            $password = mysqli_real_escape_string($this->db->link, $password);
            
            $queryUser = "SELECT * FROM user WHERE UserAccount = '$username'"; 

            if (empty($username) or empty($password) or empty($repassword) or empty($firstname) or empty($lastname)) {
                $alert = "All must be not empty";
                return $alert;
            } else if (!$this->fm->validationRegister($firstname)){
                $alert = "Firstname only letters and number";
                return $alert;
            } else if (!$this->fm->validationRegister($lastname)){
                $alert = "Lastname only letters and number";
                return $alert;
            } else if (!$this->fm->validationRegister($username)){
                $alert = "Username only letters and number";
                return $alert;
            } else if (!$this->fm->validationRegister($lastname)){
                $alert = "Password only letters and number";
                return $alert;
            } else if ($password != $repassword){
                $alert = "Repassword and password not match";
                return $alert;
            } else if ($this->db->select($queryUser)) {
                $alert = "Username already exists";
                return $alert;
            } else {
                $name = $lastname . ' ' . $firstname;
                $query = "INSERT user (UserAccount, Password, UserName, RoleID)
                    VALUES ('$username', '$password', '$name', 2)";
                $result = $this->db->insert($query);
                if($result) {
                    echo "<script> window.location.href='login.php'</script>";                 
                } else {
                    $alert = "Insert fail";
                    return $alert;
                }
            }
        }
    }
?>