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
<?php foreach($reports as $this_report) :
  $button= array(
      'name' => 'edit',
      'onclick' => 'edit_report('.$this_report['id'].')'
  );
?>
    <tr>
        <th><?php echo $this_report['id']; ?></th>
        <th><?php echo $this_report['name']; ?></th>
        <th><?php echo $this_report['sickness_id']; ?></th>
        <th><?php echo $this_report['user_id']; ?></th>
        <th><?php echo $this_report['created']; ?></th>
        <th><a class="btn-default" href="../Reports/load_report/<?php echo $this_report['id']; ?>">view details</a></th>
    </tr>

<?php endforeach; ?>
</table>