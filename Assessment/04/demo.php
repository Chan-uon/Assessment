<?php
include_once "order.class.php";
include_once "taxes.inc.php";
include_once "discounts.inc.php";

echo "<h3>Demoing Order Class</h3>";
$discount_code = 'five_percent';
$province = 'qc';

$order = new Order($tax, $discount);

$order->pre_tax_total = 10000;
echo "pre tax total: " . $order->pre_tax_total . "<br/>";;

$order->discount_amt = $order->calcDiscountAmt($discount_code);
echo "discount amount: " . $order->discount_amt . "<br/>";

$order->after_discount_total = $order->pre_tax_total - $order->discount_amt;
echo "after discount total: " . $order->after_discount_total . "<br/>";

$order->tax_amt = $order->calcTaxAmt($province);
echo "tax amount: " . $order->tax_amt . "<br/>";

$order->post_tax_total = $order->after_discount_total - $order->tax_amt;
echo "post tax total: " . $order->post_tax_total . "<br/>";

echo "<hr />";

$order2 = new Order();

$order2->pre_tax_total = 10000;
echo "pre tax total: " . $order2->pre_tax_total . "<br/>";;

$order2->discount_amt = $order2->calcDiscountAmt($discount_code);
echo "discount amount: " . $order2->discount_amt . "<br/>";

$order2->after_discount_total = $order2->pre_tax_total - $order2->discount_amt;
echo "after discount total: " . $order2->after_discount_total . "<br/>";

$order2->tax_amt = $order2->calcTaxAmt($province);
echo "tax amount: " . $order2->tax_amt . "<br/>";

$order2->post_tax_total = $order2->after_discount_total - $order2->tax_amt;
echo "post tax total: " . $order2->post_tax_total . "<br/>";