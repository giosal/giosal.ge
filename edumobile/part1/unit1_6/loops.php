<?php

    $topWrapper = "<html><head><title>Loops</title></head><body>";
    $bottomWrapper = "</body></html>";
    $num = 0;

    echo $topWrapper;

    echo "<h3>while \$num &lt;= 5</h3>";
    while ($num <= 5) {
        echo "<h3>$num</h3>";
        $num++;
    }

    echo "<h3>do while \$num &lt; 5</h3>";
    do {
        echo "<h3>$num</h3>";
        $num++;
    } while ($num <= 5);

    echo "<h3>for each value of \$num &gt; 0, decrementing</h3>";
    for ($num; $num > 0; $num--) {
        echo "<h3>$num</h3>";
    }

    $numbers = array("one", "two", "three");

    echo "<h3>foreach in array(\"one\", \"two\", \"three\")</h3>";
    foreach ($numbers as $number) {
        echo "<h3>$number</h3>";
    }

    echo $bottomWrapper;
?>