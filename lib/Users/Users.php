<?php
class Users
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
            'f_name' => 'First Name',
            'l_name' => 'Last Name',
            'user_name' => 'User Name',
            'admin_type' => 'Admin Type'
        ];

        return $ordering;
    }
}
?>
