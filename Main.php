<?php
/**
 * Created by PhpStorm.
 * User: zhm
 * Date: 2017/11/25
 * Time: 下午12:03
 */
require 'Model.php';
require 'Service.php';

function entry()
{
    $data = new Model();

    $service = new Service();

    $frames = $data->getInput();

//    for ($row = 0; $row < 10; $row++) {
//        echo "Row number" . $row;
//        echo "\n";
//        for ($col = 0; $col < 3; $col++) {
//            echo $frames[$row][$col];
//            echo "\n";
//        }
//    }
    try {
        $result = $service->process_input($frames);
        echo "\n";
        for ($row = 0; $row < 10; $row++) {
            echo 'result:' . $result[$row] . " ";
        }
    } catch (Exception $exception) {
        echo 'Error message: ' . $exception->getMessage();
    }


}

entry();