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
<?php echo validation_errors(' <p class ="error">'); ?>
<table>
  <tr>
    <th>name</th>
    <th>used in x documents</th>

  </tr>
<?php foreach($animals as $animal) :?>

    <tr>
        <th><?php echo $animal['name']; ?></th>
        <th><?php echo $animal['used_count']; ?></th>
        
        
    </tr>

<?php endforeach; ?> 
    <tr>
        <?php echo form_open('Animals/add_animal'); ?>
        <th><?php echo form_input('animal',set_value('animal','')); ?></th>
        <th><?php echo form_submit('submit','add'); ?></th>
        
    </tr>
</table>
