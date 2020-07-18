<?php


namespace DevwareUK\V12Finance\Request;


class ApplicationUpdateRequest {
  // @TODO this is weird.... Look at the docs....
  protected $ApplicationId;
  protected $Retailer;
  protected $Update;
  protected $LoanAmount;
  protected $SalesReference;
  protected $SecondSalesReference;
  protected $RefundAmount;
}