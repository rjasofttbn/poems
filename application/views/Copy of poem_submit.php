<div id="poem_submit">
    <p class="Baslik "><h1 style="margin: 21px 0px 41px 7px;">Submit a new poem</h1></p>

<br>

<p>
<div id="poem_rules">
    <font color="#FF0000" style=" text-align: left">
    <font size="3"><strong>Attention!</strong></font>
    Please read <a  style=" color:  blue"href="/help/?p=faq_posting_rules"><u>posting rules</u></a>. Poems that don't meet these rules may be removed from Poem.
    </font>
</div>
</p>

<script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
    {

        if (theForm.title.value == "")
        {
            alert("Please enter a value for the \"Title\" field.");
            theForm.title.focus();
            return (false);
        }

        if (theForm.title.value.length < 1)
        {
            alert("Please enter at least 1 characters in the \"Title\" field.");
            theForm.title.focus();
            return (false);
        }

        if (theForm.title.value.length > 180)
        {
            alert("Please enter at most 180 characters in the \"Title\" field.");
            theForm.title.focus();
            return (false);
        }

        if (theForm.body.value == "")
        {
            alert("Please enter a value for the \"body\" field.");
            theForm.body.focus();
            return (false);
        }

        if (theForm.body.value.length < 20)
        {
            alert("Please enter at least 20 characters in the \"body\" field.");
            theForm.body.focus();
            return (false);
        }

        if (theForm.aboutP.value == "")
        {
            alert("Please enter a topic for your poem.");
            theForm.aboutP.focus();
            return (false);
        }

        return (true);
    }
//--></script>

