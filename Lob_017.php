<?php
    $book = [
                'NodeJS'=>'5',
                'Java'=>'3',
                'PHP'=>'10',
                'JQuery'=>'6'
            ];
    foreach($book as $key=>$value){
        echo 'หนังสือ' .$key. "จำนวน".$value;
        echo "</br>;"
    }
?>