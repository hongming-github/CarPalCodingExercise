<?php
/**
 * Created by PhpStorm.
 * User: zhm
 * Date: 2017/11/28
 * Time: 下午11:45
 */

/**
 * Class Validator
 */
class Validator
{
    /**
     * Validator for the service.
     * @param $input
     * @throws Exception
     */
    function validate_input($input)
    {
        if (!is_array($input)) {
            throw new Exception('Input is not an array!');
        } else {
            foreach ($input as $value) {
                if (!is_array($value)) {
                    throw new Exception('Input is not an array of array!');
                }
            }
        }
    }
}

