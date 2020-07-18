<?php

namespace DevwareUK\V12Finance\Errors;

use DevwareUK\V12Finance\Traits\JsonEncodeable;

class ApplicationStatusResponseError {
  protected $Code;
  protected $Description;
  protected $Reference;

  use JsonEncodeable;

  public function __construct($code, $description, $reference) {
    $this->Code = $code;
    $this->Description = $description;
    $this->Reference = $reference;
  }

  public static function newFromJSON($json) : ApplicationStatusResponseError {
    $code = isset($json->Code) ? $json->Code : NULL;
    $description = isset($json->Description) ? $json->Description : NULL;
    $reference = isset($json->Reference) ? $json->Reference : NULL;
    return new ApplicationStatusResponseError($code, $description, $reference);
  }
}