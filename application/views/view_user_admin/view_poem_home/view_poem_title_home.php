

<!-- front end for poems home --!-->
<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 

<!-- front end for poems title --!-->

<table border="0" align="center" style=" background-color:  ivory;  text-align: left ">
    <?php foreach ($result as $r) { ?>
        <a href="#"><?php echo $r->hotpoemtitle; ?>"  /></a>
    <?php } ?>
</table>


