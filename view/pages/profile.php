<?php
    include($_SERVER['DOCUMENT_ROOT'].'/view/layouts/header.php');
?>

<?php
    $class = new updateprofile();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = Session::get('UserAccount');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $number = $_POST['number'];

        $change_check = $class->admin_update_profile($username, $name, $address, $email, $number);
        
    }
?>

    <!-- order history start -->
    <section class="order-histry-area section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="order-history">
                        <div class="profile">
                            <div class="order-pro">
                                <div class="pro-img">
                                    <a href="#"><img src="/img/avt.png" alt="img"
                                            class="img-fluid"></a>
                                </div>
                                <br>
                                <div class="order-name">
                                    <h4><?php echo Session::get('UserName') ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="profile-form">
                            <form class="user" action="profile.php" method="POST">
                                <ul class="pro-input-label">
                                    <li>
                                        <label>Name</label>
                                        <input type="text" name="name" placeholder="Name" value="<?php echo Session::get('UserName')?>">
                                    </li>
                                    <li>
                                        <label>Address</label>
                                        <input type="text" name="address" placeholder="Address" value="<?php echo Session::get('Address')?>">
                                    </li>
                                </ul>
                                <ul class="pro-input-label">
                                    <li>
                                        <label>E-mail address</label>
                                        <input type="text" name="email" placeholder="E-mail address" required value="<?php echo Session::get('Email');  ?>">
                                    </li>
                                    <li>
                                        <label>Phone number</label>
                                        <input type="text" name="number" placeholder="Phone number" value="<?php echo Session::get('PhoneNumber');  ?>">
                                    </li>
                                </ul>
                                <span style="color: green;" class="small"> 
                                    <?php            
                                        if (isset($change_check)) {
                                            if ($change_check == 1)
                                                echo 'Successfully updated !';
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
                                <ul  class="pro-submit" >
                                    <li >
                                        <input type="submit" value="Update profile"  class="btn btn-style1">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order history end -->


<?php
    include($_SERVER['DOCUMENT_ROOT'].'/view/layouts/footer.php');
?>

