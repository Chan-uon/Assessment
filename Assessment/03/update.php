<?php 
include_once "User.class.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php   include "head.php"; ?>
    <body>
        <?php 
            include "nav.php";
            include "update_search_id.view.php";

            if (isset($_POST['crud_update'])) {
                $user = new User();

                $user->user_id = $_POST['user_id'];
                $user->user_inserted = isset($_POST['user_inserted']) ? $_POST['user_inserted'] : null ;
                $user->user_modified = !empty ($_POST['user_modified']) ? $_POST['user_modified'] : null;
                $user->first_name = $_POST['first_name'];
                $user->last_name = $_POST['last_name'];
                $user->job_title = $_POST['job_title'];

                $user->email = $_POST['email'];
                $user->address_1 = $_POST['address_1'];
                $user->address_2 = $_POST['address_2'];
                $user->city = $_POST['city'];
                $user->postal_code = $_POST['postal_code'];

                $user->province = $_POST['province'];
                $user->country = $_POST['country'];
                $user->phone = $_POST['phone'];
                $user->password = $_POST['password'];
                $user->salt = isset($_POST['salt']) ? $_POST['salt'] : "empty";

                $user->date_of_birth = $_POST['date_of_birth'];
                $_POST['disable'] = isset($_POST['disable']) && $_POST['disable'] == 'true' ? 1 : 0;
                $user->disable = $_POST['disable'];
                $_POST['reset_password'] = isset($_POST['reset_password']) && $_POST['reset_password'] == 'true' ? 1 : 0;
                $user->reset_password = $_POST['reset_password'];                
                $user->role_id = $_POST['role_id'];

                $user->update();

                echo "<h4> User has been updated.</h4>";
            }

            if ((isset($_POST['user_id']) && isset($_POST['crud_update_search_id'])) ||
                (isset($_POST['crud_update']))) {
                $result = User::read($_POST['user_id']);
                if ($result) { 
                    include "update.view.php";
                } else {
                     echo "<h4> User Id: " . $_POST['user_id'] . " does not exist. </h4>";
                }
            }
        ?>
        </div>
    </body>
</html>
