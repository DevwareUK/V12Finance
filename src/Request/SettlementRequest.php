<?php


namespace DevwareUK\V12Finance\Request;


use DevwareUK\V12Finance\Models\Chain;

class SettlementRequest {
  protected $Chain;
  protected $DateFrom;
  protected $DateTo;

  public function __construct(Chain $chain, $date_from, $date_to) {
    $this->Chain = $chain;
    $this->DateFrom = $date_from;
    $this->DateTo = $date_to;
  }

}