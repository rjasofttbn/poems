
<!-- 

Develop date and time: .
Objective of this page: advertise insert.
controller name : administrator_controller.
model name : administrator_model.
tabel name: advertise.
css: administrator.css.
mother page and menu name: administrator page and Advertise Insert link .

!-->

<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>        

<h1 style="text-align: left; margin-left: 5px">Advertise ( Insert ) in home</h1> 

<div id="advertise">    

    <?php
    $message = $this->session->userdata('message');
    //echo '-----'.$message;
    if (isset($message)) {
        echo $message;
        $this->session->unset_userdata('message');
    }
    if (isset($_SESSION['exception'])) {
        echo $_SESSION['exception'];
        unset($_SESSION['exception']);
    }
    ?>
    <div id="advertise_font"><!-- this link for advertise insert  !-->
        <form name="add_application" enctype="multipart/form-data"  action="<?php echo base_url(); ?>administrator_controller/advertise_insert.php" method="post" onsubmit="return validateStandard(this);">

            <!-- poem of the day data insert form connection end  !-->

            <table align="center" border="0">
                <tr>
                    <td>Home Page First Image</td>
                    <td>
                        <input required="1" err="Please enter valid last name" regexp="JSVAL_RX_ALPHA" type="text" name="add_name" size="29px" maxlength="20"/><span class="required">*</span>
                    </td>
                </tr>

                <tr>
                    <td>
                    <td>
                        Upload Picture
                        <input type="file" name="home_add_image"/>

                        <p><b>picture</b><font size="2"><b>:</b></font>
                        </p>
                        <ul>
                            <li>in <font size="2">GIF or JPG format.</font></li>

                            <li><font size="2">200 x 967 pixel in size.</font></li>
                        </ul>
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input  style="cursor: pointer; " type="submit" name="btnsave" value="Save" />
                        <input  style="cursor: pointer; " type="reset" name="btnreset" value="Reset" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="advertise_view">
        <?php foreach ($first_add_home as $first_add_home) { ?>

            <img height="200" width="731" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>

        <?php } ?>

    </div>

    <div id="small_add_to_view">
        <div id="small_add">
            <form name="add_application" enctype="multipart/form-data"  action="<?php echo base_url(); ?>administrator_controller/small_add_insert" method="post" onsubmit="return validateStandard(this);">

                <!-- poem of the day data insert form connection end  !-->

                <table align="center" border="0">
                    <tr>
                        <td style="font-size:13px;">Add Name</td>
                        <td>
                            <input required="1" err="Please enter valid name" regexp="JSVAL_RX_ALPHA" type="text" name="add_name" size="29px" maxlength="21"/><span class="required"  >*</span>
                        </td>
                    </tr>
                    <tr>                      
                        <td>
                        <td>
                            Upload Picture
                            <input type="file" name="home_add_small"/>

                            <p><b>picture</b><font size="2"><b>:</b></font>
                            </p>
                            <ul>
                                <li>in <font size="2">GIF or JPG format.</font></li>

                                <li><font size="2">295 x 297 pixel in size.</font></li>
                            </ul>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input  style="cursor: pointer; " type="submit" name="btnsave" value="Save" />
                            <input  style="cursor: pointer; " type="reset" name="btnreset" value="Reset" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div id="small_add_view">
            <div class="box">
                <?php foreach ($home_add_small as $row) { ?>
                   <img height="250px" width="295px" src="<?php echo base_url() ?><?php echo $row->home_add_small; ?>"/><!-- link with poems detail  !-->
                <?php } ?>
            </div>
        </div>
    </div>


    <div id="second_add_home">
        <div id="second_add">
            <form name="add_application" enctype="multipart/form-data"  action="<?php echo base_url(); ?>administrator_controller/second_add_insert_home" method="post" onsubmit="return validateStandard(this);">

                <!-- poem of the day data insert form connection end  !-->

                <table align="center" border="0">
                    <tr>
                        <td style="font-size:13px;">Add Name</td>
                        <td>
                            <input required="1" err="Please enter valid last name" regexp="JSVAL_RX_ALPHA" type="text" name="add_name" size="29px" maxlength="20"/><span class="required"  >*</span>
                        </td>
                    </tr>
                    <tr>                      
                        <td>
                        <td>
                            Upload Picture
                            <input type="file" name="second_add_home"/>

                            <p><b>picture</b><font size="2"><b>:</b></font>
                            </p>
                            <ul>
                                <li>in <font size="2">GIF or JPG format.</font></li>

                                <li><font size="2">260 x 525 pixel in size.</font></li>
                            </ul>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input  style="cursor: pointer; " type="submit" name="btnsave" value="Save" />
                            <input  style="cursor: pointer; " type="reset" name="btnreset" value="Reset" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div id="second_add_view">
            <?php foreach ($home_add_second as $row) { ?>
                <img height="250px" width="295px" src="<?php echo base_url() ?><?php echo $row->second_add_home; ?>"/><!-- link with poems detail  !-->
            <?php } ?>
        </div>
    </div>

</div>
