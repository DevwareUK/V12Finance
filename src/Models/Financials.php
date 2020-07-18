<?php


namespace DevwareUK\V12Finance\Models;


use DevwareUK\V12Finance\Traits\JsonEncodeable;

class Financials {
  protected $CashPrice;
  protected $Commission;
  protected $Deposit;
  protected $LoanAmount;
  protected $LoanAmountLessRefunds;
  protected $ProductId;
  protected $Refunds;
  protected $SettlementDetails;
  protected $Subsidy;

  use JsonEncodeable;

  public function __construct($cash_price, $commission, $deposit, $loan_amount, $loan_amount_less_refunds, $product_id, $refunds, $settlement_details, $subsidy) {
    $this->CashPrice = $cash_price;
    $this->Commission = $commission;
    $this->Deposit = $deposit;
    $this->LoanAmount = $loan_amount;
    $this->LoanAmountLessRefunds = $loan_amount_less_refunds;
    $this->ProductId = $product_id;
    $this->Refunds = $refunds;
    $this->SettlementDetails = $settlement_details;
    $this->Subsidy = $subsidy;
  }

  public static function newFromJSON($json) : Financials {
    $cash_price = isset($json->CashPrice) ? $json->CashPrice : NULL;
    $commission = isset($json->Commission) ? $json->Commission : NULL;
    $deposit = isset($json->Deposit) ? $json->Deposit : NULL;
    $loan_amount = isset($json->LoanAmount) ? $json->LoanAmount : NULL;
    $loan_amount_less_refunds = isset($json->LoanAmountLessRefunds) ? $json->LoanAmountLessRefunds : NULL;
    $product_id = isset($json->ProductId) ? $json->ProductId : NULL;
    $refunds = isset($json->Refunds) ? $json->Refunds : NULL;
    $settlement_details = isset($json->SettlementDetails) ? $json->SettlementDetails : NULL;
    $subsidy = isset($json->Subsidy) ? $json->Subsidy : NULL;
    return new Financials($cash_price, $commission, $deposit, $loan_amount, $loan_amount_less_refunds, $product_id, $refunds, $settlement_details, $subsidy);
  }

}