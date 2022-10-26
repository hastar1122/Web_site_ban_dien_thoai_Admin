<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/view/layouts/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/controllers/showorder.php');
?>
<?php 
    if(!isset($_GET['OrderID']) || $_GET['OrderID'] == NULL){
        echo "<scrip> window.location = 'orders.php'; </scrip>";
    }
    else{
        $id = $_GET['OrderID'];
    }
    $orderdetail = new showorder();
   
?>
<div class="container">
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading>">
                <h3 class="panel-title" style="color: #0099FF ;">Thông tin khách hàng</h3>
            </div>
            <div class="panel-body text-left">
                <?php 
                   $get_order_Name = $orderdetail->show_order_detail($id);
                   if($get_order_Name){
                    while($result = $get_order_Name->fetch_assoc()){   
                ?>
                <p>Tên khách hàng:<?php echo $result['UserName'] ?></p>
                <p>Số điện thoại:<?php echo $result['PhoneNumber'] ?></p>
                <p>Địa chỉ nhận hàng:<?php echo $result['Address'] ?></p>
                <p>Ngày đặt hàng:<?php echo $result['OrderDate'] ?></p>
                <?php 
                }
            }
                ?>
            </div>
        </div>
    </div>
    <div class="panel panel-info">
            <div class="panel-heading>">
                <h3 class="panel-title" style="color: #0099FF ;">Danh sách đơn hàng</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover"> 
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $get_order_Name = $orderdetail->show_order_detail($id);
                                $i = 0;
                                if($get_order_Name){
                                    while($result = $get_order_Name->fetch_assoc()){  
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php  echo $result['ProductName'] ?></td>
                                <td><?php  echo $result['Image'] ?></td>
                                <td><?php  echo $result['Amount'] ?></td>
                                <td><?php  echo $result['Price'] ?></td>
                                <td><?php  echo $result['Amount']*$result['Price'] ?></td>
                            </tr>
                            <?php 
                            }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
</div>