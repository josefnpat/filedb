<?php

/**
 * Yet Another Get Options
 *
 * This function will provide a simple alternative to *nix's getopt that has
 * some extended features found in GNU's getopts.
 *
 * @author josefnpat <seppi@josefnpat.com>
 *
 * @param $raw_flags
 *   This string represents the flags that should be parsed by this function.
 *   The flags that this function will look for is seperated by commas. E.g.;
 *   "-d,--debug,-n!,--name!"
 *   If flag has an exclamation mark (`!`) at the end, the function will
 *   assume that the flag is expecting an argument.
 * @param $argv|NULL
 *   This is the argument vector provided when a script is invoked by php-cli.
 *   By default, it will use the global `$argv`, but can be overridden by
 *   passing an array of arguments.
 *
 * @return
 *   The returned data will consist of a nexted associative array containing:
 *   - operands: an array of arguments that are not flags or flag operands
 *   - flags: an associtave array of flags that were found. If the flag is;
 *     - expecting an argument: the value will be assigned.
 *     - not expecting an arguement: the value will be null.
 */


function yago($raw_flags,$argv=NULL){
  if($argv === NULL){
    global $argv;
  }
  $stack = array();
  $stack['operands'] = array();
  $stack['flags'] = array();
  $search_flags = explode(",",$raw_flags);
  while(!empty($argv)){
    $arg = array_shift($argv);
    if(in_array($arg,$search_flags)){
      $stack['flags'][$arg] = NULL;
    } elseif(in_array("$arg!",$search_flags)){
      $stack['flags'][$arg] = array_shift($argv);
    } elseif(substr($arg,0,1)!="-") {
      $stack['operands'][] = $arg;
    }
  }
  return $stack;
}