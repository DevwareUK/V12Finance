<?php

namespace DevwareUK\V12Finance\Models;

use DevwareUK\V12Finance\Traits\JsonEncodeable;

/**
 * Class TelephoneNumber
 *
 * A telephone object, used wherever a telephone number is required.
 *
 * @package V12Finance\Models
 */
class TelephoneNumber {

  /**
   * Code.
   *
   * The area code of the number.
   *
   * @var string|NULL
   *   String(8) Optional
   */
  protected $Code;

  /**
   * Number.
   *
   * The remainder of the telephone number.
   *
   * @var null
   *   String(32)	Optional
   */
  protected $Number;

  use JsonEncodeable;

  /**
   * TelephoneNumber constructor.
   *
   * @param string|NULL $code
   * @param string|NULL $number
   */
  public function __construct(string $code = NULL, string $number = NULL) {
    $this->Code = $code;
    $this->Number = $number;
  }

  public static function newFromJSON($json) : TelephoneNumber {
    return new TelephoneNumber($json->Code, $json->Number);
  }
}