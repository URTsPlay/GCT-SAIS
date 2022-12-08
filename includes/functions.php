<?php
function getOrdinal($number){
    
    $digit = abs($number) % 10;
    $ext = 'th';
    
    if(abs($number) %100 < 21 && abs($number) %100 > 4){
     $ext = 'th';
    }else{
     if($digit < 4){
      $ext = 'rd';
     }
     if($digit < 3){
      $ext = 'nd';
     }
     if($digit < 2){
      $ext = 'st';
     }
     if($digit < 1){
      $ext = 'th';
     }
    }
    return $number.$ext;
   }
?>