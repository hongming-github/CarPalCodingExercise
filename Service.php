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
        // Validate input.
        $this->validator->validate_input($input);

        $result = array();

        $total_score = 0;

        for ($frame = 0; $frame < count($input); $frame++) {
            // Sum score of each frame.
            $total_score += $this->calculate_frame_score($input, $frame);

            array_push($result, $total_score);
        }
        return $result;
    }

    /**
     * Calculate score for each frame.
     * @param $input
     * @param $frame
     * @param int $index
     * @return int $frame_score
     * @throws Exception
     */
    function calculate_frame_score($input, $frame, $index = 0)
    {
        $frame_score = 0;

        foreach ($input[$frame] as $current_score) {
            // Validate score.
            $this->validator->validate_score($current_score);

            $frame_score += $current_score;
            // If it is a strike and haven't got another two additional score from next frames(based on example 1)
            // and is not last frame, then the bowler can get additional score from next frames.
            if ($current_score == 10 && $index < 2 && $frame < count($input) - 1) {
                $frame_score += $this->calculate_frame_score($input, $frame + 1, ++$index);
            }

        }
        return $frame_score;
    }
}