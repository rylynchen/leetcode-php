<?php

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{

    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function insertIntoBST($root, $val)
    {
        if (is_null($root)) {
            return new TreeNode($val);
        }
        $pos = $root;
        while (!is_null($pos)) {
            if ($val < $pos->val) {
                if (is_null($pos->left)) {
                    $pos->left = new TreeNode($val);
                    break;
                } else {
                    $pos = $pos->left;
                }
            } else {
                if (is_null($pos->right)) {
                    $pos->right = new TreeNode($val);
                    break;
                } else {
                    $pos = $pos->right;
                }
            }
        }
        return $root;
    }
}

$n1 = new TreeNode(1);
$n3 = new TreeNode(3);
$n2 = new TreeNode(2, $n1, $n3);
$n7 = new TreeNode(7);
$n4 = new TreeNode(4, $n2, $n7);

var_dump($n4);
