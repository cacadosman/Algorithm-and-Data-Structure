<?php
// Bit Vector Data Structures

    class bitVector{
        protected $size;
        protected $vector;

        public function __construct($size){
            $this->size = $size;
            $this->vector = array_fill(0, $size, false);
        }

        public function isValid($data){
            if($data >= $this->size){
                return false;
            }else{
                return true;
            }
        }

        public function insert($data){
            if($this->isValid($data)){
                $this->vector[$data] = true;
            }
        }

        public function delete($data){
            if($this->isValid($data)){
                $this->vector[$data] = false;
            }
        }

    }

?>