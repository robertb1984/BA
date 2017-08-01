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
   
    <th>Disease form name</th>
    <th>Test cases created</th>
    <th>release</th>
    
  </tr>
<?php foreach($forms as $form) :?>

    <tr>
        <th><?php echo $form['name']; ?></th>
        <th><?php if($form['used_count']>0){ ?><a class="btn-default" href="Reports/show_cases_for_form/<?php echo $form['id']; ?>"><?php echo $form['used_count']; ?></a><?php } 
        else{echo 0;}?>    
        </th>
        <th><a class="btn-default" href="Form/release_form/<?php echo $form['id']; ?>">release</a></th>
        
    </tr>

<?php endforeach; ?>

</table>
