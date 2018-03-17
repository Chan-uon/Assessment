<?php
include_once "Db.class.php";

if (isset($_POST['company_id'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $company_id = $_POST['company_id'];
	
    $sql  = "UPDATE company ";
    $sql .= "SET ";
    $sql .= "name = ?";
    $sql .= ", address = ?";
    $sql .= " WHERE ";
    $sql .= "company_id = ?";

    $pdo = Db::getInstance();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $address, $company_id]);

} else if (isset($_POST['name']) && isset($_POST['address'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];

	$sql  = "INSERT INTO company ";
    $sql .= "SET name = ?";
    $sql .= ", address = ?";

    $pdo = Db::getInstance();
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($name, $address));
}

if (!isset($result['name'])) {
    $result['name'] = '';
}

if (!isset($result['address'])) {
    $result['address'] = '';
}
