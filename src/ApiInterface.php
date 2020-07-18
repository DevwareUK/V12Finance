<?php

namespace DevwareUK\V12Finance;

use DevwareUK\V12Finance\Request\AmendFinancialsRequest;
use DevwareUK\V12Finance\Request\ApplicationRequest;
use DevwareUK\V12Finance\Request\ApplicationStatusRequest;
use DevwareUK\V12Finance\Request\FinanceProductListRequest;
use DevwareUK\V12Finance\Request\ApplicationUpdateRequest;
use DevwareUK\V12Finance\Request\SettlementRequest;
use DevwareUK\V12Finance\Response\AmendFinancialsResult;
use DevwareUK\V12Finance\Response\ApplicationStatusResponse;
use DevwareUK\V12Finance\Response\FinanceProductListResponse;
use DevwareUK\V12Finance\Response\SettlementResult;

interface ApiInterface {
  public function submitApplication(ApplicationRequest $application_request) : ApplicationStatusResponse;
  public function checkApplicationStatus(ApplicationStatusRequest $application_status_request) : ApplicationStatusResponse;
  public function updateApplication(ApplicationUpdateRequest $application_status_request) : ApplicationStatusResponse;
  public function getRetailerFinanceProducts(FinanceProductListRequest $finance_product_list_request) : FinanceProductListResponse;
  public function amendFinancials(AmendFinancialsRequest $amend_financials_request) : AmendFinancialsResult;
  public function getSettlement(SettlementRequest $settlement_request) : SettlementResult;
}