<?php

// TIME: O(N)
// SPACE: O(N)

class Node {
    function __construct($val = 0) {
        $this->val = $val;
        $this->left = null;
        $this->right = null;
        $this->next = null;
    }
}

class Solution {
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        if (is_null($root)) {
            return null;
        }
        $queue = [$root];
        while (!empty($queue)) {
            $size = count($queue);
            for($i=0;$i<$size;++$i) {
                $node = array_shift($queue);
                if ($i < $size - 1) {
                    $node->next = $queue[0];
                }

                if (!is_null($node->left)) {
                    $queue[] = $node->left;
                }
                if (!is_null($node->right)) {
                    $queue[] = $node->right;
                }
            }
        }
        return $root;
    }
}

$n4 = new Node(4);
$n5 = new Node(5);
$n6 = new Node(6);
$n7 = new Node(7);

$n2 = new Node(2);
$n2->left = $n4;
$n2->right = $n5;

$n3 = new Node(3);
$n3->left = $n6;
$n3->right = $n7;

$n1 = new Node(1);
$n1->left = $n2;
$n1->right = $n3;

$s = new Solution();
var_dump($s->connect($n1));