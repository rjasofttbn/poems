
<?php foreach ($result as $row) { ?>
                
                 <?php echo $row->total_comments; ?>
                 <?php echo $row->read_value; ?>
                 <?php echo $row->poem_vote; ?>
                <?php } ?>

 <?php
                if (isset($trending_poem_votes_comments)) {
                    echo $trending_poem_votes_comments;
                }
                ?>
