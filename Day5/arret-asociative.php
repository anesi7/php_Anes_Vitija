<?php
$grade = array(
    "Math"=>"4"
    "Chemistry"=>"5"
    "Music"=>"5"
)

foreach($grade as $subject =>$grade){
    echo"subject:". $subject . "nota".$grade;
    echo "<br>";
}
?>