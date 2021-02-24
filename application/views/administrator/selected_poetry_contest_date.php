
<div style="float: left; background-color: beige; width: 75%; min-height: 301px;">
 <h2 style="text-align: left; margin-left: 5px">Selected poetry contest date</h2>
    <?php if (count($selected_poetry_contest) > 0) { ?>
        <table>
            <tr style="text-align: center; border-radius: 5px; background-color: #E2E2E2;">
                <th style="border-radius: 3px;">Sl No.</th>
                <th style="border-radius: 3px;">Form date and to date</th>
                <th style="border-radius: 3px;">End date</th>
                <th style="border-radius: 3px;">Insert date</th>
                <th style="border-radius: 3px;">Action</th>
            </tr>
            <?php
            $i = $this->uri->segment(3);
            if ($i == NULL) {
                $i = 0;
            }
            foreach ($selected_poetry_contest as $row) {
                $i++;
                ?>
                <tr style="background-color: #B2B2B2;">
                    <td style="border-radius: 3px;"><?php echo $i; ?>.</td>
                    <td style=" border-radius: 3px;"><?php echo $row->poetry_contest_from_date_to_date; ?></td>
                    <td style=" min-width: 55px; border-radius: 3px;"><?php echo $row->poetry_contest_end_date; ?></td>
                    <td style="  border-radius: 3px;"><?php echo $row->data_insert_date; ?></td>
                    <td>
                        <a style=" text-align:  center; color: blue; border-radius: 5px;" href="<?php echo base_url() ?>administrator_controller/selected_poetry_contest_edit/<?php echo $row->poetry_contest_id ?>">Edit</a>
                        <!--<a style="color: blue; border-radius: 5px;" href="<?php echo base_url() ?>user_admin_controller/message_delete/<?php echo $poem_view->poem_id ?>" onclick="return checkDelete();">Delete</a>-->
                    </td>
                </tr>
            <?php } ?> 
        </table>
    <?php } ?>
</div>