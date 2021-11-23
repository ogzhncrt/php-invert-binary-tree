<?php 

	class tree_node {
		public $value      = "";
		public $left_node  = null;
		public $right_node = null;

		function __construct($value) { 
			$this->value = $value; 
		}
	}

	/*
		Algorithm Preorder(tree)
   			1. Visit the root.
   			2. Traverse the left subtree, i.e., call preorder_print(left_node)
   			3. Traverse the right subtree, i.e., call preorder_print(right_node) 
   */

	function preorder_print($root) {
		if(!$root)
			return;

		echo $root->value." ";

		preorder_print($root->left_node);
		preorder_print($root->right_node);
	}


	/*
		Algorithm invert (tree)
   			1. Visit the root.
   			2. Swap left-side and right-side of the root
   			3. invert the left subtree, i.e., call invert_tree(left_node)
   			4. invert the right subtree, i.e., call invert_tree(right_node) 
   */

	function invert_tree($root) {
		$tmp_left  = $root->left_node; //store
        $tmp_right = $root->right_node;

        $root->left_node  = $tmp_right;
        $root->right_node = $tmp_left;

        if($root->left_node){
            invert_tree($root->left_node);
        }
        
        if($root->right_node){
            invert_tree($root->right_node);
        }
        
        return $root;
	}

	
	/* GENERATE SAMPLE - START */

	$root = new tree_node(3);

	$root->left_node  = new tree_node(5);
	$root->right_node = new tree_node(6);

	$root->right_node->left_node = new tree_node(7);
	$root->left_node->right_node = new tree_node(12);

	/* GENERATE SAMPLE - END */


	preorder_print($root); //print to see current situation of the tree

 	$root = invert_tree($root);

 	preorder_print($root);

?>