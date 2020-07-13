<?php
    $action = (string)$_POST['action'];

    if("getD" == $action) {
        require_once("../dependencies/simplexlsx.class.php");
        set_time_limit(0);
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', true);

        if ( $xlsx = SimpleXLSX::parse('../data/data.xlsx') ) {
            $arr = $xlsx->rows();
            unset($arr[0]);
            $x = [];
            $y = [];
            $w = [];
            foreach ($arr as &$value) {
                array_push($x, $value[0]);
                array_push($y, $value[1]);
                array_push($w, $value[2]);
            }
            $result = [];
            array_push($result, $x);
            array_push($result, $y);
            array_push($result, $w);
            echo(json_encode($result));
        } else {
         	echo SimpleXLSX::parse_error();
        }
    }
?>