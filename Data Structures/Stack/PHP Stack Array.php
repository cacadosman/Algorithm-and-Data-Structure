<?php
//Author : Fadli Maulana (cacadosman)

class Stack{
  private $stackArray;
  private $top;

  public function __construct(){
    $this->stackArray = [];
    $this->top = -1;
  }

  public function push($key){
    $this->stackArray[++$this->top] = $key;
  }

  public function pop(){
    if($this->isEmpty()){
      $this->top = -1;
    }else{
      return $this->stackArray[$this->top--];
    }
  }

  public function isEmpty(){
    return ($this->top < 0);
  }
}

// === MAIN PROGRAM ===

$stack = new Stack();

$stack->push(10);
$stack->push(20);
echo $stack->pop() . " ";
echo $stack->pop() . " ";
$stack->push(30);
$stack->push(40);
echo $stack->pop() . " ";
echo $stack->pop() . " ";

?>
