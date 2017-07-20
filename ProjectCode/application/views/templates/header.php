<html>
    
        <title>Animal Database</title>
        <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>css/bootstrap.min.css"> 
    
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">ProjectCode</a>
                </div>
                <div id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>/test">Test</a></li>
                        <li><a href="<?php echo base_url(); ?>/users">Users</a></li>
             
                        <li><a class="sticky" href="<?php echo base_url(); ?>/login"><?php
                        //switch between strings "logout/login" rest is controlled in the Login controller
                                                                            $isAuth = FALSE;
                                                                            $isAuth = $this->session->userdata('is_auth');
                                                                            if(!$isAuth)
                                                                            {
                                                                                echo 'Login';

                                                                            }
                                                                            else{
                                                                                echo'Logout';
                                                                            }
                                                                        ?></a></li>
                        
                        <li ><a class="sticky"<?php echo $this->session->userdata('name') ;?>></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" >
