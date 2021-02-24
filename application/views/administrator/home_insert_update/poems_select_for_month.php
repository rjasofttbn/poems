
<!-- 

Develop date and time: .
Objective of this page: poem view.
controller name : administrator_controller.
model name : administrator_model.
tabel name: tbl_poems.
css: administrator.css.
mother page and menu name: administrator page and poem control link.

!-->


<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>

<div id="user_data_view">

    <h1 style="text-align: left; margin-left: 5px">Poem select for month</h1>
    <div style="float: left; height: auto; width: 100%; background-color: #B2B2B2; font: bold 17px/17px sans-serif; color:  orangered; margin-bottom: 7px;">
        <?php foreach ($last_poem_of_month as $row) { ?>
           Last selected date : <?php echo $row->poem_month_display_date; ?>
        <?php } ?>

    </div>
    <!--    <div id="search_text">
            <form action="<?php echo base_url(); ?>administrator_controller/poem_show" method="post">
                <input type="text" name="search_text" required="1" style="outline: 0; border-radius: 11px; height: 29px; width: 310px; text-align: center; "placeholder="Search by Poem Name." autofocus err="Please enter valid value" regexp="JSVAL_RX_ALPHA" />
                <input  style="cursor: pointer; " type="submit" name="btn" value="Search"/>
            </form>
        </div>-->
    </br>
    <?php if (count($poem_view) > 0) { ?>
        <table border="0" align="center" style=" float: left; width: 100%; background-color:  white;  text-align: left; border-radius: 5px; ">
            <tr style="text-align: center; border-radius: 5px; background-color: #E2E2E2;">
                <!--<th style="border-radius: 5px;">Sl No.</th>-->
                <th style="border-radius: 5px;">Poem Name</th>
                <th style="border-radius: 5px;">Poem Detail</th>
                <!--<th style="border-radius: 5px;">Status</th>-->
                <!--<th style="border-radius: 5px;">Display Date</th>-->
                <th style="border-radius: 5px;">Poem Rate</th>
                <th>Action</th>
            </tr>
            <!-- poem view start !-->

            <?php
            $i = $this->uri->segment(3);
            if ($i == NULL) {
                $i = 0;
            }
            foreach ($poem_view as $poem_view) {
                $i++;
                ?>
                <tr style="background-color: #B2B2B2;">
                    <!--<td style="border-radius: 5px;"><?php echo $i; ?>.</td>-->
                    <td style=" width: 151px; border-radius: 5px;"><?php echo $poem_view->title; ?></td>
                    <td <span style=" font-size: 14px; color: black; border-radius: 5px;  "></span><?php echo substr("$poem_view->body", 0, 191); ?>---</td>
                    <!--<td style="width: 3px;  border-radius: 5px;"><?php echo $poem_view->poem_of_month; ?></td>-->
                    <!--<td style="  font-size: 12px; border-radius: 5px; "><?php echo $poem_view->poem_month_display_date; ?></td>-->
                    <td style="  font-size: 12px; border-radius: 5px; text-align: center; "><?php echo $poem_view->top_poem; ?></td>
                    <td>
                        <a style=" float: left; text-align:  center; color: blue; border-radius: 5px;" href="<?php echo base_url() ?>administrator_controller/poem_of_month_select/<?php echo $poem_view->poem_id ?>">Edit</a>
                        <!--<a style="color: blue; border-radius: 5px;" href="<?php echo base_url() ?>user_admin_controller/message_delete/<?php echo $poem_view->poem_id ?>" onclick="return checkDelete();">Delete</a>-->
                    </td>
                </tr>
            <?php } ?>      <!-- this code for poem information end !-->

            <!-- poem's view end !-->
        </table>
    <?php } ?>
    <div id="home_poem_pagination">

        <!-- pagination start !-->

        <?php echo $this->pagination->create_links(); ?>

        <!-- pagination end !-->
    </div>

</div>
