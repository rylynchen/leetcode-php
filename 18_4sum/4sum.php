<?php


class Solution
{
    public function fourSum($nums, $target)
    {
        $n = count($nums);
        if ($n < 4) return [];
        sort($nums);

        $ans = [];
        for ($i = 0; $i <= $n - 4; ++$i) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue;
            for ($j = $i + 1; $j <= $n - 3; ++$j) {
                if ($j > $i + 1 && $nums[$j] == $nums[$j - 1]) continue;
                $left = $j + 1;
                $right = $n - 1;
                while ($left < $right) {
                    $sum = $nums[$i] + $nums[$j] + $nums[$left] + $nums[$right];
                    if ($sum == $target) {
                        $ans[] = [$nums[$i], $nums[$j], $nums[$left], $nums[$right]];
                        while ($left < $right && $nums[$left + 1] == $nums[$left]) $left++;
                        while ($left < $right && $nums[$right - 1] == $nums[$right]) $right--;
                        $left++;
                        $right--;
                    } elseif ($sum > $target) {
                        $right--;
                    } else {
                        $left++;
                    }
                }

            }
        }

        return $ans;
    }
}

$nums = [1, 0, -1, 0, -2, 2];
$target = 0;
$s = new Solution();
var_dump($s->fourSum($nums, $target));