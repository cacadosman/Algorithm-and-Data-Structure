<?php
//Author : Fadli Maulana (cacadosman)

class Node {
	public $data = NULL;
	public $next = NULL;

	public function __construct($data = NULL) {
		$this->data = $data;
	}
}

class LinkedList{
  private $head = NULL;
	private $tail = NULL;

  public function isEmpty(){
    return $this->head==NULL;
  }

// Insert node at the beginning of the list.
  public function addFirst($data){
    $input = new Node($data);
    if($this->isEmpty()){
      $this->head = &$input;
      $this->tail = &$input;
    }else{
      $input->next = $this->head;
      $this->head = &$input;
    }
  }

// Insert node at the end of the list.
  public function addLast($data){
    $input = new Node($data);
    if($this->isEmpty()){
      $this->head = &$input;
      $this->tail = &$input;
    }else{
      $this->tail->next = &$input;
      $this->tail = &$input;
    }
  }

//  Insert node after the node that matches the query.
  public function insertAfter($key, $data){
    $input = new Node($data);
    $temp = $this->head;
    while($temp != NULL){
      if($temp->data == $key){
        $input->next = $temp->next;
        $temp->next = &$input;
        break;
      }
      $temp = $temp->next;
    }
  }

// Insert node before the node that matches the query.
  public function insertBefore($key, $data){
    $input = new Node($data);
    $temp = $this->head;
    while($temp != NULL){
      if(($temp->data == $key) && ($temp == $this->head)){
        $this->addFirst($input);
        break;
      }elseif($temp->next->data == $key){
        $input->next = $temp->next;
        $temp->next = &$input;
        break;
      }
      $temp = $temp->next;
    }
  }

// Delete the first node in the list.
  public function removeFirst(){
    if(!$this->isEmpty()){
      if($this->tail === $this->head){
        $this->head = $this->tail = NULL;
      }else{
        $this->head = $this->head->next;
      }
    }
  }

// Delete the last node in the list.
  public function removeLast(){
    $temp = $this->head;
    if(!$this->isEmpty()){
      if($this->tail === $this->head){
        $this->head = $this->tail = NULL;
      }else{
        while($temp->next != $this->tail){
          $temp = $temp->next;
        }
        $temp->next = NULL;
        $this->tail = &$temp;
      }
    }
  }

// Delete the node that matches the query.
  public function remove($key){
    $temp = $this->head;
    if(!$this->isEmpty()){
      while($temp != NULL){
        if(@$temp->next->data == $key){
          $temp->next = $temp->next->next;
          break;
        }elseif(($temp->data == $key)&&($temp == $this->head)){
          $this->removeFirst();
          break;
        }
        $temp = $temp->next;
      }
    }
  }

// find the node that matches the query.
  public function find($key){
    $found = false;
    $temp = $this->head;
    while($temp != NULL){
      if($temp->data == $key){
        $found = true;
        break;
      }
      $temp = $temp->next;
    }
    if($found)
      return true;
    else
      return false;
  }

// print all element in the list
  public function printAll(){
    $temp = $this->head;
    while($temp != NULL){
      echo $temp->data . " ";
      $temp = $temp->next;
    }
  }

// get the nth element in the list.
  public function get($index){
    $temp = $this->head;
    for($i=0;$i<$index;$i++){
      if($temp == NULL) break;
      $temp = $temp->next;
    }
    return @$temp->data;
  }

}

// === MAIN PROGRAM ===

$l = new LinkedList();
$l->addFirst(10);
$l->addFirst(20);
$l->addLast(30);
$l->addLast(40);
$l->insertAfter(20,5);
$l->insertBefore(20,15);
$l->removeFirst();
$l->removeLast();
$l->remove(20);
$l->printAll();
echo "<br>";
echo $l->get(1);
?>
