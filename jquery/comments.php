<?php

$comments = array('thanks','thank you','good');
if (isset($_POST['comment'])){
    array_push($comments,$_POST['comment']);
}
foreach ($comments as $com){
    echo $com . ' ' .'<br>';
}
?>