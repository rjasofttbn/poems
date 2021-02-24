<div style="height: auto;">
    <?php foreach ($download_poem as $row) { ?>
        <div class="download_data">




            <?php
            $answer = $_POST['bold'];

            if ($answer == "No") {
                ?>
                <b style = "font: Normal 19px/23px musfiq;"><?php echo $row->title; ?></b></br></br>
            <?php } else if ($answer == "Yes") { ?>       
                <b style="font: bold 19px/23px musfiq;"><?php echo $row->title; ?></b></br></br>
            <?php }
            ?>

            <b style="font: normal 15px/17px musfiq;"><?php echo $row->body; ?></b></br>





            <?php
            $answers = $_POST['poet_name'];

            if ($answers == "No") {
                ?>

            <?php } else if ($answers == "Yes") { ?>       
                <b style="font: bold 11px/17px musfiq;"><?php echo $row->name; ?></b></b></br>
            <?php }
            ?>


            <?php
            $submitdate = $_POST['submit_date'];
            if ($submitdate == "No") {
                ?>
            <?php } else if ($submitdate == "Yes") { ?>
                <b style="font: bold 11px/17px musfiq; color: #B2B2B2;"><?php echo $row->poem_submit_date; ?></b>
            <?php } ?>





        </div>
    <?php } ?>
</div>