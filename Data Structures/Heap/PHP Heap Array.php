<?php

class HeapArray{

  private $n;

  public function create(&$arr){
    $this->n = count($arr)-1;
    for($i=$this->n/2; $i >=0; $i--){
      $this->heap($arr, $i);
    }
  }

  public function heap(&$arr, $i){
    $left = 2*$i;
    $right = 2*$i + 1;
    $max = $i;
    if($left <= $this->n && $arr[$left] > $arr[$i])
      $max = $left;
    if($right <= $this->n && $arr[$right] > $arr[$max])
      $max = $right;
    if($max != $i){
      $this->swap($arr, $i, $max);
      $this->heap($arr, $max);
    }
  }

  public function swap(&$arr, $i, $j){
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
  }

}

// === MAIN PROGRAM ===

$array = [10,50,20,60,100,30,70,40,50];

$heap = new HeapArray();
$heap->create($array);

print_r($array);

?>
