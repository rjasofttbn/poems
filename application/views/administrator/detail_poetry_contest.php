
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



<!-- edit poems by this form  !-->

<div style="height: 251px; width: 75%; background-color: #ddd;">

    <h1 style="text-align: left; margin-left: 5px">Poetry contest date change</h1>

    <div style="margin-top: 45px; margin-bottom: 45px;">

        <!-- link with update form poem  start !-->
        <form name="detail_poetry_contest" action="<?php echo base_url(); ?>administrator_controller/poetry_contest_data_update" method="post">

            <!-- link update form poem end !-->
            <table   align="center" style=" border:#000;" border="1">

                <tr style=" text-align:left">
                    <td style="font: bold 14px/15px sans-serif; color: #222;">Form date and to date</td>
                    <td>
                        <input type="hidden" name="poetry_contest_id" size="30px" maxlength="20" value="<?php echo $contest_edit->poetry_contest_id ?>" />
                        <input  style="font: bold 14px/15px sans-serif; color: #222;" type="text" name="poetry_contest_from_date_to_date" size="30px" maxlength="50" value="<?php echo ucfirst($contest_edit->poetry_contest_from_date_to_date) ?>" />
                    </td>
                </tr>

                <tr style=" text-align:left">
                    <td style="font: bold 15px/16px sans-serif; color: #333;">End date</td>
                    <td>
                        <input  style="font: bold 14px/15px sans-serif; color: #222;" type="text" name="poetry_contest_end_date" size="30px" maxlength="20" value="<?php echo $contest_edit->poetry_contest_end_date ?>" />
                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>                       
                        <input style="font:bold 15px/16px sans-serif; cursor: pointer;" type="submit" name="btnupdate" value="Poetry contest change"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>