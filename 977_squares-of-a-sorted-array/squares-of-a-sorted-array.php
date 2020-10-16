<?php

class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    function sortedSquares($A)
    {
        if (empty($A)) {
            return [];
        }
        $negativeArr = [];
        $positiveArr = [];
        foreach ($A as $n) {
            if ($n >= 0) {
                array_push($positiveArr, $n);
            } else {
                array_unshift($negativeArr, $n);
            }
        }
        $squareArr = [];
        while (count($positiveArr) || count($negativeArr)) {
            if (empty($positiveArr)) {
                array_push($squareArr, pow(array_shift($negativeArr), 2));
                continue;
            }
            if (empty($negativeArr)) {
                array_push($squareArr, pow(array_shift($positiveArr), 2));
                continue;
            }
            if (current($positiveArr) < abs(current($negativeArr))) {
                array_push($squareArr, pow(array_shift($positiveArr), 2));
            } elseif (current($positiveArr) == abs(current($negativeArr))) {
                array_push($squareArr, pow(array_shift($positiveArr), 2));
                array_push($squareArr, pow(array_shift($negativeArr), 2));
            } else {
                array_push($squareArr, pow(array_shift($negativeArr), 2));
            }
        }
        return $squareArr;
    }
}

$A = [-4, -1, 0, 3, 10];
$s = new Solution();
var_dump($s->sortedSquares($A));