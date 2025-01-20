<?php

$name = "Abrar Hussain";

// if ( $name == "Abrar Hussain" ){
//     echo "Yes name is Abrar Hussain";
// }else{
//     echo "No it is not!";
// }

$result = ( $name == "Abrar Hussain" ) ? "Yes name is Abrar Hussain" :"No it is not!"; 
echo "<h1> $result </h1>";

$fruits = [ 'Banana' , 'oranges' , 'Apple'];

echo "<ul>";
foreach( $fruits as $fruit ){
    echo "<li>$fruit</li>";
}
echo "</ul>";

$students = [   
        [ 'name' => 'Shehnila' , 'fname' => 'Ghulam Hussain'],
        [ 'name' => 'Zeeshan' , 'fname' => 'Shan'],
        [ 'name' => 'Aliza' , 'fname' => 'Ghulam Tabrez']
];

var_dump($students[0]['name']) ;

