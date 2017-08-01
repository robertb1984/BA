<h3><?php echo $title; ?> </h3>

 <?php foreach($treatments as $treatment) : ?>
    <h4 class="head"><?php echo $treatment['name']; ?> </h4>
    <?php echo $treatment['note']; ?>
    <a class="btn-hover" href="Reports/edit_create_treatment/<?php echo $treatment['id']; ?>">Edit</a>
<?php endforeach;  
echo "<br/>";
echo "<br/>";
?>
<a class="btn btn-default" href="Reports/edit_create_treatment/">new</a>

