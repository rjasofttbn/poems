

<!-- 

Develop date and time: .
Objective of this page: poet view.
controller name : administrator_controller.
model name : administrator_model.
tabel name: tbl_user .
css: administrator.css.
mother page and menu name: administrator => home page and user control sub menu .

!-->
<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>

<div id="user_data_view">
    <h1 style="text-align: left; margin-left: 5px">User View</h1>

    <div id="search_text">
        <form action="<?php echo base_url(); ?>administrator_controller/search_by_text" method="post">
            <input type="text" style=" outline:  0; border-radius: 11px; height: 29px; width: 310px; text-align: center; "placeholder="Search by Last Name." name="search_text" required="1" err="Please enter valid first name" autofocus regexp="JSVAL_RX_ALPHA" />
            <input  style="cursor: pointer; " type="submit" name="btn" value="Search"/>
        </form>
    </div>
    </br>
    <?php if (count($user_view) > 0) { ?>
        <table border="1" align="center" style="  background-color: #E2E2E2;  text-align: left; border-radius: 5px; ">
            <tr style="text-align: center; border-radius: 11px; background-color: whitesmoke">
                <th style="border-radius: 5px;">Sl No.</th>
<!--                <th>User Id</th>-->
                <th style="border-radius: 5px;">First Name</th>
                <th style="border-radius: 5px;">Last Name</th>
                <th style="border-radius: 5px;">Activation Status</th>
                <th style="border-radius: 5px;">country</th>
                <th style="border-radius: 5px;">Date</th>
                <th style="border-radius: 5px;">Action</th>
                
            </tr>
            <!-- user's view start !-->
            <?php
            $i = $this->uri->segment(3);
            if($i==NULL)
            {
                $i=0;
            }
            foreach ($user_view as $user_view) {
                $i++;
                ?>
            <tr style=" background-color: #E2E2E2;">
                    <td style="border-radius: 5px;"><?php echo $i; ?>.</td>
<!--                    <td><?php echo $user_view->user_id; ?></td>-->
                     <td style="border-radius: 5px;"><a><?php echo $user_view->first_name; ?></a></td>
                    <td style="border-radius: 5px;"><a><?php echo $user_view->last_name; ?></a></td>
                    <td style="border-radius: 5px;"><?php echo $user_view->activation_status; ?></td>
                    <td style="border-radius: 5px;"><?php echo $user_view->country; ?></td>
                    <td style="border-radius: 5px;"><?php echo $user_view->insert_date; ?></td>
                    <td style="border-radius: 5px;">
                        <a style="color: blue;" href="<?php echo base_url() ?>administrator_controller/user_control_data_update/<?php echo $user_view->user_id ?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <a style="color: blue;" href="<?php echo base_url() ?>user_admin_controller/message_delete/<?php echo $user_view->user_id ?>" onclick="return checkDelete();">Delete</a>
                    </td
                </tr>
            <?php } ?>      <!-- this code for user information view by loop end !-->

            <!-- user's view end !-->
        </table>
    <?php } ?>
    <div id="home_poem_pagination">

        <!--pagination start !-->

        <?php echo $this->pagination->create_links(); ?>

        <!-- pagination end !-->
    </div>
</div>