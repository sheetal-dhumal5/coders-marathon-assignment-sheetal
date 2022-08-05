<fieldset>
    <div class="form-group">
        <label for="f_name">Product Name *</label>
          <input type="text" name="product_name" value="<?php echo htmlspecialchars($edit ? $customer['product_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Product Name" class="form-control" required="required" id = "product_name" >
    </div> 

    <div class="form-group">
        <label>Category </label>
           <?php $opt_arr = array("Mobile", "Laptop", "Other Electronics"); 
                            ?>
            <select name="product_category" class="form-control selectpicker" required>
                <option value=" " >Please select category</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['product_category']) {
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
          <textarea name="product_description" placeholder="Description" class="form-control" id="product_description"><?php echo htmlspecialchars(($edit) ? $customer['product_description'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div> 
    
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
