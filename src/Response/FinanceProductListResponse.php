<?php


namespace DevwareUK\V12Finance\Response;

use DevwareUK\V12Finance\Errors\ApplicationStatusResponseError;
use DevwareUK\V12Finance\Models\FinanceProduct;
use DevwareUK\V12Finance\Traits\JsonEncodeable;

class FinanceProductListResponse {
  // @TODO implement this...
  protected $Errors;
  protected $FinanceProducts;

  use JsonEncodeable;

  public function __construct($errors, $finance_products) {
    $this->Errors = $errors;
    $this->FinanceProducts = $finance_products;
  }

  public static function newFromJSON($json) : FinanceProductListResponse {
    $errors = isset($json->Errors) ? [] : NULL;
    if (!empty($json->Errors)) {
      foreach ($json->Errors as $error) {
        $errors[] = ApplicationStatusResponseError::newFromJSON($error);
      }
    }

    $finance_products = isset($json->FinanceProducts) ? [] : NULL;
    if (!empty($json->FinanceProducts)) {
      foreach ($json->FinanceProducts as $finance_product) {
        $finance_products[] = FinanceProduct::newFromJSON($finance_product);
      }
    }

    return new FinanceProductListResponse($errors, $finance_products);
  }
}