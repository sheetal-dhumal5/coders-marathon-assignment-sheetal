<?php
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
    $page = 1;
}

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('id', 'product_name', 'product_category', 'product_description');
/*if(isset($customer)) {
    $db->where('id', $customer['product_id']);
}*/
$db->orderBy('id', 'Desc');
$rows = $db->arraybuilder()->paginate('products', $page, $select);
if(isset($_REQUEST['product_id'])) {
$prodid = $_REQUEST['product_id'];
} 

if(isset($_REQUEST['subproduct_id'])) {
$subprodid = $_REQUEST['subproduct_id'];
} 
?>
<fieldset>
    <div class="form-group">
        <label for="subproduct_name">Sub Product Name *</label>
          <input type="text" name="subproduct_name" value="<?php echo htmlspecialchars($edit ? $customer['subproduct_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Sub Product Name" class="form-control" required="required" id = "subproduct_name" >
    </div> 

    <div class="form-group">
        <label>Parent Product </label>
            <?php //if(!$subProductId && $subProductId == '') { ?>
            <select name="product_id" class="form-control selectpicker" required>
                <option value=" " >Please select parent product</option>
                <?php
                foreach ($rows as $opt) {
                    if($edit && $prodid == $opt['id']){
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt['id'].'"' . $sel . '>' . $opt['product_name'] . '</option>';
                }
                ?>
            </select>
        <?php /*} else { ?>
            <select name="product_id" class="form-control selectpicker" required>
                <?php
                foreach ($rows as $opt) {
                    if ($edit && $opt == $customer['product_id']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt['id'].'"' . $sel . '>' . $opt['product_name'] . '</option>';
                }
                ?>
            </select>
        <?php }*/ ?>
    </div>  

    <div class="form-group">
        <label>Category </label>
           <?php $opt_arr = array("Mobile", "Laptop", "Other Electronics"); 
                            ?>
            <select name="subproduct_category" class="form-control selectpicker" required>
                <option value=" " >Please select category</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['subproduct_category']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>  

    <div class="form-group">
        <label for="address">Description</label>
          <textarea name="subproduct_description" placeholder="Description" class="form-control" id="subproduct_description"><?php echo htmlspecialchars(($edit) ? $customer['subproduct_description'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div> 
    
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
