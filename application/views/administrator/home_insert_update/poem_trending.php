
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


<h1 style="text-align: left; margin-left: 5px">Insert data for trending poem </h1>
<!-- edit poems by this form  !-->





<div id="wrapper_tranding" >
    <!-- link with update form poem  start !-->

    <form name="poem_trending" action="<?php echo base_url(); ?>administrator_controller/trending_data_insert" method="post">

        <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $poem_view->poem_id ?>" />
        <div id="title">
            <div style="padding: 13px; font: bold 23px/25px sans-serif; color:#555;">
                <?php echo ucfirst($poem_view->title); ?>
            </div>
        </div>
        <div id="detail">
            <?php echo $poem_view->body; ?>
        </div>
        <div id="button">
            <input style="font:bold 19px/21px sans-serif; cursor:   pointer;  width: 335px; color:   #333; padding: 15px; border-radius: 7px; " type="submit" name="btnupdate" value="Poem Trending" />
            </br> <b style=" font: normal 11px/11px sans-serif; color:  tomato; text-decoration: underline;">Just click button</b>
            <!--Poem Trending-->
        </div>
    </form>
</div>

<!-- link update form poem end !-->

<!--            <table  class="table table-striped" cellpadding="0" cellspasing="0" class="sortable zebra tablesorter tablesorter-default" id="articles-table" align="center" style=" border:#000;" border="1">
                <tr style=" text-align:left">
                    <td style="font: bold 14px/15px sans-serif; color: #222;">Poem Name</td>
                    <td>
                        <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $poem_view->poem_id ?>" />
                        <input style="font: bold 14px/15px sans-serif; color: #222;" type="text" name="title" size="30px" maxlength="50" value="<?php echo ucfirst($poem_view->title) ?>" />
                    </td>
                </tr>
                <tr style=" text-align:left ;">
                    <td style="font: bold 15px/16px sans-serif; color: #333; ">Poem Detail</td>
                    <td style="font:  normal 15px/17px sans-serif; color: #333; padding:7px;  line-height: 23px; background-color: #DDD;  " <span style="width:310px;  background-color: white;  "></span><?php echo $poem_view->body; ?>-----</td>
                </tr>
                <tr style=" text-align:left">
                    <td style="font: bold 15px/16px sans-serif; color: #333;">Topic poet</td>
                    <td>
                        <input style="font: bold 14px/15px sans-serif; color: #222;" type="text" name="poems_category_name" size="30px" maxlength="20" value="<?php echo ucfirst($poem_view->poems_category_name) ?>" />
                    </td>
                </tr>
                <tr style=" text-align:left">
                    <td style="font: bold 15px/16px sans-serif; color: #333;">Submit Date</td>
                    <td>
                        <input type="text" name="poem_submit_date" size="30px" maxlength="20" value="<?php echo $poem_view->poem_submit_date ?>" />
                    </td>
                </tr>
                <tr style=" text-align:left">
                    <td style="font: bold 15px/16px sans-serif; color: #333;">Poem Of The Day</td>
                    <td><div id="poem_close_font">(pod) By this data poem will be poem of the day.</div><br>
                        <input type="text" disabled="" name="poem_of_day" size="30px" maxlength="20" value="<?php echo $poem_view->poem_of_day ?>" />

                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input style="font:bold 15px/16px sans-serif;" type="submit" name="btnupdate" value="Poem Of The Day Select" />
                    </td>
                </tr>
            </table>-->
