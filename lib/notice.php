<?php
define("CLI_RED",   "\033[31;40m\033[1m[%s]\033[0m");
define("CLI_YELLOW","\033[1;33;40m\033[1m[%s]\033[0m");
define("CLI_BLUE",  "\033[1;34;40m\033[1m[%s]\033[0m");
function notice($type="undefined",$message){
  if($type == "error"){
    $color = CLI_RED;
  } elseif($type == "warning"){
    $color = CLI_YELLOW;
  } elseif($type == "info"){
    $color = CLI_BLUE;
  }
  return sprintf($color,"$type: $message")."\n";
}