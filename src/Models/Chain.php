<?php


namespace DevwareUK\V12Finance\Models;

use DevwareUK\V12Finance\Traits\JsonEncodeable;

/**
 * Class Chain.
 *
 * This is the authentication packet, containing chain ID and Guid values,
 * supplied by V12. The authentication key is used as a pre-shared secret.
 *
 * @package V12Finance\Models
 */
class Chain {

  /**
   * Chain ID.
   *
   * Supplied by V12, used as a pair with ChainGuid.
   *
   * @var int $ChainId
   *   Integer Required
   */
  protected $ChainId;

  /**
   * Chain GUID.
   *
   * Supplied by V12, used as a pair with RetailerId.
   *
   * @var string $ChainGuid
   *   Guid Required
   */
  protected $ChainGuid;

  /**
   * Authentication Key.
   *
   * Supplied by V12, this is a pre-shared secret used to ensure messages have
   * originated from a trusted source.
   *
   * @var string $AuthenticationKey
   *   String(50) Required
   */
  protected $AuthenticationKey;

  use JsonEncodeable;

  /**
   * Chain constructor.
   *
   * @param int $chain_id
   * @param string $chain_guid
   * @param string $authentication_key
   */
  public function __construct(int $chain_id, string $chain_guid, string $authentication_key) {
    $this->ChainId = $chain_id;
    $this->ChainGuid = $chain_guid;
    $this->AuthenticationKey = $authentication_key;
  }

}