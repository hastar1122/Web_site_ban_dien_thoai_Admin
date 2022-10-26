<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/view/layouts/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/controllers/showorder.php');
?>
<?php 
    $order = new showorder();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800" style="color: #0099FF;">Quản lí đơn hàng</h1>
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                    
                </div>
            </div>
            
        </form> -->

        <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Thông tin khách hàng</th>   
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                        $show_orders = $order->show_order();
                        if($show_orders){
                            $i = 0; 
                            while($result = $show_orders->fetch_assoc()){
                            $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php  echo $result['OrderID'] ?></td>
                            <td> <ul>
                                    <li><?php  echo $result['UserName']  ?></li>
                                    <li><?php  echo $result['PhoneNumber'] ?></li>
                                    <li><?php  echo $result['Email'] ?></li>
                                </ul>
                            </td>  
                            <td><?php  echo $result['OrderDate'] ?></td>
                            <td><?php  echo $result['OrderStatus'] ?></td>
                            
                            <td>
                             
                                    <a class="information btn btn-sm btn-primary" href="orderdetail.php?OrderID=<?php  echo $result['OrderID'] ?>" title="Xem chi tiết"><i class="far fa-edit"></i></a>
 
                            </td>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/view/layouts/footer.php');
?>
