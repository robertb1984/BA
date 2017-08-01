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
    <th>Species</th>
    <th>Gender</th>
    <th>Disease/Case</th>
    <th>By User</th>
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
        <th><?php echo $this_report['animalname']; ?></th>
        <th><?php echo $this_report['species']; ?></th>
        <th><?php if($this_report['isFemale']){echo 'female';}else{echo 'female';}  ?></th>
        <th><?php echo $this_report['disease']; ?></th>
        <th><?php echo $this_report['username']; ?></th>
        <th><?php echo $this_report['created']; ?></th>
        <th><a class="btn-default" href="../Reports/load_report/<?php echo $this_report['id']; ?>">view details</a></th>
    </tr>

<?php endforeach; ?>
</table>