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
<h5><?php echo $title ?></h5>

<table>
  <tr>
    <th>Blockname</th>
    <th>Use it?</th>

  </tr>
<?php foreach($blocks as $block) :
 
?>
  <?php echo form_open('Form/Use_selected_blocks'); ?>
    <tr>
        <th><?php echo $block['name']; ?></th>
        <th><?php echo form_checkbox('checked[]', $block['id'], false); ?></th>
   </tr>

<?php endforeach; 
echo form_submit('submit','Use selected blocks')?>
</table>