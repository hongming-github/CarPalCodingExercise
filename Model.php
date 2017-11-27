<?php
/**
 * Created by PhpStorm.
 * User: zhm
 * Date: 2017/11/25
 * Time: 上午12:05
 */

class Model
{
    function sayHello()
    {
        echo "Hello World";
    }


    function myTest()
    {
        static $x = 0;
        echo $x;
        $x++;
    }

    function getInput()
    {
        $frames = array
        (
            array(5, 2),
            array(8, 1),
            array(6, 4),
//            array(10),
//            array(10),
//            array(10),
            array(10),
            array(0, 5),
            array(2, 6),
            array(8, 1),
//            array(5, 3),
//            array(6, 1),
            array(10),
            array(10),
            array(10, 10, 6)
        );
        return $frames;
    }
}

