<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}


class Solution {

    private $list;

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal(TreeNode $root) : array {
        $this->help($root);
        return $this->list;
    }

    function help(?TreeNode $node) {
        if (is_null($node)) {
            return;
        }
        if (!is_null($node->left)) {
            $this->help($node->left);
        }
        if (!is_null($node->right)) {
            $this->help($node->right);
        }
        $this->list[] = $node->val;
    }
}

$n3 = new TreeNode(3);
$n2 = new TreeNode(2, $n3);
$n1 = new TreeNode(1, null, $n2);

$s = new Solution();

var_dump($s->postorderTraversal($n1));



