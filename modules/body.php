<div style="float: left; width: 75%; height: 100px">
    <?php
    if (empty($_GET['shmotka'])) {
        echo "Главная страница со шмотками";
    } else {
        echo '<h1>'.$products[ $_GET['shmotka'] ]['name'].'</h1>';
        echo '<img src="'.$products[ $_GET['shmotka'] ]['image'].'">';
    }
    ?>
</div>