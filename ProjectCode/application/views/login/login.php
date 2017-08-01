
    
<div id="">

    <?php
        echo form_fieldset("Please login");
        echo form_open('Login/validate_user');
        
        echo form_label('E-mail :');
        echo "<br/>";
        echo form_input('email','');
        echo "<br/>";
        echo "<br/>";
        echo form_label('Password :');
        echo "<br/>";
        echo form_password('password', '');
        echo "<br/>";
        echo "<br/>";
        echo form_submit('submit','Login');
        echo "<br/>";
        echo "<br/>";
        echo anchor('login/signup','Create new account');
        echo form_fieldset_close();
        echo "<br/>";
        echo validation_errors(' <p class ="error">');
    ?>
</div>
