<html>
    
        <title>Animal Database</title>

        <script src="<?php echo base_url('/assets/js/jquery-3.2.0.js'); ?>"></script>
                <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>/assets/css/bootstrap.min.css"> 
        <script src="<?php echo base_url('/assets/js/bootstrap.js'); ?>"></script>
    
    <body>
        <nav class="navbar navbar-inverse ">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" >Animal Reprocases</a>
                </div>
                <div id="navbar">
                    <ul class="nav navbar-nav">
                        <?php if($this->session->userdata('is_auth')) {  ?>
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
                        
                        
                        
                        <?php } ?>
                    </ul>
                   <li class="navbar-right pull-right" > <?php echo $this->session->userdata('email') ;?></li>
                </div>
            </div>
            <?php if($this->session->userdata('is_admin'))
            { ?>
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" >Admin</a>
                </div>
                
                   <div id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>users">Users</a></li>
                        <li><a href="<?php echo base_url(); ?>create_form">create disease form</a></li>
                        <li><a href="<?php echo base_url(); ?>create_visits">create Visits</a></li>  
                    </ul>
                    </div>
            <?php } ?>
                
            </div>
        </nav>
        <div class="container" >
