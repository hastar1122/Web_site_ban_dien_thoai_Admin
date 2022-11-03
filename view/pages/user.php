<?php
include($_SERVER['DOCUMENT_ROOT'] . '/view/layouts/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/controllers/user.php')
?>
<?php
$user = new user();
if (isset($_GET['delID'])) {
    $id = $_GET['delID'];
    $delUser = $user->del_user($id);
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Mục Tài Khoản</h1>
    <br>
    <div class=" d-flex justify-content-between">
        <div class="d-flex justify-content-between">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Chọn theo
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/view/pages/user.php">Tất cả</a>
                    <?php $show_role = $user->show_role();
                    if ($show_role) {
                        while ($result = $show_role->fetch_assoc()) {
                    ?>
                            <a class="dropdown-item" href="?roleID=<?php echo $result['RoleID'] ?>"><?php echo $result['RoleName'] ?> </a>
                    <?php }
                    } ?>
                </div>
            </div>
            <div class="text-success"> <?php
                                        if (isset($_GET['delID'])) {
                                            echo $delUser;
                                        }
                                        ?></div>
        </div>
        <div class="input-group" style="width:300px">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">search</button>
        </div>
    </div>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-1 font-weight-bold text-primary">Danh sách Tài Khoản</h6>
            <a href="#" class="btn btn-light btn-outline-primary" data-toggle="modal" data-target="#addUser">
                <i class="fas fa-plus-circle fa-lg"></i>&nbsp;Add New User</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" style="font-size:14px;" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UserID</th>
                            <th>UserAccount</th>
                            <th>Password</th>
                            <th>UserName</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>PhoneNumber</th>
                            <?php
                            if (!isset($_GET['roleID'])) {
                                echo "<th>Role</th>";
                            }
                            ?>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['roleID'])) {
                            $id = $_GET['roleID'];
                            $show_user = $user->getuserbyrole($id);
                        } else {
                            $show_user = $user->show_user();
                        }

                        if ($show_user) {
                            while ($result = $show_user->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $result['UserID'] ?></td>
                                    <td><?php echo $result['UserAccount'] ?></td>
                                    <td><?php echo $result['Password'] ?></td>
                                    <td><?php echo $result['UserName'] ?></td>
                                    <td><?php echo $result['Address'] ?></td>
                                    <td><?php echo $result['Email'] ?></td>
                                    <td><?php echo $result['PhoneNumber'] ?></td>
                                    <?php
                                    if (!isset($_GET['roleID'])) {
                                        echo '<td>' . $result['RoleName'] . '</td>';
                                    }
                                    ?>
                                    <td>
                                        <a href="useredit.php?userID=<?php echo $result['UserID'] ?>" type="button" class="btn btn-info">Edit</a>
                                        <a onclick="return confirm('Are you want to delete?')" href="?delID=<?php echo $result['UserID'] ?>" type="button" class="btn btn-danger">Delete</a>
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

    <div class="modal fade" id="addUser">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-light">Add New User</h4>
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