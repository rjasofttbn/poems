
<!-- 

develop date and time: 17.07.2014.

Objective of this page: Add control.

controller name:Administrator controller. 

model name : Administrator Model.

tabel name: Advertise.

css: administrator.css.

mother page and menu name:  Poetry Contest .

!-->

<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>        


<h1 style="text-align: left; margin-left: 5px; color:  #6666ff;">Advertise of poetry contest page</h1> 

<!--<div id ="poetry_contest_content" >-->
    
    <div id ="contest_home_content" >

        <div style="float: left; height: auto; width: auto; margin: 0px 0px 0px 0px; ">
            <div id="advertise_font1" style=" background-color: beige;"><!-- this link for advertise insert  !-->
                <form  enctype="multipart/form-data"  action="<?php echo base_url(); ?>add_controller/contest_add.php" method="post" onsubmit="return validateStandard(this);">

                    <!-- poem of the day data insert form connection end  !-->

                    <table align="center" border="0" style="margin-top: 71px; margin-left: 0px;">
                        <tr>
                            <td>Contest First Add</td>
                            <td>
                                <input required="1" err="Please enter valid add name" regexp="JSVAL_RX_ALPHA" type="text" name="add_name" size="29px" maxlength="20"/><span class="required">*</span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            <td>
                                Upload Picture
                                <input type="file" name="contest_first_add"/>

                                <p><b>picture</b><font size="2"><b>:</b></font>
                                </p>
                                <ul>
                                    <li>in <font size="2">GIF or JPG format.</font></li>

                                    <li><font size="2">226 x 390 pixel in size.</font></li>
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
            <div style="height: auto; width: auto;">
                <div id ="contest_add_one" >
                    <?php foreach ($contest_first_add as $row) { ?>
                        <img height="390" width="226px" src="<?php echo base_url() ?><?php echo $row->contest_first_add; ?>"/><!-- link with poems detail  !-->
                    <?php } ?>
                </div>
                <div style="float: left; text-align: right; height: auto; width:675px; margin-top: 3px; ">

                    Post Date :    <?php
                   echo $row->add_date;
//                    $date = date('j- F- y', strtotime($publisheddate));
//                    $date = date('j F, Y, a g:i', strtotime($publisheddate));
//                $date = getBanglaDate($date);
//                    echo $date;
                    ?>
                </div>
            </div>
        </div>


        <div style=" height: 450px; width: auto;  margin: 0px 0px 0px 0px; border-radius: 7px; ">
            <div id="advertise_font" style=" background-color: beige;"><!-- this link for advertise insert  !-->
                <form  enctype="multipart/form-data"  action="<?php echo base_url(); ?>add_controller/contest_add_second.php" method="post" onsubmit="return validateStandard(this);">

                    <!-- poem of the day data insert form connection end  !-->

                    <table align="center" border="0" style="margin-top: 71px; margin-left: 11px;">
                        <tr>
                            <td>Second Add</td>
                            <td>
                                <input required="1" err="Please enter valid add name" regexp="JSVAL_RX_ALPHA" type="text" name="add_name" size="29px" maxlength="20"/><span class="required">*</span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            <td>
                                Upload Picture
                                <input type="file" name="contest_second_add"/>

                                <p><b>picture</b><font size="2"><b>:</b></font>
                                </p>
                                <ul>
                                    <li>in <font size="2">GIF or JPG format.</font></li>

                                    <li><font size="2">226 x 390 pixel in size.</font></li>
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
            <div style="height: auto; width: auto;">
                <div id ="contest_add_one" >
                    <?php foreach ($contest_second_add as $row) { ?>
                        <img height="390" width="226px" src="<?php echo base_url() ?><?php echo $row->contest_second_add; ?>"/><!-- link with poems detail  !-->
                    <?php } ?>
                </div>
                <div style="float: left; text-align: right; height: auto; width:650px; margin-top: 3px; ">


                    Post Date :    <?php
                   echo $row->add_date;
//                    $date = date('j- F- y', strtotime($publisheddate));
//                    $date = date('j F, Y, a g:i', strtotime($publisheddate));
//                $date = getBanglaDate($date);
//                    echo $date;
                    ?>
                </div>
            </div>
        </div>

    </div>
    
<!--</div>-->