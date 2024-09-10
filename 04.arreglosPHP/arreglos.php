<html>
    <body>
        <h1>Arreglos</h1>

        <?php
            // $a = [1,2,3,4];
            // echo '<p>'.$a[2].'</p>';
            // $a[] = 6;
            // echo $a[4];
            // $a['p'] = 100;
            // echo $a['p'];
            // $a[] = 8;
            // echo $a[5];

            $a = [10, 20, 30];

            foreach($a as $m){
                echo $m;
            }

            $b = [
                'nombre' => 'Juan',
                'edad' => 20,
            ];
            
            $b['nombre'] = 'Juan';
            $b['edad'] = 20;

            echo '<pre>';
            print_r($b);
            exit();
            
        ?>
    </body>
</html>