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

    private $nodes;

    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function insertIntoBST($root, $val) {
        $this->findNode($root);
    }

    function findNode($root) {
        if (is_null($root->left) || is_null($root->right)) {
            $this->nodes[] = $root;
        }
        if (is_null($root->left) && is_null($root->right)) {
            return;
        }
        $this->findNode($root->left);
        $this->findNode($root->right);
    }
}

$n1 = new TreeNode(1);
$n3 = new TreeNode(3);
$n2 = new TreeNode(2, $n1, $n3);
$n7 = new TreeNode(7);
$n4 = new TreeNode(4, $n2, $n7);

var_dump($n4);