<div id="title_story">
    <?php
    $message = $this->session->userdata('message');
    if ($message) {
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
    <form name="FrontPage_Form1" method="post" action="<?php echo base_url(); ?>welcome/savepoem" enctype="multipart/form-data" onsubmit="return FrontPage_Form1_Validator(this)" language="JavaScript">    
        <div align="center">
            <table border="0" cellpadding="2" width="100%">
                <tr>
                    <td><b><br>
                            Title:&nbsp;<br>
                        </b><font size="3">Title of the poem you wish to submit / edit.<br>
                        <br>
                        Please;</font>
                        <ul>
                            <li><font size="3">Do not write the title in all uppercase or all lowercase.</font></li>
                            <li><font size="3">Write the first letter of each word of the title in uppercase.</font></li>
                            <li><font size="3">By all means write a title. The poems without a title will not appear on &quot;New Poems&quot; list and won't be seen by the visitors.</font></li>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="#E8E8E8">
                        <table border="0" width="100%" cellspacing="0" cellpadding="2">
                            <tr>
                                <td valign="top" width="180">
                                    <p align="left"><b>TITLE :</b></p></td>
                                <td valign="top">
                                    <input type="text" name="title" size="50" value="" maxlength="180"></td>
                            </tr>
                        </table> 

                    </td>
                </tr>
                <tr>
                    <td><b><br>
                            Text:<br>
                        </b><font size="3">
                        Write the main text of the poem here.
                        </font>
                        <p><font size="3">Please;
                            </font>
                        </p>
                        <ul>
                            <li><font size="3">Do not write all of the text in uppercase.</font></li>
                            <li><font size="3">Do not write the title of the poem here and do not add your name at the end. - Poems are displayed with their titles and with the name of the poet automatically. If you write the title of the poem in the text area, the title will be seen twice when visitors view the poem.</font></li>
                            <li><font size="3">Do not leave a space at the beginning of the lines. </font></li>
                            <li><font size="3">Separate the lines by using &quot;enter&quot; key, do not use any signs or symbols to separate. Leave only one line between the sections.</font></li>
                            <li><font size="3">If you want to add a note or an explanation, please write it at the end of the poem. Leave one line between the explanation and the body of the poem.</font></li>
                            <li><font size="3">You can write the date and place of the poem at the bottom. Separate such information from the body of the poem with a line and put them in parentheses.</font></li>
                            <li><font size="3">If the poem is a translation, you can write the original language and the name of the translator at the bottom. </font></li>
                            <li><font size="3">Do not write your comments or requests in this section.</font></li>
                            <li><font size="3">Please do not give a link to a web site in the text. Poem.Com removes the poems that give a link to any page.</font></li>
                            <li><font size="3">Do not use HTML codes</font></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#E8E8E8">
                        <table border="0" width="100%" cellspacing="0" cellpadding="2">
                            <tr>
                                <td valign="top" width="180"><p align="left"><b>TEXT :</b></p></td>
                                <td valign="top">

                                    <textarea id="txtInput" name="body" cols="70" rows="6" style="height:auto; overflow:hidden; line-height:1"></textarea>

                                </td>
                            </tr>
                        </table> 
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#E8E8E8">
                        <table border="0" width="100%" cellspacing="0" cellpadding="2">
                            <tr>
                                <td valign="middle" width="180"><span align="left"><b>Topic:</b></span></td>
                                <td valign="top">                               

                                    <input type="text" name="aboutP" id="aboutP" placeholder="Enter topic" autocomplete="off" value="" /> <font size="1">(For Example: love, art, fashion, friendship and etc.) * Required.</font>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
        </div>
        <tr>
            <td bgcolor="#E8E8E8">
                <table border="0" width="100%" cellspacing="0" cellpadding="2">
                    <tr>
                        <td valign="top" width="180"><p align="left"><b>Story (optional):</b></p></td>
                        <td valign="top">
                            <textarea id="txtStory" name="story" cols="70" rows="2" style="height:auto; overflow:hidden; line-height:1"></textarea>

                            <br />
                            <font size="3">
                            <b>This Poem's Story</b><br />
                            Write down your story about this poem.<br />
                            On what occasion, how and where did you write this poem? Or who do you dedicate it to? Who inspired you to write it? <br />
                            <br />
                            If you want to share your story about this poem, please write these or other details in the box below. People who read your poem will see this text on Poem.com, under your poem. There are no limitations for this text. You can write just one sentence or a very long note.
                            </font>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

<!-- <tr>
    <td bgcolor="#E8E8E8">
        <table border="0" width="100%" cellspacing="0" cellpadding="2">
            <tr>
                <td valign="top" width="180"><p align="left"><b>Want to add a<br />Video or Voice?:</b></p></td>
                <td valign="top">

                    <input type="file" name="video" />

                    <font size="3">
                    (Maximum 20 Mbyte and MP4, AVI, WMV, MPG, MOV, FLV or MP3)
                    </font>

                </td>
            </tr>!-->

        </table>
        </td>
        </tr>
        <tr>
            <td bgcolor="#E8E8E8">
                <table border="0" width="100%" cellspacing="0" cellpadding="2" id="table2" bgcolor="#F0F0F0">

                    <tr>
                        <td width="250" valign="top">
                            <p align="left"><b>Allow readers to vote this poem?</b></p></td>
                        <td valign="top">
                            <input type="checkbox" name="poem_vote" value="1" checked>Yes
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="poem_vote" value="0" >No
                            <br>
                            <font size="3">If YES, people will be able to give points (0 to 10) to your 
                            poem. If NO, the &quot;vote this poem&quot; box will be removed from the page of this 
                            poem. (Changing this option does not delete recent votes, only hides the 
                            voting box.) </font>
                        </td>
                    </tr>
                </table> 
            </td>
        </tr>
        <tr>
            <td bgcolor="#E8E8E8">
                <table border="0" width="100%" cellspacing="0" cellpadding="2" id="table4" bgcolor="#F0F0F0">

                    <tr>
                        <td width="250" valign="top">
                            <p align="left"><b>Allow readers to write comments on this poem?</b></p></td>
                        <td valign="top">
                            <input type="checkbox" name="poem_comments" value="1" checked>Yes
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="poem_comments" value="0" >No
                            <br>
                            <font size="3">If YES, people will be able to write their comments about 
                            this poem. If NO, the &quot;comments&quot; section will be removed from the page of 
                            this poem. (Changing this option does not delete recent comments, only hides 
                            them.) </font>
                        </td>
                    </tr>
                </table> 
            </td>
        </tr>
        <!--<tr>
            <td bgcolor="#E8E8E8">
                <table border="0" width="100%" cellspacing="0" cellpadding="2" id="table4" bgcolor="#F0F0F0">

                    <tr>
                        <td width="250" valign="top"><p align="left"><b>Enter the verification code :</b></p></td>
                        <td valign="top">
                            <div style="width:80px; float:left; font-size: 16px; font-family: Arial;"><input type="text" name="gonderme_kodu" size="6"></div><div style="width:80px; margin-top:2px; float:left"><img src="/dinamik/gonderme_kodu.asp?e=007&t=3/22/2014 5:31:54 AM" height="20" width="60"></div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>!-->
        <tr>
            <td>
                <font color="#FF0000">                
                <div id="poem_rules">
                    <font size="3"><strong>Attention!</strong></font>
                    Please read <a style="color:blue;" href="/help/?p=faq_posting_rules"><u>posting rules</u></a>. Poems that don't meet these rules may be removed from Poem.
                </div>
                </font>
            </td>
        </tr>
        <tr>
            <td>
                <p align="center"><input type="submit" value="Submit" name="Submit" style="width:200px; height:40px; margin: 11px 0px 31px 0px; "></td>
        </tr>
        </table>
        </center>
</div>
</div>