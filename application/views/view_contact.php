
<table border="1" align="center">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile No</th>
        
    </tr>
    <?php
   // echo '<pre>';
   // print_r($result);
    //exit();

      foreach($result as $aresult)
            {
    ?>
    <tr>
        <td><a href="<?php echo base_url()?>user_admin/contactDetail/<?php echo $aresult->contact_id?>"><?php echo $aresult->name;?></a></td>
        <td><?php echo $aresult->email_address;?></td>
        <td><?php echo $aresult->mobile_no;?></td>
       
        <td>
            <a href="<?php echo base_url()?>user_admin/editContact/<?php echo $aresult->contact_id?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="<?php echo base_url()?>user_admin/deleteContact/<?php echo $aresult->contact_id?>" onclick="return checkDelete();">Delete</a>

        </td>
    </tr>

    <?php } ?>

</table>
<br/>
