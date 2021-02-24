
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery-1.3.2.js" ></script>
<script type="text/javascript">
    $('document').ready(function() {
        updatestatus();
        scrollalert();
    });
    function updatestatus() {
        //Show number of loaded items
        var totalItems = $('#content1 p').length;
        $('#status').text('Loaded ' + totalItems + ' Items');
    }
    function scrollalert() {
        var scrolltop = $('#scrollbox1').attr('scrollTop');
        var scrollheight = $('#scrollbox1').attr('scrollHeight');
        var windowheight = $('#scrollbox1').attr('clientHeight');
        var scrolloffset = 10;
        if (scrolltop >= (scrollheight - (windowheight + scrolloffset)))
        {
            //fetch new items
            $('#status').text('Loading more items...');
            $.get('new-items.html', '', function(newitems) {
                $('#content1').append(newitems);
                updatestatus();
            });
        }
        setTimeout('scrollalert();', 1500);
    }
</script>
        <style type="text/css" >
    #container1{ width:650px; margin:0px auto; padding:40px 0; }
    #scrollbox1{ width:650px; height:300px; border:1px solid #f2f2f2; }
    /*#container1 > p{ background:#eee; color:#666; font-family:Arial, sans-serif; font-size:0.75em; padding:5px; margin:0; text-align:right;}*/
</style>

<div id="container1">
    <div id="scrollbox1">
        <div id="content1" >
            <?php foreach ($result as $row) { ?>  
                <p><?php echo $row->title; ?>
                    <?php echo $row->title; ?></br></p>
            <?php } ?>  

        </div>
    </div>    

 </div>
