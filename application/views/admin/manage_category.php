<div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
            <tr>
                <th>Category Id</th>
                <th>Category Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>   
        <tbody>
            <?php
                foreach($all_category as $v_category)
                {
            ?>
            <tr>
                <td><?php echo $v_category->category_id;?></td>
                <td class="center"><?php echo $v_category->category_name;?></td>
                <td class="center">
                    <?php 
                        if($v_category->publication_status==1)
                        {
                            echo 'Published';
                        }
                        else{
                            echo 'Unpublished';
                        }
                    ?>
                
                </td>
                
                <td class="center">
                    <a class="btn btn-info" href="<?php echo base_url();?>super_admin/edit_category/<?php echo $v_category->category_id;?>" title="Edit">
                        <i class="icon-edit icon-white"></i>  
                                                                    
                    </a>
                    <?php
                        $access_label=$this->session->userdata('access_label');
                        if($access_label==1)
                        {
                    ?>
                    <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_category/<?php echo $v_category->category_id;?>" onclick="return check_delete();" title="Delete">
                        <i class="icon-trash icon-white"></i> 
                        
                    </a>
                    
                    <?php
                        }
                        if($v_category->publication_status==0)
                        {
                    ?>
                    <a class="btn btn-success" href="<?php echo base_url();?>super_admin/published_category/<?php echo $v_category->category_id;?>" title="Published">
                        <i class="icon-arrow-up icon-white"></i>  
                                                                    
                    </a>
                        <?php } else{?>
                    <a class="btn btn-success" href="<?php echo base_url();?>super_admin/unpublished_category/<?php echo $v_category->category_id;?>" title="Unpublished">
                        <i class="icon-arrow-down icon-white"></i>  
                                                                    
                    </a>
                        <?php } ?>
                </td>
            </tr>
                <?php } ?>
        </tbody>
    </table>            
</div>
