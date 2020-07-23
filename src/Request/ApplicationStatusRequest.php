<?php

namespace DevwareUK\V12Finance\Request;

use DevwareUK\V12Finance\Traits\JsonEncodeable;
use DevwareUK\V12Finance\Models\Retailer;

class ApplicationStatusRequest implements RequestInterface {
  protected $ApplicationId;
  protected $Retailer;
  protected $IncludeExtraDetails;
  protected $IncludeFinancials;

  use JsonEncodeable;

  public function __construct($application_id, Retailer $retailer, $include_extra_details, $include_financials) {
    $this->ApplicationId = $application_id;
    $this->Retailer = $retailer;
    $this->IncludeExtraDetails = $include_extra_details;
    $this->IncludeFinancials = $include_financials;
  }

}