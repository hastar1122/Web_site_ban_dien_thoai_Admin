<?php
include($_SERVER['DOCUMENT_ROOT'] . '/models/database.php');
include($_SERVER['DOCUMENT_ROOT'] . '/helpers/format.php');
?>
<?php
class category
{
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
    public function show_category()
    {
        $query = "SELECT b.CategoryID,b.ProductCategoryName,m.ProductCategoryName as 'CategoryParent'
                FROM category b
                LEFT JOIN category m
                ON b.CategoryParentID=m.CategoryID";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_category($id)
    {
        $query = "DELETE FROM category WHERE CategoryID='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Brand Deleted Successfully</span>";
        } else {
            $alert = "<span class='error'>Brand Deleted Not Success</span>";
        }
        return $alert;
    }
    public function getcategorybyid($id)
    {
        $query = "select * from category where CategoryID='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>