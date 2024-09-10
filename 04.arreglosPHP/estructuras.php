<html>

<body>
    hola
    <a href="app/acerca.html">Acerca de..</a>

    <?php
    echo '<ul>';

    for ($i = 0; $i < 10; $i++) {
        echo '<li>' . $i . '</li>';
    }
    echo '</ul>';

    echo '<ul>';
    $cantidadPrimos = 0;
    $num = 1;
    
    while ($cantidadPrimos < 10) {
        $num++;
        $count = 0;
        for ($i = 1; $i < $num; $i++) {
            if ($num % $i == 0) {
                $count++;
            }
        }
        if ($count <= 2) {
            $cantidadPrimos++;
            echo '<li>'.$num.'</li>';
        }
    }
    echo '</ul>';
    ?>
</body>

</html>