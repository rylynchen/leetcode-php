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
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        $length = 0;
        $node = $head;
        while ($node) {
            $node = $node->next;
            ++$length;
        }
        $d = new ListNode(0, $head);
        $cur = $d;
//        $pre = null;
        for($i = 1;$i < $length - $n + 1; ++$i) {
//            $pre = $cur;
            $cur = $cur->next;
        }
//        $pre->next = $cur->next;
        $cur->next = $cur->next->next;
        return $d->next;
    }
}

$n5 = new ListNode(5);
$n4 = new ListNode(4, $n5);
$n3 = new ListNode(3, $n4);
$n2 = new ListNode(2, $n3);
$n1 = new ListNode(1, $n2);
$n = 2;

$s = new Solution();
var_dump($s->removeNthFromEnd($n1, $n));