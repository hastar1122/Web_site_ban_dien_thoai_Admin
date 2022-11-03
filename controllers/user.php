<?php
    include($_SERVER['DOCUMENT_ROOT'].'/models/database.php');
    include($_SERVER['DOCUMENT_ROOT'].'/helpers/format.php');
?>
<?php
    class user {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        // public function insert_category($parentbrandID, $brandName){
        //     $parentbrandID = $this->fm->validation($parentbrandID);
        //     $brandName = $this->fm->validation($brandName);

        //     //connect sql
        //     $parentbrandID = mysqli_real_escape_string($this->db->link, $parentbrandID);
        //     $brandName = mysqli_real_escape_string($this->db->link, $brandName);

        //     if (empty($subbrandID) or empty($brandName)) {
        //         $alert = "ParentBrand and Brand must be not empty";
        //         return $alert;
        //     } else {
        //         $query="";
        //         $result = $this->db->select($query);
        //         if($result) {
        //             $value = $result->fetch_assoc();
        //             if ($value['RoleID'] != 2) {
        //                 return "You are not admin";
        //             } else {
        //                 Session::set('adminlogin', true);
        //                 Session::set('UserID', $value['UserID']);
        //                 Session::set('UserAccount', $value['UserAccount']);
        //                 Session::set('PassWord', $value['PassWord']);
        //                 Session::set('UserName', $value['UserName']);
        //                 echo "<script> window.location.href='/view/index.php'</script>";
        //             }
        //         } 
        //     }
        // }
        public function show_user(){
            $query="select UserID,UserAccount,Password,UserName,Address,Email,PhoneNumber,RoleName from user inner join role on user.RoleID=role.RoleID";
            $result=$this->db->select($query);
            return $result;
        }
        public function show_role(){
            $query="select RoleID,RoleName from role";
            $result=$this->db->select($query);
            return $result;
        }   
        public function del_user($id){
            $query="DELETE FROM user WHERE UserID='$id'"; 
            $result=$this->db->delete($query);
            if($result){
                $alert="<span class='success'>User Deleted Successfully</span>"; 
            }else{
                $alert="<span class='error'>User Deleted Not Success</span>"; 
            }
            return $alert; 
        }
        public function getuserbyid($id){
            $query="select UserID,UserAccount,Password,UserName,Address,Email,PhoneNumber,RoleName from user inner join role on user.RoleID=role.RoleID where UserId='$id'";
            $result=$this->db->select($query);
            return $result; 
        }
        public function getuserbyrole($id){
            $query="select UserID,UserAccount,Password,UserName,Address,Email,PhoneNumber from user where RoleID='$id'";
            $result=$this->db->select($query);
            return $result;
        }
    }
?>