<?php

namespace DevwareUK\V12Finance;

use DevwareUK\V12Finance\Request\ApplicationRequest;
use DevwareUK\V12Finance\Request\FinanceProductListRequest;
use DevwareUK\V12Finance\Response\ApplicationStatusResponse;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;
use DevwareUK\V12Finance\Response\FinanceProductListResponse;

class API {
  static $api_base = 'https://apply.v12finance.com';

  public static function submitApplication(ApplicationRequest $application_request) : ApplicationStatusResponse {
    $client = new Client(['base_uri' => static::$api_base]);
    $request = $client->post('latest/retailerapi/SubmitApplication', [
      RequestOptions::JSON => $application_request->getJsonEncodeableArray()
    ]);
    return ApplicationStatusResponse::newFromJSON(json_decode($request->getBody()));
  }

  public static function getFinanceProducts(FinanceProductListRequest $finance_products_list_request) : FinanceProductListResponse {
    $client = new Client(['base_uri' => static::$api_base]);
    $request = $client->post('latest/retailerapi/GetRetailerFinanceProducts', [
      RequestOptions::JSON => $finance_products_list_request->getJsonEncodeableArray()
    ]);
    return FinanceProductListResponse::newFromJSON(json_decode($request->getBody()));
  }
}