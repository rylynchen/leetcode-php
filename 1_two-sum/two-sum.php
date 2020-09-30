<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $result = [];
        $map = [];
        foreach ($nums as $i => $v) {
            $m = $target - $v;
            if (array_key_exists($m, $map)) {
                return [$map[$m], $i];
            } else {
                $map[$v] = $i;
            }
        }
        return $result;
    }
}

$nums = [2, 7, 11, 15];
$target = 9;

$s = new Solution();
var_dump($s->twoSum($nums, $target));