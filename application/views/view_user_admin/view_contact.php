
<form action="<?php echo base_url(); ?>user_admin_controller/searchContact" method="post">
    <input type="text" name="search_text" />
    <input type="submit" name="btn" value="Search"/>
</form>

<br/>
<hr/>
<br/>
<table border="1" align="center">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile No</th>
        <th>Blood Group</th>
        <th>Action</th>
    </tr>
    <?php
    // echo '<pre>';
    // print_r($result);
    //exit();

    foreach ($result as $aresult) {
        ?>
        <tr>        
            <td><a  style="color: blue;" href="<?php echo base_url() ?>user_admin_controller/contactDetail/<?php echo $aresult->contact_id ?>"><?php echo $aresult->name; ?></a></td>
            <td><?php echo $aresult->email_address; ?></td>
            <td><?php echo $aresult->mobile_no; ?></td>
            <td><?php echo $aresult->blood_group; ?></td>
            <td>
                <a  style="color: blue;" href="<?php echo base_url() ?>user_admin_controller/editContact/<?php echo $aresult->contact_id ?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a  style="color: blue;" href="<?php echo base_url() ?>user_admin_controller/deleteContact/<?php echo $aresult->contact_id ?>" onclick="return checkDelete();">Delete</a>

            </td>
        </tr>

    <?php } ?>

</table>
<?php
if (isset($pagination)) {
    echo $this->pagination->create_links();
}
?>
<br/>