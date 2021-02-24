

<!-- 

Develop date and time: .
Objective of this page: poem view.
controller name : administrator_controller.
model name : administrator_model.
tabel name: tbl_poems.
css: administrator.css.
mother page and menu name: administrator page and poem control link .

!-->

<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>        

<div id="home_poem_day">
    <h1 style="text-align: left; margin-left: 5px">User Control</h1> 
    <div id="home_poem_day_data">
        <div id="home_poem_day_insert">
            <!--<?php
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
            ?>!-->
            <form name="home_poem_of_day" enctype="multipart/form-data"  action="<?php echo base_url(); ?>administrator_controller/home_poem_day.php" method="post" onsubmit="return validateStandard(this);">

                <!-- poem of the day data insert form connection end  !-->

                <table align="center" border="0">
                    <tr>
                        <td>Poet Name</td>
                        <td>
                            <input type="text" name="poem_day_poem_poet_name" size="39px" maxlength="20" required="1" err="Please enter valid poet name" regexp="JSVAL_RX_ALPHA" /><span class="required">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Poem Name</td>
                        <td>
                            <input type="text" name="poem_day_poem_name" size="39px" maxlength="20" required="1" err="Please enter valid poem name" regexp="JSVAL_RX_ALPHA" /><span class="required">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Poem Insert</td>
                        <td>
                            <textarea name="poem_day_poem" rows="9" cols="39"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            Male <input type="radio" name="poem_day_gender" value="Male" />&nbsp;
                            Female <input type="radio" name="poem_day_gender" value="Female" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <td>
                            Upload Picture
                            <input type="file" name="poem_day_poet_picture"/>

                            <p><b>picture</b><font size="2"><b>:</b></font>
                            </p>
                            <ul>
                                <li>in <font size="2">GIF or JPG format.</font></li>

                                <li><font size="2">50x50 pixel in size.</font></li>
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
    </div>
</div>