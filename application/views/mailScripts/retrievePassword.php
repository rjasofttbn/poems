<table width="100%" border="1" bgcolor="#CCCCCC">
    <tr>
        <td>
            <table width="95%"  border="0" cellpadding="0" cellspacing="3" bgcolor="#FFFFFF">
                <tr>
                    <td align="center">New Password</td>
                </tr>
                <tr>
                    <td>
                        User Email: <?php echo $email_address ?><br>
                        New Password: <?php echo $new_password ?>

                    </td>
                </tr>

                <tr>
                    <td>
                        <a href="<?php echo base_url(); ?>welcome/logIn">Login</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
