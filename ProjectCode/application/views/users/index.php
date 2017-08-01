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
    <th>name</th>
    <th>E-Mail</th>
    <th>erstellt</th>
    <th>adminstatus</th>
    <th>give admin rights</th>
  </tr>
<?php echo form_open("Users/give_admin"); ?>
<?php foreach($users as $user) :?>

    <tr>
        <th><?php echo $user['name']; ?></th>
        <th><?php echo $user['email']; ?></th>
        <th><?php echo $user['created']; ?></th>
        <th><?php if($user['adminstatus']==1){echo 'admin';} else{echo 'user';}; ?></th>
        <th><?php if($user['adminstatus']==0){echo form_checkbox('admins[]', $user['id'], FALSE);} ?></th>
    </tr>

<?php endforeach; ?>
    <?php echo form_submit('admins',"give Admin rights to checked users"); ?>
</table>
