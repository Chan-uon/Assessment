<?php
include_once "Db.class.php";

//select a single record from db
if (isset($_GET['company_id']) && $_GET['company_id'] !== 0) {
    $company_id = $_GET['company_id'];
	$sql  = "SELECT * ";
    $sql .= "FROM company ";
    $sql .= "WHERE company_id = ?";

    $pdo = Db::getInstance();
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($company_id));

    $result = $stmt->fetch();
}
