
<!-- Log in Application form !-->


   
    <div style="  width: 211px; margin:  auto;">
            <!--  login check start !-->
 
            <form action="<?php echo base_url(); ?>login_controller/logincheck.php" method="post" onsubmit="return validateStandard(this);">

                <!--  login check end !-->

                <table style="float: left; box-shadow: 0px 0px 11px 0px whitesmoke" align=" left" border="0">
                    <tr style=" float: left; padding-bottom: 111px; text-align: center;">
                        <td>
                            <h1 style="float: left; text-align: center;">Log in </h1>   
                        </td>
                    </tr>
                    
                    <tr>
<!--                        <td>Email Address</td>-->
                        <td>
                            <input type="email" type="hidden"  placeholder="Email Address" name="email_address" style="
                                   padding: 0px; margin: 0px; text-overflow: ellipsis;
                                   outline: 0;
                                   display:block; text-align: center; height: 57px; width: 600px; border-radius: 50px; font:  bold 23px/27px sans-serif; border-style:  solid; margin: 0px 0px 0px 31px; border-color:  #DAD9D9; " size="50px" maxlength="40" required="1" err="Please enter valid Email address"/>
                        </td>
                    </tr>
                    <tr>
<!--                        <td>Password</td>-->
                        <td>
                            <input type="password" type="hidden" placeholder="Password" style=" float: left; outline:  0;  padding: 0px; margin: 0px 0px 0px 31px; text-align: center; height: 57px; width: 600px; margin-top: 17px; border-radius: 50px; font:  bold 23px/27px sans-serif;  border-style:  solid; border-color:  #DAD9D9; " name="password" size="50px" maxlength="40" required="1" err="Please enter valid password"/>
                        </td>
                    </tr>                
                    <tr>
<!--                        <td>&nbsp;</td>-->
                        <td>
                            <input style="outline:  0;  cursor:   pointer;    padding: 0px; margin: 0px; font: bold 19px/23px sans-serif; background-color: #ddd;  height: 55px; width: 590px; float: left; border-radius: 50px; margin: 67px 0px 61px 37px; color: #444; border-style: none; " type="submit" name="btnlogin" value="Log in" />                        
                        </td>
                    </tr>
                </table>

            </form>
  </div>