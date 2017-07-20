
    
<div id="">

    <?php
        echo form_fieldset("Please Login");
        echo form_open('Login/validate_user');
        
        echo form_input('email','email');
        echo "<br/>";
        echo "<br/>";
        echo form_password('password', 'password');
        echo "<br/>";
        echo "<br/>";
        echo form_submit('submit','Login');
        echo "<br/>";
        echo "<br/>";
        echo anchor('login/signup','create New Account');
        echo form_fieldset_close();
    ?>
</div>
