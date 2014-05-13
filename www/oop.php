<h1>Привет</h1>

    <?php
function func1(){
    echo 'hello <br>';
}
func1();

function func2 ($p1, $p2){
    $d = $p1 / $p2;
    echo "func2:  $p1 / $p2 = $d";   
}
func2(12, 6);
?>