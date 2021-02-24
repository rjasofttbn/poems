

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
    <h1 style="text-align: left; margin-left: 5px">User Type</h1>

    <div id="search_text">
        <form action="<?php echo base_url(); ?>administrator_controller/user_type_search_by_text" method="post">
            <input style=" outline: 0; text-align: center;  border-radius: 5px; height: 21px; width: 350px;" placeholder="Search by Last Name" autofocus  type="text" name="search_text" required="1" err="Please enter valid first name" regexp="JSVAL_RX_ALPHA" />
            <input style="cursor: pointer;" type="submit" name="btn" value="Search"/>
        </form>
    </div>
    </br>
    <table border="1" align="center" style=" border-radius: 5px;  background-color: #B2B2C2;  text-align: left ">
        <tr style="text-align: center;">
            <th style="text-align: center;">SL.</th>
            <th style="border-radius: 3px;">Name</th>
            <th style="border-radius: 3px;">Email Address</th>
            <th style="border-radius: 3px;">Country</th>
            <th style="border-radius: 3px;">Present User Type</th>
            <th style="text-align: center;"> Action</th>
        </tr>
        <!-- user's view start !-->
        <?php if (count($user_view) > 0) { ?>
            <?php
            $i = $this->uri->segment(3);
            if ($i == NULL) {
                $i = 0;
            }

            foreach ($user_view as $user_view) {     //<!-- this code for user information view by loop start !-->
                $i++;
                ?>

                <tr>

                    <td><?php echo $i; ?></td>
                    <td><a><?php echo $user_view->last_name; ?></a></td>
                    <td><?php echo $user_view->email_address; ?></td>
                    <td><?php echo $user_view->country; ?></td>
                    <td><?php echo $user_view->user_type; ?></td>
                    <td>
                        <a style="color: blue;" href="<?php echo base_url() ?>administrator_controller/users_type_update/<?php echo $user_view->user_id ?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                        <a style="color: blue;" href="<?php echo base_url() ?>user_admin_controller/message_delete/<?php echo $user_view->user_id ?>" onclick="return checkDelete();">Delete</a>
                    </td
                </tr>
    <?php } ?>      <!-- this code for user information view by loop end !-->
        <?php } ?>
        <!-- user's view end !-->
    </table>
    <div id="home_poem_pagination">

        <!-- pagination start !-->

<?php echo $this->pagination->create_links(); ?>

        <!-- pagination end !-->
    </div>

</div>