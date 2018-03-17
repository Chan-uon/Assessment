<div>
    <?php
       $result = User::read($_POST['user_id']);
       if($result) {
    ?>
    <br />
    <table class="table_read">
        <tr>
            <td>User Id</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Job Title </td>
            <td>Email</td>
            <td>Address 1</td>
            <td>Address 2</td>
            <td>City</td>
            <td>Postal Code</td>
            <td>Province</td>
            <td>Country</td>
            <td>Phone</td>
            <td>Date Of Birth</td>
            <td>Role Id</td>
        </tr>
        <tr>
            <?php
                echo "<td>" . $result['user_id'] . "</td>";
                echo "<td>" . $result['first_name'] . "</td>";
                echo "<td>" . $result['last_name'] . "</td>";
                echo "<td>" . $result['job_title'] . "</td>";
                echo "<td>" . $result['email'] . "</td>";
                echo "<td>" . $result['address_1'] . "</td>";
                echo "<td>" . $result['address_2'] . "</td>";
                echo "<td>" . $result['city'] . "</td>";
                echo "<td>" . $result['postal_code'] . "</td>";
                echo "<td>" . $result['province'] . "</td>";
                echo "<td>" . $result['country'] . "</td>";
                echo "<td>" . $result['phone'] . "</td>";
                echo "<td>" . $result['date_of_birth'] . "</td>";
                echo "<td>" . $result['role_id'] . "</td>";
            ?>
        </tr>
    </table>
    <?php } else {
                echo "<h4> User Id: " . $_POST['user_id'] . " does not exist. </h4>";
          }
    ?>
</div>