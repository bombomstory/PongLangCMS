<?php

$month = 5;

switch (month) {
    case 1: 
            echo "มกราคม"; break;
    case 2: 
            echo "กุมภาพันธ์"; break;
    case 3: 
            echo "มีนาคม"; break;
    case 4: 
            echo "เมษายน"; break;
    case 5: 
            echo "พฤษภาคม"; break;
    case 6: 
            echo "มิถุนายน"; break;
    case 7: 
            echo "กรกฏายน"; break;
    case 8: 
            echo "สิงหาคม"; break;
    case 9: 
            echo "กันยายน"; break;
    case 10: 
            echo "ตุลาคม"; break;
    case 11: 
            echo "พฤศจิกายน"; break;
    case 12:
            echo "ธันวาคม"; break;
    
    dafault:
            echo "ข้อมูลเดือนไม่ถูกต้อง";
            break;
}