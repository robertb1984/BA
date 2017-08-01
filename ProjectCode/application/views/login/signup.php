
<fieldset>
<h3> Create new Account</h3>

<?php
    echo form_open('login/create_account');
    echo form_label('Name: ');
    echo form_input('name',set_value('name',''));
    echo "<br/>";
    echo "<br/>";
    echo form_label('E-mail: ');
    echo form_input('email',set_value('email',''));
    echo "<br/>";
    echo "<br/>";
    echo form_label('password : ');
    echo form_password('password',set_value('password',''));
    echo form_label('confirm password : ');
    echo form_password('password2',set_value('password2',''));
    echo "<br/>";
    echo "<br/>";
    echo form_submit('submit','create Account');
?>
</fieldset>
<?php echo validation_errors(' <p class ="error">'); ?>