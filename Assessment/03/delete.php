<?php 
include_once "User.class.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php   include "head.php"; ?>
    <body>
        <?php
            include "nav.php";
            include "delete.view.php";
            if (!empty($_POST['user_id']) && isset($_POST['crud_delete'])) {
                User::delete($_POST['user_id']);

                echo "<h4> User Id: " . $_POST['user_id'] . " has been deleted. </h4>";
            }
        ?>
        </div>
    </body>
</html>