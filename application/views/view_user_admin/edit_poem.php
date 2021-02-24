
<!-- edit poems by this form  !-->

<div id="poem_edit"> 

    <!-- link with update form poem  start !-->
<div style=" float: center; text-align: center; height: auto; width:  170px; border-radius: 100px; box-shadow: 0px 0px 31px 0px black; margin: 0px 0px 0px 400px; " >
        <?php
        $message = $this->session->userdata('message_poem_update');
        if ($message) {
            echo $message;
            $this->session->unset_userdata('message_poem_update');
        }
        ?>
    </div>
    <form action="<?php echo base_url(); ?>user_admin_controller/updatepoem" method="post">

        <!-- link update form poem end !-->

        <table class="table table-striped" cellpadding="0" cellspasing="0" class="sortable zebra tablesorter tablesorter-default" id="articles-table" align="center" style="border:#000" border="1">

            <tr>
                <td>Title</td>
                <td>

                    <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $result->poem_id ?>" />
                    <input type="text" name="title" size="30px" maxlength="20" value="<?php echo $result->title ?>" />
                </td>
            </tr>

            <tr>
                <td>Poem</td>
                <td>                       
                    <textarea id="txtInput" name="body" cols="70" rows="6" ><?php echo $result->body ?></textarea><?php echo display_ckeditor($check_editor['ckeditor']); ?>
                </td>
            </tr>
            <tr>
                <td>Topic poet</td>
                <td>
                    <input type="text" name="poems_category_name" size="30px" maxlength="20" value="<?php echo $result->poems_category_name ?>" />
                </td>
            </tr>
            <tr>
                <td>Story</td>
                <td>
                    <input type="text" name="Story" size="30px" maxlength="20" value="<?php echo $result->story ?>" />
                </td>
            </tr> 

            <tr>
                <td>&nbsp;</td>
                <td>
                    <input style="cursor: pointer; " type="submit" name="btnupdate" value="Update" />
                </td>
            </tr>
        </table>
    </form> 
</div>