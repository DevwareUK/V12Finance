<?php

namespace DevwareUK\V12Finance\Models;

use DevwareUK\V12Finance\Traits\JsonEncodeable;

class CustomerAddress {

  /**
   * Address.
   *
   * An address object representing the address.
   *
   * @var \V12Finance\Models\Address $Address
   *   Object	Optional
   */
  protected $Address;

  /**
   * Address Order.
   *
   * Used to order the collection of addresses correctly, lowest first.
   *
   * @var int|NULL $AddressOrder
   *   Integer Optional
   */
  protected $AddressOrder;

  /**
   * Months at Address.
   *
   * Number of months the customer lived at this address.
   *
   * @var int|NULL $MonthsAtAddress
   *   Integer Optional
   */
  protected $MonthsAtAddress;

  use JsonEncodeable;

  /**
   * CustomerAddress constructor.
   *
   * @param \V12Finance\Models\Address|NULL $address
   * @param int|NULL $address_order
   * @param int|NULL $months_at_address
   */
  public function __construct(Address $address = NULL, int $address_order = NULL, int $months_at_address = NULL) {
    $this->Address = $address;
    $this->AddressOrder = $address_order;
    $this->MonthsAtAddress = $months_at_address;
  }

}