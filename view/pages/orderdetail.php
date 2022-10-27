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


<div class="container-fluid">
    <div class="card shadow border-left-info mb-4">
        <div class="card-header">
            <h4 class="text-info m-0">Thông tin khách hàng</h4>
        </div>

        <div class="card-body pb-0">
            <dl class="row dl-horizontal mb-0">
                <?php 
                    $get_order_Name = $orderdetail->show_order_detail($id);
                    if($get_order_Name){
                    while($result = $get_order_Name->fetch_assoc()){   
                ?>
                <dt class="col-md-3">
                    Tên khách hàng: 
                </dt>

                <dd class="col-md-9">
                    <?php echo $result['UserName'] ?>
                </dd>

                <dt class="col-md-3">
                    Số điện thoại: 
                </dt>

                <dd class="col-md-9">
                    <?php echo $result['PhoneNumber'] ?>
                </dd>

                <dt class="col-md-3">
                    Địa chỉ nhận hàng: 
                </dt>

                <dd class="col-md-9">
                    <?php echo $result['Address'] ?>
                </dd>

                <dt class="col-md-3">
                    Ngày đặt hàng:
                </dt>

                <dd class="col-md-9">
                    <?php echo $result['OrderDate'] ?>
                </dd>
                <?php 
                    }
                }
                    ?>    
            </dl>
        </div>
    </div>
    <div class="card shadow mb-4 border-left-info">
        <div class="card-header py-3">
            <div class="float-left mt-2">
                <h5 class="m-0 text-primary">Danh sách đơn hàng</h5>
            </div>
        </div>
        <div class="card-body LoadAllSinhVien">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
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
                            <td><?php  echo $result['TotalPrice'] ?></td>
                            <td><?php  echo $result['Amount']*$result['TotalPrice'] ?></td>
                        </tr>
                        <?php 
                        }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
    <div class="card-body">
            <div class="panel-heading>">
                <h3 class="panel-title" style="color: #0099FF ;"></h3>
            </div>
            <div class="panel-body">
                
            </div>
        </div>
</div>

<!-- End of Main Content -->
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/view/layouts/footer.php');
?>
