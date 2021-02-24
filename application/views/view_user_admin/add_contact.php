<?php
    $message=$this->session->userdata('message');
    if($message)
        {
            echo $message;
            $this->session->unset_userdata('message');
        }
?>
<form action="<?php echo base_url();?>user_admin/saveContact" method="post">
    <table align="center" border="0">
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" size="30px" maxlength="20" />
            </td>
        </tr>

        <tr>
            <td>Email Address</td>
            <td>
                <input type="text" name="email_address" size="30px" maxlength="20" />
            </td>
        </tr>
        <tr>
            <td>Mobile No</td>
            <td>
                <input type="text" name="mobile_no" size="30px" maxlength="20" />
            </td>
        </tr>
        <tr>
        <td>Facebook Id</td>
            <td>
                <input type="text" name="facebook_id" size="30px" maxlength="20" />
            </td>
        </tr>
        <tr>
        <td>Blood Group</td>
            <td>
                <select name="blood_group">
                    <option value="">Select Blood group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>

                </select>
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td>
                <textarea name="address" rows="4" cols="23"></textarea>
            </td>
        </tr>
        
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="btn2" value="Submit" />
                <input type="reset" name="btn1" value="Reset" />
            </td>
        </tr>

    </table>
</form>
