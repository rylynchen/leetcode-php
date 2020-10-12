<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums) {
        if (count($nums) < 2) {
            return false;
        }
        $sum = array_sum($nums);
        if ($sum % 2 == 1) {
            return false;
        }
        $target = $sum / 2;
        $dp = [];
        if ($nums[0] < $target) {
            $dp[0][$nums[0]] = true;
        }
        for ($i = 1; $i< count($nums);$i++) {
            for ($j = 0; $j <= $target; $j++) {
                if (!isset($dp[$i])) {
                    $dp[$i] = [];
                }
                $dp[$i][$j] = $dp[$i - 1][$j] ?? false;
                if ($nums[$i] == $j) {
                    $dp[$i][$j] = true;
                    continue;
                }
                if ($nums[$i] < $j) {
                    $dp[$i][$j] = ($dp[$i - 1][$j] ?? false) || ($dp[$i - 1][$j - $nums[$i]] ?? false);
                }
            }
        }
        return $dp[count($nums) - 1][$target];
    }
}

$nums = [1, 5, 11, 5];
$nums = [2, 2, 3, 5];
$s = new Solution();
var_dump($s->canPartition($nums));