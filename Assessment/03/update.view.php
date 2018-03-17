<div>
    <h2>Update User's information</h2>
    <form action="update.php" method="post">
	    <table>
           <tr>
                <td>User Id</td>
                <td><input type="text" class="read_only" name="user_id" value="<?php echo $result['user_id']; ?>" readonly /></td>
            </tr>
           <tr>
                <td>Modifier User Id</td>
                <td><input type="text" name="user_modified" value="<?php echo $result['user_modified']; ?>" /></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" value="<?php echo $result['first_name']; ?>" /></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" value="<?php echo $result['last_name']; ?>" /></td>
            </tr>
            <tr>
                <td>Job Title</td>
                <td><input type="text" name="job_title" value="<?php echo $result['job_title']; ?>" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $result['email']; ?>" /></td>
            </tr>
            <tr>
                <td>Address 1</td>
                <td><input type="text" name="address_1" value="<?php echo $result['address_1']; ?>" /></td>
            </tr>
            <tr>
                <td>Address 2</td>
                <td><input type="text" name="address_2" value="<?php echo $result['address_2']; ?>" /></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name="city" value="<?php echo $result['city']; ?>" /></td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><input type="text" name="postal_code" value="<?php echo $result['postal_code']; ?>" /></td>
            </tr>
            <tr>
                <td>Province</td>
                <td><input type="text" name="province" value="<?php echo $result['province']; ?>" /></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" name="country" value="<?php echo $result['country']; ?>" /></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value="<?php echo $result['password']; ?>" /></td>
            </tr>
            <tr>
                <td>Date Of Birth</td>
                <td><input type="date" name="date_of_birth" value="<?php echo $result['date_of_birth']; ?>" /></td>
            </tr>
            <tr>
                <td>Disable</td>
                <td>
                    True<input type="radio" name="disable" value="true" <?php if ($result['disable'] === "1") echo " checked=\"checked\"" ?> />
                    False<input type="radio" name="disable" value="false" <?php if ($result['disable'] === "0") echo " checked=\"checked\"" ?>/>
                </td>
            </tr>
            <tr>
                <td>Role Id</td>
                <td><input type="text" name="role_id" /></td>
            </tr>
        </table>
        <input type="submit" id="crud_update" name="crud_update" value="submit" />
    </form>
</div>