<?php

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function detectCycle($head) {
        if (is_null($head) || is_null($head->next)) {
            return null;
        }
        $nodeI = $head;
        $nodeJ = $head;
        do {
            if (is_null($nodeI->next) || is_null($nodeJ->next) || is_null($nodeJ->next->next)) {
                return null;
            }
            $nodeI = $nodeI->next;
            $nodeJ = $nodeJ->next->next;
            if ($nodeI == $nodeJ) {
                break;
            }
        } while (1);
        $nodeJ = $head;
        while ($nodeJ != $nodeI) {
            $nodeI = $nodeI->next;
            $nodeJ = $nodeJ->next;
        }
        return $nodeJ;
    }
}

$node4 = new ListNode(-4);
$node0 = new ListNode(0);$node0->next = $node4;
$node2 = new ListNode(2);$node2->next = $node0;
$node3 = new ListNode(3);$node3->next = $node2;
$node4->next = $node2;

$s = new Solution();
var_dump($s->detectCycle($node3));