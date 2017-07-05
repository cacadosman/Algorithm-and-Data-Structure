<?php

class Node{
    public $value, $left, $right;

    public function __construct($value)    {
        $this->value = $value;
    }

    public function min(){
      $node = $this;
      while ($node->left) {
          if (!$node->left) {
              break;
          }
          $node = $node->left;
      }
      return $node;
    }

    public function delete(){
        if ($this->left && $this->right) {
            $min = $this->right->min();
            $this->value = $min->value;
            $min->delete();
        } elseif ($this->right) {
            if ($this->parent->left === $this) {
                $this->parent->left = $this->right;
                $this->right->parent = $this->parent->left;
            } elseif ($this->parent->right === $this) {
                $this->parent->right = $this->right;
                $this->right->parent = $this->parent->right;
            }
            $this->parent = null;
            $this->right   = null;
        } elseif ($this->left) {
            if ($this->parent->left === $this) {
                $this->parent->left = $this->left;
                $this->left->parent = $this->parent->left;
            } elseif ($this->parent->right === $this) {
                $this->parent->right = $this->left;
                $this->left->parent = $this->parent->right;
            }
            $this->parent = null;
            $this->left   = null;
        } else {
            if ($this->parent->right === $this) {
                $this->parent->right = null;
            } elseif ($this->parent->left === $this) {
                $this->parent->left = null;
            }
            $this->parent = null;
        }
    }
}

class BST{
    public $root;

    public function __construct($value = null)    {
        if ($value !== null) {
            $this->root = new Node($value);
        }
    }

    public function insert($value){
      $node = $this->root;
      if (!$node) {
          return $this->root = new Node($value);
      }

      while($node) {
          if ($value > $node->value) {
              if ($node->right) {
                  $node = $node->right;
              } else {
                  $node = $node->right = new Node($value);
                  break;
              }
          } elseif ($value < $node->value) {
              if ($node->left) {
                  $node = $node->left;
              } else {
                  $node = $node->left = new Node($value);
                  break;
              }
          } else {
              break;
          }
      }
      return $node;
    }

    public function search($value)    {
        $node = $this->root;

        while($node) {
            if ($value > $node->value) {
                $node = $node->right;
            } elseif ($value < $node->value) {
                $node = $node->left;
            } else {
                break;
            }
        }
        return $node;
    }

    public function min(){
        if (!$this->root) {
            throw new Exception('Root is empty!');
        }
        $node = $this->root;
        return $node->min();
    }

    public function max(){
        if (!$this->root) {
            throw new Exception('Root is empty!');
        }
        $node = $this->root;
        return $node->max();
    }

    public function delete($value){
        $node = $this->search($value);
        if ($node) {
            $node->delete();
        }
    }

    public function inOrder(Node $node = null){
        if (!$node) {
            $node = $this->root;
        }
        if (!$node) {
            return false;
        }
        if ($node->left) {
            yield from $this->inOrder($node->left);
        }
        yield $node;
        if ($node->right) {
            yield from $this->inOrder($node->right);
        }
    }

}

// === MAIN PROGRAM ===

$bst = new BST(5);

$bst->insert(2);
$bst->insert(1);
$bst->insert(4);

$bst->insert(11);
$bst->insert(7);
$bst->insert(23);
$bst->insert(16);
$bst->insert(34);

foreach($bst->inOrder() as $node){
  echo "{$node->value} ";
}

?>
