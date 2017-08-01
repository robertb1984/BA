<html>
    
        <title>Animal Database</title>

        <script src="<?php echo base_url('/assets/js/jquery-3.2.0.js'); ?>"></script>
                <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>/assets/css/bootstrap.min.css"> 
        <script src="<?php echo base_url('/assets/js/bootstrap.js'); ?>"></script>
    
    <body>
        <nav class="navbar navbar-inverse navbar-static-top " role="navigation">
            <div class="container">
                <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url(); ?>/assets/img/Wien.png" style="max-width: 250px"/>
                    </a>
                   
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <?php if($this->session->userdata('is_auth')) 
                            {  ?>
                            <li><a href="<?php echo base_url(); ?>reports">My cases</a></li>
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



                        <?php } 
                        if($this->session->userdata('is_admin'))
                        {?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header"> -----User management-----</li>
                                    <li><a href="<?php echo base_url(); ?>users">Users</a></li>
                                    <li><a href="<?php echo base_url(); ?>add_email">Add allowed E-mail</a></li>
                                    <li class="dropdown-header"> ---------create document-------</li>
                                    <li><a href="<?php echo base_url(); ?>create_form">create disease form</a></li>
                                    <li><a href="<?php echo base_url(); ?>create_visits">create examination form</a></li>
                                    <li class="dropdown-header"> --------treatments----------</li>
                                    <li><a href="<?php echo base_url(); ?>treatments">treatments</a></li> 
                                </ul>
                            </li>
                            
                      <?php  } ?>
                    <li class="navbar-right pull-right" > <?php echo $this->session->userdata('email') ;?></li>
                    </ul>
                   
                </div>
                
            </div>
           
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" ></a>
                </div>
                
                   <div id="navbar">
                    <ul class="nav navbar-nav">
                        <?php /*
                        <li><a href="<?php echo base_url(); ?>users">Users</a></li>
                        <li><a href="<?php echo base_url(); ?>add_email">Add allowed E-mail</a></li>
                        <li><a href="<?php echo base_url(); ?>create_form">create disease form</a></li>
                        <li><a href="<?php echo base_url(); ?>create_visits">create examination form</a></li>
                        <li><a href="<?php echo base_url(); ?>treatments">treatments</a></li> 
                         * 
                         */ ?>
                    </ul>
                    </div>
            </div>
        </nav>
        <div class="container " >
