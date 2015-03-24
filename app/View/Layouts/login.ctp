<head>

    <title><?php echo $title_for_layout; ?></title>
    <?php 
        echo $this->Html->css('bootstrap'); 
        echo $this->Html->css('metisMenu'); 
        echo $this->Html->css('sb-admin-2'); 
        echo $this->Html->css('font-awesome'); 
    ?>
    <meta name=“viewport” content="width=device-width,initial-scale=1.0">
</head>

<body>

    <div class="container">
        <div class="row">
            <?php echo $this->fetch('content'); ?>                                      
        </div>
    </div>
    <?php
        echo $this->Html->script('jquery-2.1.3.min');          
        //echo $this->Html->script('jquery-validate/jquery.validate');
        //echo $this->Html->script('custom/form-valid');
        echo $this->Html->script('bootstrap');
        echo $this->Html->script('metisMenu');
        echo $this->Html->script('sb-admin-2');
        
    ?>    

</body>

</html>
