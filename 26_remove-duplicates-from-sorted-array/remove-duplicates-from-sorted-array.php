<?php


function removeDuplicates(&$nums) {
    if (empty($nums)) {
        return 0;
    }
    $j = 0;
    for($i = 0; $i < count($nums); ++$i) {
        if ($nums[$i] != $nums[$j]) {
            ++$j;
            $nums[$j] = $nums[$i];
        }
    }
    return $j + 1;
}

$nums = [1, 1, 2];
$len = removeDuplicates($nums);
var_dump($len);
var_dump($nums);