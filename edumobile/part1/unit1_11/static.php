<?php

    require("helpers.php");

    pageTop();

    class Counted {

        public static $_count = 0;

        function __construct() {
            self::$_count++;

        }

        function __destruct() {
            self::$_count--;
        }

    }

    function makeObject() {
        $counted = new Counted();
        echo "Instances counted: " . Counted::$_count . "<br/>";
    }

    echo "Making three instances of Counted with makeObject()<br/>";
    makeObject();
    makeObject();
    makeObject();
    echo "Outside of the call to makeObject, there are ".Counted::$_count." instances of Counted<br/>";
    echo "<br/>";

    echo "Making \$count1<br/>";
    $count1 = new Counted();
    echo "Instances of Counted: ".Counted::$_count."<br/>";
    echo "<br/>";

    echo "Making \$count2<br/>";
    $count2 = new Counted();
    echo "Instances of Counted: ".Counted::$_count."<br/>";
    echo "<br/>";

    echo "Making \$count3<br/>";
    $count3 = new Counted();
    echo "Instances of Counted: ".Counted::$_count."<br/>";
    echo "<br/>";

    //Not required by PHP, as these vairables will be unset automatically

    echo "Unsetting/freezing \$count3<br/>";
    unset($count3);
    echo "Instances of Counted: ".Counted::$_count."<br/>";
    echo "<br/>";

    echo "Unsetting/freezing \$count2<br/>";
    unset($count2);
    echo "Instances of Counted: ".Counted::$_count."<br/>";
    echo "<br/>";

    echo "Unsetting/freezing \$count1<br/>";
    unset($count1);
    echo "Instances of Counted: ".Counted::$_count."<br/>";
    echo "<br/>";

    pageBottom();

?>