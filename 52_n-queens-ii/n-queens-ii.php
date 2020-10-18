<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function totalNQueens($n) {
        $cols = [];
        $diagonals1 = [];
        $diagonals2 = [];
        return $this->backtrack($n, 0, $cols, $diagonals1, $diagonals2);
    }

    function backtrack($n, $row, $cols, $diagonals1, $diagonals2) {
        if ($row == $n) {
            return 1;
        } else {
            $count = 0;
            for ($i = 0;$i<$n;$i++) {
                if (in_array($i, $cols)) {
                    continue;
                }
                $diagonal1 = $row - $i;
                if (in_array($diagonal1, $diagonals1)) {
                    continue;
                }
                $diagonal2 = $row + $i;
                if (in_array($diagonal2, $diagonals2)) {
                    continue;
                }
                $cols[] = $i;
                $diagonals1[] = $diagonal1;
                $diagonals2[] = $diagonal2;
                $count += $this->backtrack($n, $row + 1, $cols, $diagonals1, $diagonals2);
                array_pop($cols);
                array_pop($diagonals1);
                array_pop($diagonals2);
            }
            return $count;
        }
    }
}

$n = 4;
$s = new Solution();
var_dump($s->totalNQueens($n));