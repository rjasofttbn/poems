
<div style="float: left; background-color: beige; width: 75%; min-height: 301px;">
  
        <p class="Baslik "><h1 style="margin: 21px 0px 41px 7px;background-color: beige;">Poetry Contest Date Page</h1></p>
        <hr><br>
        <form name="poetry_contest_date_page" method="post" action="<?php echo base_url(); ?>administrator_controller/save_contest_date" enctype="multipart/form-data" onsubmit="return validateStandard(this);" language="JavaScript">    
            <table border="0" width="551px" style="background-color: beige;" cellspacing="0" cellpadding="2" id="table2">
                <tr>
                    <td>
                        <p align="left"><b>&nbsp; Form date and to date</b> <input type="text"  required="1"  name="poetry_contest_from_date_to_date" placeholder="First April - - May 31th, 2015"/><small style="font-size: 7; color:red; "title="Follow this format">&nbsp;(April 1st - - May 31th, 2015)</small></p>                       
                    </td>
                </tr> 
                <tr>
                    <td >
                        <p align="left"><b>&nbsp; End date</b> <input type="text" style="margin-left:91px;" required="1" name="poetry_contest_end_date" placeholder="mm/dd/yyyy mm:ss"  /><small style="font-size: 7; color:red;" regexp="JSVAL_RX_DATE"  title="Follow this format">&nbsp;(05/31/2015 23:59)</small></p>                     
                    </td>
                </tr>                 
                <tr>
                    <td style="text-align: center;">
                        <input type="submit" name="btn_save" value="Insert"/>
                    </td>
                </tr> 
            </table> 
        </form>
    
    </div>