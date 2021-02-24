
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

<h1 style="text-align: left; margin-left: 5px">Advertise for Poets page</h1> 

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
    <div id="advertise_first_font"><!-- this link for advertise insert  !-->
        <div id="advertise_poem_page">
            <form name="add_application_poets_page" enctype="multipart/form-data"  action="<?php echo base_url(); ?>administrator_controller/poets_page_add_first" method="post" onsubmit="return validateStandard(this);">

                <!-- poem of the day data insert form connection end  !-->

                <table align="center" border="0">
                    <tr>
                        <td style="font-size:13px;">First Add Name</td>
                        <td>
                            <input required="1" err="Please enter valid last name" regexp="JSVAL_RX_ALPHA" type="text" name="add_name" size="29px" maxlength="20"/><span class="required"  >*</span>
                        </td>
                    </tr>
                    <tr>                      
                        <td>
                        <td>
                            Upload Picture
                            <input type="file" name="poets_page_first_add"/>

                            <p><b>picture</b><font size="2"><b>:</b></font>
                            </p>
                            <ul>
                                <li>in <font size="2">GIF or JPG format.</font></li>

                                <li><font size="2">250 x 276 pixel in size.</font></li>
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
        <div id="advertise_first_view">
            <?php
            foreach ($poets_add as $poets_add) {
                ?> 
                <img style="height: 250px; width: 276px;" src="<?php echo base_url() ?><?php echo $poets_add->poets_page_first_add; ?>"/>
            <?php } ?>
        </div>
    </div>

    <div id="advertise_first_font"><!-- this link for advertise insert  !-->

        <div id="advertise_poem_page_second">
            <form name="add_application_poets_page" enctype="multipart/form-data"  action="<?php echo base_url(); ?>welcome/poets_page_add_second" method="post" onsubmit="return validateStandard(this);">

                <!-- poem of the day data insert form connection end  !-->

                <table align="center" border="0">
                    <tr>
                        <td style="font-size:13px;">Second Add Name</td>
                        <td>
                            <input required="1" err="Please enter valid last name" regexp="JSVAL_RX_ALPHA" type="text" name="add_name" size="29px" maxlength="20"/><span class="required"  >*</span>
                        </td>
                    </tr>
                    <tr>                      
                        <td>
                        <td>
                            Upload Picture
                            <input type="file" name="poets_page_second_add"/>

                            <p><b>picture</b><font size="2"><b>:</b></font>
                            </p>
                            <ul>
                                <li>in <font size="2">GIF or JPG format.</font></li>

                                <li><font size="2">250 x 276 pixel in size.</font></li>
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

        <div id="advertise_second_view">
            
                <img style="height: 250px; width: 276px;" src="<?php echo base_url() ?><?php echo $poets_second_add->poets_page_second_add; ?>"/>
            
        </div>
        <!--<button type="button" onmousemove = "alert('Hello world!')">Click Me!</button>--!-->
    </div>
</div>