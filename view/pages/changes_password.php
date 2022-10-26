<?php
    include($_SERVER['DOCUMENT_ROOT'].'/view/layouts/header.php');
    include($_SERVER['DOCUMENT_ROOT'].'/controllers/adminchangepass.php');
?>
<?php
    $class = new adminchangepass();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = Session::get('UserAccount');
        $password = $_POST['password'];
        $newpass = $_POST['newpass'];
        $renewpass = $_POST['renewpass'];

        $change_check = $class->admin_change_pass($username, $password, $newpass, $renewpass);
        
    }
?>
<!-- Nested Row within Card Body -->
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4"> Hi
                <?php
                    echo Session::get('UserName');
                ?>, Change Your Password
            </h1>
        </div>
        <form class="user" action="changes_password.php" method="POST">
            <div class="form-group">
                <input type="password" class="form-control form-control-user"
                    id="exampleInputEmail" name="password" aria-describedby="emailHelp"
                    placeholder="Current password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user"
                    id="exampleInputEmail" name="newpass" aria-describedby="emailHelp"
                    placeholder="New password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user"
                    id="exampleInputEmail" name="renewpass" aria-describedby="emailHelp"
                    placeholder="Re new password">
            </div>
            <span style="color: green;" class="small"> 
                <?php            
                    if (isset($change_check)) {
                        if ($change_check == 1)
                            echo 'Đổi mật khẩu thành công !';
                    }                               
                ?>
            </span>
            <span style="color: red;" class="small"> 
                <?php            
                    if (isset($change_check)){
                        if ($change_check != 1)
                            echo $change_check;
                    }                               
                ?>
            </span>
            <input type="submit" value="Save changes"  class="btn btn-primary btn-user btn-block">
            <hr>
    </div>
</div>
</div>

 

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/view/layouts/footer.php');
?>