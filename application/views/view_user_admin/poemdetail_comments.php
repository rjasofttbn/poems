                    
<style type="text/css">
    .c1
    {

    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    function k()
    {
        $("#c1").show();
    }
    function hide()
    {
        $("#c1").hide();
    }
</script>
<input style="border-style: none; outline:  none; "  id="comments_image" type="button"  onclick="k()" />
<div id="c1" style="display:none;">
    <div style="float: left; width:100%; margin-top: 7px;">
        <table>
            <tr>
                <th>
                    <input placeholder=" Add a comment" required="1" id="Text1" style="outline: none; border-style: solid; border-width: 1px; border-color: #D0D0D0; box-shadow: 0px 0px 3px 0px; width: 451px; height: 79px;    border-radius: 7px; " type="text" />
                </th>
            </tr>
            <tr style="float: left; margin-top: 11px;">
                <th ></th>
                <th>
                    <input id="Button1" style=" border-radius: 21px; height: 41px; width: 71px; outline: none;" type="button" value="Post" onclick="hide()" />
                </th>
            </tr>
        </table>
    </div>
</div>

<div id="comments_data">
    <?php foreach ($poem_comments_display as $rows) { ?>
        <div style=" background-color: #eee; width: 659px; height: auto; margin: 31px 0px 0px 0px; border-top-right-radius: 7px; border-bottom-left-radius: 7px; border-bottom-right-radius: 31px; box-shadow:0px 1px 17px 0px  #333 ; ">
            <div style=" background-color:#eee; height: 85px;border-top-right-radius: 7px; ">

                <div  title="Picture" style=" float: left; height: 75px;transform: translate(-25px,-25px); "><img height="75px" width="75px" style=" border-radius: 100px; margin: 2px 0px 0px 2px;  border:  solid 7px whitesmoke; box-shadow:0px 1px 17px 0px  #333 ; " src="<?php echo base_url() ?><?php echo $rows->picture_small; ?>"/></div>
                <div title="Comment's Post Date" style=" float: left; height: 67px;  margin-left: 3px;  padding: 7px;"  ><p><strong style=" color:  #666; float: left; font: bold  13px/13px sans-serif;" title="Name"><?php echo strtoupper($rows->name) ?></strong></br> <b style=" color:  #777; font:  normal 11px/11px sans-serif; "><?php echo $rows->comments_post_date ?></b> </p> </div>
                <div style=" float: right; height: 67px; "> <p style=" padding: 7px;"><b style="font-weight:  normal; font: 12px/14px sans-serif; color:  #555; text-align: right;">

                            <?php echo $rows->comments_post_date; ?></b></p></br></div>
            </div>
            <div style="min-height:  90px;  color:  #555; padding: 7px; "> <p><b style=" font: normal 14px/14px sans-serif;  text-align:  justify; " title="Comment's"> <?php echo $rows->comments ?></b></p></div>
        </div>
    <?php } ?>
</div>