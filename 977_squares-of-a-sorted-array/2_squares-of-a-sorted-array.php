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
        $squareArr = [];
        $len = count($A);
        for($i =0,$j = $len -1,$pos = $len - 1, $pos = $len - 1; $pos >= 0;) {
            $powI = pow($A[$i], 2);
            $powJ = pow($A[$j], 2);
            if ($i == $j) {
                array_unshift($squareArr, $powI);
                break;
            }
            if ($powI >= $powJ) {
                array_unshift($squareArr, $powI);
                ++$i;
                --$pos;
            }
            if ($powI <= $powJ) {
                array_unshift($squareArr, $powJ);
                --$j;
                --$pos;
            }
        }
        return $squareArr;
    }
}

$A = [-4, -1, 0, 3, 10];
$A = [-4,-1,0,3,10];
$s = new Solution();
var_dump($s->sortedSquares($A));