<?php

namespace DevwareUK\V12Finance\Exceptions;

use \Exception;
use DevwareUK\V12Finance\Response\ResponseInterface;

class ResponseException extends Exception {
  protected $response;

  public function __construct(ResponseInterface $response) {
    $this->response = $response;
    parent::__construct('API response has errors.');
  }

  public function getResponse() : ResponseInterface {
    return $this->response;
  }

}