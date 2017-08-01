<?php if($status == 1) echo anchor('Reports/new_report','new case') ?>

<h5><?php echo $title ?></h5>
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
    <th>Animalname</th>
    <th>Gender</th>
    <th>Disease/Case</th>
    <th>By User</th>
    <th>created at </th>
    <th> view  </th>
    <th> edit </th>
    <?php if($myreports[0]['status'] != 3)
    { ?>
    <th> add examination </th>
    <th> Close Case</th>
    <?php } ?>
  </tr>
<?php foreach($myreports as $report) :
  $button= array(
      'name' => 'edit',
      'onclick' => 'edit_report('.$report['id'].')'
  );
?>
    <tr>
        <th><?php echo $report['animalname']; ?></th>
        <th><?php if($report['isFemale']==1){echo 'female';}else{echo 'male';}  ?></th>
        <th><?php echo $report['disease']; ?></th>
        <th><?php echo $report['username']; ?></th>
        <th><?php echo $report['created']; ?></th>
        <th><a class="btn-default" href="Reports/load_report/<?php echo $report['id']; ?>">view details</a></th>
        <th><?php if($report['user_id'] == $this->session->userdata('user_id')){ ?><a class="btn-default" href="Reports/edit_report/<?php echo $report['id']; ?>">edit</a><?php } ?></th>
        <th><?php if(($report['user_id'] == $this->session->userdata('user_id')&&($report['status']!= 3))){ ?><a class="btn-default" href="Reports/load_edit_report/<?php echo $report['id']; ?>/<?php echo true; ?>">add examination</a><?php } ?></th>
        <th><?php if($report['status'] == 2){ ?><a class="btn-default" href="Reports/close_report/<?php echo $report['id']; ?>">close <?php }?></th> 
    </tr>

<?php endforeach; ?>
</table>