<!DOCTYPE html>
<html lang="en">
<head>
    <title>Example of Looping Over PHP Multidimensional Array</title>
</head>
<body>

<?php
// Multidimensional array
$superheroes = array(
    "spider-man" => array(
        "name" => "Peter Parker",
        "email" => "peterparker@mail.com",
    ),
    "super-man" => array(
        "name" => "Clark Kent",
        "email" => "clarkkent@mail.com",
    ),
    "iron-man" => array(
        "name" => "Harry Potter",
        "email" => "harrypotter@mail.com",
    )
);
 
// Printing all the keys and values one by one
$keys = array_keys($superheroes);
for($i = 0; $i < count($superheroes); $i++) {
   
    foreach($superheroes[$keys[$i]] as  $value) {
        echo  $value . "<br>";
    }
    
}
?>

</body>
</html>