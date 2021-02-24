
<!-- 

Develop date and time: .
Objective of this page: category insert.
controller name : administrator_controller.
model name : administrator_model.
tabel name: tbl_category.
css: administrator.css.
mother page and menu name: administrator page and poems category link .

!-->

<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>        

<div id="poem_category">
    <h1 style="text-align: left; margin-left: 5px">Poem category</h1></br> 
    <?php
    $message = $this->session->userdata('message');
    if (isset($message)) {
        echo $message;
        $this->session->unset_userdata('message');
    }
    if (isset($_SESSION['exception'])) {
        echo $_SESSION['exception'];
        unset($_SESSION['exception']);
    }
    ?>
    <div id="poem_category_font"><!-- this link for category insert !-->
        <form name="category_poem" enctype="multipart/form-data"  action="<?php echo base_url(); ?>administrator_controller/save_category.php" method="post" onsubmit="return validateStandard(this);">
            <!-- poem of the day data insert form connection end  !-->
            <table align="center" border="0">
                <tr>
                    <td>Poem Category Name</td>
                    <td>
                        <input type="text" name="poems_category_name" size="30px" autofocus maxlength="20" required="1" err="Please enter valid first name" regexp="JSVAL_RX_ALPHA" /><span class="required">*</span>
                    </td>
                </tr>
                <tr>
                    <td>Poem Category Description</td>
                    <td>
                        <input type="text" name="poems_category_description" size="30px" maxlength="20" required="1" err="Please enter valid last name" regexp="JSVAL_RX_ALPHA" /><span class="required">*</span>
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