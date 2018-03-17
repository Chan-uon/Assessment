<form action="messy-code.php" method="post">
	<table>
        <tr>
            <td>Company</td>
            <td><input type="text" name="company_id" value="<?php echo $result['company_id']?>" 
                style="background-color:lightgrey" readonly />
            </td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $result['name']?>" /></td>
        </tr>
	    <tr>
            <td>Address</td>
	        <td><input type="text" name="address" value="<?php echo $result['address']?>" /></td>
        </tr>
    </table>
    <input type="submit" name="submit" value="submit" />
</form>