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
    $model = new Model();

    $service = new Service();

    $input1 = $model->getTestData1();

    $input2 = $model->getTestData2();

    $input3 = $model->getTestData3();

    $inputs = array($input1, $input2, $input3);

    try {
        foreach ($inputs as $input) {
            print_input($input);

            $result = $service->process_input($input);

            print_output($result);
        }
    } catch (Exception $exception) {
        echo 'Error message: ' . $exception->getMessage();
    }
}

/**
 * Print input
 * @param $input
 */
function print_input($input)
{
    echo 'Input:[';
    foreach ($input as $frame) {
        echo '[';
        foreach ($frame as $score) {
            echo $score;
            if (!($score === end($frame))) {
                echo ',';
            }
        }
        echo ']';
    }
    echo ']' . "\n\r";

}

/**
 * Print output.
 * @param $output
 */
function print_output($output)
{

    echo 'Output:[';
    foreach ($output as $value) {
        echo $value;
        if (!($value === end($output))) {
            echo ',';
        }
    }
    echo ']' . "\n\r";
}

entry();