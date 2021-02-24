
<!-- 

Develop date and time: .
Objective of this page: poem view.
controller name : administrator_controller.
model name : administrator_model.
tabel name: tbl_poems.
css: administrator.css.
mother page and menu name: administrator page and user control menu .

!-->

<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>


<h1 style="text-align: left; margin-left: 5px">Poem Close</h1>
<!-- edit poems by this form  !-->


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
<div id="poem_data_edit_by_admin">

    <div id="poem_data_edit_by_admin_font">
        <!-- link with update form poem  start !-->

        <form name="poem_detail_for_admin" action="<?php echo base_url(); ?>administrator_controller/poem_activation_change" method="post">

            <!-- link update form poem end !-->

            <table class="table table-striped" cellpadding="0" cellspasing="0" class="sortable zebra tablesorter tablesorter-default" id="articles-table" align="center" style=" border:#000;" border="1">
                <tr style=" text-align:left">
                    <td>Poem Name</td>
                    <td>
                        <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $poem_view->poem_id ?>" />
                        <input type="text" name="title" size="30px" maxlength="20" value="<?php echo $poem_view->title ?>" />
                    </td>
                </tr>
                <tr style=" text-align:left">
                    <td>Poem Detail</td>
                    <td <span style="width:310px; background-color: white;  font-size: 14px; color: black;  "></span><?php echo substr("$poem_view->body", 1, 90); ?>-----</td>
                </tr>
                <tr style=" text-align:left">
                    <td>Submit Date</td>
                    <td>
                        <input type="text" name="poem_submit_date" size="30px" maxlength="20" value="<?php echo $poem_view->poem_submit_date ?>" />
                    </td>
                </tr>
                <tr style=" text-align:left">
                    <td>Poem Activation Status</td>
                    <td><div id="poem_close_font">(1) poem will be disable by this value!</div><br>
                        <input type="text" name="poem_activation" size="30px" maxlength="20" value="<?php echo $poem_view->poem_activation ?>" />

                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="btnupdate" value="Update" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>