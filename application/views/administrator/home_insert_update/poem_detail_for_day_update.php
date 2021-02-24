
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


<h1 style="text-align: left; margin-left: 5px">Poem of the day date change</h1>
<!-- edit poems by this form  !-->

<div style="height: auto; width: auto;">
    <div style="margin-top: 45px; margin-bottom: 45px;">
        
        <!-- link with update form poem  start !-->
        <form name="poem_detail_for_day" action="<?php echo base_url(); ?>administrator_controller/poem_of_day_data_update" method="post">

            <!-- link update form poem end !-->
            <table  class="table table-striped" cellpadding="0" cellspasing="0" class="sortable zebra tablesorter tablesorter-default" id="articles-table" align="center" style=" border:#000;" border="1">
                <tr style=" text-align:left">
                    <td style="font: bold 14px/15px sans-serif; color: #222;">Poem Name</td>
                    <td>
                        <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $poem_view->poem_id ?>" />
                        <input disabled="" style="font: bold 14px/15px sans-serif; color: #222;" type="text" name="title" size="30px" maxlength="50" value="<?php echo ucfirst($poem_view->title) ?>" />
                    </td>
                </tr>
                <tr style=" text-align:left ;">
                    <td style="font: bold 15px/16px sans-serif; color: #333; ">Poem Detail</td>
                    <td style="font:  normal 15px/17px sans-serif; color: #333; padding:7px;  line-height: 23px; background-color: #DDD;  " <span style="width:310px;  background-color: white;  "></span><?php echo $poem_view->body; ?>-----</td>
                </tr>
                <tr style=" text-align:left">
                    <td style="font: bold 15px/16px sans-serif; color: #333;">Topic poet</td>
                    <td>
                        <input disabled="" style="font: bold 14px/15px sans-serif; color: #222;" type="text" name="poems_category_name" size="30px" maxlength="20" value="<?php echo ucfirst($poem_view->poems_category_name) ?>" />
                    </td>
                </tr>
                <tr style=" text-align:left">
                    <td style="font: bold 15px/16px sans-serif; color: #333;">Submit Date</td>
                    <td>
                        <input type="text" disabled="" name="poem_submit_date" size="17px" maxlength="20" value="<?php echo $poem_view->poem_submit_date; ?>" />
                    </td>
                </tr>
                <tr style=" text-align:left">
                    <td style="font: bold 15px/16px sans-serif; color: #333;">Poem Of The Day</td>
                    <td>
                        <div id="poem_close_font">(pod) By this data poem will be poem of the day.</div><br>
                        <input type="text" disabled="" style=" font-weight: bolder; border-style:  none; color: red; text-align: center; margin: 3px 0px 0px 3px;" name="poem_of_day" size="3px" maxlength="10" required="1" value="<?php echo $poem_view->poem_of_day ?>" />                    
                    </td>
                </tr>
                <tr style=" text-align:left">
                    <td style="font: bold 15px/16px sans-serif; color: #333;">Which date poem will be display?</td>
                    <td>                       
                        
                            <div id="poem_close_font">Please date select for Poem of the day .</div><br>
                            <input style=" margin: 3px 0px 0px 3px; " autofocus=""  type="date" name="poem_of_day_display_date"  required="1"  min="2015-01-01"><br>
                                           
                        
                            <div id="poem_close_font">This Poem all ready poem of the day selected.</div><br>
                            <div style="float: left; background-color: whitesmoke; font-weight: bold; color: red; margin: 3px 0px 0px 3px; width: 97px; text-align: center; height: 21px;"><?php echo $poem_view->poem_of_day_display_date ?></div><br><br>
                     

                    </td>
                </tr>
                <tr>
                    
                        <td>&nbsp;</td>
                    <td>                       
                        <input style="font:bold 15px/16px sans-serif; cursor: pointer;" type="submit" name="btnupdate" value="Poem Of The Day Select Date Change"/>
                    </td>
               
                </tr>
            </table>
        </form>
    </div>
</div>