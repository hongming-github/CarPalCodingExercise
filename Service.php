<?php
/**
 * Created by PhpStorm.
 * User: zhm
 * Date: 2017/11/29
 * Time: 上午12:02
 */

require 'Validator.php';

/**
 * Class Service
 */
class Service
{
    var $validator;

    /**
     * Service constructor.
     */
    function __construct()
    {
        $this->validator = new Validator();
    }

    /**
     * Process data, main business logic.
     * @param $input
     * @return array
     * @throws Exception
     */
    function process_input($input)
    {
        $this->validator->validate_input($input);

        $result = array();

        $total_score = 0;

        for ($frame = 0; $frame < 10; $frame++) {

            foreach ($input[$frame] as $current_score) {
                if ($current_score > 10 || $current_score < 0) {
                    throw new Exception('');
                } else {
                    $total_score += $current_score;

                    if ($current_score == 10) {
                        foreach ($input[$frame + 1] as $next_score) {
                            if ($next_score > 10 || $next_score < 0) {
                                throw new Exception('');
                            } else {
                                $total_score += $next_score;

                                if ($next_score == 10) {
                                    foreach ($input[$frame + 2] as $next_next_score) {
                                        if ($next_next_score > 10 || $next_next_score < 0) {
                                            throw new Exception('');
                                        } else {
                                            $total_score += $next_next_score;
                                        }
                                    }
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

    function calculate_frame_score($input, $frame, $index = 0)
    {
        $frame_score = 0;

        foreach ($input[$frame] as $current_score) {
            if ($current_score > 10 || $current_score < 0) {
                throw new Exception('');
            } else {
                $frame_score += $current_score;

                if ($current_score == 10 && $index < 3) {
                    $index++;
                    return $this->calculate_frame_score($input, $frame + $index, $index);
                }
            }
        }
    }

    function addAdditionalScore($current_score, $arr, $frame)
    {
        $additional_score = 0;
        $t = 0;
        if ($current_score != 10) return $additional_score;
        if ($current_score == 10) {
            $t++;
            foreach ($arr[$frame + $t] as $score) {
                $additional_score += $score;
                $additional_score += addAdditionalScore($score, $arr, $frame + 2);
            }
            return $additional_score;
        }
    }
}