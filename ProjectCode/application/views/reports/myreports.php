<?php if($status == 1) echo anchor('Reports/new_report','new report') ?>

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
    <th>report_id</th>
    <th>Sickness name</th>
    <th>Sickness id</th>
    <th>By User ID</th>
    <th>created at </th>
    <th> view  </th>
  </tr>
<?php foreach($myreports as $report) :
  $button= array(
      'name' => 'edit',
      'onclick' => 'edit_report('.$report['id'].')'
  );
?>
    <tr>
        <th><?php echo $report['id']; ?></th>
        <th><?php echo $report['name']; ?></th>
        <th><?php echo $report['sickness_id']; ?></th>
        <th><?php echo $report['user_id']; ?></th>
        <th><?php echo $report['created']; ?></th>
        <th><a class="btn-default" href="Reports/load_report/<?php echo $report['id']; ?>">view details</a></th>
    </tr>

<?php endforeach; ?>
</table>