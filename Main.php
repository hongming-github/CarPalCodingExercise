<?php
/**
 * Created by PhpStorm.
 * User: zhm
 * Date: 2017/11/25
 * Time: 下午12:03
 */
require 'Model.php';

function entry()
{
    $t = new Model;

    $frames = $t->getInput();

//    for ($row = 0; $row < 10; $row++) {
//        echo "Row number" . $row;
//        echo "\n";
//        for ($col = 0; $col < 3; $col++) {
//            echo $frames[$row][$col];
//            echo "\n";
//        }
//    }
    $start_time = microtime(true);
    $result1 = processInput1($frames);
    $end_time = microtime(true);
    echo "ProcessInput1 Time uses:" . ($end_time - $start_time);
    for ($row = 0; $row < 10; $row++) {
        echo 'result1:' . $result1[$row] . " ";
    }
    echo "\n";

    $start_time = microtime(true);
    $result2 = processInput2($frames);
    $end_time = microtime(true);
    echo "ProcessInput2 Time uses:" . ($end_time - $start_time);
    for ($row = 0; $row < 10; $row++) {
        echo 'result2:' . $result2[$row] . " ";
    }
}


function processInput1($input)
{
    $result = array();

    $total_score = 0;

    for ($frame = 0; $frame < 10; $frame++) {

        foreach ($input[$frame] as $current_score) {

            if ($current_score > 10 || $current_score < 0) {
                echo "Invalid score!";
                echo "\n";
            } else {
                $total_score += $current_score;
                if ($current_score == 10) {

                    foreach ($input[$frame + 1] as $next_score) {

                        $total_score += $next_score;
                        if ($next_score == 10) {

                            foreach ($input[$frame + 2] as $score) {
                                $total_score += $score;
                            }
                        }
                    }
                }
            }
        }
        array_push($result, $total_score);
    }
    return $result;
}

function addAdditionalScore($current_score, $arr, $frame)
{
    $additional_score = 0;
    $t=0;
    if ($current_score != 10) return $additional_score;
    if ($current_score == 10) {
        $t++;
        foreach ($arr[$frame+$t] as $score) {
            $additional_score += $score;
            $additional_score+=addAdditionalScore($score, $arr, $frame+2);
        }
        return $additional_score;
    }
}

function processInput2($input)
{
    $result = array();

    $total_score = 0;

//    for ($frame = 0; $frame < 10; $frame++) {
////        echo "Frame number" . $frame;
////        echo "\n";
//        for ($throw = 0; $throw < 3; $throw++) {
////            echo $input[$frame][$throw];
////            echo "\n";
//            $current_score = $input[$frame][$throw];
//
//            if ($current_score > 10 || $current_score < 0) {
//                echo "Invalid score!";
//                echo "\n";
//            } else {
//                $total_score += $current_score;
//
//                if ($current_score == 10) {
//                    for (; $throw < 3; $throw++) {
//                        $next_score = $input[$frame + 1][$throw];
//                        $total_score += $next_score;
//                        if ($next_score == 10) {
//                            for (; $throw < 3; $throw++) {
//                                $total_score += $input[$frame + 2][$throw];
//                            }
//
//                        }
//                    }
//                }
//            }
//
//        }
//        array_push($result, $total_score);
//    }
    for ($frame = 0; $frame < 10; $frame++) {

        foreach ($input[$frame] as $current_score) {

            if ($current_score > 10 || $current_score < 0) {
                echo "Invalid score!";
                echo "\n";
            } else {
                $total_score += $current_score;
                $total_score += addAdditionalScore($current_score,$input,$frame);
            }
        }
        array_push($result, $total_score);
    }
    return $result;
}

function arr_foreach($arr)
{
    if (!is_array($arr)) {
        return false;
    }

    foreach ($arr as $key => $val) {
        if (is_array($val)) {
            arr_foreach($val);
        } else {
            echo 'key:' . $key . 'val:' . $val . ' ';
            echo "\n";
            echo '$arr:' . $arr[$key + 1];
        }
        echo "\n";
    }
}

entry();