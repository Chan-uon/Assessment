<div>
    <h2>Create User</h2>
    <form action="create.php" method="post">
	    <table>
            <tr>
                <td>Insertor User Id</td>
                <td><input type="text" name="user_inserted" /></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" /></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" /></td>
            </tr>
            <tr>
                <td>Job Title</td>
                <td><input type="text" name="job_title" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" /></td>
            </tr>
            <tr>
                <td>Address 1</td>
                <td><input type="text" name="address_1" /></td>
            </tr>
            <tr>
                <td>Address 2</td>
                <td><input type="text" name="address_2" /></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name="city" /></td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><input type="text" name="postal_code" /></td>
            </tr>
            <tr>
                <td>Province</td>
                <td><input type="text" name="province" /></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" name="country" /></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" /></td>
            </tr>
            <tr>
                <td>Date Of Birth</td>
                <td><input type="date" name="date_of_birth" /></td>
            </tr>
            <tr>
                <td>Disable</td>
                <td>
                    True<input type="radio" name="disable" value="true" />
                    False<input type="radio" name="disable" value="false" />
                </td>
            </tr>
            <tr>
                <td>Role Id</td>
                <td><input type="text" name="role_id" /></td>
            </tr>
        </table>
        <input type="submit" id="crud_create" name="crud_create" value="submit" />
    </form>
</div>