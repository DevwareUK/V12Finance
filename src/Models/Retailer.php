<?php

namespace DevwareUK\V12Finance\Models;

use DevwareUK\V12Finance\Traits\JsonEncodeable;

/**
 * Class Retailer
 *
 * This is the main authentication packet, containing retailer ID and GUID
 * values, supplied by V12 to represent a single shop, website or sales channel.
 * The authentication key is used as a pre-shared secret.
 *
 * @package V12Finance\Models
 */
class Retailer {

  /**
   * Retailer ID.
   *
   * Supplied by V12, this identifies the specific shop/web site/sales channel
   * being used for this application. Used as a pair with RetailerGuid.
   *
   * @var int $RetailerId
   *   Integer Required
   */
  protected $RetailerId;

  /**
   * Retailer GUID.
   *
   * Supplied by V12, this identifies the specific shop/web site/sales channel
   * being used for this application. Used as a pair with RetailerId.
   *
   * @var string
   *   Guid	Required
   */
  protected $RetailerGuid;

  /**
   * Authentication Key.
   *
   * Supplied by V12, this is a pre-shared secret used to ensure messages have
   * originated from a trusted source.
   *
   * @var string
   *   String(50)	Required
   */
  protected $AuthenticationKey;

  /**
   *
   *
   * If supplied by V12, populate this to indicate the user who initiated the
   * transaction. It will be rare that this is required.
   *
   * @var int|NULL
   *   Integer Optional
   */
  protected $UserId;

  use JsonEncodeable;

  /**
   * Retailer constructor.
   *
   * @param int $retailer_id
   * @param string $retailer_guid
   * @param string $authentication_key
   * @param int|NULL $user_id
   */
  public function __construct(int $retailer_id, string $retailer_guid, string $authentication_key, int $user_id = NULL) {
    $this->AuthenticationKey = $authentication_key;
    $this->RetailerGuid = $retailer_guid;
    $this->RetailerId = $retailer_id;
    $this->UserId = $user_id;
  }
}