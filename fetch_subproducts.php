<?php
require_once './config/config.php';
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
    $page = 1;
}
$db = getDbInstance();
$product_id = $_POST["product_id"];
$selectSubProducts = array('id', 'subproduct_name', 'subproduct_category', 'subproduct_description');
if(isset($product_id)) {
    $db->where('product_id', $product_id);
}
$db->orderBy('id', 'Desc');
$rowsSub = $db->arraybuilder()->paginate('subproducts', $page, $selectSubProducts);
?>
<option value="">Select Sub Products</option>
<?php
foreach ($rowsSub as $opt) {
?>
<option value="<?php echo $opt["id"];?>"><?php echo $opt["subproduct_name"];?></option>

<?php
}
?>
I