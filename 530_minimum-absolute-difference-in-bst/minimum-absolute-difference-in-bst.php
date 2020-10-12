<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

class Solution {

    private $vals;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function getMinimumDifference($root) {
        if (is_null($root)) {
            return 0;
        }
        $min = PHP_INT_MAX;
        $this->vals = [];
        $this->midSort($root);
        if (count($this->vals) < 2) {
            return $this->vals[0];
        }
        sort($this->vals);
        for($i=0;$i<count($this->vals) - 1;$i++) {
            $min = min($min, abs($this->vals[$i] - $this->vals[$i + 1]));
        }
        return $min;
    }

    function midSort($node) {
        if (is_null($node)) {
            return;
        }
        if (!is_null($node->left)) {
            $this->midSort($node->left);
        }
        $this->vals[] = $node->val;
        if (!is_null($node->right)) {
            $this->midSort($node->right);
        }
    }
}

$n911 = new TreeNode(911);
$n227 = new TreeNode(227);
$n227->right = $n911;

$n701 = new TreeNode(701);
$n104 = new TreeNode(104);
$n104->right = $n701;

$n236 = new TreeNode(236);
$n236->right = $n227;
$n236->left = $n104;

$s = new Solution();
var_dump($s->getMinimumDifference($n236));