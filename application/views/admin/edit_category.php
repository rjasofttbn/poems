<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Forms</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Edit Category</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="<?php echo base_url();?>super_admin/update_category" method="post">
                <fieldset>
                    <h3 style="color:yellowgreen">
                        <?php
                            $msg=$this->session->userdata('message');
                            if($msg)
                            {
                                echo $msg;
                                $this->session->unset_userdata('message');
                            }
                        ?>
                    </h3>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" value="<?php echo $category_info->category_name;?>" data-items="4" name="category_name" >
                            <input type="hidden" class="span6 typeahead"  value="<?php echo $category_info->category_id;?>"  name="category_id" >
                            
                        </div>
                    </div>
                              
                    <div class="control-group">
                        <label class="control-label" for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" name="category_description" rows="3"><?php echo $category_info->category_description;?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Category </button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->