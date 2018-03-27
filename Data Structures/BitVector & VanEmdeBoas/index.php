<?php
/*
    Comparing Time Complexity
    Bit Vector VS van Emde Boas
*/

    require "bitVector.php";
    require "vEB.php";

    class Comparator{
        protected $size;
        protected $bitVector;
        protected $vEB;

        public function __construct($size){
            $this->size = $size;
            $this->bitVector = new bitVector($size);
            $this->vEB = new VEB($size);
        }

        public function calculateInsertTime($data){
            if($data >= $this->size){
                return false;
            }else{
                $bitVectorStartTime = microtime(true);
                $this->bitVector->insert($data);
                $bitVectorEndTime = microtime(true);

                $vEBStartTime = microtime(true);
                $this->vEB->insert($data);
                $vEBEndTime = microtime(true);

                $bitVectorTime = ($bitVectorEndTime - $bitVectorStartTime) * 1000;
                $vEBTime = ($vEBEndTime - $vEBStartTime) * 1000;

                return [$bitVectorTime, $vEBTime];
            }
        }
    }

    $time = [];
    $size = 2 << 10;

    $bitVectorTime = 0;
    $vEBTime = 0;

    $comp = new Comparator($size);

    for($i=0;$i<$size;$i++){
        $time[] = $comp->calculateInsertTime($i);
    }
    
    foreach($time as $value){
        $bitVectorTime += $value[0];
        $vEBTime += $value[1];
    }

    echo "Insertion Time from i=0 to n : <br><br>";
    echo "BitVector: $bitVectorTime ms <br>";
    echo "van Emde Boas: $vEBTime ms <br>";
    echo "<br>";

    $bitVectorTime /= $size;
    $vEBTime /= $size;

    echo "Average Insertion Time from i=0 to n : <br><br>";
    echo "BitVector: $bitVectorTime ms <br>";
    echo "van Emde Boas: $vEBTime ms <br>";
?>