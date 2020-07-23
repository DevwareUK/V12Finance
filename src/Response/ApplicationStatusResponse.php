<?php


namespace DevwareUK\V12Finance\Response;

use DevwareUK\V12Finance\Errors\ApplicationStatusResponseError;
use DevwareUK\V12Finance\Traits\JsonEncodeable;
use DevwareUK\V12Finance\Models\Customer;
use DevwareUK\V12Finance\Models\Financials;
use DevwareUK\V12Finance\Models\OrderLine;

class ApplicationStatusResponse extends ResponseAbstract {
  protected $ApplicationFormUrl;
  protected $ApplicationGuid;
  protected $ApplicationId;
  protected $AuthorisationCode;
  protected $Customer;
  protected $Errors;
  protected $Financials;
  protected $OrderLines;
  protected $SalesReference;
  protected $SecondSalesReference;
  protected $Status;
  protected $CreditPolicyTag;

  use JsonEncodeable;

  public function __construct($application_form_url, $application_guid, $application_id, $authorisation_code, $customer, $errors, $financials, $order_lines, $sales_reference, $second_sales_reference, $status, $credit_policy_tag) {
    $this->ApplicationFormUrl = $application_form_url;
    $this->ApplicationGuid = $application_guid;
    $this->ApplicationId = $application_id;
    $this->AuthorisationCode = $authorisation_code;
    $this->Customer = $customer;
    $this->Errors = $errors;
    $this->Financials = $financials;
    $this->OrderLines = $order_lines;
    $this->SalesReference = $sales_reference;
    $this->SecondSalesReference = $second_sales_reference;
    $this->Status = $status;
    $this->CreditPolicyTag = $credit_policy_tag;

    parent::__construct();
  }

  public function getApplicationId() {
    return $this->ApplicationId;
  }

  public function getApplicationFormUrl() {
    return $this->ApplicationFormUrl;
  }

  public function getStatus() {
    return $this->Status;
  }

  public static function newFromJSON($json) : ApplicationStatusResponse {
    $application_form_url = isset($json->ApplicationFormUrl) ? $json->ApplicationFormUrl : NULL;
    $application_guid = isset($json->ApplicationGuid) ? $json->ApplicationGuid : NULL;
    $application_id = isset($json->ApplicationId) ? $json->ApplicationId : NULL;
    $authorisation_code = isset($json->AuthorisationCode) ? $json->AuthorisationCode : NULL;
    $customer = isset($json->Customer) ? Customer::newFromJSON($json->Customer) : NULL;

    $errors = isset($json->Errors) ? [] : NULL;
    if (!empty($json->Errors)) {
      foreach ($json->Errors as $error) {
        $errors[] = ApplicationStatusResponseError::newFromJSON($error);
      }
    }

    $financials = isset($json->Financials) ? Financials::newFromJSON($json->Financials) : NULL;

    // @TODO do this one...
    $order_lines = isset($json->OrderLines) ? [] : NULL;
    if (!empty($json->OrderLines)) {
      foreach ($json->OrderLines as $order_line) {
        $errors[] = OrderLine::newFromJSON($order_line);
      }
    }

    $sales_reference = isset($json->SalesReference) ? $json->SalesReference : NULL;
    $second_sales_reference = isset($json->SecondSalesReference) ? $json->SecondSalesReference : NULL;
    $status = isset($json->Status) ? $json->Status : NULL;
    $credit_policy_tag = isset($json->CreditPolicyTag) ? $json->CreditPolicyTag : NULL;

    return new ApplicationStatusResponse($application_form_url, $application_guid, $application_id, $authorisation_code, $customer, $errors, $financials, $order_lines, $sales_reference, $second_sales_reference, $status, $credit_policy_tag);
  }

}