<?php
/**
 * 在终端中运行当前脚本，\x0D会remove之前的输出
 */
$i =0; 
do {
    $i++;
    echo "\x0D";
    echo $i; 
} while(true);
