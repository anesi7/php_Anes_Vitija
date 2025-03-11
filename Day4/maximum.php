<?php
function maximum($x,$y){
    if($x<$y){
        return $x;
    }else{
        return $y;
    }
}
echo maximum(5,10);
echo "<br>";
echo maximum(3,34);
echo "<br>";
echo maximum(1,77);
echo "<br>";
echo maximum(9,65);
?>