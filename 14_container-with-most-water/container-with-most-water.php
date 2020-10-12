<?php


class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        if (count($height) < 2) {
            return 0;
        }
        $i = 0;
        $j = count($height) - 1;
        $max = 0;
        while ($i < $j) {
            $area = ($j - $i) * min($height[$i], $height[$j]);
            if ($area > $max) {
                $max = $area;
            }
            if ($height[$i] < $height[$j]) {
                ++$i;
            } else {
                --$j;
            }

        }
        return $max;
    }
}

$height = [1,8,6,2,5,4,8,3,7];
$s = new Solution();
var_dump($s->maxArea($height));