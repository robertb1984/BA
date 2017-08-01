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
    <th>Name</th>
    <th>Description</th>
    <th>From </th>
  
  </tr>
<?php // echo form_open('Form/save_changes_to_descriptions'); ?>
<?php foreach($entries as $entry) :?>

    <tr>
        <?php echo form_open('Form/save_changes_to_descriptions'); ?>
        <th><?php echo $entry['name']; ?></th>
        <th><?php echo form_input('description', $entry['description']); ?></th>
        <th><?php echo $entry['fromThis']; ?></th>
        <?php echo form_hidden('table', $entry['fromThis']); ?>
        <?php echo form_hidden('id', $entry['id']); ?>
        <?php echo form_hidden('sickness', $sickness); ?>
        <th><?php echo form_submit('submit','save'); ?></th>
    </tr>

<?php endforeach; ?>
 <?php   // echo form_submit('submit','Save'); ?>
</table>
