<div class="box-header well" data-original-title>
    <h2><i class="icon-edit"></i>Blog Entry</h2>

</div>

<div class="box-content">
    <div>
        <h4>
            <?php
                $msg=$this->session->userdata('message');
                if($msg)
                {
                    echo $msg;
                    $this->session->unset_userdata('message');
                }
            
            ?>
        </h4>
    </div>
    <form class="form-horizontal" action="<?php echo base_url(); ?>super_admin/save_blog" method="post">
        <fieldset>
            <div class="control-group">
                <label class="control-label">Blog Tilte</label>
                <div class="controls">
                    <input class="input-file uniform_on"  type="text" name="blog_title">
                </div>
            </div>


            <div class="control-group">
                <label class="control-label" for="selectError">Category Name</label>
                <div class="controls">
                    <select id="selectError" data-rel="chosen" name="category_id">
                        <option value="">Select Category Name...</option>
                        <?php
                        foreach ($all_published_category as $v_category) {
                            ?>
                            <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>

                        <?php } ?>
                    </select>
                </div>
            </div>



            <div class="control-group">
                <label class="control-label">Blog Short Description</label>
                <div class="controls">
                    <textarea class="cleditor" rows="3" name="blog_short_description"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Blog Long Description</label>
                <div class="controls">
                    <textarea class="cleditor" rows="3" name="blog_long_description"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Publication status</label>
                <div class="controls">
                    <select name="publication_status">
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="reset" class="btn">Cancel</button>
            </div>
        </fieldset></form>
</div>
