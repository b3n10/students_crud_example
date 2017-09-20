<?php

function inputArray() {
  $input_array = array();
  foreach ($_POST as $p) {
    if ($p != null) {
      array_push( $input_array, $p );
    }
  }
  return $input_array;
}

function checkField_1($fieldName) {
  if (!empty($_POST[$fieldName]) && count(inputArray()) < 3) {
    return $_POST[$fieldName];
  }
  return '';
}


function checkField_2($fieldName) {
  if ($_POST[$fieldName] == null && count($_POST) != 0) {
    return "Please enter " . $fieldName;
  }
}
