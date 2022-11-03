<?php
include($_SERVER['DOCUMENT_ROOT'] . '/view/layouts/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/controllers/category.php')
?>
<?php
$category = new category();
if (isset($_GET['delID'])) {
    $id = $_GET['delID'];
    $delCategory = $category->del_category($id);
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Mục Loại Sản Phẩm</h1>

    <?php
    if (isset($_GET['delID'])) {
        echo $delCategory;
    }
    ?>
    <br><br><br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-1 font-weight-bold text-primary">Danh sách Loại Sản Phẩm</h6>
            <a href="#" class="btn btn-light btn-outline-primary" data-toggle="modal" data-target="#addCategory">
                <i class="fas fa-plus-circle fa-lg"></i>&nbsp;Add New Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CategoryID</th>
                            <th>ProductCategory Name</th>
                            <th>Category Parent</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $show_category = $category->show_category();
                        if ($show_category) {
                            while ($result = $show_category->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $result['CategoryID'] ?></td>
                                    <td><?php echo $result['ProductCategoryName'] ?></td>
                                    <td><?php echo $result['CategoryParent'] ?></td>
                                    <td>
                                        <a href="categoryedit.php?categoryID=<?php echo $result['CategoryID'] ?>" type="button" class="btn btn-info">Edit</a>
                                        <a onclick="return confirm('Are you want to delete?')" href="?delID=<?php echo $result['CategoryID'] ?>" type="button" class="btn btn-danger">Delete</a>
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

    <div class="modal fade" id="addBrand">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-light">Add New Brand</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/view/layouts/footer.php');
?>