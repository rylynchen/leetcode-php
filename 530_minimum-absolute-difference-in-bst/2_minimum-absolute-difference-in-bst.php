<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

class Solution {

    private $pre;
    private $min;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function getMinimumDifference($root) {
        if (is_null($root)) {
            return 0;
        }
        $this->min = PHP_INT_MAX;
        $this->pre = -1;
        $this->midSort($root);
        return $this->min;
    }

    function midSort($node) {
        if (is_null($node)) {
            return;
        }
        $this->midSort($node->left);
        if ($this->pre == -1) {
            $this->pre = $node->val;
        } else {
            $this->min = min($this->min, abs($this->pre - $node->val));
            $this->pre = $node->val;
        }
        $this->midSort($node->right);
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