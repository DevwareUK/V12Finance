<?php

namespace DevwareUK\V12Finance;

use DevwareUK\V12Finance\Request\ApplicationRequest;
use DevwareUK\V12Finance\Response\ApplicationStatusResponse;

class DummyApi {
  protected static $examplesDIR = __DIR__ . '/../responseExamples/';

  protected static function getExampleJson($file_name) {
    $json = file_get_contents(static::$examplesDIR . $file_name);
    return json_decode($json);
  }
  
  public static function submitApplication(ApplicationRequest $application_request) {
    $customer = $application_request->getCustomer();
    $last_name = isset($customer) ? $customer->getLastName() : NULL;

    switch ($last_name) {
      case 'Approve':
        $json = static::getExampleJson('ApplicationStatusResponseClean.json');
        break;
      case 'Refer':
        $json = static::getExampleJson('ApplicationStatusResponseClean.json');
        break;
      case 'Decline':
        $json = static::getExampleJson('ApplicationStatusResponseClean.json');
        break;
      case 'ReferApprove':
        $json = static::getExampleJson('ApplicationStatusResponseClean.json');
        break;
      case 'ReferDecline':
        $json = static::getExampleJson('ApplicationStatusResponseClean.json');
        break;
      default:
        $json = static::getExampleJson('ApplicationStatusResponseError.json');
        break;
    }

    return ApplicationStatusResponse::newFromJSON($json);
  }
}