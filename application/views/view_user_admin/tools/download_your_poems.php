<div id="new_poets_Page_title">
    <div id="font">
        Tool's
    </div>    
</div>


<script>
    function onDownload() {
        document.location = 'data:Application/octet-stream,' +
                encodeURIComponent(dataToDownload);

    }
</script>

<!-- poets personal comments control !-->

<div id="down_load_caption">
    Download Your Poems
</div> 
<div  class="info">
    <div class="download_info_font"> 
        <p>To download full text of all your poems published on POETSFEELING, use this page.</p>
        <p>You should use this tool to backup your poems or save your poems on your own computer.&nbsp; </p>
    </div>
</div>



<div style="float: left; height: auto; width: auto;">
    <div style="  height: 31px;  width: 100%;">
        <div style=" float: left;"><a style="float: left;  border-top-left-radius: 7px; height: 31px; width: 169px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>poets_profile_controller/picture_edit.php" id="active"><b style="float: left; margin: 7px 0px 0px 33px;  text-align: center;">Update e-Book</b></a> </div>
        <div style="float: left; "><a style=" float: left;  height: 31px; width: 195px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>tools_controller/download_your_poems.php" id="active"><b style="float: left; margin: 7px 0px 0px 23px; text-align: center;">Download your poems</b></a></div>
        
        <div style=" float: left;"><a style="float: left; height: 31px; width: 180px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>user_admin_controller/most_popular_poets.php" id="active"><b style="float: left; margin: 7px 0px 0px 13px;  text-align: center;">Promote your poems </b></a> </div>
        <div style="float: left;"> <a style="float: left;  border-top-right-radius: 7px;  height: 31px; width: 145px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;"   href="<?php echo base_url(); ?>poets_profile_controller/view_poet_comments.php" id="active"><b style="float: left; margin: 7px 0px 0px 7px; text-align: center; ">Download e-book</b></a></div>
        <!-- poem's insert,edit,update,delete end !-->
    </div>
    <div id="poem_down_load">
        <!--    <div class="download_info_font"> 
                <p>To download full text of all your poems published on POETSFEELING, use this page.</p>
                <p>You should use this tool to backup your poems or save your poems on your own computer.&nbsp; </p>
            </div>-->
        <div id="registration_font">

            <form  name= "view_poem" action="<?php echo base_url(); ?>tools_controller/view_user_wise_poem.php"  enctype="multipart/form-data" method="post" onsubmit="return validateStandard(this);
                ">

                <!--<form method="GET" action="/members/mpoems/download/poems1.asp" target="_blank">-->
                <table style=" text-align: center; margin-left:  155px;"  border="1" bgcolor="#F2F2F2" cellspacing="0" cellpadding="5" style="border-collapse: collapse" bordercolor="#E8E8E8">
                    <tr>
                        <td style="text-align: left;"><b>Bold Titles</b></td>
                        <td><input type="radio" value="Yes" name="bold" checked> Yes 
                            <input type="radio" value="No" name="bold"> No </td>
                    </tr>
                    <tr>
                        <td><b>Poet Name Under Each Poem</b></td>
                        <td><input type="radio" value="Yes" name="poet_name" checked> Yes <input type="radio" value="No" name="poet_name">
                            No</td>
                    </tr>

                    <tr>
                        <td style="text-align: left;"><b>Submit Date View</b></td>
                        <td><input type="radio" value="Yes" name="submit_date" checked> Yes <input type="radio" value="No" name="submit_date"> No </td>
                    </tr>
               <!--       <tr>
                        <td><b>Sort Poems By:</b></td>
                        <td><select size="1" name="sirala">
                                <option value="Title" selected>Title</option>
                                <option value="Popularity">Popularity</option>
                                <option value="Date">Submission Date</option>
                                <option value="DateD">Submission Date (Desc.)</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><b>&nbsp;</b></td>
                        <td><input type="checkbox" value="1" name="send_copy"> Send a copy to myself</td>
                    </tr>-->
                    <tr style="padding-left: 0px;">
                        <td>&nbsp;</td>
                        <td >

                            <a href="javascript:onDownload();">     <input  style="cursor: pointer; " type="submit" value="Download" name="B1"></a>

                        </td>
                    </tr>
                </table>

            </form>

        </div>
    </div>
</div>