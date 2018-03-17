<?php 
include_once "User.class.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php   include "head.php"; ?>
    <body>
        <?php
            include "nav.php";
            include "read.view.php";
            if (!empty($_POST['user_id']) && isset($_POST['crud_read'])) {
                include "read_display.php";
            }
        ?>
        </div>
    </body>
</html>