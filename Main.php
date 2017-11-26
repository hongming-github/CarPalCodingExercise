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

    $result = processInput($frames);
    for ($row = 0; $row < 10; $row++) {
        echo $result[$row] . " ";
    }
}

function processInput($input)
{
    $result = array();
    $total_score = 0;

    for ($frame = 0; $frame < 10; $frame++) {
//        echo "Frame number" . $frame;
//        echo "\n";
        for ($throw = 0; $throw < 3; $throw++) {
//            echo $input[$frame][$throw];
//            echo "\n";
            $current_score = $input[$frame][$throw];

            $total_score += $current_score;
            if ($current_score > 10 || $current_score < 0) {
//                echo "Invalid score!";
//                echo "\n";
            } else if ($current_score == 10) {
                for ($t = $frame + 1; $t < $frame + 3 && $t < 10; $t++) {
                    for (; $throw < 3; $throw++) {
                        $total_score += $input[$t][$throw];
                        if ($input[$t][$throw] == 10) {
                            for (; $throw < 3; $throw++) {
                                $total_score += $input[$t + 1][$throw];
                            }

                        }
                    }
                }
            } else {

            }

        }
        array_push($result, $total_score);
    }
    return $result;
}

entry();