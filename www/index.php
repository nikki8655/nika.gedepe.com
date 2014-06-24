<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.test-class').on('click', function() {
                    $(this).fadeOut('slow');
                });
                $('.test-class-show').on('click', function() {
                    $('.test-class').fadeIn('slow');
                })
            });
        </script>
    </head>
    <body>
        <script>
            var myName = 'Саша';
            var myMotherName = 'Angela';
            console.log("Привет " + myName);
        </script>
        <?php
        $my_name = "Саша";
        echo "Привет " . $my_name;
        echo '</br>';
        echo date('Y.m.d  ');
        echo date('H:i:s');
        ?>

        <div class="test-class-show">
            show
        </div>
        <div class="test-class">
            some test text's`
        </div>
    </body>
</html>