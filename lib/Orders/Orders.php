<?php
class Orders
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
            'product_id' => 'Product Name',
            'subproduct_id' => 'Sub Product Name',
            'amount' => 'Amount',
            'quantity' => 'Quantity',
            'total' => 'Total Amount',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at'
        ];

        return $ordering;
    }
}
?>
