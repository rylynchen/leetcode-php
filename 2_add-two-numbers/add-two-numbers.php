<?php

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $over = 0;
        $nodes = [];
        while (!is_null($l1) || !is_null($l2)) {
            $val = ($l1->val ?? 0) + ($l2->val ?? 0);
            if ($over > 0) {
                $val += 1;
                $over = 0;
            }
            $node = new ListNode();
            $node->val = $val % 10;
            if ($val >= 10) {
                $over = 1;
            }
            $nodes[] = $node;
            $l1 = is_null($l1) ? null : $l1->next;
            $l2 = is_null($l2) ? null : $l2->next;
        }
        if ($over > 0) {
            $node = new ListNode();
            $node->val = $over;
            $nodes[] = $node;
        }
        for($i = count($nodes) -1;$i>=0; --$i) {
            if (isset($nodes[$i - 1])) {
                $nodes[$i - 1]->next = $nodes[$i];
            }
        }
        $list = $nodes[0];
        return $list;
    }
}


$node3 = new ListNode(3);
$node4 = new ListNode(4, $node3);
$node2 = new ListNode(2, $node4);
$node_4 = new ListNode(4);
$node_6 = new ListNode(6, $node_4);
$node_5 = new ListNode(5, $node_6);


$s = new Solution();
var_dump($s->addTwoNumbers($node2, $node_5));
