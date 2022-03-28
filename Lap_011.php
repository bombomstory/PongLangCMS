<?php

$score >= 10;

    if($score >= 85){

        echo "คุณทำข้อสอบได้" .$score." คะแนน คุณได้ Grade 4";

    }else if($score >= 70){

        echo "คุณทำข้อสอบได้" .$score." คะแนน คุณได้ Grade 3";

    }else if($score >= 60){

        echo "คุณทำข้อสอบได้" .$score." คะแนน คุณได้ Grade 2";

    }else if($score >= 50){

        echo "คุณทำข้อสอบได้" .$score." คะแนน คุณได้ Grade 1";

    }else{
         echo "คุณทำข้อสอบได้" .$score." คะแนน คุณไม่ผ่านการทดสอบ";
    }
?>