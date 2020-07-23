<?php

namespace DevwareUK\V12Finance\Response;

use DevwareUK\V12Finance\Exceptions\ResponseException;

abstract class ResponseAbstract implements ResponseInterface {

  public function __construct() {
    if ($this->hasErrors()) {
      throw new ResponseException($this);
    }
  }

  public function hasErrors() {
    return !empty($this->Errors);
  }

  public function getErrors() {
    return $this->Errors;
  }
}
