<?php

class Order 
{
    private $data = array();
    private $tax_rates = array();//applied after discounts, if any discounts
    private $discount_codes = array();//applied before taxes

    public function __construct($tax =[], $discount = [])
    {
        $this->data['pre_tax_total'] = null;
        $this->data['discount_amt'] = null;
        $this->data['after_discount_total'] = null;
        $this->data['tax_amt'] = null;
        $this->data['post_tax_total'] = null;
        
        foreach ($tax as $prov => $rates) {
            $this->tax_rates[$prov] = $rates;
        }

        foreach ($discount as $code => $saving_rates) {
            $this->discount_codes[$code] = $saving_rates;
        }
    }

    public function calcDiscountAmt($code)
    {   
        if (empty($this->discount_codes)) {
            return 0;
        }

        try {
            if (array_key_exists($code, $this->discount_codes)) {
                $savings_rates = $this->discount_codes[$code];
                $sum = null;
                foreach ($savings_rates as $rate) {
                    $sum += $this->pre_tax_total * $rate;
                }
                return $sum;
            } else {
                throw new Exception('Error calcDiscountAmt: ' .__CLASS__ . ' class does not have attribute ' . $code); 
            }
        } catch (Exception $e) {
            echo  "<br />" . $e;
        }
    }

    public function calcTaxAmt($province) {
        if (empty($this->tax_rates)) {
            return 0;
        }
        try {
            if (array_key_exists($province, $this->tax_rates)) {
                $province_rates = $this->tax_rates[$province];
                $sum = null;
                foreach ($province_rates as $rate) {
                    $sum += $this->after_discount_total * $rate;
                }
                return $sum;
            } else {
                throw new Exception('Error calcDiscountAmt: ' .__CLASS__ . ' class does not have attribute ' . $province); 
            }
        } catch (Exception $e) {
            echo  "<br />" . $e;
        }
    }

    public function __get($var_name)
    {
        try {
            if (array_key_exists($var_name, $this->data)) {//$data
                return $this->data[$var_name];
            } else if (array_key_exists($var_name, $this->tax_rates)) {//tax_rates
                return $this->tax_rates[$var_name];
            } else if (array_key_exists($var_name, $this->discount_codes)) {//discount_codes
                return $this->discount_codes[$var_name];
            }else {
                throw new Exception('Error __get: ' .__CLASS__ . ' class does not have attribute ' . $var_name); 
            }
        } catch (Exception $e) {
            echo  "<br />" . $e;
        }
    }

    public function __set($var_name,$value)
    {//only set $data since other attributes are loaded from another file
        try {
            if (array_key_exists($var_name, $this->data)) {
                $this->data[$var_name] = $value;
            } else {
                throw new Exception('Error __set: ' .__CLASS__ . ' class does not have attribute ' . $var_name); 
            }
        } catch (Exception $e) {
            echo  "<br />" . $e;
        }
    }
}

