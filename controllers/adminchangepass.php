<?php
    include($_SERVER['DOCUMENT_ROOT'].'/models/database.php');
    include($_SERVER['DOCUMENT_ROOT'].'/helpers/format.php');
?>
<?php
    class adminchangepass {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function admin_change_pass($username, $password, $newpass, $renewpass){
            $username = $this->fm->validation($username);
            $password = $this->fm->validation($password);

            //connect sql
            $username = mysqli_real_escape_string($this->db->link, $username);
            $password = mysqli_real_escape_string($this->db->link, $password);
            
            $queryUser = "SELECT * FROM user 
            WHERE UserAccount = '$username' AND Password = '$password'"; 
            if (!$this->db->select($queryUser)) {
                $alert = "Incorrect password";
                return $alert;
            } else if (empty($username) or empty($password) or empty($newpass) or empty($renewpass)) {
                $alert = "All must be not empty";
                return $alert;
            } else if (!$this->fm->validationRegister($newpass)){
                $alert = "New password only letters and number";
                return $alert;
            } else if ($newpass != $renewpass){
                $alert = "New password and re new password not match";
                return $alert;
            } else {
                $query = "UPDATE user
                SET Password = '$newpass'
                WHERE UserAccount = '$username' ";
                $result = $this->db->update($query);
                if($result) {
                    return 1;             
                } else {
                    $alert = "Update fail";
                    return $alert;
                }
            }
        }
    }
?>