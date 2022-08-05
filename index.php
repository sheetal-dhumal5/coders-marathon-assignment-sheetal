<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

//Get DB instance. function is defined in config.php
$db = getDbInstance();

//Get Dashboard information
//$numCustomers = $db->getValue ("customers", "count(*)");

include_once('includes/header.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="huge">
        	<?php
            if($_SESSION["f_name"]) { 
                echo "<font color='green'>Welcome " . $_SESSION["username"]."(".$_SESSION["f_name"]." ".$_SESSION["l_name"].")</font>";
            } else {
                echo "<font color='green'>Welcome " . $_SESSION["username"]."</font>";
            }
            ?>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->

<?php include_once('includes/footer.php'); ?>
