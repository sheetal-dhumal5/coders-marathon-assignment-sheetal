<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	/*if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: customers.php');
        exit;

	}*/
    $subproduct_id = $del_id;

    $db = getDbInstance();
    $db->where('id', $subproduct_id);
    $status = $db->delete('subproducts');
    
    if ($status) 
    {
        $_SESSION['info'] = "Sub Product deleted successfully!";
        header('location: subproducts.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete subproduct";
    	header('location: subproducts.php');
        exit;

    }
    
}