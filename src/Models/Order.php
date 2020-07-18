<?php

namespace DevwareUK\V12Finance\Models;

use DevwareUK\V12Finance\Traits\JsonEncodeable;

/**
 * Class Order
 *
 * An object representing the finance product used in the order, the values and
 * the retailer's reference which is used in reconciliation and order
 * communications. Product ID and Guid’s are supplied by V12 to be used in this
 * packet.
 *
 * @package V12Finance\Models
 */
class Order {

  /**
   * Product ID.
   *
   * Supplied by V12, this is the identifier for the finance product to be used
   * for this transaction. Used as a pair with ProductGuid.
   *
   * @var int $ProductId
   *   Integer Required
   */
  protected $ProductId;

  /**
   * Product GUID.
   *
   * Supplied by V12, this is the identifier for the finance product to be used
   * for this transaction. Used as a pair with ProductId.
   *
   * @var string $ProductGuid
   *   Guid	Required
   */
  protected $ProductGuid;

  /**
   * Sales Reference.
   *
   * This is the retailer’s reference to the order. Will be used in all future
   * communications to identify the order for the retailer.
   *
   * @var string $SalesReference
   *   String(128) Required
   */
  protected $SalesReference;

  /**
   * Second Sales Reference.
   *
   * This is the retailer’s optional second reference to the order.
   *
   * @var string|NULL $SecondSalesReference
   *   String(256) Optional
   */
  protected $SecondSalesReference;

  /**
   * Cash Price.
   *
   * The gross price of the order as if it were being paid in cash, including
   * any applicable VAT and delivery charges.
   *
   * @var string $CashPrice
   *   String Required
   */
  protected $CashPrice;

  /**
   * Deposit.
   *
   * The value of the deposit on the order. This will be subtracted by V12 from
   * the cash price to derive the loan amount. Depending on configuration, this
   * will be collected by either the retailer or V12. The standard maximum
   * deposit is 50%, to discuss other deposit requirements please contact your
   * account manager.
   *
   * @var string $Deposit
   *   String	Required
   */
  protected $Deposit;

  /**
   * Date First Payment.
   *
   * For countdown deferred products, this is the date the first payment should
   * be due.
   *
   * @var string|NULL $DateFirstPayment
   *   Date	Optional
   */
  protected $DateFirstPayment;

  /**
   * Duplicate Sales Reference Method.
   *
   * Defines the behaviour to be used in the event of the sales reference being
   * a duplicate. For more information regarding enumeration values.
   *
   * @TODO Should this actually be a string?
   * @var string|NULL $DuplicateSalesReferenceMethod
   *   Enumeration Optional
   */
  protected $DuplicateSalesReferenceMethod;

  /**
   * IP Address.
   *
   * If supplied this value will be passed to Sira and used as part of the
   * fraud checks that take place when the application is submitted for credit
   * checking.
   *
   * @var string|NULL $IpAddress
   *   String	Optional
   */
  protected $IpAddress;

  /**
   * Lines.
   *
   * A collection of OrderLine objects which represent the content of the order.
   * The sum of these should match the cash price, so the Price should be
   * inclusive of VAT and lines should be present for delivery or discounts not
   * taken into consideration at a line level.
   *
   * @var array|NULL
   *   Object List Optional
   */
  protected $Lines;

  /**
   * V Link.
   *
   * If this value is set to True and an email address is supplied then the
   * customer is sent an email which will contain a link for them to complete
   * the application.
   *
   * @var bool|NULL
   *   Boolean Optional
   */
  protected $vLink;

  /**
   * Credit Policies.
   *
   * For use only by prior agreement with V12. If supplied this should be a
   * comma separated list of credit policies that are to be used when the
   * application is submitted for credit checking.
   *
   * @var string|NULL
   *   String	Optional
   */
  protected $Credit_Policies;

  use JsonEncodeable;

  /**
   * Order constructor.
   *
   * @param int $product_id
   * @param string $product_guid
   * @param string $sales_reference
   * @param string $cash_price
   * @param string $deposit
   * @param string|NULL $second_sales_reference
   * @param string|NULL $date_first_payment
   * @param string|NULL $duplicate_sales_reference_method
   * @param string|NULL $ip_address
   * @param array|NULL $lines
   * @param bool|NULL $v_link
   * @param string|NULL $credit_policies
   */
  public function __construct(int $product_id, string $product_guid, string $sales_reference, string $cash_price, string $deposit, string $second_sales_reference = NULL, string $date_first_payment = NULL, string $duplicate_sales_reference_method = NULL, string $ip_address = NULL, array $lines = NULL, bool $v_link = NULL, string $credit_policies = NULL) {
    $this->ProductId = $product_id;
    $this->ProductGuid = $product_guid;
    $this->SalesReference = $sales_reference;
    $this->SecondSalesReference = $second_sales_reference;
    $this->CashPrice = $cash_price;
    $this->Deposit = $deposit;
    $this->DateFirstPayment = $date_first_payment;
    $this->DuplicateSalesReferenceMethod = $duplicate_sales_reference_method;
    $this->IpAddress = $ip_address;
    // @TODO This should be an array of OrderLine
    $this->Lines = $lines;
    $this->vLink = $v_link;
    $this->Credit_Policies = $credit_policies;
  }

}