<?php

$a=array('text'=>'');
$t =$_POST['text'];
$a['text'] = $t;
echo json_encode($a);
    exit();

?>