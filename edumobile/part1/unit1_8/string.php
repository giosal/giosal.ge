<?php

    require("helpers.php");

    pageTop();

    $greeting = "hello";
    $say_bye = "have a nice day";

    echo "<p>\"$greeting\" has ". strlen($greeting) ." characters</p>";
    echo "<p>\"$say_bye\" has ". str_word_count($say_bye) ." words</p>";
    echo "<p>\"$greeting\" backwards is \"". strrev($greeting) ."\"</p>";

    $word = "wonderful";

    if ($pos = strpos($say_bye, $word)) {
        echo "<p>\"$word\" is at position $pos in \"$say_bye\"</p>";
    } else {
        echo "<p>\"$word\" is not found in \"$say_bye\"</p>";
    }

    $say_bye = str_replace("nice", $word, $say_bye);

    echo "<p>$say_bye</p>";

    pageBottom();

?>