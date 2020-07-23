<?php

namespace DevwareUK\V12Finance\Request;

use DevwareUK\V12Finance\Traits\JsonEncodeable;
use DevwareUK\V12Finance\Models\Retailer;
use DevwareUK\V12Finance\Models\Order;
use DevwareUK\V12Finance\Models\Customer;

class ApplicationRequest implements RequestInterface {
  protected $Retailer;
  protected $Order;
  protected $Customer;
  protected $ApplicationId;
  protected $ApplicationGuid;

  use JsonEncodeable;

  public function __construct(Retailer $retailer, Order $order = NULL, Customer $customer = NULL, $application_id = NULL, $application_guid = NULL) {
    $this->Retailer = $retailer;
    $this->Order = $order;
    $this->Customer = $customer;
    $this->ApplicationId = $application_id;
    $this->ApplicationGuid = $application_guid;
  }

  public function getRetailer() : Retailer {
    return $this->Retailer;
  }

  public function getCustomer() : ?Customer {
    return $this->Customer;
  }

  public function getOrder() : ?Order {
    return $this->Order;
  }

}