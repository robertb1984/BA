
<fieldset>
<h1> Create new Account</h1>

<?php
    echo form_open('login/create_account');
    echo form_input('name',set_value('name','Name ?'));
    echo "<br/>";
    echo "<br/>";
    echo form_input('email',set_value('email','Email ?'));
    echo "<br/>";
    echo "<br/>";
    echo form_input('password',set_value('password','PW'));
    echo form_input('password2',set_value('password2','PW confirm '));
    echo "<br/>";
    echo "<br/>";
    echo form_submit('submit','create Account');
?>
</fieldset>
<?php echo validation_errors(' <p class ="error">'); ?>