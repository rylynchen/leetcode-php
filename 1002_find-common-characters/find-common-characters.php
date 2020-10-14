<?php

class Solution
{

    /**
     * @param String[] $A
     * @return String[]
     */
    function commonChars($A)
    {
        if (empty($A)) {
            return [];
        }
        $map = [];
        foreach ($A as $j => $word) {
            $wordMap = [];
            for ($i = 0; $i < strlen($word); ++$i) {
                $letter = $word[$i];
                if(!isset($wordMap[$letter])) {
                    $wordMap[$letter] = 0;
                }
                ++$wordMap[$letter];
            }
            if ($j == 0) {
                $map = $wordMap;
            } else {
                foreach ($map as $letter => $n) {
                    if (!isset($wordMap[$letter])) {
                        unset($map[$letter]);
                    } else {
                        $map[$letter] = min($n, $wordMap[$letter]);
                    }
                }
            }
        }
        $list = [];
        foreach ($map as $letter => $n) {
            for ($i=0;$i<$n;++$i) {
                $list[] = $letter;
            }
        }
        return $list;
    }
}

$a = ["bella", "label", "roller"];
$a = ["cool","lock","cook"];
$s = new Solution();
var_dump($s->commonChars($a));