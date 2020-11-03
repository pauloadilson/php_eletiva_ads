<?php

use POO\Laser;

    include("impressora.class.php");
    include("laser.class.php");
    include("matricial.class.php");

    $laser = new Laser();
    $laser->capacidade_toner = 100;
    echo  "Capacidade Toner: $laser->capacidade_toner"

?>