
<!-- edit poems by this form  !-->

<div id="poem_edit"> 

    <!-- link form start !-->

    <form  ENCTYPE="multipart/form-data"  action="<?php echo base_url(); ?>user_admin_controller/update_small_picture_user.php" method="post">

        <!-- link form end !-->

        <table class="table table-striped" cellpadding="0" cellspasing="0" class="sortable zebra tablesorter tablesorter-default" id="articles-table" align="center" style="border:#000" border="1">
            <tr>

                <td>
                    <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $result->user_id ?>" />                    
                </td>
            </tr> 

            <?php foreach ($result as $aresult) { ?>

                <tr>
                    <td>first name</td>
                    <td>

                        <?php echo $aresult->first_name ?>" />
                    </td>
                </tr>

            <?php } ?>  			
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input style="cursor: pointer; " type="submit" name="btnupdate" value="Update" />
                </td>
            </tr>
        </table>
    </form>
</div>