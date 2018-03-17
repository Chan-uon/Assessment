<?php
include "display.view.php";
include "select.php";

//Show the appropriate view
if (!empty($_GET['company_id']) && $result) {
    echo "<h1>Edit your company</h1>";
    include "edit.view.php"; 
} else {
    echo "<h1>Add your company</h1>";
    include "insert.view.php";
}
