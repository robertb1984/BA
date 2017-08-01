<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<table>
  <tr>
   
    <th>E-Mail</th>
    <th>remove/add</th>
    
  </tr>
<?php foreach($emails as $email) :?>

    <tr>
        <th><?php echo $email['email']; ?></th>
        <th><a class="btn-default" href="Users/delete_mail/<?php echo $email['id']; ?>">remove</a></th>
        
    </tr>

<?php endforeach; ?>
    <tr>
        <?php echo form_open('Users/save_mail'); ?>
        <th><?php echo form_input('email',set_value('email','')); ?></th>
        <th><?php echo form_submit('submit','add'); ?></th>
        
    </tr>
</table>
<?php echo validation_errors(' <p class ="error">'); ?>