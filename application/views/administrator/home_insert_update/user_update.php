
<!-- 

Develop date and time: .
Objective of this page: poet control.
controller name : administrator_controller.
model name : administrator_model.
tabel name: tbl_user .
css: administrator.css.
mother page and menu name: administrator => home =>user control page and edit link .

!-->


<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>


<h1 style="text-align: left; margin-left: 5px">User Close</h1>

<!-- disable user by this form  !-->
<?php
$message = $this->session->userdata('message');
if (isset($message)) {
    echo $message;
    $this->session->unset_userdata('message');
}
if (isset($_SESSION['exception'])) {
    echo $_SESSION['exception'];
    unset($_SESSION['exception']);
}
?>
<div id="user_data_edit_by_admin">

    <div id="user_data_edit_by_admin_font">
        <!-- link with update form user  start !-->

        <form name="user_update" action="<?php echo base_url(); ?>administrator_controller/user_activation_change" method="post">

            <!-- link update form user end !-->

            <table class="table table-striped" cellpadding="0" cellspasing="0" class="sortable zebra tablesorter tablesorter-default" id="articles-table" align="center" style=" border:#000" border="1">
                <tr style=" text-align:left">
                    <td>Name</td>
                    <td>
                        <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $result->user_id ?>" />
                        <input type="text" name="last_name" size="30px" maxlength="20" value="<?php echo $result->last_name ?>" />
                    </td>
                </tr>
<!--                <tr style=" text-align:left">
                    <td>Email Address</td>
                    <td>
                        <input type="text" name="email_address" size="40px" maxlength="40" value="<?php echo $result->email_address ?>" />
                    </td>
                </tr>-->
                <tr style=" text-align:left">
                    <td>country</td>
                    <td>
                        <input type="text" name="country" size="30px" maxlength="20" value="<?php echo $result->country ?>" />
                    </td>
                </tr>                
                <tr style=" text-align:left">
                    <td>Activation Status</td>
                    <td><div style="background-color: black; color: red;" id="user_close_font">(1) poet will be disable by this value!</div><br>
                        <input type="text" name="activation_status" size="40px" maxlength="40" value="<?php echo $result->activation_status?>" />
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input  style="cursor: pointer; " type="submit" name="btnupdate" value="Update" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>