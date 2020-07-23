<?php


namespace DevwareUK\V12Finance\Models;


use DevwareUK\V12Finance\Traits\JsonEncodeable;

class FinanceProduct {
  // @TODO Alt Tag listed but not in example API response????
  protected $APR;
  protected $CalculationFactor;
  protected $DeferredPeriod;
  protected $Description;
  protected $DocumentFee;
  protected $DocumentFeeCollectionMonth;
  protected $DocumentFeeMaximum;
  protected $DocumentFeeMinimum;
  // @TODO DocumentFee Percentage listed but not in example API response????
  protected $MaxLoan;
  protected $MinLoan;
  protected $MonthlyRate;
  protected $Months;
  public $Name;
  protected $OptionPeriod;
  protected $ProductGuid;
  protected $ProductId;
  protected $ServiceFee;
  // @TODO SettlementFee listed but not in example API response????
  protected $Tag;

  use JsonEncodeable;

  public function __construct($apr, $calculation_factor, $deferred_period, $description, $document_fee, $document_fee_collection_month, $document_fee_maximum, $document_fee_minimum, $max_loan, $min_loan, $monthly_rate, $months, $name, $option_period, $product_guid, $product_id, $service_fee, $tag) {
    $this->APR = $apr;
    $this->CalculationFactor = $calculation_factor;
    $this->DeferredPeriod = $deferred_period;
    $this->Description = $description;
    $this->DocumentFee = $document_fee;
    $this->DocumentFeeCollectionMonth = $document_fee_collection_month;
    $this->DocumentFeeMaximum = $document_fee_maximum;
    $this->DocumentFeeMinimum = $document_fee_minimum;
    $this->MaxLoan = $max_loan;
    $this->MinLoan = $min_loan;
    $this->MonthlyRate = $monthly_rate;
    $this->Months = $months;
    $this->Name = $name;
    $this->OptionPeriod = $option_period;
    $this->ProductGuid = $product_guid;
    $this->ProductId = $product_id;
    $this->ServiceFee = $service_fee;
    $this->Tag = $tag;
  }


  public static function newFromJSON($json) : FinanceProduct {
    return new FinanceProduct($json->APR, $json->CalculationFactor, $json->DeferredPeriod, $json->Description, $json->DocumentFee, $json->DocumentFeeCollectionMonth, $json->DocumentFeeMaximum, $json->DocumentFeeMinimum, $json->MaxLoan, $json->MinLoan, $json->MonthlyRate, $json->Months, $json->Name, $json->OptionPeriod, $json->ProductGuid, $json->ProductId, $json->ServiceFee, $json->Tag);
  }

}