<?php

namespace App\customExceptions;

use Exception;

class RequiredException extends Exception {
  public function __construct($field){
    parent::__construct("{$field}は必須です。", 422);
  }
}