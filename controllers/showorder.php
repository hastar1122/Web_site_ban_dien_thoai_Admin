
<?php 
    class showorder{
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function show_order(){
            $query = "SELECT
            o.OrderID,
            `order`.UserID,
            u.UserAccount,
            u.UserName,
            u.Email,
            u.PhoneNumber,
            o1.OrderStatus,
            `order`.OrderDate
            FROM `order`
            INNER JOIN orderdetail o
              ON `order`.OrderID = o.OrderID
            INNER JOIN orderstatus o1
              ON `order`.OrderStatusID = o1.OrderStatusID
            INNER JOIN user u
              ON `order`.UserID = u.UserID";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_order_detail($id){
              $query = "SELECT u.UserName,
              u.PhoneNumber,
              u.Address,
              o.OrderDate,
              p.ProductName,
              p.Image,
              o1.Amount,
              o1.Price
               FROM `order` o JOIN orderdetail o1 ON o.OrderID = o1.OrderID
              JOIN orderstatus o2 ON o.OrderStatusID = o2.OrderStatusID
              JOIN user u ON o.UserID = u.UserID
              JOIN product p ON o1.ProductID = p.ProductID WHERE o.OrderID = '$id' ";
              $result = $this->db->select($query);
              return $result;
        }
    }

?>