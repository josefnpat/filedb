<?php

function ask($question){
  $response = readline("$question?[y/n]");
  while(strlen($response) <= 0 or !in_array($response[0],array("Y","y","N","n"))){
    $response = readline("$question?[y/n] ");
  }
  if(in_array($response[0],array("Y","y"))){
    return true;
  } else {
    return false;
  }
}