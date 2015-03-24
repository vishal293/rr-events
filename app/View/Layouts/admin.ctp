<!DOCTYPE html>
<html lang="en">

<head>

    <title><?php echo $title_for_layout; ?></title>
   <?php 
        echo $this->Html->css(array('bootstrap',
                                    'metisMenu',
                                    'font-awesome',
                                    'dataTables.bootstrap',      
                                    'dataTables.responsive',
                                    'sb-admin-2',
                                    'datepicker3',
                                    
                                    'clockface',
                                    'custom/custom',
                                    'magnific-popup'
                                )
        );
        echo $this->Html->script('jquery-2.1.3.min');

        echo $this->Html->script('custom/config');
    ?>
    <meta name=“viewport” content="width=device-width,initial-scale=1.0">
    <script type="text/javascript">var baseUrl = '<?php echo $this->webroot; ?>';
    </script>
 
    <?php echo $this->Html->scriptBlock('var jsVars = '.$this->Js->object($jsVars).';'); ?>   
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><font size="5">CityBuzz</font></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    Logged in as
                    <?php echo $curr_user['name']; ?>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo Router::url(array('controller'=>'users','action'=>'logout')); ?>">
                        <i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo Router::url(array('controller'=>'dashboards','action'=>'index')); ?>">
                                <i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <p class="inactive">
                                <i class="fa fa-gift fa-fw"></i> Event 
                            </p>
                        </li>
                        <?php
                             if($curr_user['role'] == 'admin'||$curr_user['role'] == 'manager'):
                        ?>
                        <li>
                             <a href="<?php echo Router::url(array('controller'=>'events','action'=>'add')); ?>" style="padding-left: 40px;"><i class="fa  fa-caret-right fa-fw"></i> Add a New Event/Offer</a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo Router::url(array('controller'=>'events','action'=>'index')); ?>" style="padding-left: 40px;">
                                <i class="fa  fa-caret-right fa-fw"></i> 
                                Approved Events
                            </a>
                        </li>
                        <?php
                             if($curr_user['role'] == 'admin'):
                        ?>
                        <li>
                            <a href="<?php echo Router::url(array('controller'=>'events','action'=>'unapproved')); ?>" style="padding-left: 40px;">
                                <i class="fa  fa-caret-right fa-fw"></i> 
                                Unapproved Events</a>
                        </li>
                        <?php endif; ?> 
                        <li>
                            <a href="<?php echo Router::url(array('controller'=>'events','action'=>'approved_offer')); ?>" style="padding-left: 40px;">
                                <i class="fa  fa-caret-right fa-fw"></i> 
                                Approved Offers & Promotions
                            </a>
                        </li>
                        <?php
                            if($curr_user['role'] == 'admin'):
                        ?>
                        <li>
                            <a href="<?php echo Router::url(array('controller'=>'events','action'=>'unapproved_offer')); ?>" style="padding-left: 40px;">
                                <i class="fa  fa-caret-right fa-fw"></i> 
                                Unapproved Offers & Promotions
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Router::url(array('controller'=>'events','action'=>'archived_event')); ?>" style="padding-left: 40px;">
                                <i class="fa  fa-caret-right fa-fw"></i> 
                                Archived Events
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Router::url(array('controller'=>'events','action'=>'archived_offer')); ?>" style="padding-left: 40px;">
                                <i class="fa  fa-caret-right fa-fw"></i> 
                                Archived Offers & Promotions
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php
                            if($curr_user['role'] == 'admin'):
                        ?>
                        <li>
                            <p class="inactive">
                                <i class="fa fa-sitemap fa-fw"></i> Category
                            </p>
                        </li>
                        <li>
                            <a href="<?php echo Router::url(array('controller'=>'categories','action'=>'index')); ?>" style="padding-left: 40px;"><i class="fa  fa-caret-right fa-fw"></i> All Categories</a>
                        </li>
                        <li>
                            <p class="inactive">
                                <i class="fa fa-user fa-fw"></i> Users
                            </p>
                        </li>
                        <li>
                            <a href="<?php echo Router::url(array('controller'=>'users','action'=>'index')); ?>" style="padding-left: 40px;"><i class="fa  fa-caret-right fa-fw"></i> All Users</a>
                        </li>
                        <?php endif; ?> 
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->fetch('content'); ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php 
        echo $this->Html->script(array('bootstrap',
                                      'metisMenu',
                                      'sb-admin-2', 
                                )
        );
    ?>    

</body>
</html>
