<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf8" />

        <title><?php echo $this->layout->getTitle(); ?></title>

        <meta name="description" content="<?php echo $this->layout->getDescripcion(); ?>" />
        <meta name="keywords" content="<?php echo $this->layout->getKeywords(); ?>" />
        <link href="<?php echo base_url() ?>public/css/estilos.css" rel='stylesheet' type='text/css' media='all' />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/main.css" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/funciones.js"></script>
        <!--*************auxiliares*****************-->

        <?php echo $this->layout->css; ?> 
        <?php echo $this->layout->js; ?> 

        <!--**********fin auxiliares*****************-->
    </head>

    <body>
        <?php echo $content_for_layout; ?>
    </body>
</html>