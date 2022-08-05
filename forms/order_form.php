<script type="text/javascript">
$(document).ready(function(){
    $("#amount, #quantity").change(function(){
        var amount = $("#amount").val();
        var quantity = $("#quantity").val();
        var total = amount * quantity;
        $("#total").val(total);
    });

    $("#product_name").change(function(){
                var product_id = this.value;
                $.ajax({
                    url: "fetch_subproducts.php",
                    type: "POST",
                    data: {
                        product_id: product_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#subproduct_name").html(result);
                    }
                });
            });
});
</script>
<?php 
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
    $page = 1;
}

if(isset($_REQUEST['product_id'])) {
$prodid = $_REQUEST['product_id'];
$arrProd = explode(',', $prodid);
$arrProd0 = isset($arrProd[0]) ? $arrProd[0] : null;
$arrProd1 = isset($arrProd[1]) ? $arrProd[1] : null;
} 
if(isset($_REQUEST['subproduct_id'])) {
$subprodid = $_REQUEST['subproduct_id'];
} 

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('id', 'product_name', 'product_category', 'product_description');
/*(isset($customer)) {
    $db->where('id', $customer['product_id']);
}*/
$db->orderBy('id', 'Desc');
$rows = $db->arraybuilder()->paginate('products', $page, $select);
if(isset($_REQUEST['order_id'])) {
$order_id = $_REQUEST['order_id'];
} else { $order_id = ''; }


$selectSubProducts = array('id', 'subproduct_name', 'subproduct_category', 'subproduct_description');
if(isset($customer)) {
    $db->where('product_id', $customer['product_id']);
}
$db->orderBy('id', 'Desc');
$rowsSub = $db->arraybuilder()->paginate('subproducts', $page, $selectSubProducts);
?>
<fieldset>
    <div class="form-group">
        <label for="product_id">Product Name *</label>
        <select name="product_id[]" class="form-control selectpicker" id = "product_name" multiple required>
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
    </div> 

    <div class="form-group">
        <label for="subproduct_name">Sub Product Name *</label>

            <?php //(!$order_id && $order_id == '') { 
                if($edit) { ?>
           <select name="subproduct_id" class="form-control selectpicker"   id = "subproduct_name" required>
                <option value=" " >Please select subproduct</option>
                <?php
                foreach ($rowsSub as $opt) {
                    if($edit && $subprodid == $opt['id']){
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt['id'].'"' . $sel . '>' . $opt['subproduct_name'] . '</option>';
                }

                ?>
            </select><?php } else { ?>
            <select name="subproduct_id" class="form-control selectpicker"   id = "subproduct_name" required>
            </select>
        <?php } ?>
        <?php /*else { ?>
            <select name="subproduct_id" class="form-control selectpicker"   id = "subproduct_name" required>
                <?php
                foreach ($rowsSub as $opt) {
                    if ($edit && $opt == $customer['subproduct_id']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt['id'].'"' . $sel . '>' . $opt['subproduct_name'] . '</option>';
                }

                ?>
            </select>
        <?php }*/ ?>
    </div> 

    <div class="form-group">
        <label for="amount">Amount *</label>
           <input type="number" name="amount" value="<?php echo htmlspecialchars($edit ? $customer['amount'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Amount" class="form-control" required="required" id = "amount" >
    </div> 

    <div class="form-group">
        <label for="quantity">Quantity</label>
          <input type="number" name="quantity" value="<?php echo htmlspecialchars($edit ? $customer['quantity'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Quantity" class="form-control" required="required" id = "quantity" >
    </div> 

    <div class="form-group">
        <label for="total">Total Amount</label>
         <input type="number" name="total" value="<?php echo htmlspecialchars($edit ? $customer['total'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Total Amount" class="form-control" required="required" id = "total" >
    </div> 
    
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
