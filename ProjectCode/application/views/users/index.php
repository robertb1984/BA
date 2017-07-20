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
  </tr>
<?php foreach($users as $user) :?>

    <tr>
        <th><?php echo $user['name']; ?></th>
        <th><?php echo $user['email']; ?></th>
        <th><?php echo $user['created']; ?></th>
    </tr>

<?php endforeach; ?>
</table>