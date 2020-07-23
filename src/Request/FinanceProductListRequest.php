<?php


namespace DevwareUK\V12Finance\Request;

use DevwareUK\V12Finance\Models\Retailer;
use DevwareUK\V12Finance\Traits\JsonEncodeable;

class FinanceProductListRequest implements RequestInterface {
  protected $Retailer;

  use JsonEncodeable;

  public function __construct(Retailer $retailer) {
    $this->Retailer = $retailer;
  }

}