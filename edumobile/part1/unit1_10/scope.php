<?php

    require("helpers.php");

    pageTop();

    $num = 4;

    function setNum() {
        global $num;
        $num = 5;
        echo "\$num inside setNum is $num<br/>";
    }
    echo "\$num before calling setNum is $num<br/>";
    setNum();
    echo "\$num after calling setNum is $num<br/>";

    pageBottom();

?>