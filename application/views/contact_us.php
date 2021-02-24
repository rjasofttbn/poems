

<!-- front end for poetry contest !-->

<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 

<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>
        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>
    <?php } ?>   
</div> 
<div id="new_poets_Page_title">
    <div id="font">
        Contact Us
    </div>    
</div>

<!--<div id="new_poets_caption">
    Contact Us
</div>  -->
<div id="famous_poems">  
    <div id="left">  
        <div id="caption">
            <div style="margin: 11px 0px 0px 45px; text-align: left; font-size: 21px; color:  darkblue ;">
                <b>Poet'sFeeling.com</b>
            </div>
        </div>
        <div style=" float: left; text-align: left; height: 238px; 
             border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;
             border-width: 1px;
             border-style: solid;
             border-color: steelblue;
             width: 261px; background-color: #D0D0D0 ; padding: 5px; margin-left: 1px; ">
            <ul >
                » &nbsp; <a href="" title="About Us">About Us</a><br>
                »  &nbsp; <a href="" title="Copyright Notice">Copyright Notice</a><br>
                »  &nbsp; <a href="" title="Privacy Statement">Privacy Statement</a><br>
                » &nbsp;  <a href="" title="Contact Us">Contact Us</a><br>
                » &nbsp;  <a href="" title="Help">Help</a>
            </ul>
        </div>

        <div> <?php foreach ($home_add_small as $row) { ?>
                <img style="padding-top:  11px; box-shadow:0px 0px 21px 01px   gray ;  " height="250px" width="275px" src="<?php echo base_url() ?><?php echo $row->home_add_small; ?>"/><!-- link with poems detail  !-->
            <?php } ?>
        </div> 
    </div>
    <div id="content">
        <div id="banner_f">
            <div id="banner_caption">
                <b style="margin-top: 3px; color: darkblue;">Contact With Admin</b>
            </div>
        </div>

        <div id="data_famous_poems">


            <div style=" padding: 21px; font-weight:  bold; color: #990000">If you have a message for us, please fill in the following form.</div>
            <!--   <div class="content">      <div style="text-align: left; padding: 19px;">
                       <form action="" method="post" class="contact-form">
                           <table align="center" border="0">
                               <div class="section">
                                   <label for="txtContactName">Name :</label>
                                   <input class="brown" type="text" name="name" id="txtContactName" />
                               </div>
                               <div class="section">
                                   <label for="txtContactEmail">E-mail Address :</label>
                                   <input class="brown" type="text" name="E_Mail_Address" id="txtContactEmail" />
                               </div>
                               <div class="section">
                                   <label for="slcContactCountry">Country :</label>
                                   <select name="country" id="slcContactCountry">
                                       <option value="">-Select-</option>
   
                                       <option value="Afghanistan">Afghanistan</option>
   
                                       <option value="Albania">Albania</option>
   
                                       <option value="Algeria">Algeria</option>
   
                                       <option value="Andorra">Andorra</option>
   
                                       <option value="Angola">Angola</option>
   
                                       <option value="Anguilla">Anguilla</option>
   
                                       <option value="Antigua and Barbuda">Antigua and Barbuda</option>
   
                                       <option value="Argentina">Argentina</option>
   
                                       <option value="Armenia">Armenia</option>
   
                                       <option value="Australia">Australia</option>
   
                                       <option value="Austria">Austria</option>
   
                                       <option value="Azerbaijan">Azerbaijan</option>
   
                                       <option value="Bahamas">Bahamas</option>
   
                                       <option value="Bahrain">Bahrain</option>
   
                                       <option value="Bangladesh">Bangladesh</option>
   
                                       <option value="Barbados">Barbados</option>
   
                                       <option value="Belarus">Belarus</option>
   
                                       <option value="Belgium">Belgium</option>
   
                                       <option value="Belize">Belize</option>
   
                                       <option value="Benin">Benin</option>
   
                                       <option value="Bhutan">Bhutan</option>
   
                                       <option value="Bolivia">Bolivia</option>
   
                                       <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
   
                                       <option value="Botswana">Botswana</option>
   
                                       <option value="Brazil">Brazil</option>
   
                                       <option value="Brunei">Brunei</option>
   
                                       <option value="Bulgaria">Bulgaria</option>
   
                                       <option value="Burkina Faso">Burkina Faso</option>
   
                                       <option value="Burundi">Burundi</option>
   
                                       <option value="Cambodia">Cambodia</option>
   
                                       <option value="Cameroon">Cameroon</option>
   
                                       <option value="Canada">Canada</option>
   
                                       <option value="Cape Verde">Cape Verde</option>
   
                                       <option value="Central African Republic">Central African Republic</option>
   
                                       <option value="Chad">Chad</option>
   
                                       <option value="Chile">Chile</option>
   
                                       <option value="China">China</option>
   
                                       <option value="Colombia">Colombia</option>
   
                                       <option value="Comoros">Comoros</option>
   
                                       <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
   
                                       <option value="Congo, Republic of the">Congo, Republic of the</option>
   
                                       <option value="Costa Rica">Costa Rica</option>
   
                                       <option value="Cote D'Ivoire">Cote D'Ivoire</option>
   
                                       <option value="Croatia">Croatia</option>
   
                                       <option value="Cuba">Cuba</option>
   
                                       <option value="Cyprus">Cyprus</option>
   
                                       <option value="Czech Republic">Czech Republic</option>
   
                                       <option value="Denmark">Denmark</option>
   
                                       <option value="Djibouti">Djibouti</option>
   
                                       <option value="Dominica">Dominica</option>
   
                                       <option value="Dominican Republic">Dominican Republic</option>
   
                                       <option value="East Timor">East Timor</option>
   
                                       <option value="Ecuador">Ecuador</option>
   
                                       <option value="Egypt">Egypt</option>
   
                                       <option value="El Salvador">El Salvador</option>
   
                                       <option value="Equatorial Guinea">Equatorial Guinea</option>
   
                                       <option value="Eritrea">Eritrea</option>
   
                                       <option value="Estonia">Estonia</option>
   
                                       <option value="Ethiopia">Ethiopia</option>
   
                                       <option value="Faroe Islands">Faroe Islands</option>
   
                                       <option value="Fiji">Fiji</option>
   
                                       <option value="Finland">Finland</option>
   
                                       <option value="France">France</option>
   
                                       <option value="Gabon">Gabon</option>
   
                                       <option value="Gambia, Republic of The">Gambia, Republic of The</option>
   
                                       <option value="Georgia">Georgia</option>
   
                                       <option value="Germany">Germany</option>
   
                                       <option value="Ghana">Ghana</option>
   
                                       <option value="Greece">Greece</option>
   
                                       <option value="Grenada">Grenada</option>
   
                                       <option value="Guatemala">Guatemala</option>
   
                                       <option value="Guinea">Guinea</option>
   
                                       <option value="Guinea-bissau">Guinea-bissau</option>
   
                                       <option value="Guyana">Guyana</option>
   
                                       <option value="Haiti">Haiti</option>
   
                                       <option value="Honduras">Honduras</option>
   
                                       <option value="Hong Kong">Hong Kong</option>
   
                                       <option value="Hungary">Hungary</option>
   
                                       <option value="Iceland">Iceland</option>
   
                                       <option value="India">India</option>
   
                                       <option value="Indonesia">Indonesia</option>
   
                                       <option value="Iran">Iran</option>
   
                                       <option value="Iraq">Iraq</option>
   
                                       <option value="Ireland">Ireland</option>
   
                                       <option value="Israel">Israel</option>
   
                                       <option value="Italy">Italy</option>
   
                                       <option value="Jamaica">Jamaica</option>
   
                                       <option value="Japan">Japan</option>
   
                                       <option value="Jordan">Jordan</option>
   
                                       <option value="Kazakhstan">Kazakhstan</option>
   
                                       <option value="Kenya">Kenya</option>
   
                                       <option value="Kiribati">Kiribati</option>
   
                                       <option value="Korea, Republic of">Korea, Republic of</option>
   
                                       <option value="Kuwait">Kuwait</option>
   
                                       <option value="Kyrgyzstan">Kyrgyzstan</option>
   
                                       <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
   
                                       <option value="Latvia">Latvia</option>
   
                                       <option value="Lebanon">Lebanon</option>
   
                                       <option value="Lesotho">Lesotho</option>
   
                                       <option value="Liberia">Liberia</option>
   
                                       <option value="Libya">Libya</option>
   
                                       <option value="Liechtenstein">Liechtenstein</option>
   
                                       <option value="Lithuania">Lithuania</option>
   
                                       <option value="Luxembourg">Luxembourg</option>
   
                                       <option value="Macedonia">Macedonia</option>
   
                                       <option value="Madagascar">Madagascar</option>
   
                                       <option value="Malawi">Malawi</option>
   
                                       <option value="Malaysia">Malaysia</option>
   
                                       <option value="Maldives">Maldives</option>
   
                                       <option value="Mali">Mali</option>
   
                                       <option value="Malta">Malta</option>
   
                                       <option value="Marshall Islands">Marshall Islands</option>
   
                                       <option value="Martinique">Martinique</option>
   
                                       <option value="Mauritania">Mauritania</option>
   
                                       <option value="Mauritius">Mauritius</option>
   
                                       <option value="Mexico">Mexico</option>
   
                                       <option value="Micronesia">Micronesia</option>
   
                                       <option value="Moldova">Moldova</option>
   
                                       <option value="Monaco">Monaco</option>
   
                                       <option value="Mongolia">Mongolia</option>
   
                                       <option value="Montenegro">Montenegro</option>
   
                                       <option value="Morocco">Morocco</option>
   
                                       <option value="Mozambique">Mozambique</option>
   
                                       <option value="Myanmar">Myanmar</option>
   
                                       <option value="Namibia">Namibia</option>
   
                                       <option value="Nauru">Nauru</option>
   
                                       <option value="Nepal">Nepal</option>
   
                                       <option value="Netherlands">Netherlands</option>
   
                                       <option value="New Zealand">New Zealand</option>
   
                                       <option value="Nicaragua">Nicaragua</option>
   
                                       <option value="Niger">Niger</option>
   
                                       <option value="Nigeria">Nigeria</option>
   
                                       <option value="North Korea, Democratic People's Republic of">North Korea, Democratic People's Republic of</option>
   
                                       <option value="Norway">Norway</option>
   
                                       <option value="Oman">Oman</option>
   
                                       <option value="Pakistan">Pakistan</option>
   
                                       <option value="Palau">Palau</option>
   
                                       <option value="Palestine">Palestine</option>
   
                                       <option value="Panama">Panama</option>
   
                                       <option value="Papua New Guinea">Papua New Guinea</option>
   
                                       <option value="Paraguay">Paraguay</option>
   
                                       <option value="Peru">Peru</option>
   
                                       <option value="Philippines">Philippines</option>
   
                                       <option value="Poland">Poland</option>
   
                                       <option value="Portugal">Portugal</option>
   
                                       <option value="Puerto Rico">Puerto Rico</option>
   
                                       <option value="Qatar">Qatar</option>
   
                                       <option value="Romania">Romania</option>
   
                                       <option value="Russia">Russia</option>
   
                                       <option value="Rwanda">Rwanda</option>
   
                                       <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
   
                                       <option value="Saint Lucia">Saint Lucia</option>
   
                                       <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
   
                                       <option value="Samoa">Samoa</option>
   
                                       <option value="San Marino">San Marino</option>
   
                                       <option value="Sao Tome and Principe">Sao Tome and Principe</option>
   
                                       <option value="Saudi Arabia">Saudi Arabia</option>
   
                                       <option value="Senegal">Senegal</option>
   
                                       <option value="Serbia">Serbia</option>
   
                                       <option value="Seychelles">Seychelles</option>
   
                                       <option value="Sierra Leone">Sierra Leone</option>
   
                                       <option value="Singapore">Singapore</option>
   
                                       <option value="Slovakia">Slovakia</option>
   
                                       <option value="Slovenia">Slovenia</option>
   
                                       <option value="Solomon Islands">Solomon Islands</option>
   
                                       <option value="Somalia">Somalia</option>
   
                                       <option value="South Africa">South Africa</option>
   
                                       <option value="Spain">Spain</option>
   
                                       <option value="Sri Lanka">Sri Lanka</option>
   
                                       <option value="Sudan, Republic of">Sudan, Republic of</option>
   
                                       <option value="Sudan, Republic of South">Sudan, Republic of South</option>
   
                                       <option value="Suriname">Suriname</option>
   
                                       <option value="Swaziland">Swaziland</option>
   
                                       <option value="Sweden">Sweden</option>
   
                                       <option value="Switzerland">Switzerland</option>
   
                                       <option value="Syrian">Syrian</option>
   
                                       <option value="Taiwan">Taiwan</option>
   
                                       <option value="Tajikistan">Tajikistan</option>
   
                                       <option value="Tanzania">Tanzania</option>
   
                                       <option value="Thailand">Thailand</option>
   
                                       <option value="Togo">Togo</option>
   
                                       <option value="Tonga">Tonga</option>
   
                                       <option value="Trinidad and Tobago">Trinidad and Tobago</option>
   
                                       <option value="Tunisia">Tunisia</option>
   
                                       <option value="Turkey">Turkey</option>
   
                                       <option value="Turkmenistan">Turkmenistan</option>
   
                                       <option value="Tuvalu">Tuvalu</option>
   
                                       <option value="Uganda">Uganda</option>
   
                                       <option value="Ukraine">Ukraine</option>
   
                                       <option value="United Arab Emirates">United Arab Emirates</option>
   
                                       <option value="United Kingdom">United Kingdom</option>
   
                                       <option value="United States">United States</option>
   
                                       <option value="Uruguay">Uruguay</option>
   
                                       <option value="Uzbekistan">Uzbekistan</option>
   
                                       <option value="Vanuatu">Vanuatu</option>
   
                                       <option value="Vatican City">Vatican City</option>
   
                                       <option value="Venezuela">Venezuela</option>
   
                                       <option value="Viet Nam">Viet Nam</option>
   
                                       <option value="Yemen">Yemen</option>
   
                                       <option value="Zambia">Zambia</option>
   
                                       <option value="Zimbabwe">Zimbabwe</option>
   
                                   </select>
                               </div>
                               <div class="section">
                                   <label for="txtContactSubject">Subject :</label>
                                   <input class="brown" type="text" name="Subject" id="txtContactSubject" />
                               </div>
                               <div class="section">
                                   <label for="txtMessage">Message :</label>
                                   <textarea class="brown" name="Message" id="txtMessage" cols="44" rows="10"></textarea>
                               </div>
                                                   <div class="section">
                                                       <label for="txtPasswordCaptcha" class="title">Verification code :</label>
                                                       <input type="text" class="brown captcha-field" style="width:86px!important" name="gonderme_kodu" id="txtPasswordCaptcha" />
                                                       <img src="/dinamik/gonderme_kodu.asp?e=002&t=7/14/2014 4:40:17 AM" height="20" width="60" alt="" />
                                                   </div>
   
                               <div class="section submit">
                                   <a class="button brown dcN">
                                       <input type="submit" value="SUBMIT" />
                                   </a>
                               </div>
                               <address>
                                   <strong>PoetsFeeling.Com</strong> <br />
                                   Dhaka , Bangladesh
                               </address>
                           </table>
                       </form>
                   </div>-->


            <form name="signup" enctype="multipart/form-data"  action="http://localhost:80/poems/welcome/saveuser.php" method="post" onsubmit="return validateStandard(this);">

                <!-- poet's registration form connection end  !-->

                <table style="padding: 31px" align="center" border="0">
                    <tr>
                        <td style="text-align: left;" >Name :</td>
                        <td style="text-align: left;">
                            <input style="width: 213px; margin-left: 3px;" type="text" name="first_name" size="30px" maxlength="20" required="1" err="Please enter valid first name" autofocus regexp="JSVAL_RX_ALPHA" /><span class="required">*</span>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align: left;" >E-mail Address :</td>
                        <td style="text-align: left;">
                            <input style="width: 213px; margin-left: 3px;" type="email" name="email_address" size="30px" maxlength="40" required="1" err="Please enter valid Email address" regexp="JSVAL_RX_EMAIL" /><span class="required">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" >Country  :</td>
                        <td style="text-align: left; ">
                            <select style="width: 216px; margin-left: 3px;" name="country" required="1" exclude=" ">
                                <option  value=" ">+ Select a country..</option>
                                <script type="text/javascript" language="javascript">
                                    printCountryOptions();
                                </script>
                            </select><span class="required">*</span>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align: left;" >Subject :</td>
                        <td style="text-align: left; ">
                            <input style="width: 213px; margin-left: 3px;" type="text" name="last_name" size="30px" maxlength="20" required="1" err="Please enter valid last name" regexp="JSVAL_RX_ALPHA" /><span class="required">*</span>
                        </td>
                    </tr>

<!--                    <tr>
                        <td>   
                                <label for="txtPasswordCaptcha" class="title">Verification code :</label>
                                <td style="text-align: left; margin-left: 6px;"><input type="text" class="brown captcha-field" style="width:86px!important" name="gonderme_kodu" id="txtPasswordCaptcha" />
                                    <img style="margin-top: 2px;" src="/dinamik/gonderme_kodu.asp?e=002&t=7/14/2014 4:40:17 AM" height="20" width="60" alt="" /></td>
                            </td>
                    </tr>-->

                    <tr>
                        <td style="text-align: left;" >Message :</td>
                        <td >
                            <textarea style="text-align: left;" name="address" cols="44" rows="10" ></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td style="text-align: left; margin-left: 3px;">
                            <input type="submit" name="btnsave" value="Submit" />
                            <input type="reset" name="btnreset" value="Reset" />
                        </td>
                    </tr>

                </table>
                <address style="padding: 21px; text-align: right; margin-right: 69px;">
                    <strong>PoetsFeeling.Com</strong> <br />
                    Dhaka , Bangladesh.
                </address>
            </form>
        </div>

    </div> 
</div> 

