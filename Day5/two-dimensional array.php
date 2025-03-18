<?php
$dog=array(array("qiuaua","Mexico",20), array("elvis","fushkosova",15), array("bleart","Kosovo",10));
/*    
echo $dog[0][0] . "Origina" . $dog[0][1] . "Life Span" . $dog[0][2] . '<br>';
echo $dog[1][0] . "Origina" . $dog[1][1] . "Life Span" . $dog[1][2] . '<br>';
echo $dog[2][0] . "Origina" . $dog[2][1] . "Life Span" . $dog[2][2] . '<br>';*/
    



for($row = 0;$row<3;$row++ ){
    echo "<P> Row number $row </p>";
    echo "<ul>";

    for($col=0;$col<3;$col++){
        echo "<li>" .$dog[$row][$col]."</li>";
    };


    echo "</ul>";
}
for($i = 0;$i<3;$i++ ){
    echo $i . '<br>';
    for($j= 0;$j<3;$j++ ){
        echo $j . "numri mbrenda elementit <br>";
}

}
?>