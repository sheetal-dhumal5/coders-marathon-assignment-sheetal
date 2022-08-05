<?php
class Subproducts
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'id' => 'ID',
            'subproduct_name' => 'Sub Product Name',
            'product_id' => 'Product Id',
            'subproduct_category' => 'Category',
            'subproduct_description' => 'Description',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at'
        ];

        return $ordering;
    }
}
?>
