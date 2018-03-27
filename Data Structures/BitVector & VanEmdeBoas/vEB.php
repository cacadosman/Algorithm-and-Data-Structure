<?php
// van Emde Boas Data Structures

    class VEB{
        public $min;
        public $max;
        protected $size;
        protected $lgSize;
        protected $summary;
        protected $clusters;

        public function __construct($size){
            $this->size = 2;
            while($this->size < $size){
                $this->size <<= 1;
            }

            $this->lgSize = 2 ** floor(log($this->size, 2) / 2);
            $this->min = null;
            $this->max = null;

            if($this->size > 2){
                $this->summary = null;
                $this->clusters = array_fill(0, $this->high($this->size), null);
            }
        }

        public function high($data){
            return floor($data / $this->lgSize);
        }

        public function low($data){
            return $data % $this->lgSize;
        }

        public function emptyInsert($data){
            $this->min = $data;
            $this->max = $data;
        }

        public function insert($data){
            if($data >= $this->size){
                return false;
            }else{
                if($this->min == null){
                    $this->emptyInsert($data);
                }else{
                    if($data < $this->min){
                        $tmp = $this->min;
                        $this->min = $data;
                        $data = $tmp;
                    }
                    if($this->size > 2){
                        $high = $this->high($data);
                        $cluster = $this->clusters[$high];

                        if($cluster == null){
                            $cluster = new VEB($this->lgSize);
                            $this->clusters[$high] = &$cluster;

                            if($this->summary == null){
                                $this->summary = new VEB($this->lgSize);
                            }
                            $this->summary->insert($high);
                        }
                        $cluster->insert($this->low($data));
                    }
                    if($data > $this->max){
                        $this->max = $data;
                    }
                }
            }
        }
    }

?>