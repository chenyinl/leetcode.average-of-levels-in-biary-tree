/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Float[]
     */
    function averageOfLevels($root) {
        $level = 0;
        $this->dfs($root, $level);
        //var_dump($this->result);
        $this->prepareReturn();
        return $this->toReturn;
    }
    function prepareReturn()
    {
        $this->toReturn=[];
        foreach($this->result as $r){
            $this->toReturn[]=$r['value']/$r['count'];
        }
    }
    private $result;
    private function dfs(?TreeNode &$node, int $level)
    {
        if($node==null) return;
        echo $node->val;
        echo "(".$level.")";
        if(!isset($this->result[$level])){
            $this->result[$level]=[
                'value'=>0,
                'count'=>0
            ];

            
        }
        $this->result[$level]['value']+=$node->val;
        $this->result[$level]['count']++;
        $level++;
        //echo $node->left->val;
        //echo $node->right->val;
        $this->dfs($node->left, $level);
        $this->dfs($node->right,$level);
    }
        
}
