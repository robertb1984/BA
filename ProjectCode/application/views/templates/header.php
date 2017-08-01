<html>
    
        <title>Animal Database</title>
        <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>css/bootstrap.min.css"> 
        <script src="<?php echo base_url('/js/jquery-3.2.0.js'); ?>"></script>
    
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" >Animal Reprocases</a>
                </div>
                <div id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>reports">My Reports</a></li>
                        <li><a href="<?php echo base_url(); ?>report_search">Reprocase Search</a></li>
                        <li><a href="<?php echo base_url(); ?>login"><?php
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
                        
                        <li > <?php echo $this->session->userdata('email') ;?></li>
                    </ul>
                </div>

            </div>
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" >Admin</a>
                </div>
                   <div id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>users">Users</a></li>
                        <li><a href="<?php echo base_url(); ?>create_form">create disease form</a></li>   
                    </ul>
                    </div>
            </div>
        </nav>
        <div class="container" >
