<?php
/**
 * Created by PhpStorm.
 * User: zhm
 * Date: 2017/11/25
 * Time: 上午12:05
 */

/**
 * Class Model
 */
class Model
{
    /**
     * This test data will test if the data fulfil
     * ($current_score === 10 && $index < 2 && $frame < count($input) - 1) and
     * ($current_score === 10 && $index < 2 && $frame >= count($input) - 1) and
     * ($current_score !== 10 && $index < 2 && $frame < count($input) - 1) conditions
     * the expected result should be
     * [7,16,26,41,46,54,63,71,78,96]
     * @return array
     */
    function getTestData1()
    {
        $frames = array
        (
            array(5, 2),
            array(8, 1),
            array(6, 4),
            array(10),
            array(0, 5),
            array(2, 6),
            array(8, 1),
            array(5, 3),
            array(6, 1),
            array(10, 2, 6)
        );
        return $frames;
    }

    /**
     * This test data will test if the data fulfil
     * ($current_score !== 10 && $index < 2 && $frame >= count($input) - 1) condition
     * the expected result should be
     * [7,16,20,25,30,38,47,55,62,70]
     * @return array
     */
    function getTestData2()
    {
        $frames = array
        (
            array(5, 2),
            array(8, 1),
            array(1, 3),
            array(2, 3),
            array(0, 5),
            array(2, 6),
            array(8, 1),
            array(5, 3),
            array(6, 1),
            array(2, 6)
        );
        return $frames;
    }

    /**
     * This test data will test if the data fulfil
     * ($current_score === 10 && $index >= 2 && $frame < count($input) - 1) condition,
     * the expected result should be
     * [30,60,85,100,105,113,122,159,186,203]
     * @return array
     */
    function getTestData3()
    {
        $frames = array
        (
            array(10),
            array(10),
            array(10),
            array(10),
            array(0, 5),
            array(2, 6),
            array(8, 1),
            array(10),
            array(10),
            array(10, 2, 5)
        );
        return $frames;
    }
}

