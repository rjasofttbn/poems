<p>
    <?php foreach ($trending_poem_comments as $rows) { ?>  
        <?php echo $rows->poem_id; ?></br>
        <?php echo $rows->comments; ?></br>
    <?php } ?>
</p>