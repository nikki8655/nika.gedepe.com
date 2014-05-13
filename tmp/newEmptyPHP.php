<html>
    <head>
        <?php //here will be css, js etc.        ?>
        <style>
            * {
                margin: 0;
                padding: 0;
            }
            div {
                display: block;
            }
        </style>
            
    </head>
    <body>
        <?php
        require 'modules/db.php';
        require 'modules/header.php';
        require 'modules/menu.php';
        require 'modules/body.php';
        require 'modules/footer.php';
        ?>
    </body>
</html>

