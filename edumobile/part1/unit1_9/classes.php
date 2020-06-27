<?php

    require("helpers.php");

    pageTop();

    class circle {

        public $radius;

        function __construct($r) {
            $this->radius = $r;
        }

        function area() {
            return 3.14159 * $this->radius ** 2;
        }

    }

    $rad = 1;
    $aCircle = new circle($rad);

    echo "<p>The aread of the circle with radius $rad is " . $aCircle->area() . "</p>";

    pageBottom();

?>