<?php

namespace DevwareUK\V12Finance;

use DevwareUK\V12Finance\Request\ApplicationRequest;
use DevwareUK\V12Finance\Request\ApplicationStatusRequest;
use DevwareUK\V12Finance\Request\FinanceProductListRequest;
use DevwareUK\V12Finance\Request\RequestInterface;
use DevwareUK\V12Finance\Response\ApplicationStatusResponse;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;
use DevwareUK\V12Finance\Response\FinanceProductListResponse;

class API {
  static $api_base = 'https://apply.v12finance.com';
  static $api_version = 'latest';

  protected static function post($url, RequestInterface $request) {
    $client = new Client(['base_uri' => static::$api_base]);
    $request = $client->post(static::$api_version . '/' . $url, [
      RequestOptions::JSON => $request->getJsonEncodeableArray()
    ]);

    return json_decode($request->getBody());
  }

  public static function submitApplication(ApplicationRequest $application_request) : ApplicationStatusResponse {
    $response = static::post('retailerapi/SubmitApplication', $application_request);
    return ApplicationStatusResponse::newFromJSON($response);
  }

  public static function getFinanceProducts(FinanceProductListRequest $finance_products_list_request) : FinanceProductListResponse {
    $response = static::post('retailerapi/GetRetailerFinanceProducts', $finance_products_list_request);
    return FinanceProductListResponse::newFromJSON($response);
  }

  public static function checkApplicationStatus(ApplicationStatusRequest $application_status_request) : ApplicationStatusResponse {
    $response = static::post('retailerapi/CheckApplicationStatus', $application_status_request);
    return ApplicationStatusResponse::newFromJSON($response);
  }
}