<?php
require_once "Transaction.class.php"
require_once "Db.class.php"

public function completeOrder($order_id) {
	//Order status 2 = 'complete';
	$sql = "UPDATE order SET status_id = 2 WHERE order_id = ?";
    $pdo = Db::getInstance();
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($order_id));

	//Charge credit card
	$transaction = new Transaction();
	$transaction->cardholder = isset($_POST['cardholder']) ? $_POST['cardholder'] : "empty";
	$transaction->number = isset($_POST['number']) ? $_POST['number'] : "empty";
	$transaction->exp_month = isset($_POST['exp_month']) ? $_POST['exp_month'] : "empty";
	$transaction->exp_year = isset($_POST['exp_year']) ? $_POST['exp_year'] : "empty";
	$transaction->cvv = isset($_POST['cvv']) ? $_POST['cvv'] : "empty" ;
	$transaction->type = isset($_POST['type']) ? $_POST['type'] : "empty";

	$transaction->charge();//Function returns transaction_id

	$sql2  = "UPDATE order SET transaction_id = ?");
    $sql2 .= " WHERE order_id = ?";//Adding the where clause for order_id
    $pdo = Db::getInstance();
    $stmt = $pdo->prepare($sql2);
    $stmt->execute(array($transaction->charge(), $order_id));

	$sql3 = "SELECT * FROM order WHERE order_id = " . $order_id;
    $pdo = Db::getInstance();
    $stmt = $pdo->prepare($sql3);	
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

	$mail = new PHPMailer(true);//set true for exception but not try and catch
	try {
        //Send email
        $mail->isSMTP();
        $mail->Host = 'smtp1.example.com;smtp2.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'user@example.com';
        $mail->Password = 'secret';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($order['email'], $order['customer_name']);

        $mail->addReplyTo('info@example.com', 'Information');
        $mail->isHTML(true);
        $mail->Subject = 'Your order is complete!';
        $mail->Body    = 'Thank you for completing your order with us! Here\'s your transaction ID: ' . $transaction->charge();
        $mail->send();

        echo "Okay!";
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

/*
* Errors/Bugs List
* -(line 23) No WHERE clause for order_id. The current update will result in 
* having all the transaction_id in the table to be change to the value of $transaction->charge();
* -PHPMailer(true) - exception is set to true but there is no try-catch block  
* for dealing with the exception in the event that mailing fails
* -(line 31) replace $sql2 with $sql3
* -(line 52) escape single quote Here\'s
* -(line 52) replace $transaction->getId() with $transaction-charge()
*
* Possible Errors/Bug List
* -May need to include db connection and transaction class (created and included them).
* -Switch mysql to pdo to use prepare statements (avoid sql injection)
* -Check if all the $_POST are set, if not set default value to "empty" since
* it is unknown if there was any pre-validation from the form
*/
?>
