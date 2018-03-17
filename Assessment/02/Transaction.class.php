<?php
/*
* Example of possible Transaction Class
*/
class Transaction 
{
    private $data = array();

    private static $transaction_id;

    public function __construct()
    { 
    }

    public function charge() 
    {
       return self::$transaction_id++;
    }

    public function __get($var_name)
    {
        if (array_key_exist($var_name, $this->data)) {
             return $this->data[$var_name];
        }
    }

    public function __set($var_name, $value)
    {
        $this->data[$var_name] = $value;
    }
}