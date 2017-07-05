<?php

class Queue{
  private $queue;
  private $front;
  private $rear;
  private $n;

  public function __construct(){
    $this->queue = [];
    $this->front = 0;
    $this->rear = -1;
    $this->n = 0;
  }

  public function enqueue($data) {
    $this->queue[++$this->rear] = $data;
    $this->n++;
  }

  public function dequeue(){
    if($this->n > 0){
      $temp = $this->queue[$this->front++];
      $this->n--;
      return $temp;
    }
  }

  public function isEmpty(){
    return $this->n == 0;
  }

  public function size(){
    return $this->n;
  }

}

// === MAIN PROGRAM ===

$queue = new Queue();
$queue->enqueue(10);
$queue->enqueue(20);
echo $queue->dequeue() . " ";
echo $queue->dequeue() . " ";
$queue->enqueue(30);
$queue->enqueue(40);
echo $queue->dequeue() . " ";
echo $queue->dequeue() . " ";

?>
