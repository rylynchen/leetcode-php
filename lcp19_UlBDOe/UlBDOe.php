<?php

class Solution {

    /**
     * @param String $leaves
     * @return Integer
     */
    function minimumOperations($leaves) {
        $f = [];
        $f[0] = [
            0 => $leaves[0] == 'y' ? 1 : 0
        ];
        $f[0] = [
            1 => PHP_INT_MAX,
            2 => PHP_INT_MAX,
        ];
        $f[1] = [
            2 => PHP_INT_MAX,
        ];
        for ($i = 1; $i < strlen($leaves); ++$i) {
            $isRed = $leaves[$i] == 'r' ? 1: 0;
            $isYellow = $leaves[$i] == 'y' ? 1: 0;
            $f[$i][0] = $f[$i - 1][0] + $isYellow;
            $f[$i][1] = min($f[$i - 1][0], $f[$i - 1][1]) + $isRed;
            if ($i >= 2) {
                $f[$i][2] = min($f[$i - 1][1],$f[$i - 1][2]) + $isYellow;
            }
        }
        return $f[strlen($leaves) - 1][2];
    }
}

$s = new Solution();
$leaves = '"yry"';
var_dump($s->minimumOperations($leaves));