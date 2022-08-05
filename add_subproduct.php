<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';

$page = filter_input(INPUT_GET, 'page');
if (!$page) {
    $page = 1;
}

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('id', 'product_name', 'product_category', 'product_description');
$db->orderBy('id', 'Desc');
$rows = $db->arraybuilder()->paginate('products', $page, $select);

//serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = array_filter($_POST);

    //Insert timestamp
    $data_to_store['created_at'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    
    $last_id = $db->insert('subproducts', $data_to_store);

    if($last_id)
    {
    	$_SESSION['success'] = "Sub Product added successfully!";
    	header('location: subproducts.php');
    	exit();
    }
    else
    {
        echo 'insert failed: ' . $db->getLastError();
        exit();
    }
}

//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;

require_once 'includes/header.php'; 
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Add Subproducts</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="subproduct_form" enctype="multipart/form-data">
       <?php  include_once('./forms/subproduct_form.php'); ?>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            subproduct_name: {
                required: true,
                minlength: 3
            },
        }
    });
});
</script>

<?php include_once 'includes/footer.php'; ?>